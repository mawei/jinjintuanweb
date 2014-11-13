<?php include template("header");?>
<style type="text/css">
.mtips .close{position:absolute;top:0;right:20px;padding-right:16px;background:url("/static/theme/58/css/i/bg-sysmsg-close.gif") 100% 50% no-repeat;font-size:12px;cursor:pointer;}

.ulogin .alifast {border-top: 1px solid #DDDDDD;color: #333333;margin: 20px 10px 0;padding: 15px 0 0;}
</style>
<!---content--->
<div class="wrap2">
  <div class="uleft2 ul3">
    <div class="utit">
      <h2>欢迎注册<?php echo $INI['system']['sitename']; ?></h2>
    </div>
          <div class="ucon login">
    <form id="signup-user-form" method="post" action="/account/signup.php" class="validator">
      <ul class="buy_form">
        <li>
		  
                        <label for="signup-email-address">Email</label>

                        <input type="text" size="30" name="email" id="signup-email-address" class="i_text" value="<?php echo $_POST['email']; ?>" require="true" datatype="email|ajax" url="<?php echo WEB_ROOT; ?>/ajax/validator.php" vname="signupemail" msg="Email格式不正确|Email已经被注册" /> 
                        <p><span class="c9" id="userName_Tip">用于登录及找回密码，不会公开，请放心填写</span></p>
        </li>
        <li>
          <label for="signup-username">用户名</label>
          <input type="text" size="30" name="username" id="signup-username" class="i_text" value="<?php echo $_POST['username']; ?>" datatype="limit|ajax" require="true" min="2" max="16" maxLength="16" url="<?php echo WEB_ROOT; ?>/ajax/validator.php" vname="signupname" msg="用户名长度受限|用户名已经被使用" />
          <p><span class="c9" id="userName_Tip">填写4-16个字符，一个汉字为两个字符</span></p>
        </li>
                        <?php if(!option_yes('mobilecode')){?>
        <li>
          <label for="signup-password-confirm">手机号码</label>
          <input type="text" size="30" name="mobile" id="signup-mobile" class="i_text" require="<?php echo option_yes('needmobile')?'true':'require'; ?>" datatype="mobile|ajax" url="<?php echo WEB_ROOT; ?>/ajax/validator.php" vname="signupmobile" msg="手机号码不正确|手机号码已经被注册" />
          <p><span class="c9" id="mobile_Tip">手机号码是我们联系您的最重要方式，并用于<?php echo $INI['system']['couponname']; ?>的短信通知</span></p>
        </li>
                        <?php }?>
        <li>
          <label for="signup-password">密码</label>
          <input type="password" size="30" name="password" id="signup-password" class="i_text" require="true" datatype="require" />
          <p><span class="c9" id="password_Tip">为了您的帐号安全，建议密码最少设置为6个字符以上</span></p>
        </li>
        <li>
          <label for="signup-password-confirm">确认密码</label> 
          <input type="password" size="30" name="password2" id="signup-password-confirm" class="i_text" require="true" datatype="compare" compare="signup-password" />
          <p><span class="c9" id="cpassword_Tip">请输入一致密码</span></p>
        </li>
        <li>
          <label id="enter-address-city-label" for="signup-city">所在城市</label>
		  <select name="city_id" class="i_select quyu"><?php echo Utility::Option(Utility::OptionArray($allcities,'id','name'), $city['id']); ?><option value='0'>其他</option></select>
          	
        </li>
					<?php if(option_yes('verifyregister')){?>
		<li>
          <label for="feedback-email-address">验证码</label>
		  <input type="text" size="30" name="vcaptcha" id="signup-mobile" class="i_text i_yanz" require="true" datatype="require|limitc" min="4" max="4" style="text-transform:uppercase;"/>
                    
                    <img src="/captcha.php" title="看不清楚，点击更换" onclick="X.misc.captcha(this);" style="cursor:pointer;" />
          <p><span class="c9" id="validatecode_Tip">请输入图片中的验证码</span></p>
        </li>
					<?php }?>
        </li>
        <li class="i_font12">
          <label for="subscribe"></label>
           <input tabindex="3" type="checkbox" value="1" name="subscribe" id="subscribe" class="f-check" checked="checked" />
          订阅每日最新团购信息</li>
        <li>
          <label></label>
		  <input type="submit" value="注册" name="commit" id="signup-submit" class="input input42"/>
        </li>
      </ul>
      </form>
    </div>
  </div>
  <div class="uright2 ur3">
    <h3>已有<?php echo $INI['system']['abbreviation']; ?>账户？请直接<a href="/account/login.php">登录</a>。</h3>
	
                   <?php if(option_yes('qzonelogin')){?>
					<p><a href="/thirdpart/qzone/index.php"><img src="/static/css/i/qq.gif" /></a></p>
		           <!--{if option_yes('qqlogin')}-->
				   <p><a href="/thirdpart/qq/index.php"><img src="/static/css/i/qq.png" /></a></p>
				   <?php }?>
				   <?php if(option_yes('sinalogin')){?>
				   <p><a href="/thirdpart/sina/login.php"><img src="/static/css/i/sina_login.png" /></a></p>
				   <?php }?>
				   <?php if($INI['alipay']['alifast'] == 'Y'){?>
				   <p><a href="/alifast/auth_authorize.php"><img src="/static/css/i/btn_login_zfbkj.png" /></a></p>
				   <?php }?>
  </div>
  <div class="clear"></div>
</div>
<!---contentEnd--->
        
<?php include template("footer");?>
