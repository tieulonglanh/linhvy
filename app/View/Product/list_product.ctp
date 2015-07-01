<div class="div_box2">
    <div class="div_box2_header">
        <div class="div_box2_header_left"></div>
        <h3>Sản phẩm</h3>
    </div>
    <div class="div_box2_content" style="padding-top:10px;">
        <?php if(!empty($list_product))
            foreach($list_product as $key => $value){?>
                <div class="<?php echo $key % 2 == 0 ? 'div_detail_one_product' : 'div_detail_one_product div_chan'; ?>">
                    <h1><a title="<?php echo $value['Product']['name']; ?>" href="<?php echo DOMAIN.'chi-tiet-san-pham/'.$value['Product']['id'].'/'.$value['Product']['alias']; ?>"><?php echo $value['Product']['name']; ?></a></h1>
                    <div class="div_detail_one_product_img">
                        <!--<a class="preview" src="<?php /*echo DOMAIN.$value['Product']['images']; */?>" price="Giá: <?php /*echo number_format($value['Product']['price']); */?> VND" title="<?php /*echo $value['Product']['name']; */?>" href="<?php /*echo DOMAIN.'chi-tiet-san-pham/'.$value['Product']['id'].'/'.$value['Product']['alias']; */?>">-->
                        <a class="preview" src="<?php echo DOMAIN.'timthumb.php?w=250&src='.$value['Product']['images']; ?>" price="Giá: <?php echo number_format($value['Product']['price']); ?> VND" title="<?php echo $value['Product']['name']; ?>" href="<?php echo DOMAIN.'chi-tiet-san-pham/'.$value['Product']['id'].'/'.$value['Product']['alias']; ?>">
                            <!--<img src="<?php /*echo DOMAIN.$value['Product']['images']; */?>" alt="<?php /*echo $value['Product']['name']; */?>" />-->
                            <img src="<?php echo DOMAIN.'timthumb.php?src='.$value['Product']['images'].'&w=100&zc=1'; ?>" alt="<?php echo $value['Product']['name']; ?>" />
                        </a>
                    </div>
                    <div class="div_detail_one_product_chitiet">
                        <p class="p_dop_line"><span class="span_dop_price">Giá: <?php echo number_format($value['Product']['price']); ?> VND</span></p>
                        <p class="p_dop_line p_dop_detail"><?php echo $value['Product']['description']; ?></p>
                    </div>
                </div>
            <?php } ?>
        <div style="clear: both"></div>
		
		<div class="pagination" style="float: right; margin-right: 10px;">
			<?php
			if($this->Paginator->counter('{:pages}')>1){
				echo $this->Paginator->first('« Đầu ', null, null, array('class' => 'disabled'));
				echo $this->Paginator->prev('‹ Trước ', null, null, array('class' => 'disabled'));
				echo $this->Paginator->numbers(array('separator'=>false))." ";
				echo $this->Paginator->next('Tiếp ›', null, null, array('class' => 'disabled'));
				echo $this->Paginator->last('Cuối »', null, null, array('class' => 'disabled'));
			}
			?>
		</div>
	
	<div style="clear: both"></div>
	
    </div>
</div>
<style type="text/css">
.pagination{
	margin-top: 15px;
	margin-bottom: 15px;
}
.pagination a {
	margin: 0 5px 0 0;
	padding: 3px 6px;
}
.pagination span a {
	border: 1px solid #ddd;
	border-radius: 4px 4px 4px 4px;
}
.pagination .next {
	border-radius: 0px;
	border:none;
	color: #57A000;
	text-decoration: none;
}
.pagination .current {
	background: #469400 url('http://phukiensonla.com/admin/images/bg-button-green.gif') top left repeat-x !important;
	border-color: #459300 !important;
	color: #fff !important;
	border: 1px solid #ddd;
	margin: 0 5px 0 0;
	padding: 3px 6px;
	border-radius: 4px 4px 4px 4px;
}
.pagination .current:hover {
	text-decoration: underline;
	border: 1px solid #DDDDDD;
}
</style>