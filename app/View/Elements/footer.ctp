<?php ?>
<style>
    #footer{padding: 5px;}
    #contactInfo{width: 50%;float: left;}
    #thietKeWebBoiVtm{width: 40%; float: right; text-align: right; color: white; font-family: arial; font-weight: bold; margin: 10px;}
</style>
<div id="footer">
    <div id="contactInfo">
        <?php $setting = $this->requestAction("Comment/setting");
            echo $setting["Setting"]["contactinfo"];
        ?>
    </div>
    <div id="thietKeWebBoiVtm">Thiết kế web bởi VTM-IT</div>
</div><!--end #footer-->