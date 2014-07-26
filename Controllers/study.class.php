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

	}

	function startSlideShow($chapterID){

		
		require 'Models/Slide.class.php';
		$slideObj = new Slide($chapterID);
		echo $slideObj->getHeading();
		echo $slideObj->getPoints();
		echo $slideObj->getNotes();
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