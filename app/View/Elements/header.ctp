<div id="header">
    <img id="logoHeader" src="<?php echo DOMAIN ?>images/logo.jpg" alt="">
    <ul id="menuTop">
        <li><a href="<?php echo DOMAIN ?>">Trang chủ</a></li>
        <li><img src="<?php echo DOMAIN ?>images/nganMenuTop.png" alt=""></li>
        <?php
         $menuTop=$this->requestAction("Comment/menuTop");
         foreach($menuTop as $menuTop){?>
            <li><a href="<?php echo DOMAIN.'tin-tuc/'.$menuTop['Catalogue']['alias'] ?>"><?php echo $menuTop["Catalogue"]["name"] ?></a></li>
            <li><img src="<?php echo DOMAIN ?>images/nganMenuTop.png" alt=""></li>
        <?php }?>
        <li><a href="<?php echo DOMAIN.'lien-he' ?>">Liên hệ</a></li>

        <form id="search" action="<?php echo DOMAIN.'tim-kiem' ?>" method="POST">
            <input type="text" name="search"/>
        </form>
    </ul>
    <div class="clear"></div>
</div>