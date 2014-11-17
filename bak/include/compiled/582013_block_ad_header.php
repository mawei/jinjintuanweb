<?php 
	$headerads = DB::LimitQuery('adinfo', array(
		'condition' => array('available' => 1,),
		'order' => 'ORDER BY displayorder DESC,id DESC',
	));
	$fir = array();
	$fir[0] = " class='cur' ";
; ?>

<?php if($headerads){?>

<style type="text/css">
	/*ads*/
	.ad-slideshow1{position:relative; }
	.ad-slideshow1 .ads-pic{width:980px; overflow:hidden; }
	.ad-slideshow1 .ads-pic img{width:980px; overflow:hidden; }
	.ad-slideshow1 .ads-page{height:18px; width:200px; padding:0 5px; line-height:18px;position:absolute; bottom:5px;right:5px; text-align:right; letter-spacing:-4px;}
	.ad-slideshow1 .ads-pic li{overflow:hidden; font-size:0;}
	.ad-slideshow1 .ads-page a{display:inline-block; width:18px; height:18px; text-align:center; line-height:18px; letter-spacing:0; margin:0 2px; background:#F96105; color:#FFF;}
	.ad-slideshow1 .ads-page a:hover{text-decoration:none;}
	.ad-slideshow1 .ads-page a.cur{background:#fff;  color:#000;}
	.ad-slideshow1 .ads-page a.cur:hover{text-decoration:none;}
	/*ads mod*/
	.ads-mod1{width:980px; margin:0px auto 0; overflow:hidden;padding-top:10px
	}
</style>

<div class="ads-mod1">
	<div class="ad-slideshow1" id="adsSlideshow1">
		<div class="ads-pic" id="adsPic1">
			<ul>
			<?php if(is_array($headerads)){foreach($headerads AS $index=>$one) { ?>
				<?php 
					$d = $index>0 ? "style='display:none'" : '';
				; ?>
				<li <?php echo $d; ?>>
				<?php if($one['link']){?>
					<a href="<?php echo $one['link']; ?>" target="_blank"><img src="<?php echo team_image($one['image']); ?>" alt="<?php echo $one['title']; ?>"></a>
				<?php } else { ?>
					<img src="<?php echo team_image($one['image']); ?>" alt="<?php echo $one['title']; ?>">
				<?php }?>
				</li>
			<?php }}?>
			</ul>
		</div>

		<?php if(count($headerads)>1 ){?>
		<div class="ads-page" id="adsPage1" style="display:none">
			<?php if(is_array($headerads)){foreach($headerads AS $index=>$one) { ?>
				<a href="#" <?php echo $fir[$index]; ?>><?php echo ++$index; ?></a>
			<?php }}?>
		</div>

		<script type="text/javascript">
			jQuery(function(){
				var cur = 0 ,t = 5000 ,st;
				$('#adsPic1 li').hide();
				$('#adsPic1 li').eq(0).show();

				function slide(){
				st = setTimeout(function(){
						//cur++;
						//cur = cur >= $('#adsPic1 li').length ? 0 : cur 
						$('#adsPic1 li').eq(cur).fadeOut(10,function(){
						cur++
						cur = cur >= $('#adsPic1 li').length ? 0 : cur 
						$('#adsPic1 li').eq(cur).fadeIn(10);
						$('#adsPage1 a').removeClass('cur');
						$('#adsPage1 a').eq(cur).addClass('cur');
						});
						slide();
					},t)
				}

				$('#adsPage1 a').each(function(i,v){
					$(this).click(function(){
						clearTimeout(st);
						$('#adsPic1 li').eq(cur).fadeOut(10,function(){
							cur = i
							$('#adsPic1 li').eq(cur).fadeIn(10);
							$('#adsPage1 a').removeClass('cur');
							$('#adsPage1 a').eq(cur).addClass('cur');
						});
						slide();
						$(this).blur();
						return false;
					})
				})

				$('#adsPic1').mouseover(function(){
				clearTimeout(st);
				}).mouseout(function(){
				slide();
				})
				//默认隐藏
				$('#adsSlideshow1').mouseover(function(){
					$('#adsPage1').show();
				}).mouseout(function(){
					$('#adsPage1').hide();
				})
				$('#adsPage1').hide();
				slide();
			})
		</script>
		<?php }?>
	</div>
</div>

<?php }?>
