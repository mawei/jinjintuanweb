<!-- <li><a id="nav_0" href="/" {if !$pagetitle||$request_uri=='index'}class="current"{else if $pagetitle==$INI['system']['abbreviation']}class="current"{/if}><span>首页</span></a></li>
<li><a id="nav_1" href="/team/index.php" {if $pagetitle=='往期团购'}class="current"{/if}><span>往期团购</span></a></li>
{/if} 
{if option_yes('usercredit')}<li><a id="nav_2" href="/credit/creditshop.php" {if $pagetitle=='积分商城'}class="current"{/if}><span>积分商城</span></a></li>{/if} 
{if option_yes('navpredict')}<li><a id="nav_3" href="/team/predict.php" {if $pagetitle=='团购预告'}class="current"{/if}><span>团购预告</span></a></li>{/if} 
{if option_yes('navseconds')}<li><a id="nav_4" href="/team/seconds.php" {if $pagetitle=='秒杀抢团'}class="current"{/if}><span>秒杀抢团</span></a></li>{/if} 
{if option_yes('navgoods')}<li><a id="nav_5" href="/team/goods.php" {if $pagetitle=='热销商品'}class="current"{/if}><span>热销商品</span></a></li>{/if} 
{if option_yes('navpartner')}<li><a id="nav_6" href="/partner/index.php" {if $pagetitle=='品牌商户'}class="current"{/if}><span>品牌商户</span></a></li>{/if} 
{if option_yes('navforum')}<li><a id="nav_7" href="/forum/index.php" {if $pagetitle=='讨论区'}class="current end"{/if}><span>讨论区</span></a></li>{/if} 
{if option_yes('navcomment')}<li><a href="/team/comments.php" {if $pagetitle=='买家点评'}class="current"{/if}><span>买家点评</span></a></li>{/if} 
--<li><a id="credit-card-link" class="credit-card-link" href="javascript:;" ><span>充值卡充值</span></a></li>--
 -->
 
 
 <li><a id="nav_0" href="/" <?php if(!$pagetitle||$request_uri=='index'){?>class="current"<?php } else if($pagetitle==$INI['system']['abbreviation']) { ?>class="current"<?php }?>><span>首页</span></a></li>
<li><a id="nav_1" href="/team/index.php" <?php if($pagetitle=='往期团购'){?>class="current"<?php }?>><span>往期团购</span></a></li>
<!--{/if}--> 
<?php if(option_yes('navpredict')){?><li><a id="nav_3" href="/team/predict.php" <?php if($pagetitle=='团购预告'){?>class="current"<?php }?>><span>团购预告</span></a></li><?php }?> 
<?php if(option_yes('navgoods')){?><li><a id="nav_5" href="/team/goods.php" <?php if($pagetitle=='热销商品'){?>class="current"<?php }?>><span>热销商品</span></a></li><?php }?> 
<?php if(option_yes('navpartner')){?><li><a id="nav_6" href="/partner/index.php" <?php if($pagetitle=='品牌商户'){?>class="current"<?php }?>><span>品牌商户</span></a></li><?php }?> 
<?php if(option_yes('navpartner')){?><li><a id="nav_8" href="/downloadapp.php" <?php if($pagetitle=='移动客户端'){?>class="current"<?php }?>><span>移动客户端</span></a></li><?php }?> 
<!----<li><a id="credit-card-link" class="credit-card-link" href="javascript:;" ><span>充值卡充值</span></a></li>---->
 