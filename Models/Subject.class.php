<?

class Subject{
	

	public static function getSubjectList($examID){

		require_once './libs/DB_Controller.class.php';
		
		$DBObj = new DB_Controller();
		$response = $DBObj->query("SELECT * FROM subjects WHERE exam_id = '$examID' ;");
		
		return ($response->num_rows == 0) ? 0: $response;
	}


}

//print_r( Subject::getSubjectList("1"));

?>