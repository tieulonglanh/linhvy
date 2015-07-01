<?php
/*
**
** Class xử lý phần quản lý cấu hình
** author: Nguyễn Tất Lợi
** All rights reserved 
** date: 12/03/2012
**
*/
class SettingController extends AppController {

    public $name = 'Setting';
    public $uses = array('Setting');

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
		$this->Session->setFlash(__('', true));
		if (!empty($this->request->data)) {
            $data['Setting'] = $this->request->data['Setting'];
            if ($this->Setting->save($data['Setting'])){
                $this->Session->setFlash(__('Sửa thành công.', true));
            } else {
                $this->Session->setFlash(__('Hiện tại hệ thống không thể sử dụng chức năng Edit, mời thử lại sau.', true));
            }
        }else if (empty($this->request->data)) {
			$data = $this->Setting->find('first');
            $this->data = $data;
        }
    }

}

?>
