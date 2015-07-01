<?php
class VideoController extends AppController
{
    public $name = 'VideoController';
    public $uses = array(
        'Video', 'VideoController'
    );

    /*
     * function video index, get all video and pagination
     * author: Nguyen Tat Loi
     * date: 26/11/2013
     */
    public function index()
    {
        $this->paginate = array('limit'=>15, 'order'=>'Video.id DESC');
        $video = $this->paginate('Video');
        $this->set('video', $video);
    }

    /*
     * function get video by category
     * author: Nguyen Tat LOi
     * date: 26/11/2013
     */
    public function category($cate_id = null)
    {
        $category = $this->VideoCategory->findById($cate_id);
        $this->set('category', $category);
        $list_cate = $this->VideoCategory->find(
            'list', array(
                'conditions' => array(
                    'VideoCategory.status' => 1,
                    'VideoCategory.parent_id' => $cate_id
                )
            )
        );
        $list_cate[] = $cate_id;
        $video = $this->Video->find(
            'all', array(
                'conditions' => array('Video.status' => 1),
                'order' => array('Video.id' => 'DESC')
            )
        );
        $this->set('video', $video);
    }

    /*
     * function detail of video
     * author: NGuyen Tat Loi
     * date: 26/11/2013
     */
    public function detail($video_id = null)
    {
        if(!empty($video_id)){
            $video = $this->Video->findById($video_id);
            $this->set('video', $video);
            $other_video = $this->Video->find(
                'all', array(
                    'conditions' => array(
                        'Video.id <>' => $video_id
                    ),
                    'limit' => 10,
                    'order' => array('Video.id' => 'DESC')
                )
            );
            $this->set('video', $video);
        }else{
            $this->redirect(array('action' => 'index'));
        }
    }
}
?>