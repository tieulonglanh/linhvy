<?php ?>
<link rel="stylesheet" href="<?php echo DOMAIN ?>block/slideCarouFredSel/css/slideCarouFredSel.css">
<script type="text/javascript" language="javascript" src="<?php echo DOMAIN ?>block/slideCarouFredSel/js/jquery.carouFredSel-5.5.0-packed.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo DOMAIN ?>block/slideCarouFredSel/js/slideCarouFredSel.js"></script>
<div id="slideCaron">
    <div class="list_carousel">
        <?php $ProductSPTrangchu = $this->requestAction("Comment/ProductSPTrangchu"); ?>        
        <ul id="foo2">Product
        <?php foreach($ProductSPTrangchu as $ProductSPTrangchus){?>
            <li><a href="#"><img src="<?php echo DOMAINIMG.$ProductSPTrangchus["Product"]["images"] ?>"></a></li>
        <?php }?>                
        </ul>
        <div class="clearfix"></div>        
        <!--    <div id="pager2" class="pager"></div> cái này dùng để phân trang -->
    </div>

<a id="prev2" class="prev" href="#"><img src="<?php echo DOMAIN ?>block/slideCarouFredSel/images/muitenLeft.jpg"/></a>
<a id="next2" class="next" href="#"><img src="<?php echo DOMAIN ?>block/slideCarouFredSel/images/muitenRight.jpg"/></a>
</div>