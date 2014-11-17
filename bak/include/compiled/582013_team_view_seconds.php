<?php include template("header");?>
<?php if($team['close_time']){?>
<div class="mtips"><span class="red">抱歉，您来晚了，该商品秒杀已经结束!</span>不想错过明天的秒杀？立刻订阅每日最新团购信息：<a target="_blank" href="/subscribe.php?ename=<?php echo $city['ename']; ?>" >我要订阅</a></div> 
<?php }?>
<?php if($order){?>
		<div class="mtips" id="nopayDiv"><span class="red">您已经下过订单，但还没有付款。（<a id="payurl" href="/order/check.php?id=<?php echo $order['id']; ?>">点击付款</a>）</span></div>
<?php }?>

<DIV id=main> 
<DIV class=order_top>
<div class="detail_icon">本团品由<?php echo $partner['title']; ?>提供</div>
<!-- 短标题 -->
<H1><SPAN 
style="font-size:28px" id=titleprefix>
<?php if(strip_tags($team['summary'])!=$team['summary']){?><?php echo $team['summary']; ?><?php } else { ?><div class="digest"><?php echo $team['title']; ?></div><?php }?></SPAN><SPAN><SPAN 
id=shortname></SPAN></SPAN> <SPAN style="DISPLAY: none" 
id=gbtitle></SPAN> </H1>
<!-- 简短描述 -->
<P class=des><SPAN style="DISPLAY: block" 
id=productname><?php echo nl2br(strip_tags($team['summary'])); ?></SPAN> 
</P>
<DIV class=order_wrap>
<DIV class=order_tic><!-- 抢购按钮 -->
<DIV id=top_qg_but_div class="buy_btn b_buy"><a <?php echo $team['begin_time']<time()?'href="/team/buy.php?id='.$team['id'].'"':''; ?>>抢购</a><SPAN 
id=top_qg_price class=value><I>¥</I><?php echo moneyit($team['team_price']); ?></SPAN> </DIV>
<DIV class=ordersum><!-- 价格列表 -->
<TABLE class=aboutP border=0 cellSpacing=0 cellPadding=0 width="100%">
  <TBODY>
  <TR id=pricelist0>
    <TD>原价<BR><I>&yen;<?php echo moneyit($team['market_price']); ?></I></TD>
    <TD>节省<BR><I>&yen;<?php echo $discount_price; ?></I></TD>
    <TD>折扣<BR><I><?php echo team_discount($team); ?>折</I></TD></TR></TBODY></TABLE>
    <DIV class=line></DIV>
    
    
    
    <?php if(($team['state']=='soldout')){?>				
					
		  				<div class="buyinfo">	
						 <p class="buynum">团购已卖光<br/>共有<span class="c2"><?php echo $team['now_number']; ?></span>人购买</p>
						 <p class="timeleft"><span class="savetime"><?php echo $diff_time; ?>000</span>本团购结束时间：<br/><span class="showTime"><?php echo date('Y-m-d', $team['close_time']); ?> <?php echo date('H:i:s', $team['close_time']); ?></span></p>
			             <p class="success s_js">团购已卖光，查看<a href="/index.php">其他团购</a></p>
													  	</div>
	          	<div class="order sold"><span>已卖光</span><em >&yen;<?php echo moneyit($team['team_price']); ?></em></div>
					<?php } else if($team['close_time']) { ?>				
					
		  				  <div class="buyinfo">	
											 <p class="buynum">本次秒杀已结束<br/>共有<span class="c2"><?php echo $team['now_number']; ?></span>人购买</p>
						 <p class="timeleft"><span class="savetime"><?php echo $diff_time; ?>000</span>本次秒杀结束于：<br/><span class="showTime"><?php echo date('Y-m-d', $team['close_time']); ?> <?php echo date('H:i:s', $team['close_time']); ?></span></p>
			             <p class="success s_js">秒杀已结束，查看<a href="/index.php">其他团购</a></p>
													  	</div>
	          	<div class="order end"><span>已结束</span><em >&yen;<?php echo moneyit($team['team_price']); ?></em></div>
					<?php } else { ?>
				
		  				<div class="buyinfo">
			            <p class="buynum"><span class="c2"><?php echo $team['now_number']; ?></span>人已购买<br/>数量有限，下单要快哟</p><DIV class=line></DIV>
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


			            <p class="timeleft"><span id="savetime" class="savetime"><?php echo $diff_time; ?>000</span> 距离本次团购结束还有：<br/><span id="deal-timeleft" class="showTime"><i>加载中...</i></span><DIV class=line></DIV> <UL class=baozhang>
  <LI class=tui_wfh><A href="/help/zuitu.php" 
  target=_blank>48小时未发货退款</A></LI></UL><!-- 保障图标 --></p>
					
											  </div>
					  <div class="order <?php echo $team['begin_time']<time()?'buy':'wait'; ?>">
						<a <?php echo $team['begin_time']<time()?'href="/team/buy.php?id='.$team['id'].'"':''; ?>>抢购</a>
						<em >&yen;<?php echo moneyit($team['team_price']); ?></em>
					</div>
					
					<?php }?> 
					
                    
    
    
 



