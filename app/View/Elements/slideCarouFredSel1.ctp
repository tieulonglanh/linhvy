<?php ?>
<link rel="stylesheet" href="<?php echo DOMAIN ?>block/slideCarouFredSel1/css/slideCarouFredSel.css">
<script type="text/javascript" language="javascript" src="<?php echo DOMAIN ?>block/slideCarouFredSel1/js/jquery.carouFredSel-5.5.0-packed.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo DOMAIN ?>block/slideCarouFredSel1/js/slideCarouFredSel.js"></script>
<div id="slideCaron1">
    <div class="list_carousel1">
        <?php
        $ProductSPNoiBat = $this->requestAction("Comment/ProductSPNoiBat");?>
        <ul id="foo1">
            <?php foreach ($ProductSPNoiBat as $ProductSPNoiBats) { ?> 
                <li><a href="#"><img src="<?php echo DOMAINIMG.$ProductSPNoiBats["Product"]["images"] ?>"></a></li>    
            <?php } ?>            
        </ul>
        <div class="clearfix"></div>        
        <!--    <div id="pager2" class="pager"></div> cái này dùng để phân trang -->
    </div>    
</div>
<a id="prev21" class="prev" href="#"><img src="<?php echo DOMAIN ?>block/slideCarouFredSel1/images/muitenLeft.jpg"/></a>
<a id="next21" class="next" href="#"><img src="<?php echo DOMAIN ?>block/slideCarouFredSel1/images/muitenRight.jpg"/></a>
