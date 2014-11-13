<?php include template("header");?>
<style type="text/css">
.w_filter{margin:10px auto 15px auto;width:978px; border-bottom:solid 1px #E8E8E8;background:#fff;position:relative; height:auto; padding-bottom:10px;}
.dashboard{position:relative;bottom:-2px;z-index:2;_display:inline;margin-left:10px;zoom:1;}
.dashboard ul{float:left;_display:inline;width:100%;}
.dashboard li{float:left;_display:inline;margin-right:4px;font-size:14px;}
.dashboard li a{float:left;height:27px;padding:7px 7px 0 17px;outline:0;}
.dashboard li span{float:left;width:10px;height:34px;}
.dashboard li.current a{font-weight:bold;color:#000;}
.dashboard li.current span{color:#fff;}

#recent-deals .pic{position:relative;z-index:1;float:left;width:200px;height:121px;margin:8px 0 20px;_display:inline;zoom:1;}
</style>
<div class="wrap2">


<?php if(option_yes('catepartner')){?>
<div class="w_filter">
	<div class="dashboard" id="dashboard">
		<ul><?php echo current_partner($group_id); ?></ul>
	</div>
</div>
					<div class="clear"></div>	
<?php }?>
  <div class="uleft2" id="recent-deals">
    <div class="utit">
      <h2><?php echo $pagetitle; ?></h2>
    </div>
    <div class="acon">
      <div class="sect">
					<ul class="partner-index-list">
					<?php if(is_array($partners)){foreach($partners AS $index=>$one) { ?>
						<li class="partner-li">
							<div class="pic">
								<a href="/partner.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>" target="_blank"><img alt="<?php echo $one['title']; ?>" src="<?php echo team_image($one['image'], true); ?>" width="200" height="121"></a>
							</div>
							<div class="partner-tittle">
							<h4><a href="/partner.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>" target="_blank"><?php echo mb_strimwidth($one['title'],0,86,'...'); ?></a></h4>
							<p>地址：<?php echo mb_strimwidth($one['address'],0,33,'...','UTF-8'); ?></p>
							<p>联系电话：<?php echo $one['phone']; ?></p>
							</div>
							<div class="partner-cont">
								<p>
								满意度 <strong><?php if($one['comment_num']>0){?><?php echo $one['reputation']; ?>%<?php } else { ?>--<?php }?></strong><br/>
								<?php if($one['comment_num']==0){?>
								暂无点评<br/>
								<?php } else { ?>
								点评数 <strong><?php echo $one['comment_num']; ?></strong><br/>
								<?php }?>
								<a href="/partner.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>" target="_blank">查看全部点评>></a>
								</p>
							</div>
							<div class="clear"></div>
						</li>
					<?php }}?>
					</ul>
					<div class="clear"></div>
					<div><?php echo $pagestring; ?></div>
				</div>
    </div>
  </div>
  <div class="uright2">
  <div class="credit fcomment-list-box" style=" padding-top:1px;padding-bottom:1px;" >
			<h2 style="padding-bottom:5px;">最新点评</h2>
			<ul class="lcComment" id="items">
				<?php if(is_array($now_comments)){foreach($now_comments AS $k=>$v) { ?>
				<li>
					<div class="lcName">  <span><?php echo $users[$v['user_id']]['username']; ?></span>  点评了  <a href="/partner.php?id=<?php echo $v['partner_id']; ?>"><?php echo $cpartners[$v['partner_id']]['title']; ?></a></div>
					<div class="lcCont" style="background-image:url('<?php echo WEB_ROOT; ?>/static/theme/ev56_58/css/i/comment-icon-<?php echo $v['grade']; ?>.gif');">   <a href="/partner.php?id=<?php echo $v['partner_id']; ?>"><?php echo $v['comment']; ?></a></div>
					<div class="lcTime"> 
					<?php if($v['timespan'] < 60){?>
					<?php echo $v['timespan']; ?>秒前
					<?php } else if($v['timespan'] < 3600) { ?>
					<?php echo floor($v['timespan']/60); ?>分钟前
					<?php } else if($v['timespan'] < 86400) { ?>
					<?php echo floor($v['timespan']/3600); ?>小时前
					<?php } else if($v['timespan'] < 259200) { ?>
					<?php echo floor($v['timespan']/86400); ?>天前
					<?php } else { ?>
					3天前
					<?php }?>
					</div>
				</li>	
				<?php }}?>		
			</ul>
			<div class="clear"></div>
		</div>
		    
		<!--邮件订阅-->  	
		<?php include template("block_side_subscribe");?>
  </div>
  <div class="clear"></div>
</div>
<?php include template("footer");?>
