<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'User/edit', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>user" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Sửa tài khoản User</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <h3></h3>
        <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table width="100%" class="input">
            	<tr>
                	<td colspan="2" class="session_flash"><?php echo $this->Session->flash(); ?></td>
                </tr>
                <tr>
                    <td class="label" width="120">Tên đăng nhập</td>
                    <td><?php echo $this->Form->input('User.username', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                <tr>
                    <td class="label">Tên đầy đủ</td>
                    <td><?php echo $this->Form->input('User.fullname', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                <tr>
                    <td class="label">Mật khẩu</td>
                    <td><?php echo $this->Form->input('User.password', array('type'=>'password', 'label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>    
                <tr>
                    <td class="label">Xác nhận mật khẩu</td>
                    <td><?php echo $this->Form->input('User.repassword', array('type'=>'password', 'label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                
                <tr>
                    <td class="label">Trang thái:</td>
                    <td>
					<?php 
						echo $this->Form->radio(
								'User.status', 
								array(0=>'Chưa active', 1=>'Active'),
								array('legend'=>false, 'style'=>'float: left; cursor: pointer;', 'class'=>'radio_label')		
						);
					?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Hình ảnh đại diện:</td>
                    <td>
                    	<div id="images_chose">
                        	<img src="/admin/timthumb.php?src=<?php echo $this->data['User']['avatar'];?>&amp;h=100&amp;w=100&amp;zc=1" />
                        </div><!--end #images_chose-->
                        <?php echo $this->Form->input('User.avatar',array('label'=>false, 'class'=>'text-input image-input datepicker','id' => 'xFilePath','maxlength'=>'255', 'style'=>'margin-left: 20px;'));?>
                        <input type="button" value="Chọn ảnh" onclick="BrowseServer();" class="button" style="margin-left: 20px;" />
                    </td>
                </tr>
                <tr>
                	<td colspan="2"><?php echo $this->Form->input('User.id',array('type'=>'hidden')); ?></td>
                </tr>
            </table>
            <div class="clear"></div>
        </div>
        <div class="tab-content" id="tab2">
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>user" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>