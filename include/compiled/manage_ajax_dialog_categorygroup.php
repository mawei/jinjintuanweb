<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:380px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">关闭</span><?php echo $category?'编辑':'新建'; ?><?php echo $zone[1]; ?></h3>
	<div style="overflow-x:hidden;padding:10px;">
	<p>中文名称、英文名称：均要求分类唯一性</p>
<form method="post" action="/manage/category/edit.php" class="validator">
	<input type="hidden" name="id" value="<?php echo $category['id']; ?>" />
	<input type="hidden" name="zone" value="<?php echo $zone[0]; ?>" />
	<table width="96%" class="coupons-table">
		<tr><td width="80" nowrap><b>中文名称：</b></td><td><input type="text" name="name" value="<?php echo $category['name']; ?>" require="true" datatype="require" class="f-input" /></td></tr>
		<tr><td nowrap><b>英文名称：</b></td><td><input type="text" name="ename" value="<?php echo $category['ename']; ?>" require="true" datatype="english" class="f-input" style="text-transform:lowercase;" /></td></tr>
		<tr><td nowrap><b>首字母：</b></td><td><input type="text" name="letter" value="<?php echo $category['letter']; ?>" maxLength="1" require="true" datatype="english" class="f-input" style="text-transform:uppercase;" /></td></tr>
		<tr><td nowrap><b>所属分类：</b></td><td>
				<select name="fid" class="f-input"  style="width:auto;"><option value="0">一级大类</option><?php echo Utility::Option($newcategory, $category['fid']); ?></select>
		</td></tr>
		<tr><td nowrap><b>导航显示(Y/N)：</b></td><td><input type="text" name="display" value="<?php echo $category['display']; ?>" class="f-input" style="text-transform:uppercase;"/></td></tr>
		<tr><td nowrap><b>排序(降序)：</b></td><td><input type="text" name="sort_order" value="<?php echo intval($category['sort_order']); ?>" class="f-input" /></td></tr>
		<tr><td colspan="2" height="10">&nbsp;</td></tr>
		<tr><td></td><td><input type="submit" value="确定" class="formbutton" /></td></tr>
	</table>
</form>
	</div>
</div>
