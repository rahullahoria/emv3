<?

class Index {

	function __construct() {

		require_once '../libs/DB_Controller.class.php';
		$DBObj = new DB_Controller();

		print_r( $DBObj->query("SELECT *
FROM users
LIMIT 0 , 30"));

	}
}


?>