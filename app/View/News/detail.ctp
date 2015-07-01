<div id="breadcrumb">
    <a href="<?php echo DOMAIN; ?>">Trang chủ</a> >
    <a href="<?php echo DOMAIN; ?>tin-tuc">Tin tức</a> >
    <?php echo $news['News']['name']; ?>
</div>
<div class="post_container" style="padding: 10px;">
    <div class="post_title">
        <h2 style="font-size: 22px; text-align: center; margin-bottom: 30px;">
            <?php echo $news['News']['name']; ?>
        </h2>
    </div><!--end .post_title-->
    <div class="news_description" style="font-weight: bold; margin-top: 20px; margin-bottom: 10px; font-size: 14px;">
        <?php echo strip_tags($news['News']['description']); ?>
    </div><!--end .news_description-->
    <div class="post_detail" style="line-height: 20px;">
        <?php echo $news['News']['detail']; ?>
    </div><!--end .post_detail-->
    <div class="other_news">
        <div class="other_news_title" style="font-weight: bold; margin-top: 20px;">
            TIN LIÊN QUAN
        </div><!--end .other_news_title-->
        <ul>
            <?php if(!empty($other_news)){ foreach($other_news as $key => $value){ ?>
            <li><a href="<?php echo DOMAIN.'chi-tiet-tin/'.$value['News']['alias']; ?>" title="<?php echo $value['News']['name']; ?>"><?php echo $value['News']['name']; ?></a></li>
            <?php }}  ?>
        </ul>

    </div><!--end .other_news-->
</div><!--end .post_container-->