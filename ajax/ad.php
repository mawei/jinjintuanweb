<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

need_manager();

$action = strval($_GET['action']);
$id = abs(intval($_GET['id']));

$ad = Table::Fetch('adinfo', $id);
if (!$ad) json('没有这个广告', 'alert');

if('adremove' == $action) {
	$relpath = $ad['image'];
	$abspath = WWW_ROOT . '/static/' . $relpath;
	if (file_exists($abspath) && @unlink($abspath) ) {
		Table::Delete('adinfo', $id);
		Session::Set('notice', "广告{$id} 删除成功！");
		json(null, 'refresh');
	}else{
		json('删除广告失败', 'alert');
	}
}elseif('adoff' == $action){
	Table::UpdateCache('adinfo', $id, array(	'available' => array(0),));
	Session::Set('notice', "广告{$id} 关闭成功！");
	json(null, 'refresh');
}elseif('adon' == $action){
	Table::UpdateCache('adinfo', $id, array(	'available' => array(1),));
	Session::Set('notice', "广告{$id} 开启成功！");
	json(null, 'refresh');
}