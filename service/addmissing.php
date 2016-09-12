<?php
include '../backend/config.php';
$misname=$_POST['misname'];
$missingstatus=$_POST['missingstatus'];
$contact_number=$_POST['contact_number'];
$missing_Age=$_POST['missing_Age'];
$misdate=$_POST['misdate'];
$missing_gender=$_POST['missing_gender'];
$missing_details=$_POST['missing_details'];
$missing_photo=$_POST['missing_photo'];

$sql = "INSERT INTO `talash_db`.`missing_people` (`id`, `uid`, `view`, `status`, `date`, `age`, `time`, `name`, `gender`, `contactnumber`, `lat`, `long`, `title`, `discription`, `place`, `image`) VALUES ('', '', 'YES', '$missingstatus', '$misdate', '$missing_Age', '', '$misname', '$missing_gender', '$contact_number', '', '', '', '$missing_details', '', '$missing_photo');";
$res = $dbh -> query($sql);



$json = json_encode(array('name' => $misname,
  'type' => $missingstatus,
  'dataUrl' => $missing_photo,
  
));
echo $json;


?>