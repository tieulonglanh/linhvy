<?php
class UserController extends AppController
{
    public $name = 'UserController';
    public $uses = array(
        'User'
    );

    /*
     * function register new user
     * author: NGuyen Tat Loi
     * date: 26/11/2013
     */
    public function register()
    {

    }

    /*
     * function login to system
     * author: Nguyen Tat Loi
     * date: 26/11/2013
     */
    public function login()
    {
        $data = $this->request->data;
        if(!empty($data['username']) && !empty($data['password'])){
            $username = $data['username'];
            $password = md5($data['password']);
            $user = $this->User->find(
                'first', array(
                    'conditions' => array(
                        'User.username' => $username,
                        'User.password' => $password
                    )
                )
            );
            if(!empty($user)){
                $this->Session->write('user', $user);
                if(!empty($_SERVER['HTTP_REFERRER'])){
                    $this->redirect($_SERVER['HTTP_REFERRER']);
                }else{
                    $this->redirect('/');
                }
            }else{
                echo 'Ten dang nhap hoac mat khau khong dung';
            }
        }
    }

    /*
     * funciton logout system
     * author: NGuyen Tat Loi
     * date: 26/11/2013
     */
    public function logout()
    {

    }

    /*
     * function show info of user
     * enable users change their information in page
     * author: Nguyen Tat Loi
     * date: 26/11/2013
     */
    public function userinfo()
    {
        if($user = $this->Session->read('user')){
            if(!empty($this->request->data)){
                //update thong tin
            }
            $this->set('user', $user);
        }else{
            $this->redirect(array('action' => 'login', ''));
        }
    }
}
?>