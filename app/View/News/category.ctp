<div class="news_page">
    <div id="breadcrumb">
        <a href="<?php echo DOMAIN; ?>">Trang chủ</a> >
        <a href="#"><?php echo $category['NewsCategory']['name']; ?></a>
    </div>

    <!--<div class="news_page_title">
        Tin tức
    </div>--><!--end .news_page_title-->
    <div class="news_page_content">
        <?php if(!empty($list_news)){ foreach($list_news as $key => $value){ ?>
        <div class="news_box">
            <div class="news_box_images">
                <a href="<?php echo DOMAIN.'chi-tiet-tin/'.$value['News']['alias']; ?>" title="<?php echo $value['News']['name']; ?>">
                    <img src="<?php echo DOMAIN.'timthumb.php?src='.$value['News']['images'].'&h=100&w=140&zc=1'; ?>" alt="<?php echo $value['News']['name']; ?>" width="140" height="100" />
                </a>
            </div><!--end .news_box_images-->
            <div class="news_box_info">
                <h2 class="news_box_title">
                    <a href="<?php echo DOMAIN.'chi-tiet-tin/'.$value['News']['alias']; ?>" title="<?php echo $value['News']['name']; ?>">
                        <?php echo $value['News']['name'] ;?>
                    </a>
                </h2>
                <p class="news_box_description">
                    <?php echo $value['News']['description']; ?>
                </p>
            </div><!--end .news_box_info-->
            <div class="clear_both"></div>
        </div><!--edn .news_box-->
        <?php }} ?>
    </div><!--end .news_page_content-->
</div><!--end .news_page-->