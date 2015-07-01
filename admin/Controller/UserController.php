<?php
/*
**
** Class xử lý phần quản lý User
** author: Nguyễn Tất Lợi
** All rights reserved 
** date: 12/03/2012
**
*/
class UserController extends AppController {

    public $name = 'User';
    public $uses = array('User');

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
		$this->paginate = array('limit'=>15, 'order'=>'User.id DESC');
		$user = $this->paginate('User');
        $this->set('user', $user);
    }

	
	/*
	**
	** Trang thêm tài khoản
	**
	*/
    public function add() {
		$this->Session->setFlash(__('', true));
        if (!empty($this->request->data)) {
			$check_user = $this->User->find('count', array('conditions'=>array('User.username'=>$this->request->data['User']['username'])));
			if($check_user){
				$this->Session->setFlash(__('Tên tài khoản đã tồn tại !', true));
			}else{
				if(!empty($this->request->data['User']['password'])){
					if ($this->request->data['User']['password'] != $this->request->data['User']['repassword']){
						$this->Session->setFlash(__('Mật khẩu xác nhận không giống mật khẩu !', true));
					}
					$this->request->data['User']['password'] = md5($this->request->data['User']['password']);
					$this->User->create();
					if ($this->User->save($this->request->data)){
						$this->Session->setFlash(__('Thêm mới thành công !', true));
						$this->redirect(array('action' => 'index'));
					}
				}else{
					$this->Session->setFlash(__('Mật khẩu không được để trống !', true));
				}
			}
        }
    }

	/*
	**
	** Trang sửa đổi thông tin tài khoản
	**
	*/
	public function edit($id = null)
	{
		$this->Session->setFlash(__('', true));
		if (!$id && empty($this->request->data)) {
            $this->redirect(array('controller'=>'User', 'action'=>'index'));
        }else if (!empty($this->request->data)) {
            $data['User'] = $this->request->data['User'];
			if(empty($data['User']['repassword'])){
				unset($data['User']['password']);
			}else{
				if($data['User']['password']==$data['User']['repassword']){
					$data['User']['password'] = md5($data['User']['password']);
				}else{
					$this->Session->setFlash(__('Mật khẩu xác nhận không đúng', true));
					$this->redirect($this->referer);
				}
			}
            if ($this->User->save($data['User'])){
                $this->Session->setFlash(__('Sửa tài khoản thành công.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Hiện tại hệ thống không thể sửa tài khoản, mời thử lại sau.', true));
            }
        }else if (empty($this->request->data)) {
            $this->data = $this->User->read(null, $id);
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
			$data = $this->User->read(null, $id);
			unset($data['User']['password']);
			$this->data = $data;
			$this->render('add');
		}else{
			$this->redirect(array('action' => 'index'));	
		}
	}

	/**
	*
	** Hàm xóa tài khoản
	**
	*/
    public function delete($id = null) {
		$this->Session->setFlash(__('', true));
        if (!empty($id)){
            $this->User->delete($id);
			$this->Session->setFlash(__('Xóa tài khoản User thành công', true));
		}else{
			$this->Session->setFlash(__('Hiện tại không thể xóa tài khoản User', true));
		}
		$this->redirect(array('action' => 'index'));
    }
	
	
	/*
	**
	** Hàm xóa nhiều tài khoản
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
			if($this->User->delete($condition)){
				$this->Session->setFlash(__('Xóa tất cả tài khoản User thành công', true));
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
            $this->User->save(array('User'=>array('status'=>1, 'id'=>$id)));
			$this->Session->setFlash(__('Active tài khoản User thành công', true));
		}else{
			$this->Session->setFlash(__('Hiện tại không thể Active tài khoản User', true));
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
			if($this->User->updateAll(array('status'=>1), array('User.id'=>$condition))){
				$this->Session->setFlash(__('Close Tất cả tài khoản User thành công', true));
			}else{
				$this->Session->setFlash(__('Hiện tại không thể sử dụng chức năng Close All', true));
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
            $this->User->save(array('User'=>array('status'=>0, 'id'=>$id)));
			$this->Session->setFlash(__('Close tài khoản User thành công', true));
		}else{
			$this->Session->setFlash(__('Hiện tại không thể Close tài khoản User', true));
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
			if($this->User->updateAll(array('status'=>0), array('User.id'=>$condition))){
				$this->Session->setFlash(__('Active Tất cả tài khoản User thành công', true));
			}else{
				$this->Session->setFlash(__('Hiện tại không thể sử dụng chức năng Active All', true));
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
							'User.username like "%'.$keyword.'%"',
							'User.fullname like "%'.$keyword.'%"',
						)
					); 
			$this->paginate = array(
					'conditions'=>$conditions,
					'limit'=>15,
					'order'=>'User.id DESC, User.modified DESC'
			);
			$user = $this->paginate('User');
        	$this->set('user', $user);
			$this->render('index');
		}else{
			$this->redirect(array('action'=>'index'));
		}
	}
}

?>
