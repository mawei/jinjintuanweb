<DIV class=footer>
<DIV class=f_bottom>
<DL class=db_xx>
  <DT><SPAN><B>新手帮助</B> 
    <a href="/subscribe.php?ename=<?php echo $city['ename']; ?>">邮件订阅</a>
  <a href="/feed.php?ename=<?php echo $city['ename']; ?>">RSS订阅</a>

  <a href="/help/faqs.php">常见问题</a>
  <a href="/feedback/suggest.php">意见反馈</a>
   <A 
  href="http://t.58.com/help/zffs_4">支付宝</A> <A 
  href="http://t.58.com/help/zffs_1">财付通</A>
  </SPAN> 
  <SPAN><B>售后服务</B>
  <a href="/help/tour.php">我要咨询</a>
    <a href="/help/zuitu.php">用户保障</a>
				<?php if($INI['system']['sinajiwai']){?>
  <a href="<?php echo $INI['system']['sinajiwai']; ?>" target="_blank">新浪微博</a>
				<?php }?>
				<?php if($INI['system']['tencentjiwai']){?>
  <a href="<?php echo $INI['system']['tencentjiwai']; ?>" target="_blank">腾讯微博</a>
				<?php }?>
  </SPAN> 
  <SPAN><B>商务合作</B>
  <a href="/feedback/seller.php">商务合作</a>
  <a href="/help/link.php">友情链接</a>
  <a href="/biz/index.php">商家后台</a>
					<?php if(is_manager(false, true)){?>
  <a href="/manage/index.php">管理<?php echo $INI['system']['abbreviation']; ?></a>
					<?php }?>
  
  </SPAN> 
  <SPAN><B>关于我们</B>
  <a href="/about/us.php">公司介绍</a>
  <a href="/about/job.php">加入我们</a>
  <a href="/about/contact.php">联系方式</a>
  <a href="/about/terms.php">用户协议</a></SPAN> 
  </DT>
  <DD><A class=sst href="/help/zuitu.php">随时退款</A><A class=gqt 
  href="/help/zuitu.php">过期退款</A><A class=fxt 
  href="/help/zuitu.php">放心团</A></DD>
  <DD  class=n_zx><A 
  href="/help/tour.php">立即咨询</A></DD></DL>
<UL class=d_link><!--热门城市团购 -->
  <!--推荐链接 -->
  <!--友情链接 -->
 <!--友情链接 -->

 <?php 
$logos = DB::LimitQuery('friendlink', array(
			'condition' => array( 'LENGTH(logo)>0' ),
			'order' => 'ORDER BY sort_order DESC',
			));
$texts = DB::LimitQuery('friendlink', array(
			'condition' => array( 'LENGTH(logo)=0',),
			'order' => 'ORDER BY sort_order DESC',
			));
; ?>
  <LI><STRONG>友情链接</STRONG>:
  <?php if(is_array($texts)){foreach($texts AS $one) { ?>
				<a href="<?php echo $one['url']; ?>" title="<?php echo $one['title']; ?>" target="_blank"><?php echo $one['title']; ?></a>
			<?php }}?>
  </LI></UL><!-- 热门，友情结束--><!--底部版权 -->
<P>© 2013 <A href="<?php echo $INI['system']['wwwprefix']; ?>"><?php echo $INI['system']['sitename']; ?></A><?php echo $INI['system']['icp']; ?>&nbsp;<A id=__szfw_logo__ 
class=cxwzbs href="https://search.szfw.org/cert/l/CX20120918001650001720" 
target=_blank><IMG align=absMiddle 
src="/static/theme/58/css/img/rongyum.png" width=86 height=20> </A>
<?php if($INI['system']['statcode']){?>&nbsp;<?php echo $INI['system']['statcode']; ?><?php }?>
<DIV id=gongshangDiv></DIV>
<P>技术支持： <script LANGUAGE="Javascript">document.write(unescape("海诚网络"))</SCRIPT></P>
<SCRIPT type=text/javascript>
    function showMoreHotarea(){
	var btnspan = document.getElementById('btnspan');
	//var hotcitydd = btnspan.parentNode;
	var hotcitydd = document.getElementById("hotarea");
	var flag = btnspan.innerHTML=="更多";
        if(flag){btnspan.innerHTML="收起";hotcitydd.style.height = 'auto'}else{btnspan.innerHTML = '更多';hotcitydd.style.height = '43px';}
	}
    function showMoreRecommendarea(){
	var btnspan = document.getElementById('btnspanTWO');
	var hotcitydd = document.getElementById("recommendarea");
	var flag = btnspan.innerHTML=="更多";
        if(flag){btnspan.innerHTML="收起";hotcitydd.style.height = 'auto'}else{btnspan.innerHTML = '更多';hotcitydd.style.height = '43px';}
	}
