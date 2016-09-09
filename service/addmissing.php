<?php
$misname=$_POST['misname'];
$missingstatus=$_POST['missingstatus'];
$contact_number=$_POST['contact_number'];
$missing_Age=$_POST['missing_Age'];
$missing_gender=$_POST['missing_gender'];
$missing_photo=$_POST['missing_photo'];

$json = json_encode(array('name' => $misname,
  'type' => $missingstatus,
  'dataUrl' => $missing_photo,
  
));
echo $json;


?>