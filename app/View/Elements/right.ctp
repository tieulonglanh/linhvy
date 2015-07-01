 <div id="navigation1"> 
                <?php /*
    $video = $this->requestAction(
            array(
                'plugin' => 'video',
                'controller' => 'video',
                'action' => 'index'
            )
    );
    echo $video; */
    ?>                 
     <div class="menu_box">
            	<div class="menu_box_title">
                	<?php echo $_SESSION['lang']=='en' ? 'Hot Products' : 'Sản phẩm bán chạy'; ?>
                </div><!--end .menu_box_title-->
                <div class="menu_box_content">
                <?php $hot_product = $this->requestAction('comment/hotProduct');
					foreach($hot_product as $hot_product){
				?>
                	<div class="hot_product">
                    	<div class="hot_product_image">
                        	<center><a href="<?php echo DOMAIN.'chi-tiet-san-pham/'.$hot_product['Product']['alias']; ?>">
                            	<img src="<?php echo $hot_product['Product']['images']; ?>"  width="65" height="65" alt="product" />
                            </a></center>
                        </div><!--end .hot_product_image-->
                        <div class="hot_product_name">
                        	<a href="<?php echo DOMAIN.'chi-tiet-san-pham/'.$hot_product['Product']['alias']; ?>"><?php echo $hot_product['Product']['name']; ?></a>
                        </div><!--end .hot_product_name-->
                          </div><!--end .hot_product-->
                <?php } ?>
                </div><!--end .menu_box_content-->
            </div><!--end .menu_box-->
     <div class="menu_box">
            	<div class="menu_box_title">
                	<?php echo $_SESSION['lang']=='en' ? 'Hot News' : 'Tin tức mới'; ?>
                </div><!--end .menu_box_title-->
                <div class="menu_box_content">
                	<?php $news = $this->requestAction('comment/newsHot'); ?>
                    <ul class="news_hot">
					<?php foreach($news as $newshot){?>
                        <li><a href="<?php echo DOMAIN.'chi-tiet-tin/'.$newshot['News']['alias']; ?>"><?php echo $_SESSION['lang']=='en' ? $newshot['News']['name_en'] : $newshot['News']['name']; ?></a></li>
                    <?php  } ?>
                    </ul>
                </div><!--end .menu_box_content-->
       </div><!--end .menu_box-->
       <div class="menu_box">
            	<div class="menu_box_title">
                	<?php echo $_SESSION['lang']=='en' ? 'WebLinks' : 'Liên kết website'; ?>
                </div><!--end .menu_box_title-->
                <div class="menu_box_content">
                
                <?php $links = $this->requestAction('comment/links');
					 ?>
                     <center>
                     <?php foreach($links as $value){ ?>
                     <div style="margin: 10px auto;">
                     <a href="<?php echo $value['Link']['link']; ?>" title="<?php echo $value['Link']['name']; ?>">
                     	<img src="<?php echo DOMAINAD; ?>timthumb.php?src=<?php echo $value['Link']['images']; ?>&h=100&w=100&zc=1"  />
                      </a>
                      </div>
                     <?php } ?>
                     </center>
                </div><!--end .menu_box_content-->
            </div><!--end .menu_box-->
            </div>     