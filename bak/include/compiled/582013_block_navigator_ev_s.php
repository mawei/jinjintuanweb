<?php 
/*
------------------------------------
您做电子商务，我们为您提供基础服务！

------------------------------------
*/
$daytimenow_ev56_s = time();
/*判断预告，过期，秒杀，热销*/
$condition_ev56_s = array(
	'team_type' => 'normal',
	"begin_time <= $daytimenow_ev56_s ",
	"end_time > $daytimenow_ev56_s",
);
/*判断商圈预告，过期，秒杀，热销*/
$condition_ev56_s3 = array(
	'team_type' => 'normal',
	"begin_time <= $daytimenow_ev56_s ",
	"end_time > $daytimenow_ev56_s",
);


$city_id = abs(intval($city['id']));
/*echo $city_id; 判断城市*/
$condition_ev56_s[] = "((city_ids like '%@$city_id@%' or city_ids like '%@0@%') or city_id in(0,$city_id))";
$condition_ev56_s3[] = "((city_ids like '%@$city_id@%' or city_ids like '%@0@%') or city_id in(0,$city_id))";

$group_id = abs(intval($_GET['gid']));
/*大分类ID*/
if ($group_id){$condition_ev56_s['group_id'] = $group_id;}

function current_teamcategory_ev56($gid='0') {
    global $city;
    $city_id = $city['id'];
	$today = strtotime(date('Y-m-d'));
	$condition_ev56_s_c = array(
		'team_type' => 'normal',
		"begin_time <= '$today'",
		"end_time > '$today'",
	);
    $condition_ev56_s_c[] = "(city_ids like '%@$city_id@%' or city_ids like '%@0@%') or (city_ids = '' and city_id in(0,$city_id))";
	$categorys_ev56_s_c = DB::LimitQuery('category', array(
		'condition' => array( 'zone' => 'group','fid' => '0','display' => 'Y' ),
		'order' => 'ORDER BY sort_order DESC, id DESC',
	));
	$categorys_ev56_s_c = Utility::OptionArray($categorys_ev56_s_c, 'id', 'name');
	$a = array();
	foreach($categorys_ev56_s_c AS $id=>$name) {
	    $condition_ev56_s_c['group_id'] = $id;
	    $num= Table::Count('team', $condition_ev56_s_c);
		$a["/index.php?gid=$id"] = $name.'<span>('.$num.')</span>';
	}	
	$l = "/index.php?gid=$gid";
	if (!$gid) $l = "/index.php";
	return current_link_ev56($l, $a, true);
}
function current_link_ev56($link, $links, $span=false) {
	$html = '';
	$span = $span ? '<span></span>' : '';
	foreach($links AS $l=>$n) {
		if (trim($l,'/')==trim($link,'/')) {
			$html .= "<a href=\"$l\"  class=\"select\" >$n</a>";
		}
		else $html .= "<a href=\"$l\">$n</a>";
	}
	return $html;
}

/*小分类*/
$ev56_category_fl_texts = DB::LimitQuery('category', array(
	'condition' => array(
		'zone' => 'group',
		'display' => 'y',
		'fid<>0',
),
	'order' => 'ORDER BY sort_order DESC',
));



$ev56_category_fl_texts_2 = DB::LimitQuery('category', array(
	'condition' => array(
		'zone' => 'group',
		'display' => 'y',
		'fid' => $group_id,
),
	'order' => 'ORDER BY sort_order DESC',
));

/*商圈*/
$shangquan = DB::LimitQuery('category', array(
	'condition' => array(
		'zone' => 'area',
		'display' => 'y',
		'fid' => $city_id,
),
	'order' => 'ORDER BY sort_order DESC',
));


$fid_s = abs(intval($_GET['fid_s']));
$aid_s = abs(intval($_GET['aid_s']));


/*echo $fid_s; 判断分类ID*/
if ($group_id<>0){$condition_ev56_s['group_id'] = $group_id;}
if ($fid_s<>0){$condition_ev56_s['sub_id'] = $fid_s;}

if(!empty($_GET['type']))
{
if($_GET['show']=='all')$pagesize=100;
else
$pagesize=$index_ev56_ns;
}
if($count>$index_ev56_ns)$show=1;

