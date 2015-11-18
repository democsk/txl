<?php
/**
 * 义工平台模块微站定义
 *
 * @author wiki
 * @url 
 */require 'reader.php';
$conn = mysql_connect('localhost','root','');
mysql_select_db('test',$conn);
mysql_query('set names utf8;');
mysql_query('truncate `txl_15`');
preg_match_all("/(.*?)\.xls/", $_FILES['f']['tmp_name'], $arr);		
$data = new Spreadsheet_Excel_Reader();		
$data->setOutputEncoding('UTF-8');		
$data->read($_FILES['f']['tmp_name']);		
foreach ($data->sheets[0][cells] as $v) {			
	var_dump($v);			
	$name = $v[1];			
	$tel = $v[2];			
	$address = $v[3];
	echo $address;
	$time = time();		
	$sql = "insert into `txl_15` (tel,name,address,time) values ('$tel','$name','$address',$time)";
	mysql_query($sql,$conn);
	echo $name;
	echo "提交成功！<br/>";
}		
echo "提交成功！<br/>";	


	