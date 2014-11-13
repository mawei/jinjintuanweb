<?php include template("header");?>
<?php if($team['close_time']){?>
<div class="mtips"><span class="red">抱歉，您来晚了，该商品团购已经结束!</span>不想错过明天的团购？立刻订阅每日最新团购信息：<a target="_blank" href="/subscribe.php?ename=<?php echo $city['ename']; ?>" >我要订阅</a></div> 
<?php }?>
<?php if($order){?>
		<div class="mtips" id="nopayDiv"><span class="red">您已经下过订单，但还没有付款。（<a id="payurl" href="/order/check.php?id=<?php echo $order['id']; ?>">点击付款</a>）</span></div>
<?php }?>

	<div class="iwrap"> 
  <!-- 左侧 -->
  <div class="i_fl"> 	
    <!-- 商品主介绍 -->
    <div class="main">
      <h2><?php if($team['close_time']==0){?><span class="c2"><a class="deal-today-link" href="/team.php?id=<?php echo $team['id']; ?>">今日团购：</a></span><?php }?><?php echo $team['title']; ?></h2>
      <div class="mmain">
        <div class="lmain">
          <table class="discount" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <th>原价</th>
                <th>折扣</th>
                <th>节省</th>
              </tr>
              <tr>
                <td>&yen;<?php echo moneyit($team['market_price']); ?></td>
                <td><?php echo team_discount($team); ?>折</td>
				                <td><span class="c2">&yen;<?php echo $discount_price; ?></span></td>
              </tr>
            </tbody>
          </table>
					<?php if(($team['state']=='soldout')){?>				
					
		  				<div class="buyinfo">	
						 <p class="buynum">团购已卖光<br/>共有<span class="c2"><?php echo $team['now_number']; ?></span>人购买</p>
						 <p class="timeleft"><span class="savetime"><?php echo $diff_time; ?>000</span>本团购结束时间：<br/><span class="showTime"><?php echo date('Y-m-d', $team['close_time']); ?> <?php echo date('H:i:s', $team['close_time']); ?></span></p>
			             <p class="success s_js">团购已卖光，查看<a href="/index.php">其他团购</a></p>
													  	</div>
	          	<div class="order sold"><span>已卖光</span><em >&yen;<?php echo moneyit($team['team_price']); ?></em></div>
					<?php } else if($team['close_time']) { ?>				
					
		  				  <div class="buyinfo">	
											 <p class="buynum">团购已结束<br/>共有<span class="c2"><?php echo $team['now_number']; ?></span>人购买</p>
						 <p class="timeleft"><span class="savetime"><?php echo $diff_time; ?>000</span>本团购结束于：<br/><span class="showTime"><?php echo date('Y-m-d', $team['close_time']); ?> <?php echo date('H:i:s', $team['close_time']); ?></span></p>
			             <p class="success s_js">团购已结束，查看<a href="/index.php">其他团购</a></p>
													  	</div>
	          	<div class="order end"><span>已结束</span><em >&yen;<?php echo moneyit($team['team_price']); ?></em></div>
					<?php } else { ?>
				
		  				<div class="buyinfo">
			            <p class="buynum"><span class="c2"><?php echo $team['now_number']; ?></span>人已购买<br/>数量有限，下单要快哟</p>
							<script>
      	//var nowDate = <?php echo $now; ?>000;
      	//var endDate = new Date(Date.parse("<?php echo date('Y-m-d H:i:s', $team['end_time']); ?>".replace(/-/g,"/")));
		//var remainTime = endDate.getTime()-nowDate;
		var remainTime = <?php echo $diff_time; ?>000;
		window.setInterval(function(){
			remainTime=remainTime-1000;
			var leftsecond = parseInt(remainTime/1000);	
			var day1=Math.floor(leftsecond/(60*60*24)); 
			var hour=Math.floor((leftsecond-day1*24*60*60)/3600); 
			var minute=Math.floor((leftsecond-day1*24*60*60-hour*3600)/60); 
			var second=Math.floor(leftsecond-day1*24*60*60-hour*3600-minute*60); 		
			if(day1 > 0){ 
				$("#deal-timeleft").html("<i>"+day1+"</i>天<i>"+hour+"</i>小时<i>"+minute+"</i>分<i>"+second+"</i>秒");	
			}
			else{
				if(hour == 0 && minute == 0 && second ==0){
				    $.ajax({			    	
						  type: "GET",
						  url: "/cache/all",
						  async:false,
						  success:function(){
						  	setTimeout('window.location.href="/team"',1000);
						  }
				    });
				}
				else{
					$("#deal-timeleft").html("<i>"+hour+"</i>小时<i>"+minute+"</i>分<i>"+second+"</i>秒");
				}	
			}	
		}, 1000);
</script>
			            <p class="timeleft"><span id="savetime" class="savetime"><?php echo $diff_time; ?>000</span> 距离本次团购结束还有：<br/><span id="deal-timeleft" class="showTime"><i>加载中...</i></span> </p>
						<p class="success">团购已成功，可继续购买</p>
											  </div>
					  <div class="order <?php echo $team['begin_time']<time()?'buy':'wait'; ?>">
						<a <?php echo $team['begin_time']<time()?'href="/team/buy.php?id='.$team['id'].'"':''; ?>>抢购</a>
						<em >&yen;<?php echo moneyit($team['team_price']); ?></em>
					</div>
					
					<?php }?> 
					
					
					
			    		           </div>
		<div class="rmain"> 
					<img src="<?php echo team_image($team['image']); ?>"  width="440" height="275" alt="<?php echo $team['title']; ?>" />
				<div class="buytips"><div class="quote">
	<span><?php if(strip_tags($team['summary'])!=$team['summary']){?><?php echo $team['summary']; ?><?php } else { ?><div class="digest"><?php echo nl2br(strip_tags($team['summary'])); ?></div><?php }?></span></div>
