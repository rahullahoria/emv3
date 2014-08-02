<?

class Study extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
		Session::set('loggedIn', true);//update it, its wrong
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('location: ../');
			exit;
		}
	}

	function logout()
	{
		Session::destroy();
		header('location: ../');
		exit;
	}

	function index() {
		//echo 'Study';
		$this->view->render('index/index');
	}

	function getSubjectList($examID){

		require 'Models/Subject.class.php';
		$subList = Subject::getSubjectList($examID);
		

		while ($subListRow = $subList->fetch_assoc()) {
			echo "<a href='".URL."study/startTut/".$subListRow['sub_id']."'>".$subListRow['sub_name']." ".$subListRow['sub_id']."</a><br/>";
		}

		
	}

	function startTut($subID) {
		echo "<p>";
		$this->getSubjectIndex($subID);
		echo "</p><p>";
		$this->startSlideShow("1");
		echo "</p>";
		echo "<audio controls>
    			<source src='http://socloc.capillary.in/rahulSandbox/outfile.mp3' type='audio/mpeg'>
					Your browser does not support the audio element.
				</audio>";

	}

	function nextSlide(){
		require 'Models/Slide.class.php';

		echo "nextSlide bellow";
		$_SESSION['slide_no'] = $_SESSION['slide_no'] + 1;
		$slideObj = new Slide($_SESSION['Chapter_id'],$_SESSION['slide_no']);

		
		

		echo $slideObj->getHeading()."<br/>";
		echo $slideObj->getPoints()."<br/>";
		echo $slideObj->getNotes()."<br/>";
		
		echo "<a href='".URL."study/previousSlide/'>Previous</a>";
		echo "<a href='".URL."study/nextSlide/'>Next</a><br/>";

				
	}

	function previousSlide(){
		require 'Models/Slide.class.php';
		
		echo "Previous bellow: ".$_SESSION['slide_no']."<br/>";
		if ($_SESSION['slide_no'] > 1)
		$_SESSION['slide_no'] = $_SESSION['slide_no'] - 1 ;

		$slideObj = new Slide($_SESSION['Chapter_id'],$_SESSION['slide_no']);

		
		echo $slideObj->getHeading()."<br/>";
		echo $slideObj->getPoints()."<br/>";
		echo $slideObj->getNotes()."<br/>";
		echo "<a href='".URL."study/previousSlide/'>Previous</a>";
		echo "<a href='".URL."study/nextSlide/'>Next</a><br/>";
				
	}

	function startSlideShow($chapterID){
		
		require 'Models/Slide.class.php';
		
		$slideObj = new Slide($chapterID,"1");

		$_SESSION['Chapter_id'] = $chapterID;
		$_SESSION['slide_no'] = "1";

		echo $slideObj->getHeading()."<br/>";
		echo $slideObj->getPoints()."<br/>";
		echo $slideObj->getNotes()."<br/>";
		echo "<a href='".URL."study/nextSlide/'>Next</a><br/>";
	}
	function getSubjectIndex($subID){

		require 'Models/Chapter.class.php';
		$chapList = Chapter::getChapterList($subID);
		
		//echo "i m in getSubjectIndex";
		while ($chapListRow = $chapList->fetch_assoc()) {
			echo $chapListRow['chapter_name']." ".$chapListRow['chapter_id']."<br/>";
		}

		return true;

	}
}


?>