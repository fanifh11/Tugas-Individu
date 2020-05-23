<?php

if (isset($_GET['id'])) {

    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
 
    // Ambil produk dari database dan kembalikan hasilnya sebagai Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //Cek jika produk tersedia atau tiadk
    if (!$product) {
        // Menampilkan pesan eror jika produk tidak tersedua
        die ('Product does not exist!');
    }
} else {
    // menampilkan pesan jika produk tidak spesifik
    die ('Product does not exist!');
}
?>


<?=template_header('Product')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="product content-wrapper">
    <img src="imgs/<?=$product['img']?>" width="500" height="500" alt="<?=$product['name']?>">
    <div>
        <h1 class="name"><?=$product['name']?></h1>

        <span class="price">
            &dollar;<?=$product['price']?>
            <?php if ($product['rrp'] > 0): ?>
            <span class="rrp">&dollar;<?=$product['rrp']?></span>
            <?php endif; ?>
        </span>

        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <input type="submit" value="Tambahkan Ke Keranjang">
        </form>

        <div class="description">
            <?=$product['desc']?>
            <p>Source Description: Amazon.com</p>
        </div>
    </div>
</div>
    
</body>
</html>



<?=template_footer()?>


