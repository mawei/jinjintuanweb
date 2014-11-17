<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_team($selector); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
				<?php if($selector=='failure'){?>
                    <h2>失败项目</h2>
				<?php } else if($selector=='success') { ?>
                    <h2>成功项目</h2>
				<?php } else { ?>
                    <h2>当前项目</h2>
				<?php }?>
                &nbsp;&nbsp;&nbsp;&nbsp;总开关状态：<?php echo option_yes('task')?'打开':'关闭'; ?><br />
                状态说明：停止（总关闭|关闭|变动时间或人数为0|人数+变量>最高数量），等待（团购未开始）<br />
                操作提示：双击 变动量 下的参数即可进行个别修改
					<ul class="filter">
						<li><?php echo !$team_type ? '全部' : '<a href="?">全部</a>'; ?></li>
						<li><?php echo $team_type=='normal' ? '团购' : '<a href="?team_type=normal">团购</a>'; ?></li>
						<li><?php echo $team_type=='seconds' ? '秒杀' : '<a href="?team_type=seconds">秒杀</a>'; ?></li>
						<li><?php echo $team_type=='goods' ? '商品' : '<a href="?team_type=goods">商品</a>'; ?></li>
					</ul>
				</div>
				<div class="sect" style="padding:0 10px;">
					<form method="get">
					<p style="margin:5px 0;">项目编号：<input type="text" name="team_id" class="h-input number" value="<?php echo $team_id; ?>" >&nbsp;&nbsp;关键字：<input type="text" name="team_key" class="h-input text" value="<?php echo $team_key; ?>" >&nbsp;&nbsp;状态：<select name="state"><?php echo Utility::Option(array('1'=>'等待','2'=>'停止','3'=>'正常'), $state,'全部'); ?></select></p><p style="margin:5px 0;">团购开始时间范围：<input type="text" value="<?php echo $start_time[1]; ?>" class="Wdate" name="start_time[1]" onFocus="WdatePicker({isShowClear:true,readOnly:true})"/>&nbsp;-&nbsp;
                		<input type="text" value="<?php echo $start_time[2]; ?>" class="Wdate" name="start_time[2]" onFocus="WdatePicker({isShowClear:true,readOnly:true})"/>&nbsp;&nbsp;&nbsp;&nbsp;团购结束时间范围：<input type="text" value="<?php echo $end_time[1]; ?>" class="Wdate" name="end_time[1]" onFocus="WdatePicker({isShowClear:true,readOnly:true})"/>&nbsp;-&nbsp;
                		<input type="text" value="<?php echo $end_time[2]; ?>" class="Wdate" name="end_time[2]" onFocus="WdatePicker({isShowClear:true,readOnly:true})"/>&nbsp;&nbsp;<input type="submit" value="筛选" class="formbutton" onclick="select_submit(1)"  style="padding:1px 6px;"/></p>
                    </form>
				</div>
                <div class="sect">
                    <form method="post" id="listForm" class="validator">
                    <table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="80"><input class="selectAll" type="checkbox" /> ID</th><th width="400">项目名称</th><th width="100">团购时间</th><th width="50">成交</th><!--<th width="80" nowrap>自动时间</th>--><th width="60" nowrap>变动量</th><th width="80">状态</th><th width="80">开关</th></tr>
					<?php if(is_array($teams)){foreach($teams AS $index=>$one) { ?>
					<?php $oldstate = $one['state']; ?>
					<?php $one['state'] = team_state($one); ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
						<td valign="middle"><input type="checkbox" name="checkboxes[]" id="team-<?php echo $one['id']; ?>" value="<?php echo $one['id']; ?>" class="team_select" require="true" datatype="group"/> <a href="/manage/team/edit.php?id=<?php echo $one['id']; ?>" target="_blank"><?php echo $one['id']; ?></a></td>
						<td>
							<?php echo $one['team_type']=='normal' ? '[团购]' : ''; ?>
							<?php echo $one['team_type']=='seconds' ? '[秒杀]' : ''; ?>
							<?php echo $one['team_type']=='goods' ? '[商品]' : ''; ?>
							<a class="deal-title" href="/team.php?id=<?php echo $one['id']; ?>" target="_blank"><?php echo $one['product']; ?></a>
						</td>
						<td nowrap><?php echo date('Y-m-d H:i:s',$one['begin_time']); ?><br/><?php echo date('Y-m-d H:i:s',$one['end_time']); ?></td>
						<td nowrap><?php echo $one['now_number']; ?>/<?php echo $one['min_number']; ?></td>
                        <td nowrap>间隔：<span ondblclick="change_i_time(this,<?php echo $one['id']; ?>)"><?php echo intval($one['task_i_time']/3600); ?>小时<?php echo intval($one['task_i_time']%3600/60); ?>分<?php echo $one['task_i_time']%60; ?>秒</span><br />人数：<span ondblclick="change_i_num(this,<?php echo $one['id']; ?>)"><?php echo abs($one['task_i_num']); ?></span></td>
                        <td nowrap class="state">
                        <?php if(!option_yes('task')||$one['task_state']=='0'||$one['end_time']<=$now||!$one['task_i_num']||!$one['task_i_time']||($one['max_number']>0&&($one['now_number']+$one['task_i_num']>=$one['max_number']))){?>
                          <span style="color:red">停止</span>
                        <?php } else if($one['begin_time']>$now) { ?>
                          <span style="color:green">等待</span>
                        <?php } else { ?>
                          <span>正常</span>
                        <?php }?></td>
                        <td nowrap><span style="cursor: pointer" onclick="change_state(this,'<?php echo $one['id']; ?>')" v="<?php echo $one['task_state']; ?>"><?php echo $one['task_state']?'开':'关'; ?></span></td>
					</tr>
					<?php }}?>
					<tr><td colspan="7"><?php echo $pagestring; ?></tr>
                    <tr><td colspan="7"><!--<p style="line-height:36px">批量修改自动人数时间为：<input type="text" class="h-input" name="cbday" value="" /> - <input type="text" class="h-input" name="ceday" value="" /><span style="color:#999">&nbsp;&nbsp;格式如：2012-01-01 08:00:00或2012-01-01</span></p>-->
                    <p style="line-height:36px"><input class="selectAll" type="checkbox" id="all_s" /> <label for="all_s">全选</label>&nbsp;&nbsp;&nbsp;&nbsp;<input id="is_all" type="checkbox" name="is_all"  value="1"/> <label for="is_all">所有分页</label>&nbsp;&nbsp;&nbsp;&nbsp;间隔时间：<input name="task_i_hour" value="" style="width:40px" /> 小时 <input name="task_i_min" value="" style="width:40px" /> 分 <input name="task_i_sec" value="" style="width:40px" /> 秒&nbsp;&nbsp;&nbsp;&nbsp;增加人数：<input name="task_i_num" value="" />&nbsp;&nbsp;开关：<select name="task_state"><option value="">未选择</option><option value="0">关闭</option><option value="1">开启</option></select></p><p><input type="submit" value="确定" class="formbutton" style="padding:1px 6px;"/></p></td></tr>
                    </table>
                    </form>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->
