
<?

require 'php-sdk/facebook.php';  // Include facebook SDK file

if ($user) {
  $logoutUrl = $facebook->getLogoutUrl(array(
         'next' => 'http://ec2-54-92-76-110.ap-northeast-1.compute.amazonaws.com/shareBill/lib/logout.php',  // Logout URL full path
        ));
} else {
$loginUrl = $facebook->getLoginUrl(array(
        'scope'        => 'email', // Permissions to request from the user
        ));
}

class FacebookLogin{

	$facebook;

	public function __construct(){

		$ini_array = parse_ini_file("fbAppConf.ini");
		$appId = $ini_array['appId']; 
		$secret   = $ini_array['secret'];
		
		
		$this->facebook = new Facebook(array(
  		'appId'  => $appId,   // Facebook App ID
  		'secret' => $secret,  // Facebook App Secret
  		'cookie' => true,    
		));

    }

    public function login(){
		$user = $facebook->getUser();

		if ($user) {
		  try {
		    $user_profile = $facebook->api('/me');
		          $fbid = $user_profile['id'];           // To Get Facebook ID
		        $fbuname = $user_profile['username'];  // To Get Facebook Username
		        $fbfullname = $user_profile['name'];    // To Get Facebook full name
		  } catch (FacebookApiException $e) {
		    error_log($e);
		   $user = null;
		  }
		}    	
    }

}

?>