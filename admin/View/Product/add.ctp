<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'product/add', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>product" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48--add">
            <h2>Thêm mới Sản phẩm</h2>
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
                    <td class="label" width="120">Tên sản phẩm</td>
                    <td><?php echo $this->Form->input('Product.name', array('label' => '', 'class' => 'text-input medium-input', 'onchange' => 'get_alias()', 'id' => 'idtitle')); ?>
                    </td>
               	</tr>
                
                <tr>
                    <td class="label" width="120">Tên tiếng anh</td>
                    <td><?php echo $this->Form->input('Product.name_en', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                
                <tr>
                    <td class="label" width="120">Đường dẫn ảo</td>
                    <td><?php echo $this->Form->input('Product.alias', array('label' => '', 'class' => 'text-input medium-input', 'id' => 'idalias')); ?></td>
               	</tr>
                
                <tr>
                    <td class="label" width="120">Danh mục</td>
                    <td>
						<?php echo $this->Form->input('Product.product_category_id',array('type'=>'select','options'=>$list_cat,'empty'=>'Chọn danh mục','class'=>'small-input','label'=>''));?>
					</td>
               	</tr>
                
                <tr>
                    <td class="label" width="120">Sắp xếp</td>
                    <td><?php echo $this->Form->input('Product.sort_order', array('label' => '', 'class' => 'text-input medium-input', 'id' => 'idalias')); ?></td>
               	</tr>
                
                <tr>
                    <td class="label" width="120">Giá sản phẩm</td>
                    <td><?php echo $this->Form->input('Product.price', array('label' => '', 'class' => 'text-input medium-input', 'id' => 'idalias')); ?></td>
               	</tr>
                
                <tr>
                    <td class="label" width="120">Giảm giá</td>
                    <td><?php echo $this->Form->input('Product.product_saleoff', array('label' => '', 'class' => 'text-input medium-input', 'id' => 'idalias', 'title'=>'Nếu không phải sản phẩm giảm giá thì để trống trường này!')); ?></td>
               	</tr>
                
                <tr>
                    <td class="label">Hình ảnh đại diện:</td>
                    <td>
                    	<div id="images_chose">
                        	<?php if(!empty($this->data['Product']['images'])){?>
                            <img src="/admin/timthumb.php?src=<?php echo $this->data['Product']['images'];?>&amp;h=100&amp;w=100&amp;zc=1" />
							<?php } ?>	
                        </div><!--end #images_chose-->
                        <?php echo $this->Form->input('Product.images',array('label'=>false, 'class'=>'text-input image-input datepicker','id' => 'xFilePath','maxlength'=>'255', 'style'=>'margin-left: 20px;'));?>
                        <input type="button" value="Chọn ảnh" onclick="BrowseServer();" class="button" style="margin-left: 20px; float: left; margin-top: -5px;"/>
                    </td>
                </tr>
                
                <tr>
                    <td class="label">Danh sách hình ảnh:</td>
                    <td>
                    	<div class="box_multi_images">
                        	<input type="hidden" id="number_images" value="<?php echo isset($multi_images) ? count($multi_images) : 1; ?>"  />
                            <?php if(isset($multi_images)){ 
							foreach($multi_images as $key => $val){
							?>
                        	<div id="box_multi_images_<?php echo $key; ?>">
                                <div id="images_chose_multi_images_<?php echo $key; ?>" style="float: left; width: 100px;">
                                    <img src="/admin/timthumb.php?src=<?php echo $val;?>&amp;h=100&amp;w=100&amp;zc=1" />
                                </div><!--end #images_chose-->
                                <input name="multi_images[]" class="text-input image-input datepicker" id="multi_images_<?php echo $key; ?>" maxlength="255" style="margin-left: 20px; float: left;" type="text" value="<?php echo $val; ?>">
                                <input type="button" value="Chọn ảnh" onclick="BrowseServerMore('multi_images_<?php echo $key; ?>');" class="button" style="margin-left: 20px; float: left; margin-top: 5px;"/>
                                <input type="button" value="Xóa ảnh" onclick="CloseImages('box_multi_images_<?php echo $key; ?>');" class="button close_images" style="margin-left: 20px; float: left; margin-top: 5px;" data-image = "box_multi_images_<?php echo $key; ?>" />
                                <div style="clear: both;"></div>
                        	</div><!--end #box_multi_images_<?php echo $key; ?>-->
                            <?php } 
							} ?>
                            
                            
                        </div><!--end .box-multi_images-->
                        
                        <input type="button" value="Thêm ảnh" onclick="MoreImage()" class="button" style="margin-left: 20px; float: left; margin-top: 15px;"/>
                    </td>
                </tr>
                
                
                <tr>
                    <td class="label">Sản phẩm trang chủ:</td>
                    <td>
					<?php 
						echo $this->Form->radio(
								'Product.home_product', 
								array(0=>'Chưa active', 1=>'Active'),
								array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;', 'value'=>1)		
						);
					?>
                    </td>
                </tr>
                
                <!--tr>
                    <td class="label">Sản phẩm mới:</td>
                    <td>
					<?php 
						echo $this->Form->radio(
								'Product.hot_product', 
								array(0=>'Chưa active', 1=>'Active'),
								array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;', 'value'=>1)		
						);
					?>
                    </td>
                </tr-->
                
                <tr>
                    <td class="label">Trạng thái:</td>
                    <td>
					<?php 
						echo $this->Form->radio(
								'Product.status', 
								array(0=>'Chưa active', 1=>'Active'),
								array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;', 'value'=>1)		
						);
					?>
                    </td>
                </tr>
                
                <tr>
                    <td class="label">Mô tả sản phẩm</td>
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
							
							$initialValue = empty($this->data['Product']['description']) ? '' : $this->data['Product']['description'];
							echo $CKEditor->editor("data[Product][description]", $initialValue, "");
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td class="label">Chi tiết sản phẩm</td>
                    <td>
                    	<?php
                            $CKEditor = new CKEditor();
                            $CKEditor->returnOutput = true;
							$CKEditor->basePath = DOMAINAD . "js/ckeditor";
							$CKEditor->config['width'] = '98%';
							$CKEditor->config['height'] = '300';
	
							CKFinder::SetupCKEditor( $CKEditor ) ;
							
							$initialValue = empty($this->data['Product']['detail']) ? '' : $this->data['Product']['detail'];
							echo $CKEditor->editor("data[Product][detail]", $initialValue, "");
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
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>product" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>
<script type="text/javascript" language="javascript">
function MoreImage(){
	var number_images = $('#number_images').val();
	number_images ++;
	var content = '<div id="box_multi_images_'+number_images+'"><div id="images_chose_multi_images_'+number_images+'" style="float: left; width: 100px;"></div><!--end #images_chose--><input name="multi_images[]" class="text-input image-input datepicker" id="multi_images_'+number_images+'" maxlength="255" style="margin-left: 20px; float: left;" type="text"><input type="button" value="Chọn ảnh" onclick="BrowseServerMore(\'multi_images_'+number_images+'\');" class="button" style="margin-left: 20px; float: left; margin-top: 5px;"><input type="button" value="Xóa ảnh" onclick="CloseImages(\'box_multi_images_'+number_images+'\');" class="button close_images" style="margin-left: 20px; float: left; margin-top: 5px;" data-image="box_multi_images_'+number_images+'"><div style="clear: both;"></div></div>';
	$('.box_multi_images').append(content);
	$('#number_images').val(parseFloat(number_images));
	
}

function CloseImages(DIV){
	$('#'+DIV).html('');
}
</script>