<?php

    // $dsn="mysql:host=localhost;charset=utf8;dbname=mypolling";
    $dsn="mysql:host=localhost;charset=utf8;dbname=s1100417";
    $pdo=new PDO($dsn,'s1100417','s1100417');
    session_start();

    //取得符合條件的一筆資料
    function find($table,$id){
        global $pdo;
        $sql="SELECT * FROM `$table` WHERE ";

        if(is_array($id)){
            foreach($id as $key=>$value){
                $tmp[]="`$key`='$value'";
            }
            
            $sql=$sql. implode(" AND ",$tmp);
        }else{
           $sql=$sql . "`id`='$id'";
        }

        return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    //計算符合條件的資料筆數
    function rows($table,$array){
        global $pdo;
        $sql="SELECT count(*) FROM `$table` WHERE ";
            foreach($array as $key=>$value){
                $tmp[]="`$key`='$value'";
            }
            
            $sql=$sql. implode(" AND ",$tmp);
        return $pdo->query($sql)->fetchColumn();
    }



    //取出指定資料表的所有資料
function all($table,...$arg){
    global $pdo;
    $sql="SELECT * FROM `$table` ";
    if(isset($arg[0])){
        if(is_array($arg[0])){
            foreach($arg[0] as $key=>$value){
                $tmp[]="`$key`='$value'";
            }
            
            $sql=$sql."where " . implode(" AND ",$tmp);
        }else{
            $sql=$sql.$arg[0];
        }
    }

    if(isset($arg[1])){
        $sql=$sql.$arg[1];
    }
    
    //echo $sql;
    
    $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
    //return $pdo->query($sql)->fetchAll();
}


 function update($table,$column,$where){
    global $pdo;

    $sql_set='';
    foreach ($column as $key => $value) {
        $sql_set=$sql_set . "`$key`='$value',";
    }
    $sql_set=trim($sql_set,',');

    $sql_where='';
    foreach ($where as $key => $value) {
        $sql_where=$sql_where . "`$key`='$value' AND ";
    }
    $sql_where=mb_substr($sql_where,0,mb_strlen($sql_where)-5);;

    mb_substr($sql_where,0,mb_strlen($sql_where)-5);
    $sql="UPDATE `$table` SET $sql_set WHERE $sql_where ";
    echo $sql . "<br>";
    $pdo->exec($sql);

 }


 function insert($table,$array){
     global $pdo;


     $sql="INSERT into $table(`" . implode('`,`',array_keys($array)) . "`) 
                        value('" . implode("','",$array) ."')";

    echo $sql."<br>";
    return $pdo->exec($sql);

 }



 function del($table,$id){
    global $pdo;
    $sql="DELETE FROM `$table` WHERE ";
    if(is_array($id)){
        foreach($id as $key=>$value){
            $tmp[]="`$key`='$value'";
        }
        
        $sql=$sql. implode(" AND ",$tmp);
    }else{
       $sql=$sql . "`id`='$id'";
    }
    return $pdo->exec($sql);
 }

function to($url){
    header("location:".$url);
}

//任意查詢函式
function q($sql){
    global $pdo;
    // 看到assoc 關鍵字 則PDO的 FETCH會把值自動轉換成陣列
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

}


 function dd($array){
    // 只要看到這個 pre則 html js的都會被原型呈現出來 
    echo "<pre>";
     print_r($array);
     echo "</pre>";
 }
?>