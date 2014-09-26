<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
	<div id="deal-default">
		<div id="content">
			<div id="deal-intro" class="cf">
                <h1 style="padding-left:0;">商户：<?php echo $partner['title']; ?></h1>
                <div class="main">
					<div class="other other-top" style="margin-top:5px;">
						<p><b>地址</b>：<?php echo $partner['address']; ?></p>
						<p><b>电话</b>：<?php echo $partner['phone']; ?></p>
					<?php if($partner['homepage']){?>
						<p><b>网址</b>：<a href="<?php echo $partner['homepage']; ?>" target="_blank"><?php echo domainit($partner['homepage']); ?></a></p>
					<?php }?>
					</div>					
					<div class="other">
					<?php if($partner['guarantee'] == 'Y'){?>
					<p class="e_icon ensure"><a href="/help/guarantee.php" target="_blank" title="更低廉的价格，更优质的服务！消费保障计划全面推出！">团员消费保障</a></p>
					<?php }?>
					</div>
					<div class="partner_team_info">
						<p>组织 <b><?php echo $team_count; ?></b> 次团购</p>
						<p>购买 <b><?php echo $join_number; ?></b> 人次</p>
						<p>节省 <b><?php echo moneyit($save_number); ?></b> 元</p>
						<p id="partner-btn">
							<span class="h-comment">
								<?php if($comments_num>0){?>
								<?php echo number_format(100*$partner['comment_good']/$comments_num,2); ?>%
								<?php } else { ?>
								--%
								<?php }?>
							</span>
							<span class="partner-comment-btn">
								<a id="partner-comment-btn" href="/order/index.php?s=pay"><strong>消费点评</strong></a>
							</span>
						</p>
						<div class="partner-dianping">
							<p style="line-height:24px;">
							共 <strong><?php echo $comments_num; ?></strong> 条点评：
							</p>
							<p><img src="/static/css/i/comment-icon-A.gif" alt="" />&nbsp;<span>满意:</span><?php echo $grades['A']; ?></p>
							<p><img src="/static/css/i/comment-icon-P.gif" alt="" />&nbsp;<span>一般:</span><?php echo $grades['P']; ?></p>
							<p><img src="/static/css/i/comment-icon-F.gif" alt="" />&nbsp;<span>失望:</span><?php echo $grades['F']; ?></p>
						</div>
					</div>
				</div>
                <div class="side" style="_padding-left:5px;">
                    <div class="deal-buy-cover-img" id="team_images">
					<?php if($partner['image1']||$partner['image2']){?>
						<div class="mid">
							<ul>
								<li class="first"><img src="<?php echo team_image($partner['image']); ?>"/></li>
							<?php if($partner['image1']){?>
								<li><img src="<?php echo team_image($partner['image1']); ?>"/></li>
							<?php }?>
							<?php if($partner['image2']){?>
								<li><img src="<?php echo team_image($partner['image2']); ?>"/></li>
							<?php }?>
							</ul>
							<div id="img_list">
								<a ref="1" class="active">1</a>
							<?php $imageindex=1;; ?>
							<?php if($partner['image1']){?>
								<a ref="<?php echo ++$imageindex; ?>" ><?php echo $imageindex; ?></a>
							<?php }?>
							<?php if($partner['image2']){?>
								<a ref="<?php echo ++$imageindex; ?>" ><?php echo $imageindex; ?></a>
							<?php }?>
							</div> 
						</div>
						<?php } else { ?>
							<img src="<?php echo team_image($partner['image']); ?>" width="440" height="280" />							
						<?php }?>
					</div>
					<div class="review partner-detil">
							<p><?php echo $partner['other']; ?></p>
					</div>
                </div>
            </div>
            <input type="hidden" name="partner-availablecoupons" value="<?php echo count($coupons); ?>" />
            <input type="hidden" name="partner-id" value="<?php echo $partner['id']; ?>" />
            <div id="recent-deals" class="cf" style="margin-top:15px;">
			<div id="dashboard" class="dashboard">
				<ul>
				<li class="<?php echo $view == 'comment'?'current':''; ?>"><a class="" href="/partner.php?id=<?php echo $partner['id']; ?>&view=comment#comments" id="comments">全部点评</a><span></span></li>
				<li class="<?php echo $view == 'team'?'current':''; ?>"><a class="" href="/partner.php?id=<?php echo $partner['id']; ?>&view=team#teams" id="teams">团购项目</a><span></span></li>
				</ul>
			</div>
			<div id="partner-content" style="margin-left:0px; margin-right:0px;" page="<?php echo $focus; ?>">
				<!--团购-->
				<?php if($view=='team'){?>
				<div class="box">
					<div class="box-top"></div>
					<div class="box-content">
						<div class="sect" style="border-top:1px solid #fff">
							<ul class="deals-list">
							<?php if(empty($teams)){?>
							当前商家还未举行过团购活动
							<?php } else { ?>
							<?php if(is_array($teams)){foreach($teams AS $index=>$one) { ?>
								<li class="<?php echo $index++%2?'alt':''; ?> <?php echo $index<=2?'first':''; ?>">
									<p class="time"><?php echo date('Y年n月j日', $one['begin_time']); ?></p>
									<h4><a href="/team.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>" target="_blank"><?php echo mb_strimwidth($one['title'],0,86,'...'); ?></a></h4>
									<div class="pic">
										<div class="<?php echo $one['picclass']; ?>"></div>
										<a href="/team.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>" target="_blank"><img alt="<?php echo $one['title']; ?>" src="<?php echo team_image($one['image']); ?>" width="200" height="121" align="middle" /></a>
									</div>
									<div class="info"><p class="total"><strong class="count"><?php echo $one['now_number']; ?></strong>人购买</p><p class="price">原价：<strong class="old"><span class="money"><?php echo $currency; ?></span><?php echo moneyit($one['market_price']); ?></strong><br />折扣：<strong class="discount"><?php echo team_discount($one); ?>折</strong><br />现价：<strong><span class="money"><?php echo $currency; ?></span><?php echo moneyit($one['team_price']); ?></strong><br />节省：<strong><span class="money"><?php echo $currency; ?></span><?php echo moneyit($one['market_price']-$one['team_price']); ?></strong><br /></p></div>
								</li>
							<?php }}?>
							<?php }?>
							</ul>
							<div class="clear"></div>
							<div><?php echo $pagestring; ?></div>
						</div>
					</div>
					<div class="box-bottom"></div>
				</div>				
				<!--点评-->
				<?php } else { ?>
				<div class="box">
					<div class="box-top"></div>
					<div class="box-content">
						<div class="sect" style="border-top:1px solid #fff">
							<div id="partner-comment-box">
							<?php if(empty($comments)){?>
							还没有用户对当前商家做出点评。
							<?php } else { ?>
							<?php if(is_array($comments)){foreach($comments AS $k=>$v) { ?>												
							<div class="partner-comment-box-avatar"><a name="comment-<?php echo $v['id']; ?>"><img src="<?php echo user_image($users[$v['user_id']]['avatar']); ?>" /></a></div>
							<div class="partner-comment-box-cont">
								<ul>
									<li class="comment-name"><a><?php echo $users[$v['user_id']]['username']; ?></a></li>
									<li class="comment-text"><?php echo $v['comment']; ?></li>
									<li class="comment-misc">
										<img src="/static/css/i/comment-icon-<?php echo $v['grade']; ?>.gif" alt="" />&nbsp;
										<?php if($v['grade'] == 'A'){?>
										 满意
										<?php } else if($v['grade'] == 'P') { ?>
										一般
										<?php } else if($v['grade'] == 'F') { ?>
										失望 
										<?php }?>
										<span class="comment-time">&nbsp;[<?php echo date('Y-m-d H:i:s',$v['create_time']); ?>]
										<?php if($manger){?>
										[<a class="ajaxlink" href="/ajax/comment.php?action=recommend&id=<?php echo $v['id']; ?>">推荐</a>]
										<?php }?>
										</span>
									</li>
								</ul>
							</div>
							<?php }}?>
							<?php }?>
							</div>							
							<div class="clear"></div>
							<div><?php echo $pagestring; ?></div>
						</div>
					</div>
					<div class="box-bottom"></div>
				</div>	
				<?php }?>		
				<?php if(empty($coupons)){?>				
				<div id="partner-tip-bottom">
					点评功能目前只对参与过该商家产品团购的团员开放，谢谢您的支持！<br/>
					<?php if(!$login_user){?>
					您尚未登录，请先 <a href="/account/login.php">登录</a> 或 <a href="/account/signup.php">注册</a> 。
					<?php }?>
				</div>
				<?php }?>
            </div>
		</div>
    </div>
    <div id="sidebar">
	<?php include template("block_side_others");?>
	</div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
