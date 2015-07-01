<div class="content_box">
    <div class="pdhme">
        <div class="p-item">
            <div align="center" class="phimg">
                <div class="framehb imgd11 cor pn_img shadow2">
                    <div class="hbimg zoomp" style="overflow: hidden;">
                        <a href="<?php echo DOMAIN.$product['Product']['images']; ?>" class="MagicZoom" id="Zoomer" style="max-width: 265px !important; max-height: 2650px !important; position: relative; display: inline-block; text-decoration: none; outline: 0px; width: 265px;" title="">
                            <img alt="<?php echo $product['Product']['name']; ?>" src="<?php echo DOMAIN.$product['Product']['images']; ?>" style="opacity: 1;">
                            <div class="MagicZoomPup" style="z-index: 10; position: absolute; overflow: hidden; display: none; visibility: hidden; width: 110px; height: 110px; opacity: 0.5; left: 73.5px; top: 0px;">
                                <img alt="<?php echo $product['Product']['name']; ?>" src="<?php echo DOMAIN.$product['Product']['images']; ?>" style="opacity: 0.009; position: absolute; z-index: 5;">
                            </div>
                        </a>
                    </div>
                    <div class="thumb-view">
                        <a href="<?php echo DOMAIN.$product['Product']['images']; ?>" rel="zoom-id:Zoomer;" rev="<?php echo DOMAIN.$product['Product']['images']; ?>" style="outline: 0px; display: inline-block;">
                            <img alt="<?php echo $product['Product']['name']; ?>" src="<?php echo DOMAIN.$product['Product']['images']; ?>" />
                        </a>
						<?php
                        if(!empty($product['Product']['multi_images'])){
                        $multi_images = explode('|', $product['Product']['multi_images']);
                        if(!empty($multi_images)){ foreach($multi_images as $key => $value){ ?>
						<a href="<?php echo DOMAIN.$value; ?>" rel="zoom-id:Zoomer;" rev="<?php echo DOMAIN.$value; ?>" style="outline: 0px; display: inline-block;">
                            <img  src="<?php echo DOMAIN.$value; ?>" />
                        </a>
						<?php } } } ?>
                    </div>
                </div>
                <script src="<?php echo DOMAIN; ?>js/magiczoom.js" type="text/javascript"></script>
                <script type="text/javascript">
                    MagicZoom.options = {
                        'right-click' : true,
                        'disable-zoom' : false,
                        'selectors-change' : 'mouseover'
                    }
                </script>
            </div>

        </div>

        <div class="product-description">

            <div class="pd-name"><h2><?php echo $product['Product']['name']; ?></h2></div>
            <div class="pctemp d_border"> </div>
			<div class="fb_share">
			<style type="text/css">
			.addthis_button_google_plusone{
				width: 75px;
			}
			</style>
			<!-- Go to www.addthis.com/dashboard to customize your tools -->
				<div class="addthis_native_toolbox"></div>
				<!-- Go to www.addthis.com/dashboard to customize your tools -->
				<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-508c23fb033fc51e"></script>
			</div>
			<div class="pctemp" style="position: relative;">
                <span class="chudam">Mô tả sản phẩm :</span>
                <span><?php echo $product['Product']['description']; ?></span>
            </div>

            <div class="pctemp" style="position: relative;">
                <span class="chudam">Giá bán :</span>
                <span class="sub1 txt_20"><?php echo number_format($product['Product']['price']); ?> VND </span>
            </div>

            <div class="product_buy">
                <a class="btn_dat_hang" href="<?php echo DOMAIN.'Product/add_shopping_cart/'.$product['Product']['id']; ?>">Đặt mua</a>
            </div><!--end .product_buy-->

        </div>

        <div class="clear"></div>

        <div class="pcdetails">
            <div id="usual7">
                <div class="lead-sub3 usual">
                    <ul>
                        <li><a href="javascript:void(0);">Mô tả chi tiết</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div id="tab1" class="tabus" style="display: block;">
                    <div class="tabus_in" style="color: blue;">
					<?php echo $product['Product']['detail']; ?>
                    </div>
                </div>
                <div class="clear"></div>

            </div>
            <!---->
        </div>
        <script type="text/javascript">
            $("#usual7 ul").idTabs();
        </script>
    </div>
</div><!--end #content_box-->

<div class="div_box2" style="margin-top:5px;">
    <div class="div_box2_header">
        <div class="div_box2_header_left"></div>
        <h3>Sản phẩm cùng loại</h3>
    </div>
    <div class="div_box2_content" style="height:180px;">
        <div class="infiniteCarousel">
            <div class="wrapper_sanphamlist" style="overflow: hidden;">
                <ul>
                    <?php if(!empty($other_product)){foreach($other_product as $key => $value){ ?>
                        <li class="cloned">
                            <div class="div_sanpham_cungloai">
                                <div class="div_sanpham_cungloai_img">
                                    <a class="preview" src="<?php echo DOMAIN.'timthumb.php?w=250&src='.$value['Product']['images']; ?>" price="Giá: <?php echo number_format($value['Product']['price']); ?> VND" title="<?php echo $value['Product']['name']; ?>" href="<?php echo DOMAIN.'chi-tiet-san-pham/'.$value['Product']['id'].'/'.$value['Product']['alias']; ?>">
                                        <img src="<?php echo DOMAIN.'timthumb.php?src='.$value['Product']['images'].'&w=100&h=100&zc=1'; ?>" alt="<?php echo $value['Product']['name']; ?>" />
                                    </a>
                                </div>
                                <span class="span_title_product">
                                    <a href="<?php echo DOMAIN.'chi-tiet-san-pham/'.$value['Product']['id'].'/'.$value['Product']['alias']; ?>">
                                        <?php echo $value['Product']['name']; ?>
                                    </a>
                                </span>
                                <span class="span_price">Giá: <?php echo number_format($value['Product']['price']); ?> VND</span>
                            </div>
                        </li>
                    <?php } } ?>
                </ul>
            </div><a class="arrow back">&lt;</a><a class="arrow forward">&gt;</a>
        </div>

    </div>
</div>