</div>
		</div>
        <div class="clear"></div>
      </div>
      <span class="yj lt"></span><span class="yj rt"></span><span class="yj lb"></span><span class="yj rb"></span>
	  <?php include template("block_team_share");?>
    </div>
    <!-- 商品主介绍 end --> 
    <!-- 商品详情 -->
	<script>
	$(function(){
		$("li.tab_btn").click(function(){
			//alert($(".tab_btn").index($(this)));
			$("div.tab_box").each(function(){
				$(this).hide()
			})
			$("li.tab_btn").each(function(){
				$(this).removeClass("cur");
			})
			$("div.tab_box").eq($("li.tab_btn").index($(this))).show();
			$(this).addClass("cur");
			})
		})
	</script>
    <div class="xq">
      <ul class="xqlist c3">
        <li class="tab_btn cur"><a>商品详情</a></li>
        <li class="tab_btn"><a>商家信息</a></li>
      </ul>
      <div class="details wide">

<style type="text/css">
/*用纯CSS控制图片最大宽度 ev56.com*/
#ev56_main_side .blk_ev56 img{width: expression(this.width > 670 ? 670: true); max-width: 670px;}
</style>		
<div id="ev56_main_side" class="tab_box">
	
						<?php if(trim($team['detail'])){?>
                            <!--<h2 id="detail">本单详情</h2>-->
							<div class="blk_ev56 detail"><?php echo $team['detail']; ?></div>
						<?php }?>

						<?php if(trim($team['notice'])){?>
							<h2 id="detailit">特别提示</h2>
							<div class="blk_ev56 cf"><?php echo $team['notice']; ?></div>
						<?php }?>
						<?php if(trim(strip_tags($team['userreview']))){?>
							<h3 class="quote_tit1">大家说</h3>
							<div class="quote_s">
							<span style="font-size: 14px"><div class="blk_ev56 review"><?php echo userreview($team['userreview']); ?></div></span></div>
							<p style="font-weight: bold; color: #4f69e9; text-align: right">
							<span style="font-size: 14px">网友点评</span></p> 
						<?php }?>
						<?php if(trim(strip_tags($team['systemreview']))){?>							
							<div class="quote_tit2_div">
								<ul class="sharecon">
								  <li>分享到 ：</li>
									<li><a class="i_sina" href="<?php echo share_sina($team); ?>" target="_blank">新浪</a></li>
									<li><a class="i_qq"  href="<?php echo share_tencent($team); ?>" target="_blank">腾讯</a></li>
								</ul>
								<h3 class="quote_tit2"><?php echo $INI['system']['abbreviation']; ?>说</h3>
							</div>
							<span id="syscomment">
							<div class="blk_ev56 review"><?php echo $team['systemreview']; ?></div>
							</span>
						<?php }?>
			
					<?php if(($team['state']!='soldout') && !$team['close_time'] ){?>					<div class="deal-buy-bottom" style="clear: both;text-align:center; padding:30px;">
						<a class="pngfix" href="/team/buy.php?id=<?php echo $team['id']; ?>" rel="nofollow" >抢购</a>
					</div>
					<?php }?>											
</div>

<div class="tab_box" style="display:none;">
					<div class="side" id="team_partner_side_<?php echo (!option_yes('teamwhole')&&abs(intval($partner['id'])))?1:0; ?>">
                            <div id="side-business">	
								<h3><?php echo $partner['title']; ?></h3>
								<div style="margin-top:10px;"><?php echo $partner['location']; ?></div>
								<div style="margin-top:10px;"><a href="<?php echo $partner['homepage']; ?>" target="_blank"><?php echo domainit($partner['homepage']); ?></a></div>
								<?php include template("block_block_partnermap");?>	
							</div>
						</div>					
</div>
			
		 
      </div>
      <div class="clear"></div>
	  <span class="fx flt"></span><span class="fx frt"></span>
    </div>
    <!-- 商品详情 end --> 
  </div>
  <!-- 左侧 end --> 
  <div class="i_fr">
		<!--每日签到-->
		<?php include template("block_side_daysign");?>
		<!--产品视频-->
		<?php include template("block_side_flv");?>   
		<!--今日其他团购-->
		<?php include template("block_side_others");?>
		<!--今日秒杀--> 
		<?php include template("block_side_others_seconds");?> 
		<!--本单答疑--> 
		<?php include template("block_side_ask");?>
		<!--网站公告-->
		<?php include template("block_side_bulletin");?>   
		<!--网站新闻--> 
		<?php include template("block_side_news");?>
		<!--手机访问-->
		<?php include template("block_side_mobile");?>  
		<!--小调查-->
		<?php include template("block_side_vote");?>    
		<!--邀请有奖、加入我们-->  	
		<?php include template("block_side_ev56_job");?>
  </div>
  <div class="clear"></div>
</div>


<?php include template("footer");?>
