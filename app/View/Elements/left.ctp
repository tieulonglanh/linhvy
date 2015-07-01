	<div id="navigation">
        	<div class="nav_box_menu">
            	<div id="nav_box_menu_title">
                	<?php echo $_SESSION['lang']=='en' ? 'Product Categories' :' Danh mục sản phẩm'; ?>
                </div><!--end #nav_box_menu_title-->
                <div id="nav_box_menu_content">
                	<ul class="menu_list_parent">
                    <?php $parent_list = $this->requestAction('comment/menuleft');
						foreach($parent_list as $parent){
					?>
                    	<li><?php echo $_SESSION['lang']=='en' ? $parent['ProductCategory']['name_en'] : $parent['ProductCategory']['name']; ?>
                        <?php if(!empty($parent['children'])){
						?>
                        	<ul class="menu_list_child">
                            <?php foreach($parent['children'] as $child){?>
                            	<li><a href="<?php echo DOMAIN.'danh-sach-san-pham/'.$child['ProductCategory']['id'].'/'.$child['ProductCategory']['alias'].'.html'; ?>"><?php echo $_SESSION['lang']=='en' ? $child['ProductCategory']['name_en'] : $child['ProductCategory']['name']; ?></a></li>
                           	<?php  } ?>
                            </ul>
                        <?php }?>
                        </li>
                   	<?php } ?>	
                    </ul>
                </div><!--end #nav_box_menu_content-->
            </div><!--end .nav_box_menu-->
             <div class="menu_box">
            	<div class="menu_box_title">
                	<?php echo $_SESSION['lang']=='en' ? 'Search' : 'Tra cứu sản phẩm'; ?>
                </div><!--end .menu_box_title-->
                <div class="menu_box_content">
                  <form name="frm_search_advance" action="<?php echo DOMAIN; ?>product/product/advance_search" method="post">
                  	<select name="gia">
                    	<option value="">Chọn mức giá</option>
                    </select>
                    <input type="submit" name="search_submit" value="TRA CỨU" id="btn_tra_cuu" />
                  </form>
                  <div class="clear"></div>
                </div><!--end #nav_box_menu_content-->
            </div><!--end .nav_box_menu-->
            <div class="menu_box">
            	<div class="menu_box_title">
                	<?php echo $_SESSION['lang']=='en' ? 'Online Support' : 'Hỗ trợ trực tuyến'; ?>
                </div><!--end .menu_box_title-->
                <div class="menu_box_content">
                	<div id="support_phone">
                            <?php $setting = $this->requestAction('comment/setting'); ?>
                    	Hot line: <?php echo $setting['Setting']['telephone']; ?>
                    </div><!--end #support_phone-->
                    <div id="support_mail">
                    	Email: <?php echo $setting['Setting']['email']; ?>
                       
                    </div><!--end #support_mail-->
                	<center>
                	<?php $support = $this->requestAction('comment/Support'); 
						foreach($support as $support){
					?>
                    <a href="ymsgr:sendim?<?php echo $support['Support']['yahoo']; ?>">
						<img border="0" src="http://mail.opi.yahoo.com/online?u=<?php echo $support['Support']['yahoo']; ?>&amp;m=g&amp;t=1" width="64px" height="16px" title="<?php echo $support['Support']['name']; ?>">
</a>
                     <?php } ?>
                     </center>
                </div><!--end .menu_box_content-->
            </div><!--end .menu_box-->
            
            <div class="menu_box">
            	<div class="menu_box_title">
                	<?php echo $_SESSION['lang']=='en' ? 'Facebook' : 'Facebook'; ?>
                </div><!--end .menu_box_title-->
                <div class="menu_box_content">
                    <div class="defaultContent TextHTML-content">
       
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script><div class="fb-like-box" data-header="false" data-href="https://www.facebook.com/ftuhanoi.aiesec" data-show-faces="true" data-stream="false" data-width="208">
	 </div></div>

                </div><!--end .menu_box_content-->
            </div><!--end .menu_box-->
                
            <?php /*?>
            
           
            
            
            <!--div> <?php $advertisements = $this->requestAction('comment/quangcao'); 
            foreach($advertisements as $quangcao){?> 
            <img src="<?php echo $quangcao['Advertisement']['images']; ?>"  width="210" height="500" alt="" />
                    <?php } ?>         
		</div-->
        <?php */ ?>
        </div><!--end #navigation-->