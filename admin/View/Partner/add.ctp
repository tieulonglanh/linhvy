<?php echo $this->Form->create(null, array('url' => DOMAINAD .'partner/add', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>partner" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Thêm mới Partner</h2>
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
                    <td class="label" width="120">Tên đối tác</td>
                    <td><?php echo $this->Form->input('Partner.name', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                <tr>
                    <td class="label">Tên tiếng anh</td>
                    <td><?php echo $this->Form->input('Partner.name_en', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
   				<tr>
                    <td class="label">Địa chỉ</td>
                    <td><?php echo $this->Form->input('Partner.address', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                
                <tr>
                    <td class="label">Số điện thoại</td>
                    <td><?php echo $this->Form->input('Partner.phone', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                
                
                
                <tr>
                    <td class="label">Trang thái:</td>
                    <td>
					<?php 
						echo $this->Form->radio(
								'Partner.status', 
								array(0=>'Chưa active', 1=>'Active'),
								array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;', 'value'=>1)		
						);
					?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Hình ảnh:</td>
                    <td>
                    	<div id="images_chose">
                        	<?php if(!empty($this->data['Partner']['images'])){?>
                            <img src="/admin/timthumb.php?src=<?php echo $this->data['Partner']['images'];?>&amp;h=100&amp;w=100&amp;zc=1" />
							<?php } ?>	
                        </div><!--end #images_chose-->
                        <?php echo $this->Form->input('Partner.images',array('label'=>false, 'class'=>'text-input image-input datepicker','id' => 'xFilePath','maxlength'=>'255', 'style'=>'margin-left: 20px;'));?>
                        <input type="button" value="Chọn ảnh" onclick="BrowseServer();" class="button" style="margin-left: 20px;" />
                    </td>
                </tr>
                
                
                <tr>
                    <td class="label">Mô tả đối tác</td>
                    <td>
                    	<?php
                            $CKEditor = new CKEditor();
                            $CKEditor->returnOutput = true;
							$CKEditor->basePath = DOMAINAD . "js/ckeditor";
							$CKEditor->config['width'] = '98%';
							$CKEditor->config['height'] = '200';
	
							CKFinder::SetupCKEditor( $CKEditor ) ;
							
							$CKEditor->config['toolbar'] = array(
                                                        array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike' ),
                                                        array( 'Image', 'Link', 'Unlink', 'Anchor' )
                                                    );
							
							$initialValue = empty($this->data['Partner']['description']) ? '' : $this->data['Partner']['description'];
							echo $CKEditor->editor("data[Partner][description]", $initialValue, "");
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td class="label">Chi tiết đối tác</td>
                    <td>
                    	<?php
                            $CKEditor = new CKEditor();
                            $CKEditor->returnOutput = true;
							$CKEditor->basePath = DOMAINAD . "js/ckeditor";
							$CKEditor->config['width'] = '98%';
							$CKEditor->config['height'] = '300';
	
							CKFinder::SetupCKEditor( $CKEditor ) ;
							
							$initialValue = empty($this->data['Partner']['detail']) ? '' : $this->data['Partner']['detail'];
							echo $CKEditor->editor("data[Partner][detail]", $initialValue, "");
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
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>partner" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>