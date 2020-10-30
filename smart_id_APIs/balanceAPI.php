<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


	$rfid = $_POST['rfid'];
/*     $id = $_POST['id'];
    $role = $_POST['role']; */

	$balance='';
	$jsonVal="";

	$date = date("Y-m-d");
	

try{
    $conn=new PDO("mysql:host=localhost;dbname=smart_card;",'root','');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    
}

try{
	$qry= "SELECT w_balance FROM `wallet` WHERE r_tag='".$rfid."' ";
	$balanceObj = $conn->query($qry);
	$balanceTab = $balanceObj->fetchAll();
		foreach ($balanceTab as $key) {
			$balance = $key[0];
            break;
		}
		

	}/* outer try block ends here*/
catch(PDOException $e){
       
                }/*catch ends here*/

$result["balance"] = number_format($balance,2);
/* 
	echo "<br>"; print_r($result); echo "<br>"; */

if ($balance) {
        $result["success"] = "1";
        $result["message"] = "success";
        

		echo json_encode($result);
}
else{
    $result["success"] = "0";
    $result["message"] = "failed";

}


}

?>