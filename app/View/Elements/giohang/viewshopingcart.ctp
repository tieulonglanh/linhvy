 <style>
.shoping {
	border-collapse:collapse;
}
.text-main table tr td{
	border:1px solid #DDDDDD;
	text-align:center;
	}
</style>

<div id="body">
    <div id="content-main"> 
        <div class="list-news">
          <div class="content-main-title">
             <p>Sản phẩm trong giỏ hàng</p>
           </div>
          <div class="gird-content-main">
              <div class="list-text">
                   <div class="detail">
                   <table class="shoping" border="1" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="100">Hình ảnh</td>
                    <td width="200">Tên sản phẩm</td>
                    <td width="100">Số lượng</td>
                    <td width="100">Giá</td>
                    <td width="100">Thành tiền</td>
                    <td width="100">Xử lý</td>
                </tr>
                <?php $total=0; $i=0; foreach($shopingcart as $key=>$product) {?>
                <tr>       
                    <td><img width="100" height="100" src="<?php echo $product['images']; ?>" /></td>
                    <td><?php echo $product['name']; ?></td>
                    <td>
                    <form name="view<?php echo $i; ?>" action="<?php echo DOMAIN;?>products/updateshopingcart/<?php echo $key;?>" method="post">
                    <input style="width:50px;" type="text" name="soluong" value="<?php echo $product['sl']; ?>" />
                    </form>
                    </td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['total']; ?></td>
                    <td>
                    <input onclick="document.view<?php echo $i; ?>.submit();"  type="button" value="Sửa" />
                    <a href="<?php echo DOMAIN;?>products/deleteshopingcart/<?php echo $key;?>"><input type="button" value=" Xoá " /></a>
                    </td>        
                </tr>
                <?php $total +=$product['total']; $i++; } ?>   
            </table>
                     <div style="float:left; padding-top:15px; padding-right:15px;">Tổng tiên phải thanh toán : <?php echo $total;?> </div>
                    <div style="float:left; padding-top:15px; padding-right:20px;"><a href="<?php echo DOMAIN?>products/index"><input type="button" value="Tiếp tục mua" /></a></div>
                    <div style="float:left; padding-top:15px;"><a href="<?php echo DOMAIN?>lien-he-mua-hang"><input type="button" value="Hoàn tất" /></a></div>
                   </div>
                </div>
          </div>
        </div>
   </div>
</div>
