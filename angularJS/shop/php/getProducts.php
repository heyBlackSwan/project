<?php

$mysqli = mysqli_connect("localhost","root","","bjh160303-65");
//mysqli_connect_errno 不为0 表示连接失败
if(mysqli->mysqli_connect_errno){
	//结束执行 php 文件
	die("连接数据库失败".$mysqli->connect_error);
}

$sql = "select * from product";

//防止乱码出现，首先规定编码方式为utf-8
$mysqli->query("set names utf8");

//执行查询语句
$result = $mysqli->query($sql);

$data = $ewsult->fetch_all(MYSQL_ASSOC);

>



//<?php 
//	$mysqli = new mysqli("localhost","root","","shop");
//	// mysqli_connect_errno 不为0表示连接失败
//	if ($mysqli->connect_errno) {
//		// 结束执行 php 文件
//		die("连接数据库失败".$msyqli->connect_error);
//
//
//	}
//
//	$sql = "SELECT *FROM product";
//
//	// 为了防止乱码的出现，首先规定编码方式为utf8
//	$mysqli->query("set names  utf8");
//
//	// 执行查询语句
//	
//	$result = $mysqli->query($sql);
//
//	$data = $result->fetch_all(MYSQLI_ASSOC);
//
//	echo json_encode($data);
//
//
// ?>