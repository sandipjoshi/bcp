<?php
include "../backend/config.php";
$key=$_GET['key'];
$mobile_no = $_GET['mobno'];
//$mobile_no='9723011190';
//$sql="SELECT * FROM `Parent` WHERE      MobileNo='$mobile_no'";
//$result=mysql_query($sql,$conn2);
// Mysql_num_row is counting table row
//$count = mysql_num_rows($result);

if ($key = 'iZ23U35Gx9I8987x09tsW6i6oS2W5Ux1')
{
$sql = "select * FROM users where users.User_num='$mobile_no'";
foreach ($dbh->query($sql) as $row) {
	$count = $row;
	
}
// If result matched $myusername and $mypassword, table row must be 1 row
if (empty($count)) {
	
	$false = 0;
	$string = '0123456789';
	$string_shuffled = str_shuffle($string);
	$otp = substr($string_shuffled, 1, 4);
	//echo $otp;
	echo json_encode("OTP=".$otp);
	
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL =>"http://mysms.silverlightinfosys.com/submitsms.jsp?user=devkey&key=212442b789XX&mobile=91$mobile_no&message=$otp&senderid=INFOSM&accusage=1",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "postman-token: 8ae2283f-3521-bb82-ae85-1fcb4f66539c"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
} else {
	
	echo json_encode($count['id']);
    
}
}
?>