<?

$url = $_GET['url'];
print_r($url);
require_once 'Models/' . $url . '.class.php';
new User();

echo "hi";

?>