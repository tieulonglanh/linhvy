<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'order/detail', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>order" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Chi tiết đơn hàng</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <h3></h3>
        <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table width="100%" class="input">
            	<tr>
                	<td colspan="6" class="session_flash"><?php echo $this->Session->flash(); ?></td>
                </tr>
                <tr>
                    <td class="label" width="120">Mã đơn hàng: </td>
                    <td width="250"><?php echo $this->data['Order']['id']; ?></td>
                    <td colspan="2">&nbsp;</td>
                    <td class="label" width="120">Tên khách hàng: </td>
                    <td><?php echo $this->data['Order']['username']; ?></td>
               	</tr>
                <tr>
                    <td class="label" width="120">Ngày tạo:</td>
                    <td><?php echo $this->data['Order']['created']; ?></td>
                    <td colspan="2">&nbsp;</td>
                    <td class="label" width="120">Địa chỉ khách:</td>
                    <td><?php echo $this->data['Order']['address']; ?></td>
               	</tr>
                <tr>
                    <td class="label" width="120">Ngày sửa đổi:</td>
                    <td><?php echo $this->data['Order']['modified']; ?></td>
                    <td colspan="2">&nbsp;</td>
                    <td class="label" width="120">Số ĐT</td>
                    <td><?php echo $this->data['Order']['phone']; ?></td>
               	</tr>

                <tr>
                    <td class="label" width="120">Giá trị đơn hàng:</td>
                    <td><?php echo number_format($this->data['Order']['total_amount']); ?></td>
                    <td colspan="2">&nbsp;</td>
                    <td class="label" width="120">Yêu cầu: </td>
                    <td> </td>
                </tr>

                <tr>
                    <td class="label" width="120">Chi tiết đơn hàng</td>
                    <td colspan="5">
						<table id="table_order_detail" width="100%" style="border: none !important;" cellpadding="0" cellspacing="0">
                        	<tr>
                            	<th class="label" style="text-align:left;">STT</th>
                                <th class="label" style="text-align:left; padding-left: 60px;">Tên sản phẩm</th>
                                <th class="label">Giá sản phẩm</th>
                                <th class="label" style="text-align:center;">Số lượng</th>
                                <th class="label">Thành tiền</th>
                            </tr>
                            <?php 
							$total_amount = 0; 
							foreach($this->data['Detail'] as $key => $value){
							$amount = $value['OrderDetail']['number_product'] * $value['Product']['price'];
							$total_amount += $amount;
                            $class = $key % 2 == 0 ? 'td_1' : 'td_2';
							 ?>
                            <tr class="<?php echo $class; ?>">
                            	<td><?php echo $key+1; ?></td>
                                <td><?php echo $value['Product']['name']; ?></td>
                                <td style="text-align:center;"><?php echo number_format($value['Product']['price']); ?></td>
                                <td style="text-align:center;"><?php echo $value['OrderDetail']['number_product']; ?></td>
                                <td style="text-align:right;"><?php echo number_format($amount); ?> VND</td>
                            </tr>
                            <?php } ?>
                            <tr>
                            	<th colspan="3" class="label" style="text-align:right; padding-right: 10px;">Tổng tiền: </th>
                                <th colspan="2" style="text-align:right; color: red;" class="label"><?php echo number_format($total_amount); ?> VND</th>
                            </tr>
                        </table>
                    </td>                   
                </tr>
                
                
                <tr>
                    <td class="label">Trạng thái:</td>
                    <td colspan="5">
					<?php 
						echo $this->Form->radio(
								'Order.status', 
								array(0=>'Chưa active', 1=>'Active'),
								array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;')		
						);
					?>
                    </td>
                </tr>
               
            </table>
            <div class="clear"></div>
        </div>
        <div class="tab-content" id="tab2">
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>order" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>