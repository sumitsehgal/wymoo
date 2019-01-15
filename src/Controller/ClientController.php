<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class ClientController extends AppController {

// 	public function initialize(){
//     parent::initialize();
//     $this->loadComponent('Auth', [
//     	'loginAction' => [
//             'controller' => 'Client',
//             'action' => 'admin_login'
//         ],
//         'authenticate' => [
//             'Form' => [
//                 'fields' => ['username' => 'username', 'password' => 'passwd']
//             ]
//         ]
//     ]);
// }


	public function index(){
		//echo "string";die();
	}

	public function casebegin(){
		
	}

	public function casebeginPost()
	{
		$isPost = $this->request->is('post');
		if($isPost)
		{
			//ToDo: Save Case
			pr($this->request->getData());
			exit;
		}
	}

	public function adminLogin(){
		$this->layout='admin';
		//echo "casebegin";die();
	}
	public function adminCasebrowser(){		
		$this->layout='admin';
		$this->paginate = [
			'contain' => ['Cases'],
		];
		$this->loadModel('Cases');
		

		$this->paginate = [ ];
		$pages = $this->paginate($this->Cases);
		$this->set('pages',$pages);




		/*$cases = TableRegistry::get('Cases');
		$query = $cases->find('all');
		$results = $query->all();
		print_r($results);die();*/
	}

	public function adminCasetracker($id) {
		$this->layout='admin';
		$this->set('id',$id);
	}


	public function adminCasenotes($id) {
		$this->layout='admin';
		//$this->layout = 'fancybox';
	}


}
