<?php
require 'vendor/autoload.php'; require_once 'simple_html_dom.php'; require_once('url_to_absolute/url_to_absolute.php');


//i have to find a way to get only images in the div with class name= image-wrapper default-state
if (isset($_GET['search'])) {
	$searchTerm = $_GET['search'];
	$searchTerm = preg_replace('/\s+/', '+', $searchTerm);
$url = "https://www.jumia.com.ng/phones-tablets/?q=$searchTerm";

$html = file_get_html($url);
foreach($html->find('img') as $element) {
    echo "<img src='";
    echo url_to_absolute($url, $element->src);
    echo "'>";
    echo "<br>";
		}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Find the cheapest Prices on the Net</title>
</head>
<body>
<form action="" method="GET">
	<label>Enter your Search Term below</label>
	<input type="text" name="search">
	<input type="submit" name="submit">
</form>

</body>
</html>