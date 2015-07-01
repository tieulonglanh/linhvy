<?php
class ProductController extends AppController
{
    public $name = "Product";
    public $uses = array("Product", "ProductCategory", "Tag", "Phone", 'Order', 'OrderDetail');

    public function index()
    {
        $category = $this->ProductCategory->find(
            'all',
            array(
                'conditions' => array(
                    'ProductCategory.status' => 1,
                    'ProductCategory.parent_id' => 0
                ),
				'order' => array('ProductCategory.sort_order' => 'ASC')
            )
        );
        foreach($category as $key => $value){
            $list_category = $this->ProductCategory->find(
                'list',
                array(
                    'fields' => array(
                        'ProductCategory.id'
                    ),
                    'conditions' => array(
                        'ProductCategory.status' => 1,
                        'ProductCategory.parent_id' => $value['ProductCategory']['id']
                    )
                )
            );
            $child_list_cate = $this->ProductCategory->find(
                'list',
                array(
                    'fields' => array(
                        'ProductCategory.id'
                    ),
                    'conditions' => array(
                        'ProductCategory.status' => 1,
                        'ProductCategory.parent_id' => $list_category
                    )
                )
            );
            $list_category = array_merge($list_category, $child_list_cate);
            $list_category[] =  $value['ProductCategory']['id'];
            $list_product = $this->Product->find(
                'all',
                array(
                    'conditions' => array(
                        'Product.status' => 1,
                        'Product.product_category_id' => $list_category,
						'Product.home_product' => 1
					),
                    'limit' => 20
                )
            );
            $category[$key]['Product'] = $list_product;
        }
        /*$hot_product =  $this->Product->find(
            'all',
            array(
                'conditions'=>array(
                    'Product.status'=>1,
                    'Product.hot_product'=>1
                ),
                'order'=>'Product.id DESC',
                'limit'=>4
            )
        );
        $this->set('hot_product', $hot_product);*/
        $this->set('category', $category);
    }

    public function listProduct($id = null)
    {
        if(!empty($id)){
            $category = $this->ProductCategory->findById($id);
            $list_category = $this->ProductCategory->find(
                'list',
                array(
                    'fields' => array(
                        'ProductCategory.id'
                    ),
                    'conditions' => array(
                        'ProductCategory.status' => 1,
                        'ProductCategory.parent_id' => $id
                    )
                )
            );
            $list_category[] =  $id;
            $this->paginate =  array(
                'conditions' => array(
                    'Product.status' => 1,
                    'Product.product_category_id' => $list_category
                ),
                'order' => array(
                    'Product.id' => 'DESC',
                    'Product.sort_order' => 'ASC'
                ),
                'limit' => 12
            );

            $list_product = $this->paginate('Product');
            $this->set('category', $category);
            $this->set('list_product', $list_product);
			$this->set('layout_title', $category['ProductCategory']['name']); 
        }else{
            $this->redirect('/');
        }
    }

    public function detail($id = null)
    {
        if(!empty($id)){
            $product = $this->Product->findById($id);
            if(empty($product)) $this->redirect('/');
            $this->set('product', $product);
            $other_product = $this->Product->find(
                'all',
                array(
                    'conditions' => array(
                        'Product.status' => 1,
                        'Product.product_category_id' => $product['Product']['product_category_id']
                    ),
                    'order' => array(
                        'Product.id' => 'DESC'
                    ),
                    'limit' => 10
                )
            );
            $this->set('other_product', $other_product);
			$this->set('layout_title', $product['Product']['name']); 
			$this->set('layout_description', $product['Product']['description']); 
        }else{
            $this->redirect('/');
        }

    }

    public function tags($phone_id = null)
    {
        if(!empty($phone_id)){
            $phone = $this->Phone->findById($phone_id);
            if(empty($phone)) $this->redirect('/');
            $product_id = $this->Tag->find(
                'list', array(
                    'fields' => array('Tag.product_id'),
                    'conditions' => array(
                        'Tag.phone_id' => $phone_id
                    )
                )
            );
            $this->paginate =  array(
                'conditions' => array(
                    'Product.id' => $product_id
                ),
                'order' => array(
                    'Product.sort_order' => 'ASC',
					'Product.id' => 'DESC'
                ),
                'limit' => 12
            );
            $list_product = $this->paginate('Product');
            $this->set('list_product', $list_product);
            $category['ProductCategory'] = $phone['Phone'];
            $this->set('category', $category); 
			$this->set('title_layout', 'Sản phẩm cho dòng điện thoại '.$phone['Phone']['name'].' - Phụ kiện Sơn La'); 
            $this->render('listProduct');
        }else{
            $this->redirect('/');
        }
    }
	
