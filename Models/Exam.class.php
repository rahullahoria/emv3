<?

class Exam{
	

	public static function getExamList(){

		require_once './libs/DB_Controller.class.php';
		
		$DBObj = new DB_Controller();
		$response = $DBObj->query("SELECT * FROM exams ;");
		
		return ($response->num_rows == 0) ? 0: $response;
	}


}

//print_r( Exam::getExamList());

?>