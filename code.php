<?php 
session_start();
unset($_SESSION["vcode"]);
// $code = $_POST['code'];
Header('Content-type: image/PNG');
// echo "��֤��ϵͳ-���ȡ������"."</br>";

// echo "Powered By �¹���</br>";
$status = "";
$success = "";
$scookies = "";
$ccode = rand(1,30324);
  // echo $ccode." </br>";


    $dbname="root";
    $dbpass="741205Dhw";
    $dbhost="127.0.0.1";
    $dbdatabase="vcode";
 
    //����һ������
    $db_connect= new mysqli($dbhost,$dbname,$dbpass,$dbdatabase);

    // ��ȡ��ѯ���
    $strsql="select * from `sd_vcode` where `id` = '$ccode' limit 1";
    $result=$db_connect->query($strsql);
	while($row=$result->fetch_array()){
            // echo "ID:".$row["id"]."��֤���룺".$row[1]."���룺".$row["anwser"]."<br />";
			
	$image = "http://www.chemicalbook.com/CAS/GIF/".$row[1].".gif";
	// echo $image."</br>";
	
    $imagedata = file_get_contents($image);
	
	$im = imagecreatefromstring($imagedata);
	
	imagegif($im);
	
	imagedestroy($im);
    $_SESSION["vcode"] = $row["anwser"];

	}
	// echo $result;
	// $image = "http://www.chemicalbook.com/CAS/GIF/".$row[1].".gif";
	// echo $image;
	// echo file_get_contents($image);
	?>