	public function search()
    {
        $query = $this->params->query;

        $product_name = !empty($query['keyword']) ? Inflector::slug($query['keyword'], ' ') : '';
        $conditions = array(
            'Product.status' => 1,
            'Product.name like "%'.$product_name.'%"'
        );

        if(!empty($query['price_from'])) $conditions['Product.price >'] = $query['price_from'];
        if(!empty($query['price_to'])) $conditions['Product.price <'] = $query['price_to'];

        $this->paginate =  array(
            'conditions' => $conditions,
            'order' => array(
                'Product.id' => 'DESC',
                'Product.sort_order' => 'ASC'
            ),
            'limit' => 15
        );

        $list_product = $this->paginate('Product');
        $this->set('list_product', $list_product);
        $this->set('title_layout', 'Tìm kiếm sản phẩm');
        $this->render('list_product');
    }

    public function add_shopping_cart($product_id)
    {
        if(!empty($product_id)){
            $product = $this->Product->findById($product_id);
            if(!empty($product)){
                $shopping_cart = $this->Session->read('shopping_cart');
                if(!empty($shopping_cart)){
                    if(!empty($shopping_cart[$product_id])){

                        $shopping_cart[$product_id]['so_luong'] += 1;
                    }else{
                        $product['so_luong'] = 1;
                        $shopping_cart[$product_id] = $product;
                    }
                }else{
                    $product['so_luong'] = 1;
                    $shopping_cart[$product_id] = $product;
                }
                $this->Session->write('shopping_cart', $shopping_cart);
				//header('Location: /gio-hang'); 
				//exit;
				return $this->redirect(array('controller' => 'Product', 'action' => 'shopping_cart'));
            }else{
                $url = $this->referer() ? $this->referer() : DOMAIN;
                $this->redirect($url);
            }
        }else{
            $this->redirect(array('controller' => 'Product', 'action' => 'shopping_cart'));
        }
    }

    public function shopping_cart()
    {
        $this->Session->setFlash('');
        if($this->request->data){
            if($shopping_cart = $this->Session->read('shopping_cart')){
                $data = $this->request->data;
                if(empty($data['name']) || empty($data['email']) || empty($data['phone'])){
                    $this->Session->setFlash('Bạn phải nhập đầy đủ thông tin cá nhân');
                }else{
                    $order = array(
                        'username' => $data['name'],
                        'address' => $data['email'],
                        'phone' => $data['phone'],
                        'number_product' => count($shopping_cart),
                        'total_amout' => $data['total_amout']
                    );
                    $this->Order->save($order);
                    $order_id = $this->Order->getLastInsertID();
                    foreach($shopping_cart as $key => $value){
                        $order_detail[] = array(
                            'order_id' => $order_id,
                            'product_id' => $value['Product']['id'],
                            'number_product' => $value['so_luong']
                        );
                    }
                    $this->OrderDetail->saveAll($order_detail);
                    $this->Session->write('shopping_cart', array());
					ob_start();
                    $this->Session->setFlash('Bạn đã đặt hàng thành công. Chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất!');
                }
            }else{
                $this->Session->setFlash('Giỏ hàng bạn không có sản phẩm nào. Mời bạn thêm sản phẩm vào giỏ hàng trước khi đặt hàng!');
            }
        }
        $shopping_cart = $this->Session->read('shopping_cart');
        $this->set('shopping_cart', $shopping_cart);
    }

    public function update_shopping_cart()
    {
        if($this->request->data){
            $data = $this->request->data;
            $shopping_cart = $this->Session->read('shopping_cart');
            foreach($data['so_luong'] as $key => $value){
                $shopping_cart[$key]['so_luong'] = $value;
            }
            $this->Session->write('shopping_cart', $shopping_cart);
            $this->Session->setFlash('Cập nhật giỏ hàng thành công');
        }
        $this->redirect(array('controller' => 'Product', 'action' => 'shopping_cart'));
    }
}
?>