<!----<?php echo $team['id']; ?>---->

<DIV style="LINE-HEIGHT: 13px; BOTTOM: 20px; LEFT: 58px" class=share>

<!-- Baidu Button BEGIN -->
<DIV id=bdshare class="bdshare_t bds_tools get-codes-bdshare" 
data="{'text':'<?php echo $team['title']; ?>（To： @<?php echo $INI['system']['sitename']; ?>）','pic':'<?php echo team_image($team['image']); ?>','url':'<?php echo $INI['system']['wwwprefix']; ?>/team.php?id=<?php echo $team['id']; ?>'}"><A 
class=bds_qzone></A><A class=bds_tsina></A><A class=bds_tqq></A><A 
class=bds_renren></A><SPAN class=bds_more>更多</SPAN> </DIV></DIV>
<SCRIPT id=bdshare_js type=text/javascript 
data="type=tools&amp;uid=651783"></SCRIPT>

<SCRIPT id=bdshell_js type=text/javascript></SCRIPT>

<SCRIPT type=text/javascript>
						    //在这里定义bds_config
						    var bds_config = {'snsKey':{'tsina':'3479120830','qzone':'10000011'}};
							document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?t=" + new Date().getHours();
						</SCRIPT>
<!-- Baidu Button END --></DIV></DIV>



<!-- 轮转图片 -->
<DIV id=order_pic class=order_pic>
<div class="deal-buy-cover-img" id="team_images">
					<?php if($team['image1']||$team['image2']){?>
						<div class="mid">
							<ul>
								<li ><img src="<?php echo team_image($team['image']); ?>"/></li>
							<?php if($team['image1']){?>
								<li><img src="<?php echo team_image($team['image1']); ?>" /></li>
							<?php }?>
							<?php if($team['image2']){?>
								<li><img src="<?php echo team_image($team['image2']); ?>" /></li>
							<?php }?>
							</ul>
							<div id="img_list">
								<a ref="1" class="active">1</a>
							<?php $imageindex=1;; ?>
							<?php if($team['image1']){?>
								<a ref="<?php echo ++$imageindex; ?>" ><?php echo $imageindex; ?></a>
							<?php }?>
							<?php if($team['image2']){?>
								<a ref="<?php echo ++$imageindex; ?>" ><?php echo $imageindex; ?></a>
							<?php }?>
							</div> 
						</div>
						<?php } else { ?>
							<img src=" <?php echo team_image($team['image']); ?>" alt="<?php echo $team['title']; ?>" />
						<?php }?>
					</div>
  
  </DIV>  </DIV>
</DIV>
   <!-- 团购大图和标题  -->
<div class="tj_column">
    <b>该商家其他团购</b>
    <ul>                             
