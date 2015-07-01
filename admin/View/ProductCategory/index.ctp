<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="<?php echo DOMAINAD; ?>product_category/add" class="toolbar"> <span class="icon-32-new"></span> Thêm mới </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>home" class="toolbar"> <span class="icon-32-unpublish"></span> Đóng </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-nhomtin">
            <h2>Danh sách danh mục sản phẩm</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">
    <?php echo $this->Form->create(null, array('url' => DOMAINAD . 'product_category/search', 'type' => 'post', 'name' => 'frm_search')); ?>
        <table class="timkiem">
            <tr>
                <td valign="top">Tìm kiếm</td>
                <td><input type="text" id="field2c" name="keyword" class="text-input" value=""></td>
                <td><input type="submit" name="" value="Tìm kiếm" class="button" /></td>
            </tr>
        </table>
    <?php echo $this->Form->end(); ?>
    <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
        <?php echo $this->Form->create(null, array('url' => DOMAINAD . 'product_category/action_all', 'type' => 'post', 'name' => 'frm_list')); ?>
        <div class="session_flash"><?php echo $this->Session->flash(); ?></div>
            <table width="100%">
                    <thead>
                        <tr>
                            <th width="2%"><input type="checkbox" name="all" id="checkall" /></th>
                            <th width="4%">STT</th>
                            <th width="20%">Ảnh đại diện</th>
                            <th width="20%" style="text-align:center;"><?php echo $this->Paginator->sort('ProductCategory.name', 'Tên danh mục'); ?></th>
                            <th width="20%"><?php echo $this->Paginator->sort('ProductCategory.parent_id', 'Danh mục cha'); ?></th>
                            <th width="11%"><?php echo $this->Paginator->sort('ProductCategory.sort_order', 'Sắp xếp'); ?></th>
                            <th width="11%"><?php echo $this->Paginator->sort('ProductCategory.modified', 'Thay đổi'); ?></th>
                            <th width="12%">Xử lý</th>
                            <th width="3%"><?php echo $this->Paginator->sort('ProductCategory.id', 'Mã'); ?></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="9">
                                <div class="bulk-actions align-left">
                                    <div id="box_action_all" style="float: left; margin-left: 10px;">
                                        <select name="process" id="chose_action_all">
                                            <option value="none">Lựa chọn</option>
                                            <option value="active_all">Active</option>
                                            <option value="close_all">Hủy Active</option>
                                            <option value="delete_all">Delete</option>
                                        </select>
                                        <input type="submit" name="submit_action_all" class="button" value="Thực hiện" />
                                    </div><!--end #box_action_all-->
                               </div><!--end #bulk-aciton-->
                                <div class="pagination" style="float: right; margin-right: 10px;">
                                <?php
                                    ?>
                                    
                                    <?php
									if($this->Paginator->counter('{:pages}')>1){
                                        echo $this->Paginator->first('« Đầu ', null, null, array('class' => 'disabled'));     
                                        echo $this->Paginator->prev('« Trước ', null, null, array('class' => 'disabled')); 
                                        echo $this->Paginator->numbers()." ";
                                        echo $this->Paginator->next(' Tiếp »', null, null, array('class' => 'disabled')); 
                                        echo $this->Paginator->last('« Cuối ', null, null, array('class' => 'disabled')); 
                                        echo " Page ".$this->Paginator->counter();
									}
                                    ?>
                                </div>
                                <div class="clear"></div>
                        	</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($product_category as $key => $value) {  ?>
                        <tr>
                            <td><input type="checkbox" name="chose_active[<?php echo $value['ProductCategory']['id']; ?>]" /></td>
                            <td><?php echo $key+1; ?></td>
                            <td>
                           		<img src="<?php echo DOMAINAD?>/timthumb.php?src=<?php echo $value['ProductCategory']['images'];?>&amp;h=100&amp;w=100&amp;zc=1" />
                            </td>
                            <td><a href="<?php echo DOMAINAD ?>product_category/edit/<?php echo $value['ProductCategory']['id']; ?>" title="Edit"><?php echo $value['ProductCategory']['name']; ?></a>  <?php if(date('Y-m-d', strtotime($value['ProductCategory']['modified'])) == date('Y-m-d')) { ?><img src="<?php echo DOMAINAD ?>images/icons/iconnew.gif" alt="New" /><?php } ?></td>
                            <td style="text-align:center;"><?php echo $value['Parent']['name']; ?></td>
                            <td style="text-align:center;"><?php echo $value['ProductCategory']['sort_order']; ?></td>
                            <td>
                                <?php echo date('d-m-Y', strtotime($value['ProductCategory']['modified'])); ?></td>
                            <td>
                                <a href="<?php echo DOMAINAD ?>product_category/copy/<?php echo $value['ProductCategory']['id']; ?>" title="Copy"><img src="<?php echo DOMAINAD ?>images/icons/copy.png" alt="Copy" /></a>
                                <a href="<?php echo DOMAINAD ?>product_category/edit/<?php echo $value['ProductCategory']['id']; ?>" title="Edit"><img src="<?php echo DOMAINAD ?>images/icons/pencil.png" alt="Edit" /></a> <a href="javascript:confirmDelete('<?php echo DOMAINAD ?>product_category/delete/<?php echo $value['ProductCategory']['id']; ?>')" title="Delete"><img src="<?php echo DOMAINAD ?>images/icons/cross.png" alt="Delete" /></a>
                                <?php
                                    if ($value['ProductCategory']['status'] == 0) {
                                        ?>
                                <a href="<?php echo DOMAINAD ?>product_category/active/<?php echo $value['ProductCategory']['id']; ?>" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/Play-icon.png" alt="Kích hoạt" /></a>
                                <?php
                                    } else {
                                        ?>
                                <a href="<?php echo DOMAINAD ?>product_category/close/<?php echo $value['ProductCategory']['id']; ?>" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/success-icon.png" alt="Ngắt kích hoạt" /></a>
                                <?php
                                    }
                                    ?></td>
                            <td align="right"><?php echo $value['ProductCategory']['id']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
            </table>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
