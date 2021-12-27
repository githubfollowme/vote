<div class="bg-secondary p-2 text-white bg-opacity-75">
<h3>列出所有的問題 
    <a  class="btn btn-primary rounded btn-sm" href="?do=add_subject_form">
        新增問卷
    </a>
</h3>
</div>
<?php
// 用all函數把topics 賦予到subjects
$subjects=all('topics');
echo "<ol class='list-group'>";
// 然後 foreach撈出每筆 從 subject轉成value
foreach ($subjects as $key => $value) {
    
    echo "<li class='list-group-item'>";
    //題目
    echo "<a class='d-inline-block col-md-8' href='index.php?do=vote&id={$value['id']}'>";
    echo '<img src="../image/'.$value['img_url'].'" style="width:100px;" alt="">';
    echo $value['topic'];
    echo "</a>";
    //總投票數顯示

    $count=q("select sum(`count`) as '總計' from `options` where `topic_id`='{$value['id']}'");
    echo "<span class='d-inline-block col-md-1 text-center'>";
    echo $count[0]['總計'];
    echo "</span>";
    
    //管理題目

    
    echo "<a href='?do=edit_subject&id={$value['id']}' class='d-inline-block col-md-1 text-center'>";
    echo "<button class='btn btn-info'>管理</button>";
    echo "</a>";
    
    //看結果按鈕
    echo "<a href='../index.php?do=vote_result&id={$value['id']}' class='d-inline-block col-md-1 text-center'>";
    echo "<button class='btn btn-primary'>觀看結果</button>";
    echo "</a>";
// 原本是導到result '刪除'動作后  直接導到 manage_vote頁面
    echo "<a href='../api/del_vote.php?do=manage_vote&id={$value['id']}' class='d-inline-block col-md-1 text-center'>";
    echo "<button class='btn btn-danger'>X</button>";
    echo "</a>";

    echo "</li>";

}
echo "</ol>";

?>
