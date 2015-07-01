<div id="breadcrumb">
    <a href="<?php echo DOMAIN; ?>">Trang chủ</a>
    <?php if(!empty($breadcrumb)){ ?> >
    <a href="<?php echo DOMAIN.$breadcrumb['alias']; ?>"><?php echo $breadcrumb['name']; ?></a>
    <?php } ?>
</div>
<div class="post_container" style="padding: 10px;">
    <div class="post_title">
        <h2 style="font-size: 15px; text-align: center;">
            <?php echo $post['Post']['name']; ?>
        </h2>
    </div><!--end .post_title-->
    <div class="post_detail">
        <?php echo $post['Post']['detail']; ?>
    </div><!--end .post_detail-->
</div><!--end .post_container-->