<script type="text/javascript">
$('.selectAll,#is_all').click(function(){
		if($(this).attr('checked') == true){
			$('.team_select').attr('checked',true);
			$('.selectAll').attr('checked',true);
		}else{
			$('.team_select').attr('checked',false);
			$('.selectAll').attr('checked',false);
		}
});
$('.team_select').click(function(){
	if($(this).attr('checked') == false){
		$('.selectAll').attr('checked',false);
		$('#is_all').attr('checked',false);
	}
});
$('#listForm').submit(function(){
	if($('input[name=checkboxes[]]:checkbox:checked').length==0){
	  alert('您没有选择任何项目！');
	  return false;
	}else if($('input[name=task_i_hour]').val()==''&&$('input[name=task_i_min]').val()==''&&$('input[name=task_i_sec]').val()==''&&$('input[name=task_i_num]').val()==''&&$('select[name=task_state]').val()==''){
		alert('请填写需要修改的数值！');
	    return false;
	}
});
function change_state(obj,id){
	v=$(obj).attr("v");
	$.get(
	WEB_ROOT +"/manage/team/ajax_increase.php",
	{action:"state",id: id,v:v},
	function(data){
	  $(obj).attr("v",data['v']);
	  if(data['v']==0){
		  $(obj).text('关');
	  }else if(data['v']==1){
		  $(obj).text('开');
	  }
	  $(obj).parent().siblings('.state').html(data['state']);
	},'json');
}
function change_i_num(obj,id){
	v=parseInt($(obj).text());
	$(obj).html("<input type='text' value='"+v+"' >");
	$(obj).children('input').focus().blur(function(){
		newv=parseInt($(this).val());
		if(v==newv) return $(obj).html(v);
		$.get(
			WEB_ROOT +"/manage/team/ajax_increase.php",
			{action:"num",id: id,v:newv},
			function(data){
				$(obj).html(data);
		});
	});
}
function change_i_time(obj,id){
	oldv=$(obj).text();
	v=oldv.replace(/秒/g,'');
	v=v.replace(/(小时|分)/g,':');
	$(obj).html("<input type='text' value='"+v+"' >");
	$(obj).children('input').focus().blur(function(){
		newv=$(this).val();
		if(newv==v) return $(obj).html(oldv);
		$.get(
			WEB_ROOT +"/manage/team/ajax_increase.php",
			{action:"time",id: id,v:newv},
			function(data){
				$(obj).html(data);
		});
	});
}
function change_time(obj,id,name){
	v=$(obj).text();
	$(obj).html("<input type='text' value='"+v+"'>");
	$(obj).children('input').focus().blur(function(){
		newv=$(this).val();
		if(newv==v) return $(obj).html(v);
		$.get(
			WEB_ROOT +"/manage/team/ajax_increase.php",
			{action:name,id: id,v:newv},
			function(data){
				$(obj).html(data);
		});
	});
}
</script>
<?php include template("manage_footer");?>
