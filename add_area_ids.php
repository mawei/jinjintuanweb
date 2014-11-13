<?php
require_once(dirname(__FILE__) . '/app.php');
$sql = 'ALTER TABLE `team` ADD `area_ids` VARCHAR( 255 ) NOT NULL';
if(!empty($sql)){
 if(mysql_query($sql)){
    echo '恭喜你执行成功，字段已经更新！';
	echo '<a href="/index.php">返回首页</a>';
 }else{
    echo '亲，你已经执行过次文件了，请不好重复执行！';
	echo '<a href="/index.php">返回首页</a>';
 }
}