<?php 
$others_news = DB::LimitQuery('news', array(
				'order' => 'ORDER BY `begin_time` DESC, `id` DESC',
				'size' => '5',
				));
; ?>
<?php if($others_news){?>
<style type="text/css">
#demo {overflow:hidden;height: 120px;}
#demo1 ul li{border-bottom:1px dashed #333;}
#demo1 ul li a{text-decoration:none}
</style>
<div class="rbox b15" id="notice">
  <h3><?php echo $INI['system']['sitename']; ?>新闻</h3>
  <ul class="wzlist c3">
		<?php if(is_array($others_news)){foreach($others_news AS $one) { ?>
			<li><a href="/news.php?id=<?php echo $one['id']; ?>"  title="<?php echo $one['title']; ?>" target="_blank"><?php echo mb_strimwidth($one['title'],0,30,'...'); ?></a></li>
		<?php }}?>
  </ul>
</div>

<?php }?>