<?php 
   
    $row_par = DB::GetTableRow('team', array(id => $id,));
    $par_id = $row_par['partner_id'];
	
	$other_list = array();
    $other_row = DB::LimitQuery('team', array(
	'condition' => array(
		'partner_id' => $par_id,
      ),
	  'order' => 'ORDER BY id DESC',
    ));
	
	foreach($other_row as $val){
	   if($val['id'] != $id){
	     $other_list[$val['id']]['id'] = $val['id'];
		 $other_list[$val['id']]['title'] = $val['title'];
		 $other_list[$val['id']]['team_price'] = $val['team_price'];
		 $other_list[$val['id']]['market_price'] = $val['market_price'];
		 $other_list[$val['id']]['image'] = $val['image'];
		 $other_list[$val['id']]['url'] = 'team.php?id='.$val['id'];
	   }
	}
	
	if($other_list){
	foreach($other_list as $val){
	  echo '<li style="display: block " class=""><a href="/'.$val['url'].'" target="_blank"><strong>¥'.$val['team_price'].'</strong><em>¥'.$val['market_price'].'</em><span>
                                                '.$val['title'].'</span>
            <label>去看看&gt;&gt; </label>
        </a></li>';
	  }
	}else{
	  echo '暂时只有次团购！';
	}
   ; ?>
                    </ul>
</div>


