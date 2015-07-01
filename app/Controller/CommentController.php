<?php
/**
 * Description of CommentController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class CommentController extends AppController {
    
    public $name = 'Comment';
    public $uses = array(
        'NewsCategory',
        'News',
        'Slideshow',
        'Setting',
        'Advertisement',
        'ProductCategory',
        'Product',
        'Support',
        'Link'
    );

    
    // Menu left lấy danh sách ProductCategory
    // menu này sử dụng cho accordion
    function ProductCategory($id=null){
		mysql_query("SET names utf8");
			return $this->ProductCategory->find('all',array('conditions'=>array('ProductCategory.status'=>1,'ProductCategory.parent_id'=>$id),'order'=>'ProductCategory.tt ASC'));	
	}
     function subProductCategory($id=null){
		mysql_query("SET names utf8");
			return $this->ProductCategory->find('all',array('conditions'=>array('ProductCategory.status'=>1,'ProductCategory.parent_id'=>$id),'order'=>'ProductCategory.tt ASC'));	
	}
    function price($id=null){
                    mysql_query("SET names utf8");
                            return $this->Price->find('all',array('conditions'=>array('Price.status'=>1,'Price.parent_id'=>$id),'limit'=>'10','order'=>'Price.tt ASC'));	
            }
    
    
    
    
    public function menuleft() {
        $mnleft = $this->ProductCategory->find('threaded', array(
            'conditions' => array(
                'ProductCategory.status' => 1
            ),
            'order' => 'ProductCategory.sort_order ASC'
        ));
        return $mnleft;
    }

    // lấy danh sách NewsCategory
    // sử dụng cho menu 1 cấp
    public function menuTop(){
        $menuTop = $this->NewsCategory->find("threaded",
            array(
                //"fields"=>array()
                "conditions"=>array(
                    "NewsCategory.status"=>1,
                ),
                "order"=>array(
                    "NewsCategory.pos ASC",
                    "NewsCategory.created ASC",
                )
            )
        );
        return $menuTop;
    }

    // Quang cao
    public function quangcao() {
        $qcao = $this->Advertisement->find('all', array(
            'conditions' => array(
                'Advertisement.status' => 1
            ),
            'order' => 'Advertisement.pos ASC'
        ));
        return $qcao;
    }
    // Cau hinh website
    public function setting() {
        $setting = $this->Setting->find('first');
        return $setting;
    }
    
    // SLide show
    public function slideshow() {
		$slideshow = $this->Slideshow->find(
				'all', 
				array(
						'conditions' => array(
							'Slideshow.status' => 1
						),
						'order' => array(
							'Slideshow.id' => 'DESC',
							'Slideshow.sort_order' => 'ASC'
						)
					)
			);
        return $slideshow;
    }
    
    // Slide add
    public function slideadv() {
        $slideadv = $this->Advertisement->find('all', array('order' => 'Advertisement.pos ASC'));
        return $slideadv;
    }

	//Hỗ trợ trực tuyến
    public function Support(){
        $Support = $this->Support->find("all",
            array(
                "fields"=>array(
                    "Support.name",
                    "Support.skype",
                    "Support.yahoo",
                )
            )
        );
        return $Support;
    }
    //danh sách tin tức hot
    public function newsHot(){
        $newsHot = $this->News->find("all",
            array(
                "conditions"=>array(
                    "News.status"=>1,
                    "News.hot_news"=>1,
                )
            )
        );

        return $newsHot;
    }

    //liên kết web
    public function links(){
        $links = $this->Link->find("all",
            array(
                'conditions'=>array(
                    'Link.status'=>1
                )
            )
        );
        return $links;
    }
    

	public function hotProduct($limit = 4)
	{
		return $this->Product->find(
					'all',
					array(
						'conditions'=>array(
							'Product.status'=>1,
							'Product.hot_product'=>1
						),
						'order'=>'Product.id DESC',
						'limit'=>$limit
					)
		);
	}
        public function likeProduct($limit = 4)
	{
		return $this->Product->find(
					'all',
					array(
						'conditions'=>array(
							'Product.status'=>1,
							'Product.like'=>1
						),
						'order'=>'Product.id DESC',
						'limit'=>$limit
					)
		);
	}
	public function getLeftAdv()
	{
		$adv =  $this->Advertisement->find('first', array('fields'=>'images', 'coditions'=>array('display'=>1)));
		return $adv['Advertisement']['images']; 
	}
	
	public function getRightAdv()
	{
		$adv = $this->Advertisement->find('first', array('fields'=>'images', 'coditions'=>array('display'=>2)));
		return $adv['Advertisement']['images']; 
	}
}