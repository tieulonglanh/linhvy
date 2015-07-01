<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'setting', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>home" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Cấu hình</h2>
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
        	<div class="session_flash"><?php echo $this->Session->flash(); ?></div>
            <table width="100%" class="input">
            	<tr>
                    <td width="120" class="label">Tên công ty:</td>
                    <td> <?php echo $this->Form->input('Setting.name', array('label' => '', 'class' => 'text-input medium-input')); ?> 
                    	<input name="data[Setting][id]" type="hidden" id="data[Setting][id]" value="1">
                    </td>
                </tr>
                <tr>
                	<td class="label">Tiêu đề website:</td>
                	<td> <?php echo $this->Form->input('Setting.title', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                <tr>
                    <td class="label">Địa chỉ:</td>
                    <td>
                        <?php
                            $CKEditor = new CKEditor();
                            $CKEditor->returnOutput = true;
                            $CKEditor->config['width'] = '98%';
                            $CKEditor->config['height'] = '300';
                            CKFinder::SetupCKEditor( $CKEditor ) ;

                            $initialValue = $this->data['Setting']['address'];
                            echo $CKEditor->editor("data[Setting][address]", $initialValue, "");
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Điện thoại:</td>
                    <td> <?php echo $this->Form->input('Setting.telephone', array('label' => '', 'class' => 'text-input medium-input')); ?> </td>
                </tr>
                <tr>
                    <td class="label">Hotline:</td>
                    <td> <?php echo $this->Form->input('Setting.hotline', array('label' => '', 'class' => 'text-input medium-input')); ?> </td>
                </tr>
                <tr>
                    <td class="label">Email:</td>
                    <td> <?php echo $this->Form->input('Setting.email', array('label' => '', 'class' => 'text-input medium-input')); ?> </td>
                </tr>
                <tr>
                    <td class="label">Link website:</td>
                    <td> <?php echo $this->Form->input('Setting.url', array('label' => '', 'class' => 'text-input medium-input')); ?> </td>
                </tr>
                <tr>
                	<td class="label">Footer</td>
                	<td>
                        <?php
                            $CKEditor = new CKEditor();
                            $CKEditor->returnOutput = true;
                            $CKEditor->basePath = DOMAINAD . "js/ckeditor";
                            $CKEditor->config['width'] = '98%';
                            $CKEditor->config['height'] = '300';

                            $initialValue = $this->data['Setting']['contactinfo'];
                            echo $CKEditor->editor("data[Setting][contactinfo]", $initialValue, "");
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
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>home" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>