</SCRIPT>

	<DIV style="VISIBILITY: hidden" id=GoTop class=box_gd><A class=g_top 
onclick="window.scroll(0,0);return false" 
href="javascript:void(0);">回顶部</A></DIV>
<SCRIPT type=text/javascript>

    $(window).scroll(
            function() {
                if ($(window).scrollTop() > 0) {

                    $("#GoTop").css("visibility","visible");
                } else {
                    $("#GoTop").css("visibility","hidden");
                }
            });

</SCRIPT>
<script type="text/javascript">
function CloseJhyXuanfu(){
juhaoyong_xuanfukefuContent.style.display="none";
juhaoyong_xuanfukefuBut.style.display="block";
return true; 
}

function ShowJhyXuanfu(){
juhaoyong_xuanfukefuContent.style.display="block";
juhaoyong_xuanfukefuBut.style.display="none";
return true; 
}
</SCRIPT>
<LINK rel=stylesheet type=text/css href="/juhaoyong-kfimgs/kf.css" rev=stylesheet />

<DIV id="juhaoyong_xuanfukefu">
<DIV id="juhaoyong_xuanfukefuBut" onmouseover="ShowJhyXuanfu()"><table class="juhaoyong_xuanfukefuBut_table" border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td></tr></table></DIV>
<DIV id="juhaoyong_xuanfukefuContent">
<table width="143" border="0" cellspacing="0" cellpadding="0">
<tr><td class="juhaoyong_xuanfukefuContent01" valign="top"><SPAN style=" position:relative; top:5px; cursor:pointer; color:#ff90a5; font-size:12px;" onclick="CloseJhyXuanfu()">关闭</SPAN>&nbsp;</td></tr>
<tr><td class="juhaoyong_xuanfukefuContent02" align="center">
	<table border="0" cellspacing="0" cellpadding="0" align="center">

    <tr><td class=jhykefu_box1>售前QQ客服</td></tr>
    <tr><td class=jhykefu_box2><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=466989801&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:466989801:41 &r=0.11310546705499291" alt="点击这里给我发消息" title="点击这里给我发消息"></a></td></tr>
	
    <tr><td class=jhykefu_box1>售后QQ客服</td></tr>
    <tr><td class=jhykefu_box2><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=466989801&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:466989801:41 &r=0.11310546705499291" alt="点击这里给我发消息" title="点击这里给我发消息"></a></td></tr>
	</table>
</td></tr>	
<!--下面这行，可以修改详细联系方式连接地址-->
<tr><td class="juhaoyong_xuanfukefuContent03" onclick=window.open("/about/contact.php","_blank")>&nbsp;</td></tr>
</table>
</DIV>
</DIV>
<script type="text/javascript">
juhaoyongKefu=function(id,_top,_left){
	var me=id.charAt?document.getElementById(id):id,d1=document.body,d2=document.documentElement;d1.style.height=d2.style.height='100%';
	me.style.top=_top?_top+'px':0;
	me.style.left=_left+"px";
	me.style.position='absolute';
	setInterval(function(){me.style.top=parseInt(me.style.top)+(Math.max(d1.scrollTop,d2.scrollTop)+_top-parseInt(me.style.top))*0.1+'px'},10+parseInt(Math.random()*20));
	return arguments.callee}
	juhaoyongKefu('juhaoyong_xuanfukefu',150,0);
</SCRIPT>