<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'question/edit', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>question" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48--add">
            <h2>Sửa câu hỏi</h2>
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
                    <td class="label" width="120">Tên người hỏi</td>
                    <td><?php echo $this->Form->input('Question.name', array('label' => '', 'class' => 'text-input medium-input', 'onchange' => 'get_alias()', 'id' => 'idtitle')); ?>
                    <?php echo $this->Form->input('Question.id', array('type'=>'hidden')); ?>
                    </td>
               	</tr>
                
                 <tr>
                    <td class="label" width="120">Email người hỏi</td>
                    <td><?php echo $this->Form->input('Question.email', array('label' => '', 'class' => 'text-input medium-input', 'onchange' => 'get_alias()', 'id' => 'idtitle')); ?>
                    </td>
               	</tr>
                
                 <tr>
                    <td class="label" width="120">Số ĐT người hỏi</td>
                    <td><?php echo $this->Form->input('Question.phone', array('label' => '', 'class' => 'text-input medium-input', 'onchange' => 'get_alias()', 'id' => 'idtitle')); ?>
                    </td>
               	</tr>
                
                 <tr>
                    <td class="label" width="120">Địa chỉ người hỏi</td>
                    <td><?php echo $this->Form->input('Question.address', array('label' => '', 'class' => 'text-input medium-input', 'onchange' => 'get_alias()', 'id' => 'idtitle')); ?>
                    </td>
               	</tr>
                
                 <tr>
                    <td class="label" width="120">Tiêu đề câu hỏi</td>
                    <td><?php echo $this->Form->input('Question.title', array('label' => '', 'class' => 'text-input medium-input', 'onchange' => 'get_alias()', 'id' => 'idtitle')); ?>
                    </td>
               	</tr>
                
                
                <tr>
                    <td class="label">Trạng thái:</td>
                    <td>
					<?php 
						echo $this->Form->radio(
								'Question.status', 
								array(0=>'Chưa active', 1=>'Active'),
								array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;')		
						);
					?>
                    </td>
                </tr>
                
                <tr>
                    <td class="label">Mô tả câu hỏi</td>
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
							
							$initialValue = empty($this->data['Question']['description']) ? '' : $this->data['Question']['description'];
							echo $CKEditor->editor("data[Question][description]", $initialValue, "");
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td class="label">Chi tiết câu hỏi</td>
                    <td>
                    	<?php
                            $CKEditor = new CKEditor();
                            $CKEditor->returnOutput = true;
							$CKEditor->basePath = DOMAINAD . "js/ckeditor";
							$CKEditor->config['width'] = '98%';
							$CKEditor->config['height'] = '300';
	
							CKFinder::SetupCKEditor( $CKEditor ) ;
							
							$initialValue = empty($this->data['Question']['detail']) ? '' : $this->data['Question']['detail'];
							echo $CKEditor->editor("data[Question][detail]", $initialValue, "");
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td class="label">Câu trả lời</td>
                    <td>
                    	<?php
                            $CKEditor = new CKEditor();
                            $CKEditor->returnOutput = true;
							$CKEditor->basePath = DOMAINAD . "js/ckeditor";
							$CKEditor->config['width'] = '98%';
							$CKEditor->config['height'] = '300';
	
							CKFinder::SetupCKEditor( $CKEditor ) ;
							
							$initialValue = empty($this->data['Question']['answer']) ? '' : $this->data['Question']['answer'];
							echo $CKEditor->editor("data[Question][answer]", $initialValue, "");
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
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>question" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>