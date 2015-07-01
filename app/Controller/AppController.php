<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public function beforeFilter() {
		/*if(!$this->Session->check('lang')){
			$this->Session->write('lang','vi');
		}
		if(!empty($this->params->query)){
			$lang = $this->params->query['lang']; 
			$this->Session->write('lang', $lang);
		}
        // set language
        if($this->Session->read('lang') == 'vie' || $this->Session->read('lang') == "") {
            Configure::write('Config.lang', 'vie');
        } else {
            Configure::write('Config.lang', $this->Session->read('lang'));
        }*/
    }
}
