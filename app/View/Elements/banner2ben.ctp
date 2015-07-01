<?php
$quangcao = $this->requestAction("Comment/quangcao");
foreach ($quangcao as $quangcaos) {
    if ($quangcaos["Advertisement"]["display"] == 2) {
        ?>
        <div id="divAdRight" style="DISPLAY: none; POSITION: absolute; TOP: 0px">
            <a href="#"><img src="<?php echo DOMAINIMG . $quangcaos["Advertisement"]["images"] ?>" width="125" /></a>
        </div>
    <?php }
}
?>

<?php
foreach ($quangcao as $quangcaos) {
    if ($quangcaos["Advertisement"]["display"] == 1) {
        ?>
        <div id="divAdLeft" style="DISPLAY: none; POSITION: absolute; TOP: 0px">
            <a href="#"><img src="<?php echo DOMAINIMG . $quangcaos["Advertisement"]["images"] ?>" width="125" /></a>      
        </div>
    <?php }
} ?>

<script type="text/javascript" src="block/banner2ben/js/banner.js"></script>