if($_GET['show']=='all'){
$show=1;$p=0;
}
if($_GET['s']=="n")
{
$order='ORDER BY begin_time DESC, id DESC';
}
elseif($_GET['s']=="b")
{
$order='ORDER BY now_number DESC, id DESC';
}
elseif($_GET['s']=="jg")
{
$order='ORDER BY team_price ASC, id DESC';
}
elseif($_GET['s']=="jgd")
{
$order='ORDER BY team_price DESC, id DESC';
}
elseif($_GET['s']=="jg_50")
{
$condition_ev56_s []= "( team_price <= 50 )";
$order='ORDER BY  sort_order DESC,begin_time DESC, id DESC';
}
elseif($_GET['s']=="jg_50_100")
{
$condition_ev56_s []= "( team_price > 50 and team_price<=100 )";
$order='ORDER BY  sort_order DESC,begin_time DESC, id DESC';
}
elseif($_GET['s']=="jg_100_300")
{
$condition_ev56_s []= "( team_price > 100 and team_price<=300 )";
$order='ORDER BY  sort_order DESC,begin_time DESC, id DESC';
}
elseif($_GET['s']=="jg_300")
{
$condition_ev56_s []= "( team_price > 300 )";
$order='ORDER BY  sort_order DESC,begin_time DESC, id DESC';
}
elseif($_GET['s']=="zk")
{
$order='ORDER BY sort_order DESC, market_price - team_price ASC, id DESC';
}
elseif($_GET['s']=="zkd")
{
$order='ORDER BY  sort_order DESC, market_price - team_price DESC, id DESC';
}
elseif($_GET['fid_s'])
{
$condition_ev56_s []= "( sub_id  =  $fid_s )";
$order='ORDER BY  sort_order DESC,begin_time DESC, id DESC';
}
elseif($_GET['aid_s'])
{
 $aid_s = $_GET['aid_s'];
 $condition_ev56_s []= "(area_ids like '%@$aid_s@%')";
 $order='ORDER BY  sort_order DESC,begin_time DESC, id DESC';
}
else 
{
$order='ORDER BY  sort_order DESC,begin_time DESC, id DESC';
}
		
$p=1;
$index_ev56_size = abs(intval($INI['system']['indexteam']));
$count = Table::Count('team', $condition_ev56_s);
if($_GET[page]<2){
if($count>=$index_ev56_size){$current_count=$index_ev56_size;}
else{
 $current_count=$count;}
}
else
$current_count=$count-($_GET[page]-1)*$index_ev56_size;
list($pagesize, $offset, $pagestring) = pagestring($count, $index_ev56_size);

$teams_ev56_sql = DB::LimitQuery('team', array(
	'condition' => $condition_ev56_s,
	'order' => $order,
	'size' => $index_ev56_size,
	'offset' => $offset,
));

//print_r($teams_ev56_sql);

foreach($teams_ev56_sql AS $index => $team) {

	if($team['end_time']<$team['begin_time']){$team['end_time']=$team['begin_time'];}
	$diff_time = $left_time = $team['end_time']-$now;
	if ( $team['team_type'] == 'seconds' && $team['begin_time'] >= $now ) {
		$diff_time = $left_time = $team['begin_time']-$now;
	}

	/* progress bar size */
	$detail[$team['id']]['bar_size'] = ceil(190*($team['now_number']/$team['min_number']));
	$detail[$team['id']]['bar_offset'] = ceil(5*($team['now_number']/$team['min_number']));

	$left_day = floor($diff_time/86400);
	$left_time = $left_time % 86400;
	$left_hour = floor($left_time/3600);
	$left_time = $left_time % 3600;
	$left_minute = floor($left_time/60);
	$left_time = $left_time % 60;

	$detail[$team['id']]['diff_time'] = $diff_time;
	$detail[$team['id']]['left_day'] = $left_day;
	$detail[$team['id']]['left_hour'] = $left_hour;
	$detail[$team['id']]['left_minute'] = $left_minute;
	$detail[$team['id']]['left_time'] = $left_time;
	$detail[$team['id']]['is_today'] = $team['begin_time'] + 3600*24 > time() ? 1:0;

	/* state */
	$team['state'] = team_state($team);
	$teams_ev56_sql[$index] = $team;
}
/*
if($INI['option']['indexmultimeituan'] == 'Y'){
	if (count($teams_ev56_sql)%2 == 1) {
		$first_big = true;
		$first = array_shift($teams_ev56_sql);
	}
}
*/


if(empty($_GET[gid])) $indexs=1;
$gid=$_GET[gid]?$_GET[gid]:0;
$fid_s=$_GET[fid_s]?$_GET[fid_s]:0;
/*end 团购数据调用*/
; ?>

