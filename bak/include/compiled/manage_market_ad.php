<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="ad">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_market('ad'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2>广告列表</h2>
					<ul class="filter"><?php echo current_market_ad('ad'); ?></ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="50">ID</th><th width="300">名称</th><th width="40" nowrap>开启</th><th width="40" nowrap>排序</th><th width="150">操作</th></tr>
					<?php if(is_array($ads)){foreach($ads AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?>>
						<td><?php echo $one['id']; ?></td>
						<td><?php echo $one['title']; ?></td>
						<td><?php echo $availables[$one['available']]; ?></td>
						<td><?php echo intval($one['sort_order']); ?></td>
						<td class="op"><a href="/manage/market/adedit.php?id=<?php echo $one['id']; ?>">编辑</a>｜<a href="/ajax/ad.php?action=adremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="确定删除该广告？">删除</a>｜<?php if($one['available']){?><a href="/ajax/ad.php?action=adoff&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="确定关闭该广告？">关闭</a><?php } else { ?><a href="/ajax/ad.php?action=adon&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="确定开启该广告？">开启</a><?php }?></td>
					</tr>
					<?php }}?>
					<tr><td colspan="8"><?php echo $pagestring; ?></td></tr>
                    </table>				
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
