<div class="content_box">
    <div class="content_box_title">
    Giỏ hàng
    </div><!--end .content_box_title-->
    <div class="content_box_detail" style="margin-top: 10px; font-size: 12px; ">
        <form action="<?php echo DOMAIN; ?>product/update_shopping_cart" method="post">
        <div style="color: red; margin: 10px;"><?php echo $this->Session->flash(); ?></div>
        <table class="tblGioHang" width="540px" border="0" cellpadding="3" cellspacing="0">
            <tbody>
            <tr>
                <th scope="col" width="25px">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col" width="80px">Đơn giá (VND)</th>
                <th scope="col" width="40px">SL</th>
                <th scope="col" width="100px">Thành tiền (VND)</th>
                <th scope="col" width="50px">Xóa</th>
            </tr>
            <?php
            $tongtien = 0;
            if(!empty($shopping_cart)){ foreach($shopping_cart as $key => $value){ ?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value['Product']['name']; ?></td>
                <td><?php echo $value['Product']['price']; ?></td>
                <td>
                    <input style="width: 30px;" type="text" name="so_luong[<?php echo $value['Product']['id']; ?>]" value="<?php echo $value['so_luong']; ?>" maxlength="2" />
                </td>
                <td><?php $thanhtien = $value['Product']['price'] * $value['so_luong'];
                    echo number_format($thanhtien);
                    $tongtien += $thanhtien;
                    ?></td>
                <td style="text-align: center;"><a style="font-weight: bold;" href="<?php echo DOMAIN.'product/delete_shopping_cart/'.$value['Product']['id']; ?>">
                        <img src="<?php echo DOMAIN; ?>admin/images/icons/cross.png" />
                </a></td>
            </tr>
            <?php } ?>
                <tr>
                    <td colspan="4" style="text-align: right; padding-right: 10px;">Tổng tiền: </td>
                    <td colspan="2" style="text-align: left;"><?php echo number_format($tongtien); ?> VND</td>
                </tr>
            <?php }else{ ?>
            <tr>
                <td colspan="6" class="tdChuaCoSanPham">Giỏ hàng của bạn chưa có sản phẩm</td>
            </tr>
            <?php } ?>
            </tbody>
        </table>

        <div id="thanhToan" style="margin-top: 10px;">
            <input type="submit" value="Cập nhật giỏ hàng" style="background: #ddd; float: left; margin-right: 10px; height: 30px; padding: 0px 10px; cursor: pointer;" />
            <p><a style="height: 30px; line-height: 30px; display: block;" href="<?php echo DOMAIN ?>"><b>TIẾP TỤC MUA HÀNG</b></a></p>
            <div class="clear"></div>
        </div>
        </form>
    </div>
    <!--form đặt hàng-->
    <script type="text/javascript">
        function validateForm() {
            var x = document.forms["contactForm"]["data[Contact][name]"].value;
            var y = document.forms["contactForm"]["data[Contact][diachi]"].value;
            var z = document.forms["contactForm"]["data[Contact][sodienthoai]"].value;
            var i = document.forms["contactForm"]["data[Contact][message]"].value;
            if (x == null || x == "") {
                alert("Bạn chưa nhập họ tên");
                return false;
            }
            if (y == null || y == "") {
                alert("Bạn chưa nhập địa chỉ");
                return false;
            }
            if (z == null || z == "") {
                alert("Bạn chưa nhập số điện thoại");
                return false;
            }
            if (i == null || i == "") {
                alert("Bạn chưa nhập nội dung");
                return false;
            }
            var a = document.forms["contactForm"]["data[Contact][email]"].value;
            var atpos = a.indexOf("@");
            var dotpos = a.lastIndexOf(".");
            if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= a.length) {
                alert("Định dạng mail không đúng");
                return false;
            }
        }
    </script>
    <link href="<?php echo DOMAIN ?>Contact/css/index.css" type="text/css" rel="stylesheet"/>
    <div id="contentRight" style="margin-top: 30px;">
    <h2><span>Liên hệ</span></h2>
    <div class="boxmain">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="content"><?php
                    $setting = $this->requestAction('/comment/setting');
                    echo $setting['Setting']['address'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <form style="height:370px;" id="contactIndexForm" name="contactForm" class="form_contact"
                          onsubmit="return validateForm();" method="post" action="">
                        <table width="100%" border="0" cellspacing="0" cellpadding="4">
                            <tr>
                                <td width="150" height="30"><span class="field">
                                <label for="Họ tên" class="styled">Họ Tên</label>
                                </span></td>
                                <td><span class="thefield">
                                <input name="name" type="text" id="name2" size="40"/>
                                <input type="hidden" name="total_amout" value="<?php echo $tongtien; ?>" />
                            </span></td>
                            </tr>
                            <tr>
                                <td height="30"><span class="field">
                                <label for="Email2" class="styled">Email</label>
                                </span></td>
                                <td><span class="thefield">
                                <input name="email" type="text" id="name4" size="40"/>
                            </span></td>
                            </tr>
                            <tr>
                                <td height="30"><span class="field">
                                <label for="Điện thoại2" class="styled">Số điện thoại</label>
                                </span></td>
                                <td><span class="thefield">
                                <input name="phone" type="text" id="name" size="40"/>
                            </span></td>
                            </tr>
                            <tr>
                                <td height="30"><span class="field">
								<label for="Địa chỉ2" class="styled">Tiêu đề</label>
                                </span></td>
                                <td><span class="thefield">
                                <input name="title" type="text" id="name3" size="40"/>
                            </span></td>
                            </tr>
                            <tr>
                                <td><span class="field">
                                <label for="Nội dung2" class="styled">Nội dung</label>
                                </span></td>
                                <td><span class="thefield">
                                <textarea name="content" cols="40" rows="8"></textarea>
                                </span></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <button type="submit" value="Gửi mail" name="save"/>
                                    Gửi Yêu Cầu Đặt Hàng
                                    </button></td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
    </div>
    </div>

</div>
</div><!--end .content_box-->
<style type="text/css">
.tr0{
	background: #f1f1f1;
}
.tr1{
	background: #f8f8f8;
}
</style>