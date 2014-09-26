<?php include template("header");?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="content">
    <form action="/team/buy.php?id=<?php echo $team['id']; ?>" method="post" class="validator">
	<input id="deal-per-number" value="<?php echo $team['per_number']; ?>" type="hidden" />
        <input id="deal-permin-number" value="<?php echo $team['permin_number']; ?>" type="hidden" />
    <div id="deal-buy" class="box">
        <div class="box-top"></div>
        <div class="box-content">
            <div class="head"><h2>提交订单
            <?php if($team['farefree'] == -1){?>&nbsp;(本单免运费)
            <?php } else if($team['farefree']>0) { ?>&nbsp;(<span class="currency"><?php echo $team['farefree']; ?></span>件免运费)<?php }?>
            </h2></div>
            <div class="sect">
            <table class="order-table">
                <tr>
                    <th class="deal-buy-desc">项目名称</th>
                    <th class="deal-buy-quantity">数量</th>
                    <th class="deal-buy-multi"></th>
                    <th class="deal-buy-price">价格</th>
                    <th class="deal-buy-equal"></th>
                    <th class="deal-buy-total">总价</th>
                </tr>
                <tr>
                    <td class="deal-buy-desc"><?php echo $team['title']; ?></td>
                    <td class="deal-buy-quantity">
                    	<input type="text" class="input-text f-input" maxlength="4" name="quantity" value="<?php echo $order['quantity']; ?>" id="deal-buy-quantity-input" <?php echo $team['per_number']==1?'readonly':''; ?> />
                    	<input type="hidden" id="deal-buy-farefree" value="<?php echo abs(intval($team['farefree'])); ?>"/>
                    	<br /><span style="font-size:12px;color:gray;"><?php if($team['per_number']==0){?>最多9999件<?php } else { ?>最多<?php echo $team['per_number']; ?>件<?php }?><br /><?php if($team['permin_number']>1 && ($team['permin_number']<$team['per_number']||$team['per_number']==0)){?>最少<?php echo $team['permin_number']; ?>件<?php }?></span>
	                 </td>
                    <td class="deal-buy-multi">x</td>
                    <td class="deal-buy-price"><span class="money"><?php echo $currency; ?></span><span id="deal-buy-price"><?php echo $team['team_price']; ?></span></td>
                    <td class="deal-buy-equal">=</td>
                    <td class="deal-buy-total"><span class="money"><?php echo $currency; ?></span><span id="deal-buy-total"><?php echo $order['quantity']*$team['team_price']; ?></span></td>
                </tr>
				<?php if($team['delivery']=='express'){?>
                <?php if(is_array($express)){foreach($express AS $index=>$one) { ?>
                <tr>
                    <td class="deal-buy-desc"><?php echo $one['name']; ?></td>
                    <td class="deal-buy-quantity">
                    	<input type="radio" class="express-price" name="express_price" value="<?php echo $one['relate_data']; ?>" title="<?php echo $one['id']; ?>" <?php if(!$order['express_id'] && $index == 0 ){?>checked="checked"<?php } else if($order['express_id'] == $one['id'] ) { ?>checked="checked"<?php }?> /></td>
                    <td class="deal-buy-multi"></td>
                    <td class="deal-buy-price"><span class="money"><?php echo $currency; ?></span><span><?php echo $one['relate_data']; ?></span></td>
                    <td class="deal-buy-equal"></td>
                    <td class="deal-buy-total"></td>
                </tr>
				  <?php }}?>
                <tr>
                    <td class="deal-buy-desc">快递费用</td>
                    <td class="deal-buy-quantity"></td>
                    <td class="deal-buy-multi"></td>
                    <td class="deal-buy-price"></td>
                    <td class="deal-buy-equal">=</td>
                    <td class="deal-buy-total">
                    	<span class="money"><?php echo $currency; ?></span><span id="deal-express-total" v="<?php echo $one['relate_data']; ?>"><?php echo $one['relate_data']; ?></span>
                    	<input type="hidden" id="express-id" name="express_id" value="<?php echo $one['express_id']; ?>">
                    </td>
                </tr>
				<?php }?>

				<tr class="order-total">
                    <td class="deal-buy-desc"><strong>订单总额：</strong></td>
                    <td class="deal-buy-quantity"></td>
                    <td class="deal-buy-multi"></td>
                    <td class="deal-buy-price"></td>
                    <td class="deal-buy-equal">=</td>
                    <td class="deal-buy-total"><span class="money"><?php echo $currency; ?></span><strong id="deal-buy-total-t"><?php echo $order['origin']; ?></strong></td>
                </tr>
            </table>

			<?php if($team['delivery']=='express'){?>
			<div class="expresstip"><?php echo nl2br(htmlspecialchars($team['express'])); ?></div>
			<div class="wholetip clear"><h3>快递信息<?php if($INI['alipay']['aliaddress'] == 'Y' && $_SESSION['ali_token']){?>&nbsp;<a href="/alifast/user_logistics_address_query.php"><img src="/static/css/i/aliaddress.png" /></a><?php }?></h3></div>
			<div id="address-list">
				<?php if(is_array($address)){foreach($address AS $index=>$one) { ?>
				<span id="address-list-<?php echo $one['id']; ?>" class="address-list-pannal" style="display: block; margin: 0pt 20px; padding: 3px 5px;">
				<label for="address-list-input">
				<input id="address-list-input-<?php echo $one['id']; ?>" type="radio" value="<?php echo $one['id']; ?>" name="address-list" <?php if($one['default']=='Y'){?>checked<?php }?> /> <?php echo $one['name']; ?> , <?php echo $one['province']; ?> <?php echo $one['area']; ?> <?php echo $one['city']; ?> <?php echo $one['street']; ?> , <?php echo $one['zipcode']; ?> , <?php echo $one['mobile']; ?>
				</label>
				</span>
				<?php }}?>
				<span id="address-list-0" class="address-list-pannal" style="display: block; margin: 0pt 20px; padding: 3px 5px;">
				<label for="address-list-input">
				<input id="address-list-input-0" type="radio" name="address-list" value="0" <?php if(!$address || !$def){?>checked<?php }?> />
				使用其它地址
				</label>
				</span>
			</div>
			<div class="other-address" style="display:none">
			<div class="field username">
				<label>收件人</label>
				<input type="text" size="30" name="realname" id="settings-realname" class="f-input" <?php if($_SESSION['ali_add']){?>value="<?php echo $_SESSION['ali_add']['fullname']; ?>" <?php } else { ?>value="<?php echo $login_user['realname']; ?>"<?php }?>  />
				<span class="hint">收件人请与有效证件姓名保持一致，便于收取物品</span>
			</div>
			<div class="field mobile">
				<label>手机号码</label>
				<input type="text" size="30" name="mobile" id="settings-mobile" class="number" <?php if($_SESSION['ali_add']){?>value="<?php echo $_SESSION['ali_add']['mobile_phone']; ?>" <?php } else { ?>value="<?php echo $login_user['mobile']; ?>"<?php }?>  maxLength="11" /> <span class="inputtip">手机号码是我们联系您最重要的方式，请准确填写</span>
			</div>
				<div class="field username">
				<label>收件地址</label>
				<input type="text" size="30" name="address" id="settings-address" class="f-input"  <?php if($_SESSION['ali_add']){?>value="<?php echo $_SESSION['ali_add']['prov']; ?><?php echo $_SESSION['ali_add']['city']; ?><?php echo $_SESSION['ali_add']['area']; ?><?php echo $_SESSION['ali_add']['address']; ?>" <?php } else { ?>value="<?php echo $login_user['address']; ?>"<?php }?>  />
				<span class="hint">为了能及时收到物品，请按照格式填写：_省_市_县（区）_</span>
			</div>
			<div class="field mobile">
				<label>邮政编码</label>
				<input type="text" size="30" name="zipcode" id="settings-mobile" class="number" <?php if($_SESSION['ali_add']){?>value="<?php echo $_SESSION['ali_add']['post']; ?>" <?php } else { ?>value="<?php echo $login_user['zipcode']; ?>"<?php }?>  maxLength="6" />
			</div>
			</div>
			
			<div>
			<p class="addOfAliPay" style="font-size:16px;padding: 8px 18px;">
			希望的送货时间:
			</p>
				<span class="address-list-send-time" style="display: block; margin: 0pt 20px; padding: 5px 5px;">
				<label for="address-send-input">
				<input id="address-list-input-time" type="radio" value="只工作日送货(双休日、假日不用送，写字楼/商用地址客户请选择)" name="express_xx" checked />只工作日送货(双休日、假日不用送，写字楼/商用地址客户请选择)
				</label>
				</span>
				<span class="address-list-send-time" style="display: block; margin: 0pt 20px; padding: 5px 5px;">
				<label for="address-send-input">
				<input id="address-list-input-time" type="radio" value="只双休日、假日送货(工作日不用送)" name="express_xx" />只双休日、假日送货(工作日不用送)
				</label>
				</span>
				<span class="address-list-send-time" style="display: block; margin: 0pt 20px; padding: 5px 5px;">
				<label for="address-send-input">
				<input id="address-list-input-time" type="radio" value="学校地址/地址白天没人，请尽量安排其它时间送货 (特别安排可能会超出预计送货天数)" name="express_xx" />学校地址/地址白天没人，请尽量安排其它时间送货 (特别安排可能会超出预计送货天数)
				</label>
				</span>
				<span class="address-list-send-time" style="display: block; margin: 0pt 20px; padding: 5px 5px;">
				<label for="address-send-input">
				<input id="address-list-input-time" type="radio" value="工作日、双休日与假日均可送货" name="express_xx" />工作日、双休日与假日均可送货
				</label>
				</span>
			</div>
			<?php } else { ?>
			<div class="field mobile">
				<label>手机号码</label>
				<input type="text" size="30" name="mobile" id="settings-mobile" class="number" value="<?php echo $login_user['mobile']; ?>" require="true" datatype="mobile" maxLength="11" /><span class="inputtip">请填写正确的手机号码（可为朋友代买）</span>
			</div>
			<?php }?>
			<div class="wholetip clear"><h3>附加信息</h3></div>
			
			<?php if(is_array($team['condbuy']) && !empty($team['condbuy'][0])){?>
			<div class="field mobile">
				<label>订购选择</label>
				<?php if(is_array($team['condbuy'])){foreach($team['condbuy'] AS $index=>$one) { ?>
				<select name="condbuy[]" class="f-input" require="true" datatype="require" style="width:auto;"><option value="">请选择</option><?php echo Utility::Option(array_combine($one, $one), 'condbuy'); ?></select> 
				<?php }}?>
			</div>
			<?php }?>
			<div class="field mobile">
				<label>订单附言</label>
				<textarea name="remark" style="width:500px;height:80px;padding:2px;"><?php echo htmlspecialchars($order['remark']); ?></textarea>
			</div>
            <input type="hidden" name="id" value="<?php echo $order['id']; ?>" />
			<div class="form-submit"><input type="submit" class="formbutton" name="buy" value="确认无误，购买"/></div>
            </div>
        </div>
        <div class="box-bottom"></div>
    </div>
    </form>
</div>
<div id="sidebar">
	<?php include template("block_side_credit");?>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->
<script language="javascript">
$(document).ready(function(){
	if($('#address-list-input-0').attr("checked") == true){
		$('.other-address').css('display','block');
	}else{
		$('.other-address').css('display','none');
	
	}
	$( "input[name='address-list']" ).bind( "click", othercheck );

	function othercheck(){
		if($('#address-list-input-0').attr("checked") == true){
			$('.other-address').css('display','block');
		}else{
			$('.other-address').css('display','none');
		}
	}
});
</script>
<script>
/*window.x_init_hook_dealbuy = function(){
	X.team.dealbuy_farefree(<?php echo abs(intval($order['quantity'])); ?>);
	X.team.dealbuy_totalprice();
};*/
</script>
<?php include template("footer");?>
