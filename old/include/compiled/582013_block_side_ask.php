<?php 
	$ask_con = array('length(comment)>0');
	if(option_yes('teamask')) { $ask_con[] = 'team_id > 0'; } 
	else { $ask_con['team_id'] = $id; }
	$ask_count = Table::Count('ask', $ask_con);
	$asks = DB::LimitQuery('ask', array('condition'=>$ask_con, 'size'=>3, 'order'=>'ORDER BY id DESC'));
; ?>
<style type="text/css">
<!--
.STYLE1 {
	color: #990000;
	font-weight: bold;
}
-->
</style>


<div class="rbox b15" id="questions">
   <h3><a class="tousu" href="/feedback/suggest.php" title="我要投诉建议">投诉建议</a>答疑转让 </h3>
  <ul class="wzlist c3">
    <li class="dytit"><a href="/team/ask.php?id=<?php echo $team['id']; ?>">查看全部(<?php echo $ask_count; ?>)</a><a href="/team/ask.php?id=<?php echo $team['id']; ?>#post" class="ico guest">我要提问</a><a href="/team/transfer.php?id=<?php echo $team['id']; ?>" class="ico guest">求购转让</a></li>
			<?php if(is_array($asks)){foreach($asks AS $one) { ?>
            <li><a href="/team/ask.php?id=<?php echo $team['id']; ?>#ask-entry-<?php echo $one['id']; ?>" title="<?php echo $one['content']; ?>"><?php echo htmlspecialchars(mb_substr($one['content'],0,30,'UTF-8')); ?>...</a></li>
			<?php }}?>
              </ul>
			<div class="custom-service">
				<p class="im">
<?php 
	$msns = preg_split('/[,\s]+/',$INI['system']['kefumsn'],-1,PREG_SPLIT_NO_EMPTY);
	$qqs = preg_split('/[,\s]+/',$INI['system']['kefuqq'],-1,PREG_SPLIT_NO_EMPTY);
; ?>
				<?php if(is_array($msns)){foreach($msns AS $msnone) { ?>
				<?php if(trim($msnone)){?>

                <a target="_blank" href="http://amos.alicdn.com/getcid.aw?v=2&uid=<?php echo $msnone; ?>&site=cntaobao&s=1&groupid=0&charset=utf-8"><img border="0" src="http://amos.alicdn.com/online.aw?v=2&uid=<?php echo $msnone; ?>&site=cntaobao&s=1&charset=utf-8" alt="点击这里给我发消息" /></a>
                
									<?php }?>
				<?php }}?>
				<?php if(is_array($qqs)){foreach($qqs AS $qqone) { ?>
				<?php if(preg_match('/http/i', $qqone)){?>
					<?php echo $qqone; ?>
				<?php } else { ?>
					<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qqone; ?>&site=<?php echo $INI['system']['sitename']; ?>&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $qqone; ?>:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
				<?php }?>



				<?php }}?>
				</p>
			</div>
  <p class="sphone"><b>客服电话：</b>  <span class="STYLE1">400-800-5823</span>  <br />
  <b>工作时间：</b> 9:00-21:00 (每天) </p>
</div>