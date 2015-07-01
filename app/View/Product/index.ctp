<div id="ctl00_MainContent_divMainContent">
<?php if(!empty($category)){ foreach($category as $c_key => $c_value){ ?>
<div class="div_box2" <?php if($c_key == 0) echo 'style="margin-top: -15px !important;"'; ?>>
<div class="div_box2_header">
    <div class="div_box2_header_left"></div>
    <h3><?php echo $c_value['ProductCategory']['name']; ?></h3>
</div>
<div class="div_box2_content" style="padding-top:10px;">
<?php if(!empty($c_value['Product']))
    foreach($c_value['Product'] as $key => $value){?>
        <div class="<?php echo $key % 2 == 0 ? 'div_detail_one_product' : 'div_detail_one_product div_chan'; ?>">
            <h2 style="font-size: 12px;"><a title="<?php echo $value['Product']['name']; ?>" href="<?php echo DOMAIN.'chi-tiet-san-pham/'.$value['Product']['id'].'/'.$value['Product']['alias']; ?>"><?php echo $value['Product']['name']; ?></a></h2>
            <div class="div_detail_one_product_img">
                <!--<a class="preview" src="<?php /*echo DOMAIN.$value['Product']['images']; */?>" price="Giá: <?php /*echo number_format($value['Product']['price']); */?> VND" title="<?php /*echo $value['Product']['name']; */?>" href="<?php /*echo DOMAIN.'chi-tiet-san-pham/'.$value['Product']['id'].'/'.$value['Product']['alias']; */?>">-->
                <a class="preview" src="<?php echo DOMAIN.'timthumb.php?w=250&src='.$value['Product']['images']; ?>" price="Giá: <?php echo number_format($value['Product']['price']); ?> VND" title="<?php echo $value['Product']['name']; ?>" href="<?php echo DOMAIN.'chi-tiet-san-pham/'.$value['Product']['id'].'/'.$value['Product']['alias']; ?>">
                    <!--<img src="<?php /*echo DOMAIN.$value['Product']['images']; */?>" alt="<?php /*echo $value['Product']['name']; */?>" />-->
                    <img src="<?php echo DOMAIN.'timthumb.php?src='.$value['Product']['images'].'&w=100&h=100&zc=1'; ?>" alt="<?php echo $value['Product']['name']; ?>" />
                </a>
            </div>
            <div class="div_detail_one_product_chitiet">
                <p class="p_dop_line"><span class="span_dop_price">Giá: <?php echo number_format($value['Product']['price']); ?> VND</span></p>
                <p class="p_dop_line p_dop_detail"><?php echo $value['Product']['description']; ?></p>
            </div>
        </div>
<?php } ?>
<div style="clear: both"></div>
</div>
</div>
<?php } } ?>
</div>