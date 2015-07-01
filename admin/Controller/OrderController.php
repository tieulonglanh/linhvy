<?php
/*
**
** Class xử lý phần quản lý quảng cáo
** author: Nguyễn Tất Lợi
** All rights reserved 
** date: 12/03/2012
**
*/
class OrderController extends AppController {

    public $name = 'Order';
    public $uses = array('Order', 'OrderDetail');

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
		$this->paginate = array('limit'=>15, 'order'=>'Order.id DESC');
		$Order = $this->paginate('Order');
        $this->set('Order', $Order);
    }

	
	/*
	**
	** Trang thêm
	**
	*/
    public function add() {
		$this->Session->setFlash(__('', true));
        if (!empty($this->request->data)) {	
			if(!empty($this->request->data['Order']['position'])){
				if ($this->Order->save($this->request->data)){
					$this->Session->setFlash(__('Thêm mới thành công !', true));
					$this->redirect(array('action' => 'index'));
				}else{
					$this->Session->setFlash(__('Hiện tại không thể thực hiện chức năng thêm mới. Mời thử lại !', true));
				}
			}else{
				$this->Session->setFlash(__('Phải chọn vị trí cho quảng cáo !', true));
			}
		}
    }

	/*
	**
	** Trang xem chi tiết + chỉnh sửa hóa đơn
	**
	*/
	public function detail($id = null)
	{
		$this->Session->setFlash(__('', true));
		if (!$id && empty($this->request->data)) {
            $this->redirect(array('controller'=>'Order', 'action'=>'index'));
        }else if (!empty($this->request->data)) {
            $data['Order'] = $this->request->data['Order'];
            if ($this->Order->save($data['Order'])){
                $this->Session->setFlash(__('Sửa thành công.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Hiện tại hệ thống không thể sử dụng chức năng Edit, mời thử lại sau.', true));
            }
        }else if (empty($this->request->data)) {
			$order = $this->Order->read(null, $id);
			$order_detail = $this->OrderDetail->findAllByOrderId($id);
			$data['Order'] = $order['Order'];
			$data['Detail'] = $order_detail;
            $this->data = $data;
        }
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
			$data = $this->Order->read(null, $id);
			$this->data = $data;
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
            $this->Order->delete($id);
			$this->Session->setFlash(__('Xóa quảng cáo thành công', true));
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
			if($this->Order->delete($condition)){
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
            if($this->Order->save(array('Order'=>array('status'=>1, 'id'=>$id)))){ 
				$this->Session->setFlash(__('Active thành công', true));
			}else{
				$this->Session->setFlash(__('Hiện tại không thể sử dụng chắc năng Active', true));
			}
		}else{
			$this->Session->setFlash(__('Hiện tại không thể sử dụng chức năng Active', true));
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
			if($this->Order->updateAll(array('status'=>1), array('Order.id'=>$condition))){
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
			$conditions = array('Order'=>array('status'=>0, 'id'=>$id));
            if($this->Order->save($conditions)){
				$this->Session->setFlash(__('Close thành công', true));
			}else{
				$this->Session->setFlash(__('Hiện tại không thể thực hiện chức năng Close', true));
			}
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
			if($this->Order->updateAll(array('status'=>0), array('Order.id'=>$condition))){
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
							'Order.name like "%'.$keyword.'%"',
							'Order.name_en like "%'.$keyword.'%"',
						)
					); 
			$this->paginate = array(
					'conditions'=>$conditions,
					'limit'=>15,
					'order'=>'Order.id DESC, Order.modified DESC'
			);
			$Order = $this->paginate('Order');
        	$this->set('Order', $Order);
			$this->render('index');
		}else{
			$this->redirect(array('action'=>'index'));
		}
	}
}

?>
