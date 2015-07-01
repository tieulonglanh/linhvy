<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'advertisement/add', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>advertisement" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Thêm mới Quảng cáo</h2>
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
                    <td class="label" width="120">Tên quảng cáo</td>
                    <td><?php echo $this->Form->input('Advertisement.name', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                <tr>
                    <td class="label">Tên tiếng anh</td>
                    <td><?php echo $this->Form->input('Advertisement.name_en', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
   				<tr>
                    <td class="label">Link</td>
                    <td><?php echo $this->Form->input('Advertisement.link', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
				<tr>
                    <td class="label">Sắp xếp</td>
                    <td><?php echo $this->Form->input('Advertisement.sort_order', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                
                <tr>
                    <td class="label">Vị trí</td>
                    <td>
						<?php 
						$select_option = array(
							'1'=>'Quảng cáo trái',
							'2'=>'Quảng cáo phải', 
							'3'=>'Quảng cáo top',
							'4'=>'Quảng cáo bottom'
						);
						echo $this->Form->select('Advertisement.position', $select_option, array('label' => '', 'style'=>'margin-left: 20px;')); ?>
                  	</td>
               	</tr>
                
                
                <tr>
                    <td class="label">Trang thái:</td>
                    <td>
					<?php 
						echo $this->Form->radio(
								'Advertisement.status', 
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
                        	<?php if(!empty($this->data['Advertisement']['images'])){?>
                            <img src="/admin/timthumb.php?src=<?php echo $this->data['Advertisement']['images'];?>&amp;h=100&amp;w=100&amp;zc=1" />
							<?php } ?>	
                        </div><!--end #images_chose-->
                        <?php echo $this->Form->input('Advertisement.images',array('label'=>false, 'class'=>'text-input image-input datepicker','id' => 'xFilePath','maxlength'=>'255', 'style'=>'margin-left: 20px;'));?>
                        <input type="button" value="Chọn ảnh" onclick="BrowseServer();" class="button" style="margin-left: 20px;" />
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
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>advertisement" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>