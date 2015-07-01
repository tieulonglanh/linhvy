<?php

App::uses('Controller', 'Controller');
App::import('Vendor', 'ckeditor');
App::import('Vendor', 'ckfinder');

class AppController extends Controller {

    public $helpers = array('Form', 'Html', 'Js', 'Session', 'Paginator', 'TvFck');

    public function get_category($category_name, $prefix = ' -- ', $conditions = array())
    {
        $category = $this->$category_name->find('all', array('conditions' => $conditions));
        $all_cate = array();
        if(!empty($category)){
            foreach($category as $key => $value){
                $all_cate[$value[$category_name]['id']] = array(
                    'id' => $value[$category_name]['id'],
                    'name' => $value[$category_name]['name'],
                    'parent_id' => $value[$category_name]['parent_id']
                );
            }
            $this->treeze($all_cate, 'parent_id', 'child');
            $this->convert_array($all_cate, $return, 1, $prefix);
            return $return;
        }else return array();

    }

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

    private function convert_array($array, &$return, $level = 1, $prefix=' -- ')
    {
        foreach($array as $value){
            $return[$value['id']] = str_repeat($prefix, $level-1).$value['name'];
            if(!empty($value['child'])){
                $this->convert_array($value['child'], $return, $level+1);
            }
        }
    }

}
