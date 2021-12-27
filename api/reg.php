<!-- 這裏用include 或require也可以 用法一樣 但只有一個會報錯 -->
<?php include_once "db.php";

//使用insert自訂函式，將$_POST陣列中的使用者註冊資料新增至users資料表
insert('users',$_POST);
//$_POST['email']

//新增完畢導向回首頁
to("../index.php");





