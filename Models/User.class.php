<?

class User{
	
	private $username;
	private $userID;
	private $email;

	public function __construct(){
		//$this->validateUser("rahul_lahoria@yahoo.com", "rahul");		
		
	}

	public function getUserID(){


	}
	public function getEmail(){

	}

	public function validateUser($email, $password){
		require_once './libs/DB_Controller.class.php';
		
		$DBObj = new DB_Controller();
		$response = $DBObj->query("SELECT * FROM `users` where email = '$email' and password = '$password';");
		if($response->num_rows == 0) {
			
			return 1;
		}

		$resRow = $response->fetch_assoc();

		$this->userID = $resRow['user_id'];
		$this->username = $resRow['username'];
		$this->email = $resRow['email'];
		
		return 0;
	}


}




?>