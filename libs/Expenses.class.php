<?
public class Expenses {

	private EID;
	private expenseName;
	private userID;
	private amount;
	private timeStamp;

	public function __construct($expenseName,$amount){

		$this->expenseName = $expenseName;
		$this->amount = $amount;

		try{
		setExpenses();

		} catch(Exception $e){
    	echo $e->getMessage();
		} 

    }

    private function setExpenses(){



    }




}



?>