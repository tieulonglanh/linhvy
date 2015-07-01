<?php ?>
<link rel="stylesheet" href="<?php echo DOMAIN ?>block/slideCarouFredSel2/css/slideCarouFredSel.css">
<script type="text/javascript" language="javascript" src="<?php echo DOMAIN ?>block/slideCarouFredSel2/js/jquery.carouFredSel-5.5.0-packed.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo DOMAIN ?>block/slideCarouFredSel2/js/slideCarouFredSel.js"></script>
<div id="slideCaron2">
    <div class="list_carousel2">
        <?php $links = $this->requestAction("Comment/links");?>
        <ul id="foo22">
            <?php foreach($links as $link){?>
                <li><a href="<?php echo $link["Link"]["link"]?>"><img src="<?php echo DOMAINIMG.$link["Link"]["images"]; ?>"></a></li>
            <?php } ?>            
        </ul>
        <div class="clearfix"></div>        
        <!--    <div id="pager2" class="pager"></div> cái này dùng để phân trang -->
    </div>

<!--<a id="prev22" class="prev" href="#"><img src="<?php echo DOMAIN ?>block/slideCarouFredSel2/images/muitenLeft.jpg"/></a>
<a id="next22" class="next" href="#"><img src="<?php echo DOMAIN ?>block/slideCarouFredSel2/images/muitenRight.jpg"/></a>-->
</div>