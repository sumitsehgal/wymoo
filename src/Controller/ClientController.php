<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher; 
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

	public function initialize()
	{
		parent::initialize();
		$this->Auth->allow(['casebeginPost', 'casebegin']);
	}


	public function index(){
		//echo "string";die();
	}

	public function casebegin()
	{
		$timestamp = strftime("%Y%m%d%H%M%S");
		mt_srand((double)microtime()*1000000);
		$folderid = $timestamp."-".mt_rand(1, 999);

		$dir = WWW_ROOT."/uploads/";

		$directory =  $dir .DS.  'cases' . DS ;

		$isPost = $this->request->is('post');

		if($isPost)
		{
			$this->loadModel('Users');

			$data = $this->request->getData();
			$userData['fname'] = $data['client_fname'];
			$userData['lname'] = $data['client_lname'];
			$userData['email'] = $data['client_email'];
			$userData['username'] = $data['client_email'];
			$userData['password'] = $this->Users->generatePassword();
			$userData['temppassword'] =	$userData['password'];
			$userData['password_token'] = $userData['password'];
			$userData['phone'] = $data['subject_phone'];
			$userData['slug'] = $userData['email'];

			// TODO validation for both User and Case Model

			$duedate =  explode('-',$data['subject_dob']);
			$duedate1 =  explode('-',$data['subject_dob1']);

			if(count($duedate)==3 && $data['subject_dob1']!='' && (isset($duedate1[2]) && $duedate1[2]!=date('Y')))
			{
				$data['subject_dob'] =  mktime(23,59,59,$duedate[1]*1,$duedate[0]*1,$duedate[2]);	
			} 
			else 
			{
				$data['subject_dob'] = 0;
			}

			$userData['passwd'] = $userData['password'];
			$userData['user_type_id'] = 1;
			$userData['is_admin'] = 0;
			$userData['role'] = Configure::read('user_types.1');
			$userData['active'] =1;
			$user = $this->Users->newEntity();
			$user = $this->Users->patchEntity($user, $userData);

			$this->Users->save($user);
			$user_id = $user->id;
			$this->loadModel('Cases');

			$case = $this->Cases->newEntity();
			
			$data['user_id'] =$user_id;
			$data['client_login_id'] =$user->username ;
			$data['site_id'] =Configure::read('site_id'); 
			$data['site_name'] =Configure::read('sites_id.'.Configure::read('site_id').'.display_name');
			$data['service_type'] =1 ;
			$data['case_status_id'] =1 ;
			$data['case_status'] =Configure::read('case_status.1.title');
			$data['assigned_to']  = 0;
			$data['submited_date']  = time();
			$data['service_level']  = 0;
			$data['discount']  = 0;
			$data['due_date']  = '';
			
			
			

			$this->Cases->patchEntity($case, $data);
			$this->Cases->save($case);
			$case_id = $case->id;

			$this->loadModel('CaseNotes');
			$caseNotes = $this->CaseNotes->newEntity();
			$fields_values = array();
			$CaseNote['user_id'] = $user_id;
			$CaseNote['case_id'] = $case_id;
			$CaseNote['case_notes'] = Configure::read('case_status.1.description');
			$CaseNote['creator_id'] = $user_id;
			$CaseNote['case_status_id'] = 1;
			$CaseNote['case_status'] = Configure::read('case_status.1.title');
			$CaseNote['fields_values'] = json_encode($fields_values);

			$this->CaseNotes->patchEntity($caseNotes, $CaseNote);
			$this->CaseNotes->save($caseNotes);

			// TODO Renaming Uploading Files.

			$this->Cases->Query("UPDATE `quotes` SET `case_id` = '".$case_id."' WHERE `case_id` ='0' AND email='". $userData['email'] ."' ORDER BY `create_dt` DESC LIMIT 1 ");
			
			$login_data = array();
					
			$logindata['passwd'] = $userData['temppassword'] ;
			$logindata['username'] = $userData['username'] ;
			$data['username'] = $userData['username'];
			$data['password_token'] = $userData['password_token'];
			$this->Auth->setUser($user);
			$this->Flash->success('You are succesfully submitted case.', 'success');
			//$this->_sendEmail('theprofessional1992@gmail.com', ['from@example.com'], 'theprofessional67@gmail.com', 'Subject is here', 'welcome');
		
			$this->_sendEmail($user->email, [Configure::read('default_email.email')], Configure::read('noreply_email.email'), Configure::read('title').' received your Case Data' ,'case_data', array('result' => $data ) );
			// TODO Change URL
			//$this->redirect(array('action' => 'casetracker'));
			$this->redirect('/client/admin/');
		}
	}

	public function casebeginPost()
	{
		
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
