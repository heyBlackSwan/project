<?php
/**
 * Created by ${TongyuanLiang}.
 * User: ${*_*}
 * Date: 16/7/11
 * Time: 上午9:54
 */
$bookName = $_POST["name"];
$array = null;
if ($bookName == "" || $bookName == null) {
    $array[] = "删除书名不能空";
    echo json_encode($array);
}
$con = mysql_connect("localhost:3306","root","");
if ($con) {
    $se = mysql_select_db("LZ_library");
    if ($se) {
        $sql = "DELETE FROM LZ_book WHERE name = '$bookName'";
        $sql1 = "SELECT name  FROM LZ_book WHERE name  = '$bookName'";
        $result =  mysql_query($sql1);
        if (mysql_num_rows($result) > 0) {
            mysql_query($sql);
            $array[] = "删除成功";
            echo json_encode($array);
			console.log($array);
        }else{
            $array[] = "删除失败:没有名为《"."$bookName"."》的图书";
            echo json_encode($array);
        }
    }else{
        echo "删除图书失败：原因是选择数据库失败";
    }
}else{
    echo "删除图书失败：原因是未连接到数据库";
}
mysql_close($con);
?>
 