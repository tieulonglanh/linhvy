<div id="main">
    <h2 class="style_h2">CẬP NHẬT SỐ LƯỢNG</h2>
    <div style="margin-top:20px; margin-left:20px;">
		<?php  
         $gh3= (array)$_SESSION['giohang'];
        // pr($product);die;
         $count=count($gh3);
          for($i=0;$i<$count;$i++)
                 if($gh3[$i]['id']==$id)
                { ?>
                       <form method="post" action="<?php echo DOMAIN; ?>listproducts/updateshoping/<?php echo $gh3[$i]['id'];?>">                         
                            <table cellpadding="0" cellspacing="0" border="1">
                                <tr>
                                    <td   style="font-weight:bold;" width="150px;">Tên sản phẩm:</td>
                                     <td width="100px;"><?php echo $name?></td>
                                </tr>
                            <tr height="40px"><td style="font-weight:bold;">Số lượng</td>
                                <td><input name="sl" value="<?php echo $gh3[$i]['sl'];?>" /></td>
                            </tr>
                            <tr height="40px">
                                <td colspan="6">
                                <input type="submit" value="Update" />
                                </td>
                            </tr>
                </table></form>
        <?php } ?>
    </div>
</div>