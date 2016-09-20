<?php
/**
 * Created by ${TongyuanLiang}.
 * User: ${*_*}
 * Date: 16/7/9
 * Time: 下午2:54
 */


//书名
$bookName = $_POST["name"];
//作者
$bookAuthor = $_POST["author"];
//图书内容
$bookMessage = $_POST["message"];
//图书价格
$bookPrice = $_POST["price"];


//判断
if($bookName == "" || $bookName == null){
    echo "书名不能为空";
    exit();
}
if($bookAuthor == "" || $bookAuthor == null){
    echo "图书作者不能为空";
    exit();
}
if($bookMessage == "" || $bookMessage == null){
    echo "图书简介不能为空";
    exit();
}
if($bookPrice == "" || $bookPrice == null){
    echo "图书价格不能为空";
    exit();
}





$con = mysql_connect("127.0.0.1:3306","root","");
if($con){
    $se = mysql_select_db("LZ_library");

    if($se){
        $sql = "INSERT INTO LZ_book (name,author,message,price) VALUE ('$bookName','$bookAuthor','$bookMessage','$bookPrice')";
        $result = mysql_query($sql);
    }else{
        echo "连接数据表失败";
    }
}else{
    echo "连接数据库失败";
}




?>
 