<!-- //团购大图和标题-->
  <!-- 左侧 --><div class="iwrap"> 
 
  <div class="i_fl">


   <!--该商家其他团购

      <style type="text/css">
	      .fl{ float:left;}
		  .fr{ float:right;}
          .other_tuan{ overflow:hidden; margin-top:10px; border:#cccccc solid 1px; padding:10px;}
		  .other_tuan ul{ margin-top:10px;}
		  .other_tuan ul li{height:65px; padding:10px 5px; border-top:#ccc dashed 1px;}
		  .other_tuan ul li .other_img{width:100px; height:63px;}
		  .other_tuan ul li .other_txt{width:495px; overflow:hidden;height:63px; padding-left:10px; line-height:23px;}
		  .other_tuan ul li .other_btn{width:85px; height:43px; padding-top:20px;}
      </style>
     <div class="other_tuan">

         <h3 style="line-height:22px;">该商家其他团购</h3>
       <ul>
		 
		    <?php 
   
    $row_par = DB::GetTableRow('team', array(id => $id,));
    $par_id = $row_par['partner_id'];
	
	$other_list = array();
    $other_row = DB::LimitQuery('team', array(
	'condition' => array(
		'partner_id' => $par_id,
      ),
	  'order' => 'ORDER BY id DESC',
    ));
	
	foreach($other_row as $val){
	   if($val['id'] != $id){
	     $other_list[$val['id']]['id'] = $val['id'];
		 $other_list[$val['id']]['title'] = $val['title'];
		 $other_list[$val['id']]['team_price'] = $val['team_price'];
		 $other_list[$val['id']]['market_price'] = $val['market_price'];
		 $other_list[$val['id']]['image'] = $val['image'];
		 $other_list[$val['id']]['url'] = 'team.php?id='.$val['id'];
	   }
	}
	
	if($other_list){
	foreach($other_list as $val){
	  echo ' <li>
                 <div class="other_img fl">
                  <a href="/'.$val['url'].'" target="_blank">
                   <img src="'.team_image($val['image'], true).'" width="100" height="63" />
                  </a>
                  </div>
                 <div class="other_txt fl">
                     <p style="color:#336699;">
                      <a href="/'.$val['url'].'" target="_blank">'.$val['title'].'</a>
                     </p>
                     <p>团购价:<span style="color:#ff0000; font-weight:bold">¥'.$val['team_price'].'</span> 元</p>  <p><span style="color:#808080;">市场价:¥'.$val['market_price'].' 元</span></p>
                 </div>
                 <div class="other_btn fl"><a href="'.$val['url'].'"><img src="/include/template/other_btn.png.gif" /></a></div>
                 <div style="clear:both;"></div>
             </li>';
	  }
	}else{
	  echo '暂时只有次团购！';
	}
   ; ?>
            
            
         </ul>
     </div>  该商家其他团购--->
  
    <!-- 本单详情 -->
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
    <div style="position: static; top: 0px;" id="inner">  
      <ul class="xqlist c3" style="width:728px;">
         <li class="tab_btn"><a href="#desc">本单详情</a></li>
         <li class="tab_btn"><a href="#desc">腾讯微博</a></li>
		 <li class="tab_btn"><a href="#desc">用户点评</a></li>
         <li style="width:140px; float:right">
          <font style="font-size:16px; display:block;font-weight:bold; color:#F00; float:left"> ¥ <?php echo moneyit($team['team_price']); ?> </font> 
          <a style="display:block;width:88px; float:right; margin-top:3px;" <?php echo $team['begin_time']<time()?'href="/team/buy.php?id='.$team['id'].'"':''; ?>>
          <img src="/include/template/582013/btn_buy.jpg" />
          </a>
          </li>
      </ul>
      <di</div>
   </div> 
   <a name="desc"></a>
      <div class="details wide">
      
<style type="text/css">
/*用纯CSS控制图片最大宽度 ev56.com*/
#ev56_main_side .blk_ev56 img{width: expression(this.width > 770 ? 770: true); max-width: 770px;}
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
			
					<?php if(($team['state']!='soldout') && !$team['close_time'] ){?>										<!---<div class="deal-buy-bottom" style="clear: both;text-align:center; padding:30px;">
						<a class="pngfix" href="/team/buy.php?id=<?php echo $team['id']; ?>" rel="nofollow" >抢购</a>
					</div>--->
<div class="reviews">

					<!-- 底部抢购按钮 -->
					<div class="bottom_qg">
						<div id="bottom_qg_pricelist">
													<label>原价<br><b>&yen;<?php echo moneyit($team['market_price']); ?></b> </label>
                        <label>节省<br><b>&yen;<?php echo $discount_price; ?></b> </label>
                        <label>折扣<br><b><?php echo team_discount($team); ?>折</b> </label>
                        						</div>

						<div class="bottom_qg1">
                        <span id="bottom_qg_price"><i>&yen;</i><?php echo moneyit($team['team_price']); ?></span>
								<!-- 抢购按钮 -->
<!---<a id="bottom_qg_but" href="/order/buy/wx/75945381205509009?b=y" class="b_qg1" name="det_buy" onclick="buyBtnClick();">抢购</a>--->
<a <?php echo $team['begin_time']<time()?'href="/team/buy.php?id='.$team['id'].'"':''; ?> class="b_qg1">抢购</a>				
<!---<a <?php echo $team['begin_time']<time()?'href="/team/buy.php?id='.$team['id'].'"':''; ?>>抢购</a>--->
                        														</div>
					</div>
				</div>

					<?php }?>											
</div>
<!---腾讯微博STR--->
<div class="tab_box" style="display:none;"> 
		<iframe frameborder="0" scrolling="no" src="http://show.v.t.qq.com/index.php?c=show&a=index&n=jstelecom&w=0&h=677&fl=3&l=30&o=31&co=0" width="100%" height="677"></iframe>				
</div>
<!---腾讯微博END-->	
<!--卖家点评STR-->	

<div class="tab_box" style="display:none;">
<?php 
/*买家点评列表*/
$com_list = array();
$comm_list = array();
$comment_list = DB::LimitQuery('order', array(
	'condition' => array(
		'team_id' => $id,
),
	'order' => 'ORDER BY id DESC',
));

function get_com_user($id){
   $res = DB::LimitQuery('user',array(
     'condition'=>array(
	     'id'=>$id,
		 ),'one'=>true));
		 return $res;
}


foreach($comment_list as $val){
   if($val['comment_grade'] == 'good'){
       $comm_list[$val['id']]['id'] = $val['id'];
       $comm_list[$val['id']]['comment_content'] = $val['comment_content'];
	   $res = get_com_user($val['user_id']);
	   $comm_list[$val['id']]['username'] =  '**'.substr($res['username'],3);
	}
}



foreach($comment_list as $val){
   $com_list[$val['comment_grade']][] = $val['comment_grade'];
}
$good = count($com_list['good']);
$in = count($com_list['none']);
$poor = count($com_list['bad']);

$totle = $good + $in + $poor;

if($totle == '0'){
   $totle = '1';
   $good = '1';
}
$b_good = round(($good/$totle)*100);
$b_in = round(($in/$totle)*100);
$b_poor = round(($poor/$totle)*100);
$fh = '%';
if(($b_good + $b_in + $b_poor) > 100){
    $b_poor = ($b_poor + 100 - ($b_good + $b_in + $b_poor));
}

; ?>
<style type="text/css">

.com_one{height:160px;width:670px; overflow:hidden}
.com_two{height:155px;width:328px; border:#e4e4e4 solid 1px; float:left;}
.com_title{color:#676767; line-height:25px; height:25px; background:#f3f3f3; text-indent:25px;}
.com_three{width:245px;height:130px;float:left;border-right:#e4e4e4 solid 1px;}
.com_four{width:80px;height:130px;float:left; line-height:130px; text-align:center; color:#dc1a03;}
.com_one2{height:155px;width:328px; border:#e4e4e4 solid 1px; float:right}
.com_three span{ display:block; float:left; padding:0 5px;}
.com_three .com_line{width:130px; border:#d7d7d9 solid 1px; width:130px; height:9px; background:#ecebe9; margin-top:6px; padding:0px;}
.com_line .com_line2{height:9px; background:#f88d01;}
.com_thre li{height:20px;width:240px; line-height:20px;}

.comment_list{ overflow:hidden; font-size:12px; padding-top:25px;}
.comment_list ul li{height:50px; border-bottom:#dedede dashed 1px; line-height:20px; padding-top:10px;}
.comment_list .com_txt1{ font-weight:bold;}
.comment_list .com_txt2{color:#666666; text-indent:35px;}
</style>
<div class="com_one">
    <div class="com_two">
         <div class="com_title">商品与网站描述是否相符</div>
         <div>
               <div class="com_three">
                     <ul style="padding-top:6px;">
                          <li>
                               <span>5分</span>
                               <span class="com_line"><div class="com_line2" style="width:<?php echo $b_good*(1.3); ?>px;"></div></span>
                               <span><?php echo $b_good.$fh; ?></span>
                          </li>
                           <div style="clear:both"></div>
                         <li>
                               <span>4分</span>
                               <span class="com_line"><div class="com_line2" style="width:<?php echo $b_in*(1.3); ?>px;"></div></span>
                               <span><?php echo $b_in.$fh; ?></span>
                          </li>
                           <div style="clear:both"></div>
                         <li>
                               <span>3分</span>
                               <span class="com_line"><div class="com_line2" style="width:<?php echo $b_poor*(1.3); ?>px;"></div></span>
                               <span><?php echo $b_poor.$fh; ?></span>
                          </li>
                           <div style="clear:both"></div>
                         <li>
                               <span>2分</span>
                               <span class="com_line"><div class="com_line2" style="width:0px;"></div></span>
                               <span>0%</span>
                          </li>
                           <div style="clear:both"></div>
                        <li>
                               <span>1分</span>
                               <span class="com_line"><div class="com_line2" style="width:0px;"></div></span>
                               <span>0%</span>
                          </li>
                           <div style="clear:both"></div>
                     </ul>
               </div>
               <div class="com_four">4.9</div>
         </div>
    </div>
    <div class="com_one2" >
          <div class="com_title">发货快递配送是否满意</div>
		  <div>
               <div class="com_three">
                     <ul style="padding-top:6px;">
                          <li>
                               <span>5分</span>
                               <span class="com_line"><div class="com_line2" style="width:<?php echo $b_good*(1.3); ?>px;"></div></span>
                               <span><?php echo $b_good.$fh; ?></span>
                          </li>
                           <div style="clear:both"></div>
                         <li>
                               <span>4分</span>
                               <span class="com_line"><div class="com_line2" style="width:<?php echo $b_in*(1.3); ?>px;"></div></span>
                               <span><?php echo $b_in.$fh; ?></span>
                          </li>
                           <div style="clear:both"></div>
                         <li>
                               <span>3分</span>
                               <span class="com_line"><div class="com_line2" style="width:<?php echo $b_poor*(1.3); ?>px;"></div></span>
                               <span><?php echo $b_poor.$fh; ?></span>
                          </li>
                           <div style="clear:both"></div>
                         <li>
                               <span>2分</span>
                               <span class="com_line"><div class="com_line2" style="width:0px;"></div></span>
                               <span>0%</span>
                          </li>
                           <div style="clear:both"></div>
                        <li>
                               <span>1分</span>
                               <span class="com_line"><div class="com_line2" style="width:0px;"></div></span>
                               <span>0%</span>
                          </li>
                           <div style="clear:both"></div>
                     </ul>
               </div>
               <div class="com_four">4.9</div>
         </div>
    </div>
</div>
<div class="comment_list">
    <ul>
<?php 
  foreach ($comm_list as $val){
      if($val['comment_content']){
       echo '<li>
              <div class="com_txt1">
              <span style="color:#e8876d; margin-right:5px;">好评</span> 
              <span style="color:#e44b00;">'.$val['username'].'</span>
              </div>
              <div class="com_txt2">'.$val['comment_content'].'</div>
         </li>';
		 }
  }


; ?>
         

    </ul>
</div>
</div>	
<!--卖家点评END-->	 
      </div>
      <div class="clear"></div>
	  <span class="fx flt"></span><span class="fx frt"></span>
    </div>
<!-- 商品详情 end --> 
  </div>
 <!-- 左侧 end --> 
  <div class="i_fr">
<div class="rbox" id="daysign" style="margin-top:16px;">
	   <div class="r_bt">商家信息</div></div>
	

<div class="rbox">
     	<div>&nbsp;&nbsp;商家：<?php echo $partner['title']; ?></div>
     	<div>&nbsp;&nbsp;电话：<?php echo $partner['phone']; ?></div>
        <div>&nbsp;&nbsp;网站：<a href="<?php echo $partner['homepage']; ?>" target="_blank"><?php echo domainit($partner['homepage']); ?></a></div>
        <div>&nbsp;&nbsp;地址：<?php echo $partner['address']; ?></div>
        <!---<div>&nbsp;&nbsp;交通：<?php echo $partner['address']; ?></div>--->
</div>
               
		<!--每日签到-->
		<?php include template("block_side_daysign");?>
		<!--产品视频-->
		<?php include template("block_side_flv");?>
		<!--本单答疑--> 
		<?php include template("block_side_ask");?>  
		<!--今日秒杀--> 
		<?php include template("block_side_others_seconds");?> 
                <!--今日其他团购-->
		<?php include template("block_side_others");?>
		<!--网站公告-->
		<?php include template("block_side_bulletin");?>   
		<!--网站新闻-->
		<?php include template("block_side_news");?> 
		<!--手机访问-->
		<?php include template("block_side_mobile");?>  
		<!--小调查-->
		<?php include template("block_side_vote");?>    
		<!--邀请有奖、加入我们-->  	
		<?php include template("block_side_job");?>

  </div>
  <div class="clear"></div>
</div>
</div>

<script type="text/javascript">
var obj11 = document.getElementById("inner");
var top11 = getTop(obj11);
var isIE6 = /msie 6/i.test(navigator.userAgent);
window.onscroll = function(){
	var bodyScrollTop = document.documentElement.scrollTop || document.body.scrollTop;
	if (bodyScrollTop > top11){
		obj11.style.position = (isIE6) ? "absolute" : "fixed";
		obj11.style.top = (isIE6) ? bodyScrollTop + "px" : "0px";
	} else {
		obj11.style.position = "static";
	}
}
function getTop(e){
	var offset = e.offsetTop;
	if(e.offsetParent != null) offset += getTop(e.offsetParent);
	return offset;
}
</script>

<?php include template("footer");?>
