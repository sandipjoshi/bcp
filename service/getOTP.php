<script src="../js/jquery-1.11.3.min.js" type="text/javascript" ></script>
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
	
   ?>
<script>
    var mobno = "<?php echo $mobile_no; ?>";
    var otp = "<?php echo $otp; ?>";
   $.ajax({     Origin: "http://silverlightinfosys.com",
                type: "POST",
                url: "http://mysms.silverlightinfosys.com/submitsms.jsp?user=devkey&key=212442b789XX&mobile=+91"+mobno+"&message=Your OTP for  Talash.Online is "+otp+"&senderid=INFOSM&accusage=1",
                success: function(result) {
                }

            });

</script>

<?php	

} else {
	$string = '0123456789';
	$string_shuffled = str_shuffle($string);
	$otp = substr($string_shuffled, 1, 4);
	//echo $otp;
	//echo json_encode($otp);
	echo json_encode($count['id']);
    
}
}
?>