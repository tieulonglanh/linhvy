<?php $bth_lang = $session->read('lang'); ?>
<div class="nav_box">
<div class="nav_box_title">
    <p class="post"><?php echo $bth_lang == '1' ? 'Danh mục sản phẩm' : 'Categories'; ?></p>
</div>
<div id="nav_box_content">


                <?php $categoryproduct = $this->requestAction('/plugin/categoryproduct');
                
                  echo '<ul class="ul_nav_category">';
                ?>

                <?php foreach($categoryproduct as $categoryproduct){?>
            

                  <li>
                    <a href="<?php echo DOMAIN;?>danh-sach-san-pham/<?php echo $categoryproduct['Catproduct']['id'];?>/<?php echo  $categoryproduct['Catproduct']['name'].'.html'; ?>"><?php echo $categoryproduct['Catproduct']['name'];?></a>

                    <?php $submenuproduct = $this->
                    requestAction('/comment/submenuproduct/'.$categoryproduct['Catproduct']['id']);
                    if($submenuproduct){

                    ?>

                    <ul>

                        <?php foreach($submenuproduct as $submenuproduct){?>

                        <?php if($submenuproduct['Catproduct']['parent_id']==$categoryproduct['Catproduct']['id']){?>

                        <li>
                            <a href="<?php echo DOMAIN;?>danh-sach-san-pham/<?php echo $submenuproduct['Catproduct']['id'];?>/<?php echo $submenuproduct['Catproduct']['name'].'.html'; ?>"><?php echo $submenuproduct['Catproduct']['name'];?></a>
                        </li>

                        <?php }}?>

                    </ul>

                    <?php }?>
                    

                </li>

                <?php }?>

            </ul>
</div>
</div><!--end .nav_box-->

<?php /* ?>
<div class="sidebar-box sidebar_selloff">
    <?php
        //can dat lai gia tri mac dinh cua muc luc selloff
        $selloff = $this->requestAction('/plugin/get_selloff');
        foreach($selloff as $p)
        {
            $c = $bth_lang == '1' ? $p['Product']['content'] : $p['Product']['content_eg']; 
            $arr = explode(' ', $c);
            $buff = array();
            
            if(count($arr) > 8) 
            {
                $i = 1;
                foreach($arr as $k=>$v)
                {
                    if($k <= 8)
                    {
                        $buff[] = $v;
                    }
                }
            }
            if(count($buff)>0) $str_content = implode(' ', $buff);
            else $str_content = $c;
            
            $t = $bth_lang == '1' ? $p['Product']['title'] : $p['Product']['title_eg'];
            $arr = explode(' ', $t);
            $buff = array();
            
            if(count($arr) > 4) 
            {
                $i = 1;
                foreach($arr as $k=>$v)
                {
                    if($k <= 3)
                    {
                        $buff[] = $v;
                    }
                }
            }
            if(count($buff)>0) $str_title = implode(' ', $buff);
            else $str_title = $t;
            
            
            echo '<p><img src="' . DOMAINAD . $p['Product']['images'] . '" width="190" /></p>';
            echo '<p class="title_item">' . $str_title . '</p>';
            echo '<p>'. $str_content . '</p>';
        }
    ?>
</div>
<?php */?>
<!--Dich vu -->
<div class="nav_box">
<div class="nav_box_title">
    <p class="post"><?php echo $bth_lang == '1' ? 'Dịch vụ' : 'news'; ?></p>
</div>
<div class="nav_box_content"> 
    <ul class="ul_nav_category">
        <?php $dichvu = $this->requestAction('/comment/dichvu');
              foreach($dichvu as $dichvu): ?>
        <li>
            <p>
             
            <a href="<?php echo DOMAIN;?>tin-tuc/chi-tiet-tin/<?php echo $dichvu['News']['id'];?>/<?php echo $dichvu['News']['alias'];?>.html">
                <?php echo $bth_lang == '1' ? $dichvu['News']['title'] : $dichvu['News']['title_eg'];?>
            </a>
            </p>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
</div><!--end .nav_box-->
<!--End DV-->


<div class="nav_box">
<div class="nav_box_title">
    <p class="post"><?php echo $bth_lang == '1' ? 'Hỗ trợ trực tuyến' : 'Contact Support'; ?></p>
</div>
<div class="nav_box_content_new">
    <div class="support_info">
		<img src="<?php echo DOMAIN; ?>images/phone.png" />
        <div>
			<p style="color: #71494a; font-weight:bold;">Hot Line: </p>
			<p style="color: red;">1900 8198</p>
			<p style="color: #71494a; font-weight:bold;">Mr Hung</p>
		</div>
    </div><!--end .support_info-->
    <?php echo $this->element('plugin/plugin-help');?>
</div>
</div><!--end .nav_box-->
<?php /*?>

<div class="title-sidebar">
    <p class="post"><?php echo $bth_lang == '1' ? 'Thống kê truy cập' : 'Statistics'; ?></p>
</div>
<div class="sidebar-box">
    <?php $online = $this->requestAction('comment/count_online');  ?>
     <!--<p style="padding-top:15px;">
        
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="hit counter code" ><script  type="text/javascript" >
try {Histats.start(1,1981793,4,322,112,62,"00011001");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?1981793&101" alt="hit counter code" border="0"></a></noscript>
 </center>
      </p>-->
    <table>
        <tr>
            <td>Trực tuyến:</td>
            <td> <?php echo $online[0]; ?></td>
        </tr>
        <tr>
            <td>Trong ngày:</td>
            <td> <?php echo $online[1]; ?></td>
        </tr>
        <tr>
            <td>Truy cập:</td>
            <td> <?php echo $online[2]; ?></td>
        </tr>
    </table>
</div>
<?php */ ?>
<script type="text/javascript">
    $('#select_weblink').change(function() {
        var v = $(this).val();
        if(v != '') document.location.href = v; 
    });
</script>