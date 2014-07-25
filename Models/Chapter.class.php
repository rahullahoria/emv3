<?

class Chapter{
	

	public static function getChapterList($subjectID){

		require_once '../libs/DB_Controller.class.php';
		
		$DBObj = new DB_Controller();
		$response = $DBObj->query("SELECT * FROM chapters WHERE sub_id = '$subjectID' ;");
		
		return ($response->num_rows == 0) ? 0: $response;
	}


}

print_r( Chapter::getChapterList("1"));

?>