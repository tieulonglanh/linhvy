<?php
class PostController extends AppController
{
    public $name = 'Post';
    public $uses = array(
        'Post', 'News', 'NewsCategory'
    );

    /*
     * funciton index, get all post and pagination
     * author: NGuyen Tat LOi
     * date: 26/11/2013
     */
    public function index()
    {
        $this->paginate = array('limit'=>15, 'order'=>'Post.id DESC');
        $post = $this->paginate('Post');
        $this->set('post', $post);
    }

    public function detail($post_id = null)
    {
        if(!empty($post_id)){
            $post = $this->Post->findById($post_id);
            if(!empty($post)){
                $this->set('post', $post);
                $other_post = $this->Post->find(
                    'all', array(
                        'conditions' => array(
                            'Post.status' => 1,
                            'Post.id <>' => $post_id
                        ),
                        'limit' => 10,
                        'order' => array('Post.id' => 'DESC')
                    )
                );
                if($post_id == 1){
                    //gioi thieu cong ty
                    $breadcrumb = array(
                        'alias' => 'gioi-thieu',
                        'name' => 'Giới thiệu'
                    );
                    $this->set('breadcrumb', $breadcrumb);
                    $this->set('title_for_layout', 'Giới thiệu');
                }else{
                    $this->set('title_for_layout', $post['Post']['name']);
                }

                $this->set('other_post', $other_post);
            }else{
                $this->redirect('/');
            }
        }else{
            $this->redirect('/');
        }
    }
}
?>