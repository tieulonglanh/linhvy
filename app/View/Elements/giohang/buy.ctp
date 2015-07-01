<?php ?>
 <style>
.shoping {
	border-collapse:collapse;
}
.shoping tr td{
	border:1px solid #DDDDDD;
	line-height:25px;
	}
</style>
 <style>
    #input{
		width:250px;
		border: 1px solid #C2C2C2;
		height:22px;
		}
   .guimail tr td{
	   padding-top:10px;
	   padding-right:20px;
	   }
	.guimail textarea{
		border: 1px solid #C2C2C2;
		}
</style>
<div id="body">
    <div id="content-main"> 
        <div class="list-news">
          <div class="content-main-title">
             <p>Liên hệ mua hàng</p>
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
                </tr>
                <?php $total=0; $i=0; foreach($shopingcart as $key=>$product) {?>
                <tr>       
                    <td><img width="70" src="<?php echo $product['images']; ?>" /></td>
                    <td><?php echo $product['name']; ?></td>
                    <td>
                    <form name="view<?php echo $i; ?>" action="<?php echo DOMAIN;?>products/updateshopingcart/<?php echo $key;?>" method="post">
                    <input style="width:50px;" type="text" name="soluong" value="<?php echo $product['sl']; ?>" />
                    </form>
                    </td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['total']; ?></td>
                </tr>
                <?php $total +=$product['total']; $i++; } ?>   
            </table>
                      <div style="margin-top:15px;">Tổng tiền cần thanh toán : <?php echo $total;?>
                         <h3>Thông tin khách hàng</h3>
                        <hr width="100%" color="#666666" size="2" /><br />
                        <form name="myForm" id="check_form" onsubmit="return check()" method="post" action="<?php echo DOMAIN; ?>contacts/dathang">
                        <input class="contacts" type="hidden" value="<?php echo $product['images']; ?>" name="images">
                        <input class="contacts" type="hidden" value="<?php echo $product['name']; ?>" name="product_name">
                        <input class="contacts" type="hidden" value="<?php echo $product['sl']; ?>" name="product_sl">
                        <input class="contacts" type="hidden" value="<?php echo $product['price']; ?>" name="price">
                        <input class="contacts" type="hidden" value="<?php echo $product['total']; ?>" name="total">
                        <table class="guimail">
                        <tr><td>Tên bạn </td><td><input id="input" class="validate[required] contacts" name="name"  type="text"></td></tr>
                        <tr><td>Email</td><td><input id="input" class="validate[required,custom[email]] contacts" type="text" name="email"></td></tr>
                        <tr><td>Điện thoại</td><td><input id="input" class="validate[required,custom[telephone]] contacts" type="text" name="phone"></td></tr>
                        <tr><td>Tiêu đề</td><td><input id="input" class="validate[required] contacts" type="text" name="title"></td></tr>
                        <tr><td>Nội dung</td><td><textarea name="content" cols="40" rows="10"></textarea></td></tr>
                        <tr><td></td><td><input type="submit" value=" Gửi đi ">&nbsp;<input type="reset" value=" Soạn lại "></td></tr>
                        </table>
                        </form>
                      </div>
                   </div>
                </div>
          </div>
        </div>
   </div>
</div>
