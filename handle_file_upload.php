<?php
include ('oph/php_image_magician.php');
include "oph/FaceDetector.php";
$fileName = $_FILES['afile']['name'];
$fileType = $_FILES['afile']['type'];
$ext=explode("/",$fileType);
$fileContent = file_get_contents($_FILES['afile']['tmp_name']);
$dataUrl = 'data:' . $fileType . ';base64,' . base64_encode($fileContent);
if(isset($fileName)){
    
$ds = $_FILES['afile']['tmp_name'].".".end($ext);

$dsi = explode('/', $ds);
$crppngnm = ".".end($dsi);
$crpmd5=md5($crppngnm);
$crpname = 'oph/HOF/' . $crpmd5 . '.png';
$crpHOFname = 'oph/HOF/que/' . $crpmd5 . '.png';
$movehofpng='oph/HOFPNG/' . $crpmd5 . '.png';
copy($dataUrl,$crpHOFname);
//echo $dataUrl;
$detector = new svay\FaceDetector('detection.dat');
$detector -> faceDetect($crpHOFname);
$detector -> cropFaceToPng($crpname);


$magicianObj = new imageLib($crpname);
$magicianObj -> resizeImage(125, 150, 'exact');
$magicianObj -> saveImage($crpHOFname);


//$output = shell_exec('/usr/bin/python2.7 /var/www/bcp/tal_netra/pyfaces /var/www/bcp/oph/' . $crpHOFname . ' /var/www/bcp/oph/HOFPNG 15 3');
//echo "<pre>$output</pre>";
//$arr = explode(' :', $output, 30);
//$matchfile=explode(" ", $arr[1]);
//$found= explode("oph/", $matchfile[0]);
/*
echo "Query Image"."<img src=".$crpHOFname." ><br/>";

echo "match Found with name"."$found[1]";
echo "<img src=".$found[1].">";
//echo "<pre>$arr[1]</pre>";
echo "Processing time:"."<pre>$arr[2]</pre>";
echo $crpHOFname."<br/>";
echo $movehofpng;
*/
copy($crpHOFname, $movehofpng);


$json = json_encode(array('name' => $fileName,
  'type' => $fileType,
  'dataUrl' => $movehofpng,
  'username' => $_REQUEST['username'],
  'accountnum' => $dataUrl
));
echo $json;




}

?>
