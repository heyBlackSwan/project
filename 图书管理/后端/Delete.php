<?php
/**
 * Created by ${TongyuanLiang}.
 * User: ${*_*}
 * Date: 16/7/9
 * Time: 下午2:29
 */
$bookName = $_POST["name"];
//$bookAuthor = $_POST["author"];
$con = mysql_connect("127.0.0.1:3306","root","");
if($con){
    //        echo "数据库连接成功";
    //        echo "</br>";
    $se = mysql_select_db("LZ_library");

    if($se){
            $sql = "DELETE FROM LZ_book where name = $bookName";
        $result = mysql_query($sql);
        if($result){
                echo json_encode("删除成功");
        }else{
            echo json_encode("删除失败");
        }
    }
}


mysql_close($con);



?>
 