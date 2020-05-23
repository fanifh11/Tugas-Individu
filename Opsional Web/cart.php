<?php 
    if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {

        // Mmembuat post variable
        $product_id = (int)$_POST['product_id'];
        $quantity = (int)$_POST['quantity'];
       
        //Persiapan SQL , sekaligus pengecekan jika produk tersedai di database kita
        $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$_POST['product_id']]);

      
        //Ambil produk dari database dan membuat return hasil sebagai nilai Array
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        // Cek jika produk tersedia 
        if ($product && $quantity > 0) {
        
            //Produk tersedia di database, sekaraang kita dapat membuat / update untuk cart
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                if (array_key_exists($product_id, $_SESSION['cart'])) {
                    //Produk tersedia di cart jadi hanya update jumlah nya saja
                    $_SESSION['cart'][$product_id] += $quantity;
                } else { 
                    //Produk tidak ada didalam cart jadi kita harus menambahkan nnya
                    $_SESSION['cart'][$product_id] = $quantity;
                }
            } else {
                //Tidak ada produk di cart, jadi kita akan menambahkannya kedalam cart
                $_SESSION['cart'] = array($product_id => $quantity);
            }
        }
        // Cegah pengiriman ulang formulir
        header('location: index.php?page=cart');
        exit;
    }

    if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
        //Hapus produk dari keranjang belanja
        unset($_SESSION['cart'][$_GET['remove']]);
    }

    if (isset($_POST['update']) && isset($_SESSION['cart'])) {
        // Melakukan looping pada form post jadi kita dapat mengupdate jumlah dari setiap produk di cart
        foreach ($_POST as $k => $v) {
            if (strpos($k, 'quantity') !== false && is_numeric($v)) {
                $id = str_replace('quantity-', '', $k);
                $quantity = (int)$v;
                if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                    // Update jumlah cart
                    $_SESSION['cart'][$id] = $quantity;
                }
            }
        }
        header('location: index.php?page=cart');
        exit;
    }

        //Kirim pengguna ke halaman place order jika mereka mengklik tombol Place Order, juga keranjang tidak boleh kosong
    if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        header('Location: index.php?page=placeorder');
        exit;
    }

    // Cek variabel untuk produk yang ada di cart
    $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $products = array();
    $subtotal = 0.00;
    
    // Jika ada produk di dalam cart
    if ($products_in_cart) {
        $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
        $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
        $stmt->execute(array_keys($products_in_cart));
        
        //Ambil produk dari database dan kembalikan hasilnya sebagai Array
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Hitung jumlah subtotal
        foreach ($products as $product) {
            $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
        }
    }
?>

<?=template_header('Cart')?>

<div class="cart content-wrapper">
    <h1>Keranjang Belanja Anda</h1>
    <form action="index.php?page=cart" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Nama Produk</td>
                    <td>Harga</td>
                    <td>Jumlah</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">Belum Satupun Gundam yang Anda Beli</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="index.php?page=product&id=<?=$product['id']?>">
                            <img src="imgs/<?=$product['img']?>" width="50" height="50" alt="<?=$product['name']?>">
                        </a>
                    </td>
                    <td>
                        <a href="index.php?page=product&id=<?=$product['id']?>"><?=$product['name']?></a>
                        <br>
                        <a href="index.php?page=cart&remove=<?=$product['id']?>" class="remove">Remove</a>
                    </td>
                    <td class="price">&dollar;<?=$product['price']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">&dollar;<?=$product['price'] * $products_in_cart[$product['id']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">&dollar;<?=$subtotal?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Perbarui" name="update">
            <input type="submit" value="Checkout" name="placeorder">
        </div>
    </form>
</div>

<?=template_footer()?>