<?php if(option_yes('indexcateteam')){?>
<!--后台是否首页多团开启项目分类显示 5ei.cn-->
<link rel="stylesheet" href="/static/css/multi.css" type="text/css" media="screen" charset="utf-8" />
<div align="center" style="margin:3px; auto;"><?php include template("block_ad_header");?></div>
<div id="bdw" class="bdw">
<div id="filter">
					
		
				<dl class="selitem">
		<dt>大类：</dt>
		<dd row="1" id="hashideDiv">
		<span class="sql_fold">更多</span>
					<span class="all"><a <?php if(abs(intval($_GET['gid']))=='0'){?>class="selectt"<?php }?> href="/index.php?gid=0">全部</a></span>
					<?php echo current_teamcategory_ev56($group_id); ?>
				<div class="clear"></div>
	      	      		</dd>
		</dl>
		<dl class="selitem">
		<dt>小类：</dt>
		<dd row="2">
		<span class="sql_fold">更多</span>
					<span class="all"><a <?php if(abs(intval($_GET['fid_s']))=='0'){?>class="selectt"<?php }?> href="/index.php?gid=<?php echo $gid; ?>">全部</a></span>
					 <a></a>
<?php if(abs(intval($_GET['gid']))=='0'){?>

<?php if(($ev56_category_fl_texts)){?>

	<?php if(is_array($ev56_category_fl_texts)){foreach($ev56_category_fl_texts AS $one_ev56_s) { ?>
<?php 
$group_id_f = abs(intval($_GET['gid']));
if ($group_id_f) {$condition_ev56_s['group_id'] = $group_id_f;}
	$condition_ev56_s['sub_id'] = $one_ev56_s['id'];
	$ev56_num = Table::Count('team', $condition_ev56_s);
; ?>
		<a <?php if(abs(intval($_GET['fid_s']))-$one_ev56_s['id']=='0'){?>class="select"<?php }?> href="/index.php?gid=<?php echo $one_ev56_s['fid']; ?>&fid_s=<?php echo $one_ev56_s['id']; ?>" title="<?php echo $one_ev56_s['name']; ?>"><?php echo $one_ev56_s['name']; ?><span>(<?php echo $ev56_num; ?>)</span></a>
		
	<?php }}?>	
<?php }?>
				  
<?php } else { ?>

<?php if(($ev56_category_fl_texts_2)){?>					 
	<?php if(is_array($ev56_category_fl_texts_2)){foreach($ev56_category_fl_texts_2 AS $one_ev56_s_2) { ?>
<?php 
$group_id_f_2 = abs(intval($_GET['gid']));
if ($group_id_f_2) {$condition_ev56_s['group_id'] = $group_id_f_2;}
	$condition_ev56_s['sub_id'] = $one_ev56_s_2['id'];
	$ev56_num_2 = Table::Count('team', $condition_ev56_s);
; ?>

		<a <?php if(abs(intval($_GET['fid_s']))-$one_ev56_s_2['id']=='0'){?>class="select"<?php }?> href="/index.php?gid=<?php echo $one_ev56_s_2['fid']; ?>&fid_s=<?php echo $one_ev56_s_2['id']; ?>" title="<?php echo $one_ev56_s_2['name']; ?>"><?php echo $one_ev56_s_2['name']; ?></a>
		
		
		
	<?php }}?>
<?php }?>


<?php }?>     
	   			</dd>
		</dl>
		<!----<dl class="selitem" style="overflow:hidden;height:28px;">---->
                <dl class="selitem">
		<dt>商圈：</dt>
		<dd row="2">
		            <span class="sql_fold">更多</span>
					<span class="all"><a class="selectt">全部</a></span>
				<?php if(($shangquan)){?>	
				    <?php if(is_array($shangquan)){foreach($shangquan AS $one_sq) { ?>
					  <?php 
					    $group_id_f_3 = abs(intval($_GET['gid']));		
                        $one_sq_id = $one_sq['id'];						
						if ($group_id_f_3) {$condition_ev56_s3['group_id'] = $group_id_f_3;}
						
							$condition_ev56_s3 = "(area_ids like '%@$one_sq_id@%')";
							//print_r($condition_ev56_s3);
							$ev56_num_3 = Table::Count('team', $condition_ev56_s3);
						; ?>
					   <?php if($group_id){?>	
					     <a <?php if(abs(intval($_GET['aid_s']))-$one_sq['id']=='0'){?>class="select"<?php }?> title="<?php echo $one_sq['name']; ?>" href="/index.php?gid=<?php echo $group_id; ?>&aid_s=<?php echo $one_sq['id']; ?>">
					   <?php } else { ?>	
					     <a <?php if(abs(intval($_GET['aid_s']))-$one_sq['id']=='0'){?>class="select"<?php }?> title="<?php echo $one_sq['name']; ?>" href="/index.php?aid_s=<?php echo $one_sq['id']; ?>">
					   <?php }?>	
					 <?php echo $one_sq['name']; ?>
					<span><?php echo $ev56_num_3; ?></span>
                    <?php }}?>
					<a> </a>
			   <?php }?>		
		 </dd>
		</dl>
		<script>
	(function($){
	    var unfold = '收起',fold = '更多';
	    $('.selitem').each(function(){
	        var t = $(this);
	        var dd = t.find('dd');
	        var foldObj = t.find('span[class$=sql_fold]');
	        var shangquan = t.find('div[class$=shangquan]');
			var row = dd.attr('row');
	        if(dd.height() > 28*row)	
	        {
				dd.attr('class','fold'+row);
				var position = t.find('a[class$=select]').position()
				if((position && position.top>25*row) || shangquan.length > 0){
					dd.addClass('autoHeight');
					foldObj.attr('class','sql_unfold').text(unfold).show();
				}else{
					foldObj.attr('class','sql_fold').text(fold).show()
				};
	        }
	        foldObj.click(function(){
	            var tag = $(this).attr('class');
	            if(tag == 'sql_fold'){
	                dd.addClass('autoHeight');
	                foldObj.attr('class','sql_unfold').text(unfold).show();
	                }else{
	                dd.removeClass('autoHeight');
	                foldObj.attr('class','sql_fold').text(fold).show();
	            }
	            return false;
	        })
	    })
	})(jQuery);
	</script>
				
				<div class="sortbar">
			<ul class="sortor">
							<li 
                           <?php if($_GET[s]!=='b'&&$_GET[s]!=='n'&&$_GET[s]!=='jg'&&$_GET[s]!=='zk'&&$_GET[s]!=='jgd'&&$_GET[s]!=='zkd'&&$_GET[s]!=='jg_50'&&$_GET[s]!=='jg_50_100'&&$_GET[s]!=='jg_100_300'&&$_GET[s]!=='jg_300'){?>class="cur"<?php } else { ?><?php }?> ><a href="/?gid=<?php echo $gid?>">默认排序</a></li>
										<li  <?php if($_GET[s]=='jg'){?>class="cur" <?php } else { ?><?php }?> ><a href="/?gid=<?php echo $gid?>&fid_s=<?php echo $fid_s?>&s=jg">价格排序<i class="arrw"></i></a></li>
										<li  <?php if($_GET[s]=='b'){?>class="cur"  <?php } else { ?><?php }?> ><a href="/?gid=<?php echo $gid?>&fid_s=<?php echo $fid_s?>&s=b">最具人气<i class="arrw arrwdown"></i></a></li>
										<li  <?php if($_GET[s]=='zkd'){?>class="cur"  <?php } else { ?><?php }?> ><a href="/?gid=<?php echo $gid?>&fid_s=<?php echo $fid_s?>&s=zkd">折扣排序<i class="arrw arrwdown"></i></a></li>
										<li <?php if($_GET[s]=='n'){?>class="cur" <?php } else { ?><?php }?> ><a href="/?gid=<?php echo $gid?>&fid_s=<?php echo $fid_s?>&s=n">今日更新</a></li>
										<li <?php if($_GET[s]=='jg_50'){?>class="cur" <?php } else { ?><?php }?> ><a href="/?gid=<?php echo $gid?>&fid_s=<?php echo $fid_s?>&s=jg_50" title="50元以下">50元以下</a></li>
										<li <?php if($_GET[s]=='jg_50_100'){?>class="cur" <?php } else { ?><?php }?> ><a href="/?gid=<?php echo $gid?>&fid_s=<?php echo $fid_s?>&s=jg_50_100" title="50—100元">50—100元</a></li>
										<li <?php if($_GET[s]=='jg_100_300'){?>class="cur" <?php } else { ?><?php }?> ><a href="/?gid=<?php echo $gid?>&fid_s=<?php echo $fid_s?>&s=jg_100_300" title="100—300元">100—300元</a></li>
										<li <?php if($_GET[s]=='jg_300'){?>class="cur" <?php } else { ?><?php }?> ><a href="/?gid=<?php echo $gid?>&fid_s=<?php echo $fid_s?>&s=jg_300" title="300元以上">300元以上</a></li>
						</ul>
		</div>
		</div>
<?php }?> 		
