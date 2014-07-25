<?

abstract public class User {
	
	private username = "";
	private userID;
	private password;
	private email;

	abstract public function getUserID();
	abstract public function getEmail();

	abstract public function validateUser($username, $password);


}




?>