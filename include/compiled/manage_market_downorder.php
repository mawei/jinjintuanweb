<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_market('down'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2>订单下载</h2>
					<ul class="filter"><?php echo mcurrent_market_down('downorder'); ?></ul>
				</div>
                <div class="sect">
                    <form method="post" target="_blank" class="validator">
                        <div class="field">
                            <label>项目名称</label>
							<input type="text" name="team_id" require="true" datatype="number" class="number" /><span class="inputtip">请输入项目的ID</span>
						</div>

                        <div class="field">
                            <label>支付状态</label>
							<div style="padding-top:8px;"><input type="checkbox" name="state[]" value="pay" checked />&nbsp;已支付&nbsp;&nbsp;<input type="checkbox" name="state[]" value="unpay" checked>&nbsp;未支付</div>
						</div>
                        <div class="field">
                            <label>发货状态</label>
							<div style="padding-top:8px;"><input type="checkbox" name="express_no[]" value="Y" checked />&nbsp;已发货&nbsp;&nbsp;<input type="checkbox" name="express_no[]" value="N" checked>&nbsp;未发货</div>
						</div>
                        <div class="field">
                            <label>支付渠道</label>
							<div style="padding-top:8px;"><input type="checkbox" name="service[]" value="alipay" checked />&nbsp;支付宝&nbsp;&nbsp;<input type="checkbox" name="service[]" value="tenpay" checked />&nbsp;财付通&nbsp;&nbsp;<input type="checkbox" name="service[]" value="chinabank" checked />&nbsp;网银在线&nbsp;&nbsp;<input type="checkbox" name="service[]" value="paypal" checked />&nbsp;Paypal&nbsp;&nbsp;<input type="checkbox" name="service[]" value="yeepay" checked />&nbsp;易宝&nbsp;&nbsp;<input type="checkbox" name="service[]" value="bill" checked />&nbsp;快钱&nbsp;&nbsp;<input type="checkbox" name="service[]" value="cash" checked />&nbsp;现金支付&nbsp;&nbsp;<input type="checkbox" name="service[]" value="credit" checked>&nbsp;余额支付</div>
						</div>

                        <div class="act">
                            <input type="submit" value="下载" name="commit" class="formbutton"/>
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
