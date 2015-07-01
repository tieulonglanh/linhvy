 <div id="body">
    <div id="content-main"> 
        <div class="list-news">
          <div class="content-main-title">
             <p>GIỎ HÀNG MÀ BẠN ĐỊNH MUA</p>
           </div>
          <div class="gird-content-main">
              <div class="list-text">
                   <div class="detail">
                   <div id="maincontent">
                            <table style="margin-top:20PX;" cellpadding="0" cellspacing="0" border="1">
                            <tr height="30px" style="font-weight:bold;">
                                <td width="150px" align="center">Ảnh</td>
                                <td width="250px" align="center">Tên sản phẩm</td>
                                <td width="100px" align="center">Giá</td>
                                <td width="100px" align="center">Số lượng</td>
                                <td width="100px;" align="center">Thành tiền</td>
                            </tr>
                            <?php
                            if(isset($_SESSION['giohang']))
                            {$gh2= $_SESSION['giohang'];
                            $count2=count($gh2);
                            for($i=0;$i<$count2;$i++)
                            { // pr($gh2[$i]['id']);die;?>
                            <tr height="30px">
                                <td align="center">
                                    <?php  $id_pro=$this->requestAction('/comment/id_product/'.$gh2[$i]['id']); ?>                   
                               <?Php  if($id_pro['Product']['images']!='') {?>				 
                                <img style="float:left; width:50px; height:50px;" alt="<?php echo $id_pro['Product']['title'];?>" src="<?php echo DOMAINAD?><?php echo $id_pro['Product']['images'];?>" width="348" height="268" />
                                <?php }?></td>
                                <td align="center"><?php echo $id_pro['Product']['title'];?></td>
                                <td align="center"><?php echo $id_pro['Product']['price'];?></td>			
                                <td align="center">                                   
                                      <?php echo $gh2[$i]['sl']; ?>                                     
                                </td>
                                <td align="center"><?php echo $id_pro['Product']['price']*$gh2[$i]['sl'];?></td>
                                <td>  <a  style="text-decoration:underline;" href="<?php echo DOMAIN;?>/listproducts/updateshoping/<?php echo $gh2[$i]['id'];?>"><span>Sửa</span></a>  </td>	
                                <td align="center"><a style="text-decoration:underline;"  href="<?php echo DOMAIN;?>/listproducts/removeshoping/<?php echo $gh2[$i]['id'];?>"><span>Xóa</span></a></td>
                            </tr>
                            <?php }}?>
                </table>
                    <center>
                        <a style="color:#F00; text-decoration:underline;" href="<?php echo DOMAIN;?>/listproducts/send"><span>Click vào đây để gửi đơn hàng</span></span></a>
                    </center>
                 </div>
                   </div>
                </div>
          </div>
        </div>
   </div>
</div>