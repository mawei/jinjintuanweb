
<div id="footer">
<div class="servicebox">
<div class="service">
<dl class="help1">
<dt>用户帮助</dt>

					<dd><a href="/help/tour.php">玩转<?php echo $INI['system']['abbreviation']; ?></a></dd>
					<dd><a href="/help/faqs.php">常见问题</a></dd>
					<dd><a href="/help/zuitu.php"><?php echo $INI['system']['abbreviation']; ?>概念</a></dd>
					<dd><a href="/feedback/suggest.php">意见反馈</a></dd>
</dl>
<dl>
<dt>获取更新</dt>

					<dd><a href="/subscribe.php?ename=<?php echo $city['ename']; ?>">邮件订阅</a></dd>
					<dd><a href="/feed.php?ename=<?php echo $city['ename']; ?>">RSS订阅</a></dd>
				<?php if($INI['system']['sinajiwai']){?>
					<dd><a href="<?php echo $INI['system']['sinajiwai']; ?>" target="_blank">新浪微博</a></dd>
				<?php }?>
				<?php if($INI['system']['tencentjiwai']){?>
					<dd><a href="<?php echo $INI['system']['tencentjiwai']; ?>" target="_blank">腾讯微博</a></dd>
				<?php }?>
</dl>
<dl>
<dt>合作联系</dt>

					<dd><a href="/feedback/seller.php">商务合作</a></dd>
					<dd><a href="/help/link.php">友情链接</a></dd>
					<dd><a href="/biz/index.php">商家后台</a></dd>
					<?php if(is_manager(false, true)){?>
					<dd><a href="/manage/index.php">管理<?php echo $INI['system']['abbreviation']; ?></a></dd>
					<?php }?>
</dl>
<dl>
<dt>公司信息</dt>

					<dd><a href="/about/us.php">关于<?php echo $INI['system']['abbreviation']; ?></a></dd>
					<dd><a href="/about/job.php">工作机会</a></dd>
					<dd><a href="/about/contact.php">联系方式</a></dd>
					<dd><a href="/about/terms.php">用户协议</a></dd>
</dl>
<dl class="kefu">
      <dt>客户服务电话：15967105911</dt>
      <dd>工作时间：9:00-21:00(每天) </dd>
      <dd class="follow">关注我们：<a href="<?php echo $INI['system']['sinajiwai']; ?>" target="_blank" class="f_sina" title="去新浪微博关注我们">新浪微博</a> 
		<a href="<?php echo $INI['system']['tencentjiwai']; ?>" target="_blank" class="f_txqq" title="去腾讯微博关注我们">腾讯微博</a> 
		<a href="http://www.ev56.com" target="_blank" class="f_qzone" title="去QQ空间关注我们">qq空间</a>
	  </dd>
    </dl>
<i class="bgbtm"></i>
<i class="bgtop"></i>
</div>
</div>
<div class="cert"><span class="cert0">15天未消费一键退款</span><span class="cert1">中国互联网信用评价中心网信认证</span><span class="cert2">商务部中国国际电子商务中心信用网站认证</span><span class="cert3">支付宝特约商家</span><span class="cert4">财付通诚信商家</span></div>

<div class="copyright"><a href="/index.php">首页</a><span>|</span><a href="/about/us.php">公司简介</a><span>|</span><a href="/about/terms.php">团购协议</a><span>|</span><a href="/about/job.php">加入我们</a><span>|</span><a href="/help/api.php">开放API</a><span>|</span><a href="/feedback/suggest.php">意见反馈</a><?php if(option_yes('widget')){?><span>|</span><a href="/help/widget.php">团购挂件</a><?php }?><br />

		<p>&copy;&nbsp;2011&nbsp;<?php echo $INI['system']['sitename']; ?>&nbsp;版权所有&nbsp;<a href="/about/terms.php">使用<?php echo $INI['system']['abbreviation']; ?>前必读</a>&nbsp;<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo $INI['system']['icp']; ?></a>&nbsp;Powered by <a href="http://www.ev56.com/" target="_blank">ev56</a> template.<?php if($INI['system']['statcode']){?>&nbsp;<?php echo $INI['system']['statcode']; ?><?php }?></p> </div>
</div>
</div>
<script src="/static/theme/ev56_58/js/gototop.js"></script>
<a id="toTop">toTop</a>
<a id="toTop" style="visibility:none;">toTop</a>
<script>
$("#toTop").goToTop();
</script>

<?php include template("html_footer");?>
