<?php $bth_lang = $session->read('lang') == 1 ? 'vi' : 'en'; ?>
<div id="header_menu">
<div id="header_menu_top">
    <ul class="ul_menu_top">
      <li class="active"><a href="<?php echo DOMAIN;?>"><?php echo $bth_lang == 'en' ? 'Home' : 'Trang chủ'; ?></a></li>
      <li><a href="<?php echo DOMAIN;?>gioi-thieu"><?php echo $bth_lang == 'en' ? 'About' : 'Giới thiệu'; ?></a></li>
      <li><a href="<?php echo DOMAIN;?>tin-tuc-su-kien"><?php echo $bth_lang == 'en' ? 'News' : 'Tin Tức'; ?></a></li>
      <li><a href="<?php echo DOMAIN;?>tuyen-dung"><?php echo $bth_lang == 'en' ? 'Recruitment' : 'Tuyển dụng'; ?></a></li>
      <li><a href="<?php echo DOMAIN;?>danh-sach-thanh-vien"><?php echo $bth_lang == 'en' ? 'Member' : 'Thành viên'; ?></a></li>
      <li><a href="<?php echo DOMAIN;?>doi-tac"><?php echo $bth_lang == 'en' ? 'Partners' : 'Đối tác'; ?></a></li>
    
      <li><a href="<?php echo DOMAIN;?>thu-vien-anh"><?php echo $bth_lang == 'en' ? 'Gallery' : 'Album Ảnh'; ?></a></li>
      <li><a href="<?php echo DOMAIN;?>lien-he"><?php echo $bth_lang == 'en' ? 'Contact' : 'Liên hệ'; ?></a></li>
       <div id="header_search_form">
         <form name="frm_search_form" action="<?php echo DOMAIN; ?>tim-kiem" method="post">
            <input type="text" name="search_name" placeholder="Nhập nội dung tìm kiếm" />
             <!--input type="submit" name="search_name_submit" style="display:none;" /-->
        </form>
       </div>  
     
         
    </ul>
</div>
</div>