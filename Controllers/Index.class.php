<?

class Index extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		
		require 'Models/Exam.class.php';
		$dbListOfExam = Exam::getExamList();

		while ($examRow = $dbListOfExam->fetch_assoc()) {
			echo "<a href='".URL."study/getSubjectList/".$examRow['exam_id']."'>".$examRow['exam_name']." ".$examRow['exam_abr']."</a><br/>";
		}

		$this->view->render('index/index');
	}
	
	function details() {
		$this->view->render('index/index');
	}
}


?>