<?php
class ComponentController extends AppController
{
    public $name = "Component";
    public $uses = array(
        'Advertisement',
        'Contact',
        'Gallery',
        'Link',
        'News',
        'NewsCategory',
        'Partner',
        'Product',
        'ProductCategory',
        'Question',
        'Support',
        'Video',
        'VideoCategory',
        'Setting',
        'Slideshow'
    );

    /*
     * funciton get setting of system
     * author: NGuyen tat Loi
     * date: 26/11/2013
     */
    public function get_setting()
    {
        $setting = $this->Setting->find('first');
        return $setting;
    }

    /*
     * public function get advertisment of system
     * get by position:
     * vị trí của quảng cáo:
     *      1 - bên trái,
     *      2 - bên phải,
     *      3 - center,
     *      4 - top .... or tùy chọn :D
     * author: NGuyen Tat Loi
     * date: 26/11/2013
     */
    public function get_adv($position = 0)
    {
        //if position = 0, get all advertisment
        if($position ==0){
            $adv = $this->Advertisement->find(
                'all', array(
                    'conditions' => array('Advertisement.status' => 1)
                )
            );
        }else{
        //else, get by position
            $adv = $this->Advertisement->find(
                'all', array(
                    'conditions' => array(
                        'Advertisement.status' => 1,
                        'Advertisement.position' => $position
                    )
                )
            );
        }
        return $adv;
    }

    /*
     * function get support online
     * author: Nguyen Tat Loi
     * date: 26/11/2013
     */
    public function get_support()
    {
        $support = $this->Support->find(
            'all', array(
                'Support.status' => 1
            )
        );
        return $support;
    }

    /*
     * function get link outer website
     * author: NGuyen Tat Loi
     * date: 26/11/2013
     */
    public function get_link()
    {
        $link = $this->Link->find(
            'all', array(
                'conditions' => array(
                    'Link.status' => 1
                )
            )
        );
        return $link;
    }

    /*
     * function get partner
     * author: Nguyen Tat Loi
     * date: 26/11/2013
     */
    public function get_partner()
    {
        $partner = $this->Partner->find(
            'all', array(
                'conditions' => array(
                    'Partner.status' => 1
                )
            )
        );
        return $partner;
    }

    /*
     * function get question FAQ
     * author: NGuyen Tat Loi
     * date: 26/11/2013
     */
    public function get_question()
    {
        $question = $this->Question->find(
            'all', array(
                'conditions' => array('Question.status' => 1),
                'limit' => 10,
                'order' => array('Question.id' => 'DESC')
            )
        );
        return $question;
    }

    /*
     * function get slide show
     * author: NGuyen Tat Loi
     * date: 26/11/2013
     */
    public function get_slideshow()
    {
        $slideshow = $this->Slideshow->find(
            'all', array(
                'conditions' => array('Slideshow.status' => 1)
            )
        );
        return $slideshow;
    }

    /*
     * function get hot news
     * author: NGuyen Tat Loi
     * date: 2/6/2014
     */
    public function get_news()
    {
        $news = $this->News->find(
            'all', array(
                'conditions' => array(
                    'News.status' => 1
                ),
                'order' => array(
                    'News.sort_order' => 'ASC',
                    'News.id' => 'DESC'
                ),
                'limit' => 10
            )
        );
        return $news;
    }

    /*
     * function get product_category
     * author: Nguyen Tat Loi
     * date: 2/6/2014
     */
    public function get_product_category()
    {
        $category = $this->ProductCategory->find('all',
			array(
				'order' => array(
					'ProductCategory.sort_order' => 'ASC',
					'ProductCategory.id' => 'DESC'
				)	
			)
		);
		
		return $category; 
		
		/*pr($category); die; 
        $cat = array();
        foreach($category as $key => $value){
            $cat[$value['ProductCategory']['id']] = $value['ProductCategory'];
        }
        $this->treeze($cat, 'parent_id', 'child');
        return $cat;*/
    }

    /*
     * function get new product
     * author: Nguyen tat Loi
     * date: 3/6/2014
     */
    public function get_new_product()
    {
        $product = $this->Product->find(
            'all', array(
                'conditions' => array(
                    'Product.status' => 1
                ),
                'order' => array('Product.id' => 'DESC'),
                'limit' => 10
            )
        );
        return $product;
    }

    /*
     * function render category to tree
     * author: NGuyen tat Loi
     * date: 2/6/2014
     */
    private function treeze( &$a, $parent_key, $children_key )
    {
        $orphans = true;
        while( $orphans )
        {
            $orphans = false;
            foreach( $a as $k=>$v )
            {
                // is there $a[$k] sons?
                $sons = false; foreach( $a as $x=>$y ) if( $y[$parent_key]!=false and $y[$parent_key]==$k )  { $sons=true; $orphans=true; break; }

                // $a[$k] is a son, without children, so i can move it
                if( !$sons and $v[$parent_key]!=false )
                {
                    $a[$v[$parent_key]][$children_key][$k] = $v;
                    unset( $a[$k] );
                }
            }
        }
    }
}
?>