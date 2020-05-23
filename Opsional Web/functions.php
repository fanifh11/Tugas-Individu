<?php
function pdo_connect_mysql() {
    // Update delatail berikut untuk MySql
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'shoppingcart';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
        // Jika terjadi error 
    	die ('Failed to connect to database!');
    }
    
    
}
// Template Header
function template_header($title) {
    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <h1>Gundam Online Store</h1>
                
                <nav>
                    <a href="index.php">Beranda</a>
                    <a href="index.php?page=products">Koleksi</a>
                    
                </nav>
                <div class="link-icons">
                    <a href="index.php?page=cart">
                        <i class="fas fa-shopping-cart"></i>

                        <span>$num_items_in_cart</span>
                        
					</a>
                </div>
            </div>
        </header>
        <main>
EOT;
}
// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; $year, GOS - Gundam Online Store</p>
            </div>
        </footer>
        <script src="script.js"></script>
    </body>
</html>
EOT;
}







?>