<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('option'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2>选项设置</h2>
					<ul class="filter"><?php echo current_system_option($s); ?></ul>
				</div>
                <div class="sect">
                    <form method="post">
						<div class="wholetip clear"><h3>1、导航栏显示</h3></div>
						<div class="field">
                            <label>买家点评</label>
							<select name="option[navcomment]"><?php echo Utility::Option($option_yn, option_yesv('navcomment')); ?></select>
						</div>
						<div class="field">
                            <label>团购预告</label>
							<select name="option[navpredict]"><?php echo Utility::Option($option_yn, option_yesv('navpredict')); ?></select>
						</div>
                        <div class="field">
                            <label>品牌商户</label>
							<select name="option[navpartner]"><?php echo Utility::Option($option_yn, option_yesv('navpartner')); ?></select>
						</div>
						<div class="field">
                            <label>秒杀抢团</label>
							<select name="option[navseconds]"><?php echo Utility::Option($option_yn, option_yesv('navseconds')); ?></select>
						</div>
						<div class="field">
                            <label>热销商品</label>
							<select name="option[navgoods]"><?php echo Utility::Option($option_yn, option_yesv('navgoods')); ?></select>
                        </div>
						<div class="field">
                            <label>讨论区</label>
							<select name="option[navforum]"><?php echo Utility::Option($option_yn, option_yesv('navforum')); ?></select>
                        </div>
						<div class="wholetip clear"><h3>2、杂项设置</h3></div>
						<div class="field">
							<label>购买短信通知</label>
							<select name="option[buycouponsms]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('buycouponsms')); ?></select><span class="inputtip">项目购买后,是否立即短信通知购买用户--短信模板manage_tpl_buycoupon.html</span>
						</div>
						<div class="field">
                            <label>消费短信通知</label>
							<select name="option[usecouponsms]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('usecouponsms')); ?></select><span class="inputtip">优惠券消费后,是否短信通知购买用户</span>
                        </div>
                        <div class="field">
                            <label>实物购买通知</label>
							<select name="option[expressbuysms]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('expressbuysms')); ?></select><span class="inputtip">快递产品购买后,是否短信通知购买用户--短信模板manage_tpl_expressbuy.html</span>
                        </div>
						<div class="field">
                            <label>失败团购显示</label>
							<select name="option[displayfailure]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('displayfailure')); ?></select><span class="inputtip">在往期团购中，是否显示失败的团购</span>
                        </div>
						<div class="field">
                            <label>全部答疑显示</label>
							<select name="option[teamask]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('teamask')); ?></select><span class="inputtip">本单答疑栏目中，是否显示全部团购项目答疑</span>
                        </div>
						<div class="field">
                            <label>仅余额可秒杀</label>
							<select name="option[creditseconds]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('creditseconds')); ?></select><span class="inputtip">是否，秒杀项目是否仅允许余额付款</span>
                        </div>
						<div class="field">
                            <label>开启短信订阅</label>
							<select name="option[smssubscribe]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('smssubscribe')); ?></select><span class="inputtip">是否开启短信订阅团购信息功能</span>
                        </div>
						<div class="field">
                            <label>简体繁体转换</label>
							<select name="option[trsimple]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('trsimple')); ?></select><span class="inputtip">是否显示在线简体繁体转换链接</span>
                        </div>
						<div class="field">
                            <label>用户节省钱数</label>
							<select name="option[moneysave]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('moneysave')); ?></select><span class="inputtip">在团购列表页显示共为用户节省多少钱</span>
                        </div>
						<div class="field">
                            <label>项目详情通栏</label>
							<select name="option[teamwhole]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('teamwhole')); ?></select><span class="inputtip">团购项目详情和商户信息通栏显示，不分左右两栏</span>
                        </div>
						<div class="field">
                            <label>整站混淆编号</label>
							<select name="option[encodeid]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('encodeid')); ?></select><span class="inputtip">将所有数字ID编码后显示</span>
                        </div>
						<div class="field">
                            <label>保护用户隐私</label>
							<select name="option[userprivacy]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('userprivacy')); ?></select><span class="inputtip">是否充分保护用户隐私</span>
                        </div>
						<div class="field">
                            <label>开启积分功能</label>
							<select name="option[usercredit]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('usercredit')); ?></select><span class="inputtip">是否开启积分及兑换功能</span>
                        </div>
                        <div class="field">
                            <label>开启积分商城</label>
							<select name="option[creditshop]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('creditshop')); ?></select><span class="inputtip">是否开启积分商城兑换功能</span>
                        </div>
                        <div class="field">
                            <label>自动定位城市</label>
							<select name="option[citylocal]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('citylocal')); ?></select><span class="inputtip">是否开启自动获取IP(网易有道IP库)定位城市</span>
                        </div>
						<div class="field">
                            <label>任意身份消费</label>
							<select name="option[mycoupon]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('mycoupon')); ?></select><span class="inputtip">开启后,任意身份输入优惠券号与密码后可消费。(未登录,用户,站长)</span>
                        </div>
                        <div class="field">
                            <label>绑定手机参团</label>
							<select name="option[bindmobile]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('bindmobile')); ?></select><span class="inputtip">开启后,必须绑定手机的用户才能购买。</span>
                        </div>
                        <div class="field">
                            <label>开启每日签到</label>
							<select name="option[daysign]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('daysign')); ?></select><span class="inputtip">开启后,需要设置每日签到赠送的积分或金额。</span>
                        </div>
                        <div class="field">
                            <label>开启团购挂件</label>
							<select name="option[widget]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('widget')); ?></select><span class="inputtip">开启后,会显示团购挂件。</span>
						</div>
						<div class="field">
							<label>仅用券号验证</label>
							<select name="option[onlycoupon]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('onlycoupon')); ?></select><span class="inputtip">开启后,仅用券号即可验证,确保开启又关闭及之前券验证有效,仍会生成密码。</span>
		 				</div>
		 				<!--自动人数-->
                        <div class="field">
							<label>自动人数增加</label>
							<select name="option[task]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('task')); ?></select><span class="inputtip" style="float:none; margin:0; padding:0">&nbsp;默认时间间隔：<input type="text" size="10" name="system[task_i_hour]" class="number" value="<?php echo abs(intval($INI['system']['task_i_hour'])); ?>" style="float:none; width:40px; margin:0"/> 小时 <input type="text" size="10" name="system[task_i_min]" class="number" value="<?php echo abs(intval($INI['system']['task_i_min'])); ?>" style="float:none; width:40px; margin:0"/> 分 <input type="text" size="10" name="system[task_i_sec]" class="number" value="<?php echo abs(intval($INI['system']['task_i_hour'])); ?>" style="float:none; width:40px; margin:0"/> 秒 &nbsp;&nbsp;&nbsp;&nbsp;默认增加人数：<input type="text" size="10" name="system[task_i_num]" class="number" value="<?php echo abs(intval($INI['system']['task_i_num'])); ?>" style="float:none; width:60px; margin:0"/>&nbsp;&nbsp;默认值为新建项目使用，对已建好项目无效</span>
		 				</div>
                        <!--自动人数 end-->
						 <!--货到付款-->
                        <div class="field">
                            <label>开启货到付款</label>
							<select name="option[hdfk]" style="float:left;">

<?php echo Utility::Option($option_yn, option_yesv('hdfk')); ?></select>
                        </div>
                        <!--货到付款end-->
						<div class="wholetip clear"><h3>3、分类显示</h3></div>
                        <div class="field">
                            <label>首页开启</label>
							<select name="option[indexcateteam]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('indexcateteam')); ?></select><span class="inputtip">是否首页多团开启项目分类显示？</span>
						</div>
                        <div class="field">
                            <label>往期团购</label>
							<select name="option[cateteam]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('cateteam')); ?></select><span class="inputtip">是否项目分类显示？</span>
						</div>
                        <div class="field">
                            <label>品牌商户1</label>
							<select name="option[catepartner]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('catepartner')); ?></select><span class="inputtip">是否商户分类显示？</span>
						</div>
                        <div class="field">
                            <label>品牌商户2</label>
							<select name="option[citypartner]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('citypartner')); ?></select><span class="inputtip">是否商户按城市显示？</span>
						</div>
						<div class="field">
                            <label>秒杀抢团</label>
							<select name="option[cateseconds]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('cateseconds')); ?></select><span class="inputtip">是否项目分类显示？</span>
						</div>
						<div class="field">
                            <label>热销商品</label>
							<select name="option[categoods]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('categoods')); ?></select><span class="inputtip">是否项目分类显示？</span>
                        </div>
                        <div class="wholetip clear"><h3>4、编辑器选择</h3></div>
                        <div class="field">
                            <label>选择编辑器</label>
							<select name="system[editor]" class="f-input" style="width:160px;"><?php echo Utility::Option($option_editor, $INI['system']['editor']); ?></select><span class="inputtip">kindEditor／xhEditor (商户后台采用xhEditor)</span>
						</div>
						<div class="wholetip clear"><h3>n、注册选项</h3></div>
						<div class="field">
                            <label>邮箱验证</label>
							<select name="option[emailverify]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('emailverify')); ?></select><span class="inputtip">用户注册时，是否必须进行邮箱验证</span>
                        </div>
						<div class="field">
                            <label>手机号码必填</label>
							<select name="option[needmobile]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('needmobile')); ?></select><span class="inputtip">用户注册时，是否必须输入合法的手机号码</span>
                        </div>
						<div class="field">
                            <label>手机号码验证</label>
							<select name="option[mobilecode]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('mobilecode')); ?></select><span class="inputtip">用户注册时，是否必须验证手机号码</span>
                        </div>

						<div class="act">
                            <input type="submit" value="保存" name="commit" class="formbutton" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>

<div id="sidebar">
</div>

</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
