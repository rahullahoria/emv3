<?
class DB_Controller{

	private $mysqli ;

	public function __construct(){

		$ini_array = parse_ini_file("conf.ini");
		$DBServer = $ini_array['host']; 
		$DBUser   = $ini_array['username'];
		$DBPass   = $ini_array['password'];
		$DBName   = $ini_array['dbname'];
		
		$this->mysqli = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

    }

    public function query($query){

    	if ($mysqli->connect_errno) {
    		
    		echo "Failed to connect to MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
			return 1;
		}

		// Execute query
		if ($respose = $this->mysqli->query($query)) return $respose;

		else {
  			
  			echo "Error in inserting table: " . mysqli_error($con);
  			return 1;
  		}

    }

    public function closeConn(){
    	$this->mysqli->close();
    }

   

}




?>