<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'contact/add', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>contact" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Thêm mới liên hệ</h2>
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
                    <td class="label" width="120">Tên liên hệ</td>
                    <td><?php echo $this->Form->input('Contact.name', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                <tr>
                    <td class="label">Email liên hệ</td>
                    <td><?php echo $this->Form->input('Contact.email', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
   				<tr>
                    <td class="label">Số điện thoại</td>
                    <td><?php echo $this->Form->input('Contact.mobile', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                
				<tr>
                    <td class="label">Fax</td>
                    <td><?php echo $this->Form->input('Contact.fax', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                
                <tr>
                    <td class="label">Công ty</td>
                    <td><?php echo $this->Form->input('Contact.company', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                
                <tr>
                    <td class="label">Tiêu đề</td>
                    <td><?php echo $this->Form->input('Contact.title', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                
                <tr>
                    <td class="label">Nội dung</td>
                    <td><?php echo $this->Form->input('Contact.content', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                
                <tr>
                    <td class="label">Trạng thái:</td>
                    <td>
					<?php 
						echo $this->Form->radio(
								'Contact.status', 
								array(0=>'Chưa active', 1=>'Active'),
								array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;', 'value'=>1)		
						);
					?>
                    </td>
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
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>contact" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>