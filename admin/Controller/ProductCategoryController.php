<?php
/*
**
** Class xử lý phần quản lý danh mục sản phẩm
** author: Nguyễn Tất Lợi
** All rights reserved 
** date: 12/03/2012
**
*/
class ProductCategoryController extends AppController {

    public $name = 'ProductCategory';
    public $uses = array('ProductCategory');

	/*
	**
	** Hàm khỏi tạo 
	**
	*/
	public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
			$url = '/login?redirect_url='.$this->params->url;
            $this->redirect($url);
        }
    }
	
	/*
	**
	** Trang index
	**
	*/
    public function index() {
		$this->paginate = array('limit'=>15, 'order'=>'ProductCategory.id DESC');
		$product_category = $this->paginate('ProductCategory');
        $this->set('product_category', $product_category);
    }

	
	/*
	**
	** Trang thêm
	**
	*/
    public function add() {
		$this->Session->setFlash(__('', true));
        if (!empty($this->request->data)) {	
			if(empty($this->request->data['ProductCategory']['parent_id'])) $this->request->data['ProductCategory']['parent_id'] = 0;
			if ($this->ProductCategory->save($this->request->data)){
				$this->Session->setFlash(__('Thêm mới thành công !', true));
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash(__('Hiện tại không thể thực hiện chức năng thêm mới. Mời thử lại !', true));
			}
		}
        $list_cat = $this->get_category('ProductCategory');
        $this->set('list_cat', $list_cat);
    }

	/*
	**
	** Trang sửa đổi thông tin
	**
	*/
	public function edit($id = null)
	{
		$this->Session->setFlash(__('', true));
		if (!$id && empty($this->request->data)) {
            $this->redirect(array('controller'=>'ProductCategory', 'action'=>'index'));
        }else if (!empty($this->request->data)) {
            $data['ProductCategory'] = $this->request->data['ProductCategory'];
            if ($this->ProductCategory->save($data['ProductCategory'])){
                $this->Session->setFlash(__('Sửa thành công.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Hiện tại hệ thống không thể sử dụng chức năng Edit, mời thử lại sau.', true));
            }
        }else if (empty($this->request->data)) {
            $this->data = $this->ProductCategory->read(null, $id);
        }
        $list_cat = $this->get_category('ProductCategory');
        $this->set('list_cat', $list_cat);
	}

	
	/*
	**
	** Hàm copy nội dung 
	**
	*/
	public function copy($id)
	{
		$this->Session->setFlash(__('', true));
		if(!empty($id)){
			$data = $this->ProductCategory->read(null, $id);
			$this->data = $data;
            $list_cat = $this->get_category('ProductCategory');
            $this->set('list_cat', $list_cat);
			$this->render('add');
		}else{
			$this->redirect(array('action' => 'index'));	
		}
	}

	/**
	*
	** Hàm xóa
	**
	*/
    public function delete($id = null) {
		$this->Session->setFlash(__('', true));
        if (!empty($id)){
            $this->ProductCategory->delete($id);
			$this->Session->setFlash(__('Xóa liên hệ thành công', true));
		}else{
			$this->Session->setFlash(__('Hiện tại không thể sử dụng chức năng Delete', true));
		}
		$this->redirect(array('action' => 'index'));
    }
	
	
	/*
	**
	** Hàm xóa nhiều
	**
	*/
	public function delete_all($data_action)
	{
		$this->Session->setFlash(__('', true));
		if(!empty($data_action)){
			$condition = array();
			foreach($data_action as $key=>$value){
				$condition[] = $key;
			}
			if($this->ProductCategory->delete($condition)){
				$this->Session->setFlash(__('Xóa tất cả thành công', true));
			}else{
				$this->Session->setFlash(__('Hiện tại không thể sử dụng chức năng Delete All', true));
			}
		}
		$this->redirect(array('action' => 'index'));
	}
	
	
	/*
	**
	** Hàm active
	**
	*/
	public function active($id = null)
	{
		$this->Session->setFlash(__('', true));
		if (!empty($id)){
            $this->ProductCategory->save(array('ProductCategory'=>array('status'=>1, 'id'=>$id)));
			$this->Session->setFlash(__('Active thành công', true));
		}else{
			$this->Session->setFlash(__('Hiện tại không thể sử dụng chắc năng Active', true));
		}
		$this->redirect(array('action' => 'index'));
	}
	
	
	/*
	**
	** Hàm active nhiều 
	**
	*/
	public function active_all($data_action)
	{
		$this->Session->setFlash(__('', true));
		if(!empty($data_action)){
			$condition = array();
			foreach($data_action as $key=>$value){
				$condition[] = $key;
			}
			if($this->ProductCategory->updateAll(array('status'=>1), array('ProductCategory.id'=>$condition))){
				$this->Session->setFlash(__('Active tất cả thành công', true));
			}else{
				$this->Session->setFlash(__('Hiện tại không thể sử dụng chức năng Active All', true));
			}
		}
		$this->redirect(array('action' => 'index'));
	}
	
	
	/*
	**
	** Hàm hủy Active
	**
	*/
	public function close($id = null)
	{
		$this->Session->setFlash(__('', true));
		if (!empty($id)){
            $this->ProductCategory->save(array('ProductCategory'=>array('status'=>0, 'id'=>$id)));
			$this->Session->setFlash(__('Close thành công', true));
		}else{
			$this->Session->setFlash(__('Hiện tại không thể thực hiện chức năng Close', true));
		}
		$this->redirect(array('action' => 'index'));	
	}
	
	/*
	**
	** Hàm hủy active nhiều 
	**
	*/
	public function close_all($data_action)
	{
		$this->Session->setFlash(__('', true));
		if(!empty($data_action)){
			$condition = array();
			foreach($data_action as $key=>$value){
				$condition[] = $key;
			}
			if($this->ProductCategory->updateAll(array('status'=>0), array('ProductCategory.id'=>$condition))){
				$this->Session->setFlash(__('Close tất cả thành công', true));
			}else{
				$this->Session->setFlash(__('Hiện tại không thể sử dụng chức năng Close All', true));
			}
		}
		$this->redirect(array('action' => 'index'));
	}
	
	
	/*
	**
	** Hàm điều hướng khi check all
	** xem action là gì thì gọi hàm xử lý action đó
	**
	*/
	public function action_all()
	{
		if($this->request->is('POST')){
			$action = $this->request->data['process'];
			$data_action = $this->request->data['chose_active']; 
			if($action == 'none'){
				$this->redirect(array('action'=>'index'));
			}else if($action == 'active_all'){
				$this->active_all($data_action);
			}else if($action == 'close_all'){
				$this->close_all($data_action);
			}else if($action == 'delete_all'){
				$this->delete_all($data_action);
			}
		}else{
			$this->redirect(array('action'=>'index'));
		}
	}

	/*
	**
	** Hàm tìm kiếm
	**
	*/
	public function search()
	{
		if($this->request->is('POST')){
			$keyword = $this->request->data['keyword'];
			$conditions = array(
						'or'=>array(
							'ProductCategory.name like "%'.$keyword.'%"',
							'ProductCategory.name_en like "%'.$keyword.'%"',
						)
					); 
			$this->paginate = array(
					'conditions'=>$conditions,
					'limit'=>15,
					'order'=>'ProductCategory.id DESC, ProductCategory.modified DESC'
			);
			$product_category = $this->paginate('ProductCategory');
        	$this->set('product_category', $product_category);
			$this->render('index');
		}else{
			$this->redirect(array('action'=>'index'));
		}
	}
}

?>
