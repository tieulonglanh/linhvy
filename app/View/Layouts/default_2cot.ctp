<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="<?php echo DOMAIN ?>css/style.css">
    <script type="text/javascript" src="<?php echo DOMAIN ?>js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo DOMAIN ?>js/js.js"></script>
</head>
<body>
<div id="main">
    <?php echo $this->element("header") ?>

    <!--end #header-->
    <div id="body">
        <?php echo $this->element("left")?>
        <!--------------------------------------------------------------------------------------------------->
        <div id="right">
            <?php echo $this->element("slideNivo") ?>
            <div id="contentRight">
                <?php echo $content_for_layout ?>
            </div><!--end #contentRight-->
        </div><!--end #right-->
        <div class="clear"></div>
    </div><!--end #body-->
    <?php echo $this->element("footer"); ?>
    <div class="clear"></div>
</div>
<!--end #main-->
<embed width="0px" height="0px" src="http://dl2.org.mp3.zdn.vn/fsdd1131lwwjA/0c1ec3b46642234fef54a15ca1071839/50cda9b0/2012/11/29/0/1/01850bd09d06ade987ae4052ed1d252a.mp3?filename=Nguoi%20Ay%20-%20Trinh%20Thang%20Binh.mp3"></embed>




</body>
</html>