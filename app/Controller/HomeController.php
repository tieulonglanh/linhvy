<?php
class HomeController extends AppController{
    public $uses = array(
        'Product',
        'ProductCategory',
        'Setting',
        'Contact'
    );

    /*
     * function homepage
     * author: Nguyen Tat Loi
     * date: 26/11/2013
     */
    public function index() {

	}

    /*
     * function show contact of website
     * enable user send contact to administrator
     * author: NGuyen Tat Loi
     * date: 26/11/2013
     */
    public function contact()
    {
        $setting = $this->Setting->find('first');
        $this->set('setting', $setting);
        if(!empty($this->request->data)){
            //send contact, thanks and comment
            //cam on ban da gui lien he, chung toi se phan hoi lai trong thoi gian som nhat
            $data = $this->request->data;
            if(empty($data['Contact']['name']) || empty($data['Contact']['email']) || empty($data['Contact']['phone'])){
                $this->set('error', 'Bạn phải nhập đầy đủ thông tin liên hệ!');
            }else if($this->Contact->save($data)){
                $this->set('error', 'Cảm ơn bạn đã gửi thông tin liên hệ. Chúng tôi sẽ kiểm tra và phản hồi lại cho bạn trong thời gian sớm nhất!');
            }else{
                $this->set('error', 'Có lỗi trong quá trình gửi liên hệ. Mời bạn thử lại sau!');
            }
        }
    }

}
