<?php 
echo $this->Html->css('validationEngine.jquery');
$lang = $session->read('lang') == '1' ? 'vi' : 'en';  
?>
<script type="text/javascript" src="<?php echo DOMAIN;?>js/jquery.validationEngine.js"></script>
<script>
  $(document).ready(function(){
    $("#check_form").validationEngine();
  });
</script>
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
<form method="post" id="check_form" action="<?php echo DOMAIN; ?>contacts/send">
    <table class="guimail">
        <tr><td><?php echo $lang == 'vi' ? 'Tên' : 'Name'; ?> </td><td><input id="input" name="name" class="validate[required]" type="text"></td></tr>
        <tr><td><?php echo $lang == 'vi' ? 'Điện thoại' : 'Phone'; ?> </td><td><input id="input" type="text" class="validate[required,custom[telephone]]" name="phone"></td></tr>
        <tr><td>Email</td><td><input id="input" type="text"  class="validate[required,custom[email]]" name="email"></td></tr>
        <tr><td><?php echo $lang == 'vi' ? 'Tiêu đề' : 'Title'; ?> </td><td><input id="input" type="text" class="validate[required]" name="title"></td></tr>
        <tr><td><?php echo $lang == 'vi' ? 'Nội dung' : 'Content'; ?> </td><td><textarea name="content" cols="50" rows="10"></textarea></td></tr>
        <tr>
            <td>&nbsp;</td>
            <td><input class="button" style="color: #ffffff;" type="submit" value=" <?php echo $lang == 'vi' ? 'Gửi đi' : 'Submit'; ?>  ">&nbsp;
                <input type="reset" class="button" style="background: #ffffff;" value="<?php echo $lang == 'vi' ? 'Soạn lại' : 'Reset'; ?> ">
            </td>
        </tr>
    </table>
</form>