<?php
class GalleryController extends AppController {

    public $name = 'Gallery';
    public $uses = array(
        'Gallery', 'GalleryCategory'
    );

    /*
     * function index, list all gallery
     * author: Nguyen Tat Loi
     * date: 26/11/2013
     */
    function index() {
        $gallery = $this->Gallery->find(
            'all',array(
                'conditions'=>array('Gallery.status'=>1),
                'order'=>'Gallery.id DESC'
            )
        );
        $this->set('gallery',$gallery);
    }

    /*
     * function get all gallery from a category
     * author: Nguyen Tat Loi
     * date: 26/11/2013
     */
    public function category($cate_id = null)
    {
        if(!empty($cate_id)){
            $category = $this->GalleryCategory->findById($cate_id);
            $list_cate = $this->GalleryCategory->find(
                'list', array(
                    'feilds' => array('GalleryCategory.id'),
                    'conditions' => array('GalleryCategory.parent_id', $cate_id)
                )
            );
            $list_cate[] = $cate_id;
            $gallery = $this->Gallery->find(
                'all', array(
                    'conditions' => array(
                        'Gallery.status' => 1,
                        'Galler.gallery_category_id' => $list_cate
                    ),
                    'order' => array('Gallery.id' => 'DESC')
                )
            );
            $this->set('category', $category);
            $this->set('gallery', $gallery);
        }else{
            $this->redirect(array('action' => 'inndex'));
        }
    }

    /*
     * function detail of gallery
     * author: Nguyen Tat Loi
     * date: 26/11/2013
     */
    public function detail($gallery_id = null)
    {
        if(!empty($gallery_id)){
            $gallery = $this->Gallery->findById($gallery_id);
            $this->set('gallery', $gallery);
            $other_gallery = $this->Gallery->find(
                'all', array(
                    'conditions' => array(
                        'Gallery.status' => 1,
                        'Gallery.id <>' => $gallery_id
                    ),
                    'limit' => 10,
                    'order' => array('Gallery.id' => 'DESC')
                )
            );
            $this->set('other_gallery', $other_gallery);
        }else{
            $this->redirect(array('action' => 'index'));
        }

    }

    /*
     * function get gallery
     * chẳng biết để làm j, nhưng code cũ có nên để lại
     * chắc phải có nguyên nhân j đấy :D
     */
    public function get_galery()
    {
        $galery = $this->Gallery->find('all',array('limit'=>2, 'order'=>'Gallery.id DESC'));
        return $galery;
    }
}
?>
