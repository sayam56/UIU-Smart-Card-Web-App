<?php
date_default_timezone_set('Asia/Dhaka'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$rfid = $_POST['rfid'];

	$codeQuery='';
	$jsonVal="";
	$count = 0;
	$date = date("Y-m-d");
	

/*	$testarr = array();*/

try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    
}

try{
	$qry= "SELECT * FROM `transaction` WHERE r_tag='".$rfid."' ";
	$trObj = $conn->query($qry);
	$trTab = $trObj->fetchAll();
		foreach ($trTab as $key) {
			$jsonVal = $jsonVal.$key[0].""."+"; //this sends the trid
			$jsonVal = $jsonVal.$key[2].""."+"; //this sends the tr_amount
			
			$vsql = "SELECT * FROM `vendor` WHERE vendor_id='".$key[4]."' ";
			$vObj = $conn->query($vsql);
			$vTab = $vObj->fetchAll();
			foreach ($vTab as $k) {
				$jsonVal = $jsonVal.$k[2].""."+";  //this sends vendor name 

			}
		
		}
	}/* outer try block ends here*/
catch(PDOException $e){
       
                }/*catch ends here*/


	/* echo $jsonVal; */
	$pieces = explode("+", $jsonVal);

	/* echo "<br>"; print_r($pieces); echo "<br>"; */
	/* echo count($pieces);  */
	/* echo '<pre>'; print_r($pieces); echo '</pre>'; */

	for ($i=0; $i < count($pieces)-1 ; $i=$i+3) { 

		$result[$count] = [
			
			"tr_id" => $pieces[$i],
			"amount" => $pieces[$i+1],
			"vendor" => $pieces[$i+2]

		];

		$count++;


	}

	if (empty($jsonVal)) 
	{
		$result["success"] = "0";
		$result["message"] = "failed";

		echo json_encode($result);


		
	}
	else
	{


		echo json_encode($result);

	}






}

?>