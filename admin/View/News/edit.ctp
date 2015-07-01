<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'news/edit', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>news" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48--add">
            <h2>Sửa tin tức</h2>
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
                    <td class="label" width="120">Tiêu đề tin</td>
                    <td><?php echo $this->Form->input('News.name', array('label' => '', 'class' => 'text-input medium-input', 'onchange' => 'get_alias()', 'id' => 'idtitle')); ?>
                    </td>
               	</tr>
                
                <tr>
                    <td class="label" width="120">Tiêu đề tiếng anh</td>
                    <td><?php echo $this->Form->input('News.name_en', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                
                <tr>
                    <td class="label" width="120">Đường dẫn ảo</td>
                    <td><?php echo $this->Form->input('News.alias', array('label' => '', 'class' => 'text-input medium-input', 'id' => 'idalias')); ?></td>
               	</tr>
                
                <tr>
                    <td class="label" width="120">Danh mục</td>
                    <td>
						<?php echo $this->Form->input('News.news_category_id',array('type'=>'select','options'=>$list_cat,'empty'=>'Chọn danh mục','class'=>'small-input','label'=>''));?>
					</td>
               	</tr>
                
                <tr>
                    <td class="label" width="120">Sắp xếp</td>
                    <td><?php echo $this->Form->input('News.sort_order', array('label' => '', 'class' => 'text-input medium-input', 'id' => 'idalias')); ?></td>
               	</tr>
                
                <tr>
                    <td class="label">Hình ảnh đại diện:</td>
                    <td>
                    	<div id="images_chose">
                        	<?php if(!empty($this->data['News']['images'])){?>
                            <img src="/admin/timthumb.php?src=<?php echo $this->data['News']['images'];?>&amp;h=100&amp;w=100&amp;zc=1" />
							<?php } ?>	
                        </div><!--end #images_chose-->
                        <?php echo $this->Form->input('News.images',array('label'=>false, 'class'=>'text-input image-input datepicker','id' => 'xFilePath','maxlength'=>'255', 'style'=>'margin-left: 20px;'));?>
                        <?php echo $this->Form->input('News.id',array('type'=>'hidden')); ?>
                        <input type="button" value="Chọn ảnh" onclick="BrowseServer();" class="button" style="margin-left: 20px; float: left; margin-top: -5px;"/>
                    </td>
                </tr>
                
                <tr>
                    <td class="label">Tin trang chủ:</td>
                    <td>
					<?php 
						echo $this->Form->radio(
								'News.home_news', 
								array(0=>'Chưa active', 1=>'Active'),
								array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;', 'value'=>1)		
						);
					?>
                    </td>
                </tr>
                
                <tr>
                    <td class="label">Tin mới:</td>
                    <td>
					<?php 
						echo $this->Form->radio(
								'News.hot_news', 
								array(0=>'Chưa active', 1=>'Active'),
								array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;', 'value'=>1)		
						);
					?>
                    </td>
                </tr>
                
                <tr>
                    <td class="label">Trạng thái:</td>
                    <td>
					<?php 
						echo $this->Form->radio(
								'News.status', 
								array(0=>'Chưa active', 1=>'Active'),
								array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;', 'value'=>1)		
						);
					?>
                    </td>
                </tr>
                
                <tr>
                    <td class="label">Mô tả tin</td>
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
							
							$initialValue = empty($this->data['News']['description']) ? '' : $this->data['News']['description'];
							echo $CKEditor->editor("data[News][description]", $initialValue, "");
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td class="label">Chi tiết tin</td>
                    <td>
                    	<?php
                            $CKEditor = new CKEditor();
                            $CKEditor->returnOutput = true;
							$CKEditor->basePath = DOMAINAD . "js/ckeditor";
							$CKEditor->config['width'] = '98%';
							$CKEditor->config['height'] = '300';
	
							CKFinder::SetupCKEditor( $CKEditor ) ;
							
							$initialValue = empty($this->data['News']['detail']) ? '' : $this->data['News']['detail'];
							echo $CKEditor->editor("data[News][detail]", $initialValue, "");
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
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>news" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>