<?php
class NewsController extends AppController
{
    public $name = 'News';
    public $uses = array(
        'News', 'NewsCategory'
    );

    public function index()
    {
        $this->paginate = array('limit'=>15, 'order'=>'News.id DESC');
        $list_news = $this->paginate('News');
        $this->set('list_news', $list_news);
    }

    public function category($cate_id = null)
    {
        if(!empty($cate_id)){
            $category = $this->NewsCategory->findById($cate_id);
            $list_cate = $this->NewsCategory->find(
                'list', array(
                    'fields' => 'NewsCategory.id',
                    'conditions' => array(
                        'NewsCategory.parent_id' => $cate_id
                    )
                )
            );
            $list_cate[] = $cate_id;
            $this->paginate = array('conditions' => array('News.news_category_id' => $list_cate), 'limit'=>15, 'order'=>'News.id DESC');
            $news = $this->paginate('News');
            $this->set('category', $category);
            $this->set('list_news', $news);
        }else{
            $this->redirect(array('action' => 'index'));
        }
    }

    public function detail($news_alias = null)
    {
        if(!empty($news_alias)){
            $news = $this->News->findByAlias($news_alias);
            if(!empty($news)){
                $this->set('news', $news);
                $other_news = $this->News->find(
                    'all', array(
                        'conditions' => array(
                            'News.news_category_id' => $news['News']['news_category_id']
                        ),
                        'limit' => 10,
                        'order' => array('News.id' => 'DESC')
                    )
                );
                $this->set('other_news', $other_news);
            }else{
                $this->redirect(array('action' => 'index'));
            }
        }else{
            $this->redirect(array('action' => 'index'));
        }
    }

    public function get_hot_news()
    {
        if(!$hot_news = Cache::read('home_hot_news')){
            $hot_news = $this->News->find(
                'all', array(
                    'conditions' => array(
                        'News.status' => 1,
                    ),
                    'order' => array('News.id' => 'DESC'),
                    'limit' => 5
                )
            );
            Cache::write('home_hot_news', $hot_news);
        }

        return $hot_news;
    }
}
?>