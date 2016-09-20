<?php
/**
 * Created by ${TongyuanLiang}.
 * User: ${*_*}
 * Date: 16/7/10
 * Time: 下午9:52
 */

$con = mysql_connect("127.0.0.1:3306","root","");
if($con){
    $se = mysql_select_db("LZ_library");
    if($se){
        $sql = "SELECT * FROM LZ_book";
        $finalArray = null;
        $result = mysql_query($sql);
        if(mysql_num_rows($result)>0){
            while($row = mysql_fetch_assoc($result)){
                    $finalArray[] = $row;
            }
        }else{
            echo "没有数据";
        }
    }else{
        echo "选择表失败";
    }
}else{
    echo "数据库连接失败";
}

echo json_encode($finalArray);
mysql_close($con);






?>

 