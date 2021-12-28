<?php include_once "db.php";
/* echo "tmp_name=>".$_FILES['name']['tmp_name']."<br>";
echo "filename=>".$_FILES['name']['name']."<br>";
echo "intro=>".$_POST['intro']."<br>"; */

//先判斷是否有檔案上傳成功的動作
if(!empty($_FILES['name']['tmp_name'])){

    //取得表單傳來的intro欄位資料
    $intro=$_POST['intro'];

    //取得上傳檔案的原始檔名 前面的name就是表單的 或 資料庫的,後面的name是FILES原本自帶的
    $filename=$_FILES['name']['name'];
    // echo"<script>console.log(".json_encode($filename).")</script>";

    //將檔案從暫存路徑搬移至指定路徑
    move_uploaded_file($_FILES['name']['tmp_name'],'../image/'.$filename);

    //使用insert自訂函式來完成新增廣告圖片的動作
    insert('ad',['name'=>$filename,'sh'=>0,'intro'=>$intro]);
}

//新增完畢，導向回廣告管理頁面
// to("../backend/?do=ad");
?>
<!-- <!DOCTYPE html> 這段測試用
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h1>jiu shi lai test</h1>  
</body>
</html> -->





