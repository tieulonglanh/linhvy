<?php 
class User extends AppModel
{
	public $name = "User";
	public $validate = array(
        'username' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Tên tài khoản không được để trống',
					'allowEmpty' => false
				)
		)
    );
}
?>