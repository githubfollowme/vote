<?php
include_once "db.php";

/**
 * 資料表的欄位名稱=>資料內容
 */

 //依據表單傳過來的topic欄位取得問卷主題資料
$topic=$_POST['topic'];

//依據表單傳過來的topic_id欄位取得問卷id資料
$topic_id=$_POST['topic_id'];

//使用update自訂函式來更新問卷主題內容
update('topics',['topic'=>$topic],['id'=>$topic_id]);

//依據表單傳過來的選項內容，取得選項內容，為一個陣列
$options=$_POST['options'];

//依據表單傳過來的選項id內容，取得選項id，為一個陣列
$opt_id=$_POST['opt_id'];

//使用迴圈對選項內容進行遍歷
foreach ($options as $key => $opt) {
    //判斷選項是否有內容，有則更新，無則刪除
    if($opt!=""){
        // 去db找到update后看公式為 (table資料表,更新的資料帶到'opt'欄位,用到了where查詢欄位)
        //比方 查到opt的id是1的話,才會撈出‘大衣’ 再把'opt'的值替換成新值
        update('options',['opt'=>$opt],['id'=>$opt_id[$key]]);
    }else{
        del('options',$opt_id[$key]);
    }
}

//-- img --
//下空值判斷(因爲不下,還是有可能會抓到空值),然後$_FILES會自動去呈現 name,type..等值
if( !empty( $_FILES['img_url']['name'])){
    update('topics',['img_url'=>$_FILES['img_url']['name']],['id'=>$topic_id]);
    // 上傳完 圖檔后 '路徑image' 后直接接 檔案名 $_FILES['img_url']['name']
   move_uploaded_file($_FILES['img_url']['tmp_name'], '../image/'.$_FILES['img_url']['name']);
}

//完成問卷和選項更新，導向回後台首頁
to("../backend/index.php")

?>