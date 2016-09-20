<?php
/**
 * Created by ${TongyuanLiang}.
 * User: ${*_*}
 * Date: 16/7/9
 * Time: 下午3:56
 */

//书名
$bookName = $_POST["name"];
//作者
$bookAuthor = $_POST["author"];
//图书内容
$bookMessage = $_POST["message"];
//图书价格
$bookPrice = $_POST["price"];



$con = mysql_connect("127.0.0.1:3306","root","");
    if($con){
        $se = mysql_select_db("LZ_library");

        if($se){
            $sql = "UPDATE LZ_book SET author = '$bookAuthor',message = '$bookMessage', price = '$bookPrice' WHERE name = '$bookName'";
            $result = mysql_query($sql);
        }
    }













?>
 