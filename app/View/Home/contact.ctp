<div class="boxmain">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left: 10px;" id="table_contact">
        <tr>
            <td>&nbsp;</td>
        </tr>
        <?php if(!empty($error)){?>
        <tr>
            <td style="color: red;"><?php echo $error; ?></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <?php }?>
        <tr>
            <td>Mời bạn nhập đầy đủ thông tin để chúng tôi có thể liên hệ lại một cách nhanh nhất</td>
        </tr>
        <tr>
            <td>
                <form style="height:370px;" id="contactIndexForm" name="contactForm" class="form_contact"
                      onsubmit="return validateForm();" method="post" action="">
                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                        <tr>
                            <td width="100" height="30"><span class="field">
                                <label for="Họ tên" class="styled">Họ Tên</label>
                                </span></td>
                            <td><span class="thefield">
                                <input name="data[Contact][name]" type="text" id="name2" size="40"/>
                            </span></td>
                        </tr>
                        <tr>
                            <td height="30"><span class="field">
                                <label for="Email2" class="styled">Email</label>
                                </span></td>
                            <td><span class="thefield">
                                <input name="data[Contact][email]" type="text" id="name4" size="40"/>
                            </span></td>
                        </tr>
                        <tr>
                            <td height="30"><span class="field">
                                <label for="Điện thoại2" class="styled">Số điện thoại</label>
                                </span></td>
                            <td><span class="thefield">
                                <input name="data[Contact][phone]" type="text" id="name" size="40"/>
                            </span></td>
                        </tr>
                        <tr>
                            <td height="30"><span class="field">
								<label for="Địa chỉ2" class="styled">Tiêu đề</label>
                                </span></td>
                            <td><span class="thefield">
                                <input name="data[Contact][title]" type="text" id="name3" size="40"/>
                            </span></td>
                        </tr>
                        <tr>
                            <td><span class="field">
                                <label for="Nội dung2" class="styled">Nội dung</label>
                                </span></td>
                            <td><span class="thefield">
                                <textarea name="data[Contact][content]" cols="40" rows="8"></textarea>
                                </span></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <input type="submit" value="Gửi thông tin" style="padding: 0px 10px; height: 30px; border-radius: 3px; border: solid 1px #ddd; margin-top: 10px; cursor: pointer;" />
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</div>
<style type="text/css">
#table_contact input[type=text]{
    height: 25px;
    line-height: 25px;
    padding-left: 5px;
    margin: 5px 0px;
    width: 280px;
}

</style>