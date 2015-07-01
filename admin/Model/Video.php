<?php 
class Video extends AppModel
{
	public $name = "Video";
	
	public $actsAs = array('Tree');
	
	public $belongsTo = array(
			'VideoCategory'=>array(
				'className'=>'VideoCategory',	
				'foreignKey'=>'video_category_id'
			)
		);
	
	public $validate = array(
        'name' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Tên không được để trống',
					'allowEmpty' => false
				)
		),
		'images' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Ảnh không được để trống',
					'allowEmpty' => false
				)
		),
		'sort_order' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Thứ tự sắp xếp không được để trống và phải là số',
					'allowEmpty' => false
				)
		),
		'link' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Link không được để trống',
					'allowEmpty' => false
				)
		)
    );
}
?>