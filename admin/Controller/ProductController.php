<?php
/*
**
** Class xử lý phần quản lý sản phẩm
** author: Nguyễn Tất Lợi
** All rights reserved 
** date: 12/03/2012
**
*/

App::import('Vendor', 'ckeditor');
App::import('Vendor', 'ckfinder');

class ProductController extends AppController {

    public $name = 'Product';
    public $uses = array('Product', 'ProductCategory');

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
		$this->paginate = array('limit'=>15, 'order'=>'Product.id DESC');
		$product = $this->paginate('Product');
        $this->set('product', $product);
		$list_cat = $this->get_category('ProductCategory');
        $this->set('list_cat', $list_cat);
    }

	
	/*
	**
	** Trang thêm
	**
	*/
    public function add() {
		$this->Session->setFlash(__('', true));
        if (!empty($this->request->data)) {	
			$data = $this->request->data;
			if(empty($data['Product']['product_category_id'])){
				$this->Session->setFlash(__('Chưa chọn danh mục sản phẩm !', true));
			}else{
				if(!empty($data['multi_images'])){
					$data['Product']['multi_images'] = implode("|", $data['multi_images']);
				}
				if ($this->Product->save($data)){
					$this->Session->setFlash(__('Thêm mới thành công !', true));
					$this->redirect(array('action' => 'index'));
				}else{
					$this->Session->setFlash(__('Hiện tại không thể thực hiện chức năng thêm mới. Mời thử lại !', true));
				}
			}
            $this->set('multi_images', $data['multi_images']);
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
            $this->redirect(array('controller'=>'Product', 'action'=>'index'));
        }else if (!empty($this->request->data)) {
            $data = $this->request->data;
            if(!empty($data['multi_images'])){
                $data['Product']['multi_images'] = implode("|", $data['multi_images']);
                $this->set('multi_images', $data['multi_images']);
            }
            if(empty($data['Product']['product_category_id'])){
                $this->Session->setFlash(__('Chưa chọn danh mục sản phẩm !', true));
            }else{
                if ($this->Product->save($data['Product'])){
                    $this->Session->setFlash(__('Sửa thành công.', true));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('Hiện tại hệ thống không thể sử dụng chức năng Edit, mời thử lại sau.', true));
                }
            }
        }else if (empty($this->request->data)) {
            $this->data = $this->Product->read(null, $id);
			if(!empty($this->data['Product']['multi_images'])){
				$multi_images = explode("|", $this->data['Product']['multi_images']);
				$this->set('multi_images', $multi_images);
			}
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
			$data = $this->Product->read(null, $id);
			$this->data = $data;
			if(!empty($this->data['Product']['multi_images'])){
				$multi_images = explode("|", $this->data['Product']['multi_images']);
				$this->set('multi_images', $multi_images);
			}
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
            $this->Product->delete($id);
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
			if($this->Product->delete($condition)){
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
            $this->Product->save(array('Product'=>array('status'=>1, 'id'=>$id)));
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
			if($this->Product->updateAll(array('status'=>1), array('Product.id'=>$condition))){
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
            $this->Product->save(array('Product'=>array('status'=>0, 'id'=>$id)));
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
			if($this->Product->updateAll(array('status'=>0), array('Product.id'=>$condition))){
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
			$category_id = $this->request->data['category_id']; 
			$conditions = array();
			if(!empty($keyword)){
				$conditions[] = array('Product.name like "%'.$keyword.'%"');
			}
			if(!empty($category_id)){
				$conditions[] = array('Product.Product_category_id'=>$category_id);
			}
			//pr($conditions); die;
			$this->paginate = array(
					'conditions'=>$conditions,
					'limit'=>15,
					'order'=>'Product.id DESC, Product.modified DESC'
			);
			$product = $this->paginate('Product');
        	$this->set('product', $product);
            $list_cat = $this->get_category('ProductCategory');
            $this->set('list_cat', $list_cat);
			$this->render('index');
		}else{
			$this->redirect(array('action'=>'index'));
		}
	}
}

?>
