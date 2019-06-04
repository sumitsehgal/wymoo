<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher; 
use Cake\Validation\Validator;
use App\Utility\qqFileUploader;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class ClientController extends AppController {

	public $allowedExtensions = array();

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
		$this->Auth->allow(['casebeginPost', 'casebegin', 'ajaxUpload', 'ajaxDelete']);
	}


	public function index(){
		//echo "string";die();
	}

	public function casebegin()
	{
		$session = $this->getRequest()->getSession();
		$timestamp = strftime("%Y%m%d%H%M%S");
		mt_srand((double)microtime()*1000000);
		$folderid = $timestamp."-".mt_rand(1, 999);

		$dir = Configure::read('AMU.directory');

		$directory =  $dir .DS.  'CaseTable' . DS ;

		$isPost = $this->request->is('post');

		$sessionfolder =  ( $session->read($this->name.'.casebegin.folderid') ) ? $session->read($this->name.'.casebegin.folderid') : '';	
		
		$this->set('folderid', $folderid);

		if($isPost)
		{
			if($sessionfolder != '')
				$folderid = $sessionfolder;
			$this->set('folderid', $folderid);
			$this->loadModel('Users');
			//validation
			$validator = new Validator();
			$validator
					->requirePresence('client_fname')
					->notEmpty('client_fname','This field cannot be left blank, please try again.')
					// ->add('client_fname', 'validFormat', [
					// 	'rule' =>array('custom' ,'/^[a-zA-Z ]*$/'),
					// 	'message' => ' First name should be letters only '
					// ])
			        //  ->add('client_fname', [
					// 	'length' => [
					// 		'rule' => ['minLength', 3],
					// 		'message' => ' Firstname length must be minimum  3.',
					// 	]
					// ])

                    ->requirePresence('client_lname')
					->notEmpty('client_lname','This field cannot be left blank, please try again.')
					// ->add('client_lname', 'validFormat', [
					// 	'rule' =>array('custom','/^[a-zA-Z ]*$/'),
					// 	'message' => ' LastName should be letters only'
					// ])
                    // ->add('client_lname', [
					// 	'length' => [
					// 		'rule' => ['minLength', 3],
					// 		'message' => ' LastName  length must be minimum 3.',
					// 	]
					// ])

					->requirePresence('client_email')
					->notEmpty('client_email','This field cannot be left blank, please try again.')
					->add('client_email', 'validFormat', [
						'rule' => 'email',
						'message' => 'Must be a valid email address.'
					])
					->allowEmptyString('subject_email')
					->add('subject_email', 'validFormat', [
						'rule' => 'email',
						'message' => 'Must be a valid email address.'
					]);

					
			$errors = $validator->errors($this->request->getData());

			$oldData = $this->request->getData();
			if(!empty($oldData['subject_phone']))
			{
				if(!preg_match("/^\d+\.?\d*$/",$oldData['subject_phone']))
				{
					$errors['subject_phone'][] = 'Must be a valid Phone Number';
				}
			}

			if(!empty($oldData['client_email']))
			{
				 $this->loadModel('Cases');
				 $check_email = $this->Cases->find('all',[
					'conditions' => [
						'client_email' => $oldData['client_email']
					]
				])->first();
			  	if($check_email)
				{
					$errors['client_email'][] = 'This email is already in use.';
				}
			}

			if(!empty($errors))
			{
				$this->set(compact('errors', 'oldData'));
			      //dd($errors);
			}
			else
			{

				$data = $this->request->getData();

   			    $duedate =  explode('-',$data['subject_dob']);
				$duedate1 =  explode('-',$data['subject_dob1']);

				if(count($duedate)==3 && $data['subject_dob1']!='' && (isset($duedate1[2]) && $duedate1[2]!=date('Y')))
				{
					$data['subject_dob'] =  mktime(23,59,59,$duedate1[1]*1,$duedate1[0]*1,$duedate1[2]);	
				} 
				else 
				{
					$data['subject_dob'] = 0;
				}
				

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
				$data['subject_communication_email']  = ( isset($data['subject_communication_email']) && $data['subject_communication_email'] == "") ? 1 : 0;
				$data['subject_communication_messenger']  = (isset($data['subject_communication_messenger']) && $data['subject_communication_messenger'] == "") ? 1 : 0;
				$data['subject_communication_phone']  = (isset($data['subject_communication_phone']) && $data['subject_communication_phone'] == "") ? 1 : 0;
				$data['subject_communication_webcam']  = ( isset($data['subject_communication_webcam']) && $data['subject_communication_webcam'] == "") ? 1 : 0;
				$data['subject_communication_inperson']  = (isset($data['subject_communication_inperson']) && $data['subject_communication_inperson'] == "") ? 1 : 0;
				
				
				$this->Cases->patchEntity($case, $data);
				$this->Cases->save($case);
				$case_id = $case->id;

				$folderPath = Configure::read('AMU')['directory'];
				/*if(!empty($_FILES))
				{
					if(!empty($_FILES['photoes']))
					{
						// TODO : create folder
						$directory = $folderPath.'/'.$case_id.'_photo';
						@mkdir($directory, 0777, true);
						
						for($i=0; $i<count($_FILES['photoes']['name']); $i++)
						{
							$filename = $_FILES['photoes']['name'][$i];
							$tmp_name = $_FILES['photoes']['tmp_name'][$i];
							$filePath = $directory.'/'.$filename;
							@move_uploaded_file($tmp_name, $filePath);
						}
					}
					
					if(!empty($_FILES['docs']))
					{
						// TODO : create folder
						$directory = $folderPath.'/'.$case_id.'_document';
						@mkdir($directory, 0777, true);

						for($i=0; $i<count($_FILES['docs']['name']); $i++)
						{
							$filename = $_FILES['docs']['name'][$i];
							$tmp_name = $_FILES['docs']['tmp_name'][$i];
							$filePath = $directory.'/'.$filename;
							@move_uploaded_file($tmp_name, $filePath);

						}
					}this->
				}*/
				@rename($directory. $data['folderid']."_photo",$directory. $case_id."_photo");
				@rename($directory. $data['folderid']."_document",$directory. $case_id."_document");

				$this->loadModel('CaseNotes');
				$caseNotes = $this->CaseNotes->newEntity();
				$fields_values = array();
				$CaseNote['user_id'] = $user_id;
				$CaseNote['case_id'] = $case_id;
				$CaseNote['case_notes'] = Configure::read('case_status.1.description');
				$CaseNote['creator_id'] = $user_id;
				$CaseNote['created'] = time();
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
				$logindata['email'] = $userData['email'] ;
				$data['username'] = $userData['username'];
				$data['password_token'] = $userData['password_token'];
				$this->Auth->setUser($user);
				$this->Flash->clientsuccess('You are succesfully submitted case.',[ 'params' => $logindata ]);
				//$this->_sendEmail('theprofessional1992@gmail.com', ['from@example.com'], 'theprofessional67@gmail.com', 'Subject is here', 'welcome');
				$this->_sendEmail($user->email, [Configure::read('default_email.email')=>Configure::read('default_email.name')], Configure::read('noreply_email.email'), Configure::read('title').' received your Case Data' ,'case_data', array('result' => $data ) );
				$this->redirect('/client/client/tracker/');
			}
		}
		else
		{
			$attachfolder =  ( $session->read($this->name.'.casebegin.folderid') ) ? $session->read($this->name.'.casebegin.folderid') : '';	
			if($attachfolder!='')
			{
				
				$this->rrmdir($directory . $attachfolder.'_photo');
				$this->rrmdir($directory . $attachfolder.'_document');
			}
			$session->write($this->name.'.casebegin.folderid', $folderid);	
			if(!file_exists($directory . $folderid.'_photo'))
				@mkdir($directory . $folderid.'_photo',0777,true);
			if(!file_exists($directory . $folderid.'_document'))
				@mkdir($directory . $folderid.'_document',0777,true);
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

	public function ajaxUpload($dir = null,$maxfiles=5)
	{

		// $input = fopen("php://input", "r");
        // $temp = tmpfile();
        // $realSize = stream_copy_to_stream($input, $temp);
		// fclose($input);
		// dd($input);
		// return $realSize;exit;

		$size = Configure::read ('AMU.filesizeMB');
		if ( strlen( $size ) < 1 ) $size = 4;
		// real path of the directroty 
		$relPath = Configure::read ('AMU.directory');
	
		$sizeLimit = $size * 1024 * 1024;
		// set layout ajax for this view
		$this->viewBuilder()->setLayout('ajax');
		//Configure::write('debug', 0);
		$directory =  $relPath;
		if ($dir === null) {
			$this->set("result", "{\"error\":\"Upload controller was passed a null value.\"}");
			return;
		}
		// Replace underscores delimiter with slash
		$dir = str_replace ("__", "/", $dir);
		$dir = $directory . DS . "$dir/";
		if (!file_exists($dir)) {
			mkdir($dir, 0777, true);
		}
		$files = glob ("$dir/*");
		if(count($files) >= $maxfiles){
			$result = array('error'=> 'Sorry, you cannot upload more than '.$maxfiles.' files.');
			$this->set("result", htmlspecialchars(json_encode($result), ENT_NOQUOTES));
		}else{
			
		$uploader = new qqFileUploader($this->allowedExtensions, $sizeLimit);
		$result = $uploader->handleUpload($dir, true);
		echo json_encode($result);exit;
		//$this->set("result", htmlspecialchars(json_encode($result), ENT_NOQUOTES));
		}
	}

	function rrmdir($dir) {
		foreach(glob($dir . '/*') as $file) {
			if(is_dir($file))
				rrmdir($file);
			else
				@unlink($file);
		}
		@rmdir($dir);
	}

	public function ajaxDelete($file = null)
	{
		if (is_null($file)) {
			echo json_encode(['status'=>false]);
			exit;
		}
		$file = base64_decode($file);
		if (file_exists($file)) {
			if (unlink($file)) {
			} else {
			}
		} else {
		}
		echo json_encode(['status'=>true]);
		exit;
	}

}
