<?php 
/*start 团购数据调用*/

/*导航菜单选中状态判断*/
switch ($pagetitle)
{
case '往期团购';
  $classon1 = 'cur';
  break;
case '买家点评'; 
  $classon2 = 'cur';
  break;
case '团购预告';
  $classon3 = 'cur';
  break;
case '秒杀抢团';
  $classon4 = 'cur';
  break;
case '热销商品';
  $classon5 = 'cur';
  break;
case '品牌商户';
  $classon6 = 'cur';
  break;
case "讨论区";
  $classon7 = 'cur';
  break;
case "公共讨论区";
  $classon7 = 'cur';
  break;
case $city['name']."讨论区";
  $classon7 = 'cur';
  break;
case "玩转".$INI['system']['abbreviation'];
  $classon8 = 'cur';
  break;
case "常见问题";
  $classon8 = 'cur';
  break;
case $INI['system']['abbreviation']."是什么";
  $classon8 = 'cur';
  break;
case "积分商城";
  $classon9 = 'cur';
  break;
default:
  $classon = 'cur';
}
; ?>
<li><a href="/" class="<?php echo $classon; ?>"><span>今日团购</span></a></li>
<li><a href="/team/index.php" class="<?php echo $classon1; ?>"><span>往期团购</span></a></li>

<?php if(option_yes('navcomment')){?>
<li><a href="/team/comments.php" class="<?php echo $classon2; ?>"><span>买家点评</span></a></li>
<?php }?>

<?php if(option_yes('navpredict')){?>
<li><a href="/team/predict.php" class="<?php echo $classon3; ?>"><span>团购预告</span></a></li>
<?php }?>

<?php if(option_yes('navseconds')){?>
<li><a href="/team/seconds.php" class="<?php echo $classon4; ?>"><span>秒杀抢团</span></a></li>
<?php }?>

<?php if(option_yes('usercredit') && option_yes('creditshop')){?>
<li><a href="/credit/creditshop.php" class="<?php echo $classon9; ?>"><span>积分商城</span></a></li>
<?php }?>

<?php if(option_yes('navgoods')){?>
<li><a href="/team/goods.php" class="<?php echo $classon5; ?>"><span>热销商品</span></a></li>
<?php }?>

<?php if(option_yes('navpartner')){?>
<li><a href="/partner/index.php" class="<?php echo $classon6; ?>"><span>品牌商户</span></a></li>
<?php }?>

<li><a href="/help/tour.php" class="<?php echo $classon8; ?>"><span>帮助中心</span></a></li>

<?php if(option_yes('navforum')){?>
<li><a href="/forum/index.php" class="<?php echo $classon7; ?>"><span>讨论区</span></a></li>
<?php }?>
