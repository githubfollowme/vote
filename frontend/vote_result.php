<?php

$sql="select * 
      from `topics`,
           `options` 
      where `topics`.`id`=`options`.`topic_id` AND 
            `topics`.`id`='{$_GET['id']}'";

$rows=q($sql);
?>

<h1><?=$rows[0]['topic'];?></h1>

<ol class="list-group col-md-4" style="font-size:1.2rem">
<?php
    foreach($rows as $row){
        echo "<li class='list-group-item'>";
        echo "<span>{$row['opt']}</span>";
        echo "<span class='badge badge-info float-right'>{$row['count']}</span>";
        echo "</li>";
    }
?>
</ol>
