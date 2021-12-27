<?php
$id=$_GET['id'];
$subject=find('topics',$id);

$options=all('options',['topic_id'=>$id]);

?>

<h1><?=$subject['topic'];?></h1>
<ol class='list-group'>
<form action="./api/save_vote.php" method="post">
<?php
foreach ($options as $key => $opt) {
    echo "<label class='list-group-item list-group-item-success list-group-item-action'>";
    echo "<input type='radio' name='opt' value='{$opt['id']}'>";
    echo $opt['opt'];
    echo "</label>";
}
?>
</ol>
<input class='btn btn-info mt-3' type="submit" value="投票">
</form>   