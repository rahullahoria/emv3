<?
class Slide{
	private $slideID;
	private $chapterID;
	private $heading;
	private $points;
	private $notes;
	private $slideNo;

	public function __construct($slideID){
		$this->slideID = $slideID;
		$this->slideNo = 1;
		$this->setSlide();


	}
//"SELECT * FROM slides where slide_id = '$this->slideID' and slide_no = '$this->slideNo';"
	private function setSlide(){

		
		require_once '../libs/DB_Controller.class.php';

		$DBObj = new DB_Controller();
		$response = $DBObj->query("SELECT * FROM slides where slide_id = '$this->slideID' ;");
		
		if($response->num_rows == 0) {
			
			return 1;
		}

		$resRow = $response->fetch_assoc();

		$this->chapterID = $resRow['chapter_id'];
		$this->heading = $resRow['heading'];
		$this->points = $resRow['points'];
		$this->notes = $resRow['notes'];
		$this->slideNo = $resRow['slide_no'];

		return 0;

	}


	public function chapterID(){
		return $this->chapterID;

	}

	public function getHeading(){

		return $this->heading;

	}

	public function getPoints(){

		return $this->points;

	}

	public function getNotes(){
		return $this->notes;

	}


	public function getSlideNo(){
		return $this->slideNo;

	}

	public function getNextSlide(){
		$this->slideNo++;
		$this->updateSlide();
	}

	private function updateSlide(){

		require_once('./libs/DB_Controller.class.php');

		$DBObj = new DB_Controller();
		$response = $DBObj->query("SELECT * FROM slides where chapter_id = '$this->chapterID' AND slide_no = '$this->slideNo' ;");
		
		if($response->num_rows == 0) {
			
			return 1;
		}

		$resRow = $response->fetch_assoc();

		$this->chapterID = $resRow['chapter_id'];
		$this->heading = $resRow['heading'];
		$this->points = $resRow['points'];
		$this->notes = $resRow['notes'];
		$this->slideNo = $resRow['slide_no'];

		return 0;
	}

}

$slideObj = new Slide("1");
echo $slideObj->getHeading();
?>