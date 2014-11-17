<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('team');

$now = time();
$condition = array(
	'system' => 'Y',
	"end_time >{$now}",
	'close_time'=>'0',
);

/* filter start */
$team_type = strval($_GET['team_type']);
if ($team_type) { $condition['team_type'] = $team_type; }
$team_id = abs(intval($_GET['team_id']));
if ($team_id) {
	$condition['id'] = $team_id;
} else { $team_id = null; }
$team_key = strval($_GET['team_key']);
if ($team_key ) {
	$condition[] = "title LIKE '%".mysql_escape_string($team_key)."%'";
}
$start_time = isset($_GET['start_time'])?$_GET['start_time']:'';
if(!empty($start_time)){
$start_time[1]?$condition []= "begin_time >=".strtotime($start_time[1]):'';
$start_time[2]?$condition []= "begin_time <=".strtotime($start_time[2]):'';
}
$end_time = isset($_GET['end_time'])?$_GET['end_time']:'';
if(!empty($end_time)){
$end_time[1]?$condition []= "end_time >=".strtotime($end_time[1]):'';
$end_time[2]?$condition []= "end_time <=".strtotime($end_time[2]):'';
}
$state=abs(intval($_GET['state']));
if($state=='1'){
	$condition []= "begin_time >".time();
}elseif($state=='2'){
	$condition []= "`task_state`='0' or `task_i_num`='0' or `task_i_time`='0' or (`max_number`>0 and (`now_number`+`task_i_num`>`max_number`))";
}elseif($state=='3'){
	$condition []= "`task_state`='1' and `task_i_num`>'0' and `task_i_time`>'0' and (`max_number`=0 or (`max_number`>0 and (`now_number`+`task_i_num`<=`max_number`)))";
}
/* filter end */

if(is_post()&&!empty($_POST['checkboxes'])){
	$_POST['cbday']?$cbday=strtotime($_POST['cbday']):'';
	$_POST['ceday']?$ceday=strtotime($_POST['ceday']):'';
	$task_i_num= abs(intval($_POST['task_i_num']));
	$task_state=strval($_POST['task_state']);
	$task_i_time=abs($_POST['task_i_hour'])*3600+abs($_POST['task_i_min'])*60+abs($_POST['task_i_sec']);
	if(!$task_i_num&&!$task_i_time&&!in_array($task_state,array('0','1'))) redirect(null);
		
	if($task_i_time){
		$update['task_i_time']=$task_i_time;
		$update['task_next_time']=time()+$update['task_i_time'];
	}else{
		$update['task_next_time']=time()+$team['task_i_time'];
	}
	$task_i_num?$update['task_i_num']=$task_i_num:'';
	($task_state=='0'||$task_state=='1')?$update['task_state']=$task_state:'';
	
	if(abs(intval($_POST['is_all']))){
		$flag=Table::UpdateCache('team',$condition,$update);
	}else{
		$flag=Table::UpdateCache('team',array('id'=>$_POST['checkboxes']), $update);
	}
	
	$flag?Session::Set('notice', '批量操作成功'):Session::Set('erro', '批量操作失败');
	redirect(null);
}

$count = Table::Count('team', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$teams = DB::LimitQuery('team', array(
	'condition' => $condition,
	'order' => 'ORDER BY task_state DESC,sort_order DESC,id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

$selector = 'increase';
include template('manage_team_increase');
