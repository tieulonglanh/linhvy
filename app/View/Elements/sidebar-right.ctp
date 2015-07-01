
               <style type="text/css" media="screen">
			body { font: 0.6em Arial, sans-serif; }
			.menu_right_tab { padding: 0; clear: both;list-style: none; }
			.menu_right_tab li { display: inline; list-style: none;}
			.menu_right_tab li a { background: #ccf; padding: 5px; float:left; border-right: 1px solid #ccf; border-bottom: none; text-decoration: none; color: #000; font-weight: bold;}
			.menu_right_tab li.active a { background: #eef; }
			.content { float: left; clear: both; border: 1px solid #ccf; border-top: none; border-left: none; background: #eef; padding: 3px 3px 5px; width: 200px; }
		</style>
          <ul id="menu_right_tab" class="menu_right_tab">
			<li class="active"><a href="<?php echo DOMAIN;?>tin-tuc/">Tin xem nhiều</a></li>
			<li><a href="#">Tin nổi bật</a></li>
			
		</ul>
		<div id="description" class="content">
			<div class="nav_box">
	
                        <div class="nav_box_content_new">
                                      <ul class="ul_nav_news">
                            <?php 
                                   $tintucnoibat = $this->requestAction('/comment/tintucnoibat');
                                        foreach($tintucnoibat as $tintucnoibat){
                                ?>
                            <li>
                             <!--<a href="<?php echo DOMAIN;?>tin-tuc/chi-tiet-tin/<?php echo $tintucnoibat['News']['id'];?>/<?php echo $tintucnoibat['News']['alias'];?>.html"><img src="<?php echo DOMAINAD;?><?php echo $tintucnoibat['News']['images'];?>" /></a>-->
                             <a href="<?php echo DOMAIN;?>tin-tuc/chi-tiet-tin/<?php echo $tintucnoibat['News']['id'];?>/<?php echo $tintucnoibat['News']['alias'];?>.html"><?php echo $tintucnoibat['News']['title'];?></a>
                            </li>
                             <?php }?>
                          </ul>
                        </div><!--end .nav_box_content_new-->
                      </div><!--end .nav_box-->
		</div>
		<div id="usage" class="content">
			<div class="nav_box">
	
                        <div class="nav_box_content_new">
                                      <ul class="ul_nav_news">
                            <?php 
                                   $tinxemnhieu = $this->requestAction('/comment/tinxemnhieu');
                                        foreach($tinxemnhieu as $tinxemnhieu){
                                ?>
                            <li>
                             <!--<a href="<?php echo DOMAIN;?>tin-tuc/chi-tiet-tin/<?php echo $tinxemnhieu['News']['id'];?>/<?php echo $tinxemnhieu['News']['alias'];?>.html"><img src="<?php echo DOMAINAD;?><?php echo $tinxemnhieu['News']['images'];?>" /></a>-->
                             <a href="<?php echo DOMAIN;?>tin-tuc/chi-tiet-tin/<?php echo $tinxemnhieu['News']['id'];?>/<?php echo $tinxemnhieu['News']['alias'];?>.html"><?php echo $tinxemnhieu['News']['title'];?></a>
                            </li>
                             <?php }?>
                          </ul>
                        </div><!--end .nav_box_content_new-->
                      </div><!--end .nav_box-->
		</div>

		
		
		
		<script src="js/jquery.tabify.source.js" type="text/javascript" charset="utf-8"></script>		
		<script src="js/js1.js" type="text/javascript" charset="utf-8"></script>
                <script type="text/javascript"> js1.noConflict(); </script>
		<script src="js/jquery.tabify.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			// <![CDATA[
				
			$(document).ready(function () {
				$('#menu').tabify();
				$('#menu2').tabify();
			});
					
			// ]]>
		</script>
?>