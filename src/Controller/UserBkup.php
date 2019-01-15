<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;


class UsersController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
public $name = 'Users';

/**
 * Helpers
 *
 * @var array
 */
//public $helpers = array('Html', 'Form',  'Javascript', 'Session', 'Time', 'Text', 'Utils.Gravatar');
public $helpers = array('Html', 'Form', 'Session', 'Time', 'Text');

/**
 * Components
 *
 * @var array
 */

//public $components = array('Auth', 'Session', 'Email', 'Cookie', 'Search.Prg');
public $components = array('Auth', 'Cookie');

/**
 * $presetVars
 *
 * @var array $presetVars
 */
public $presetVars = array(
	array('field' => 'search', 'type' => 'value'),
	array('field' => 'username', 'type' => 'value'),
	array('field' => 'fname', 'type' => 'value'),
	array('field' => 'lname', 'type' => 'value'),
	array('field' => 'email', 'type' => 'value'));

/**
 * beforeFilter callback
 *
 * @return void
 */
public function beforeFilter(Event $event) {
	parent::beforeFilter($event);
	$this->set('model', $this->modelClass);
	if (!Configure::read('App.defaultEmail')) {
		Configure::write('App.defaultEmail', Configure::read('noreply_email.email'));
	}
}

public function index() {
	
}
/**
 * Common Admin Login action
 *
 * @return void
 */
function forgotpassword() {
	if($this->Auth->User()){
		$this->redirect('/');
	}
	if(!empty($this->data)){
		$this->{$this->modelClass}->setValidation('forgotpassword');
		$this->User->set($this->data); 
		if ($this->User->validates()) {
			$result = $this->{$this->modelClass}->findByEmail($this->data[$this->modelClass]['client_email']);
			if($result && $result[$this->modelClass]['user_type_id']==1){
				$this->layout = 'sendmail';
				Configure::write('debug',0);
					//$result[$this->modelClass]['email']
				$this->_sendMail($result[$this->modelClass]['email'], Configure::read('title').' <'.Configure::read('default_email.email').'>', Configure::read('noreply_email.email'), 'Forgot your password?' ,'forgot_password',array('result' => $result ), "", 'html' );
				$message = sprintf(__( 'An email was sent to %s with your password.', true), $this->data[$this->modelClass]['client_email']);
				$this->Session->setFlash($message,'success');
				$this->redirect(array('action'=>'login'));
				exit;

			}else{
				$this->Session->setFlash( __( 'Invalid email address.', true),'error');
				$this->redirect(array('action'=>'login'));
				exit;

			}

		}else{
			$this->Session->setFlash( __( 'Invalid email address.', true),'error');	
			$this->redirect(array('action'=>'login'));
			exit;
		}
	} 
	if (isset($this->data[$this->modelClass]['return_to'])) {
		$this->set('return_to',$this->data[$this->modelClass]['return_to']);
	} else {
		$this->set('return_to', false);
	}
	$this->render('login');

}
function admin_forgotpassword() {
	if($this->Auth->User()){
		$this->redirect('/admin');
	}
	if(!empty($this->data)){
		$this->{$this->modelClass}->setValidation('forgotpassword');
		$this->User->set($this->data); 
		if ($this->User->validates()) {
			$result = $this->{$this->modelClass}->findByEmail($this->data[$this->modelClass]['client_email']);
			if($result && $result[$this->modelClass]['user_type_id']!=1){
				$this->layout = 'sendmail';
				Configure::write('debug',0);
					//$result[$this->modelClass]['email']
				$this->_sendMail($result[$this->modelClass]['email'], Configure::read('title').' <'.Configure::read('default_email.email').'>', Configure::read('noreply_email.email'), 'Forgot your password?' ,'admin_forgot_password',array('result' => $result ), "", 'html' );
				$message = sprintf(__( 'An email was sent to %s with your password.', true), $this->data[$this->modelClass]['client_email']);
				$this->Session->setFlash($message,'success');
				$this->redirect(array('action'=>'login'));
				exit;

			}else{
				$this->Session->setFlash( __( 'Invalid email address.', true),'error');

			}

		}else{
			$this->Session->setFlash( __( 'Invalid email address.', true),'error');
		}
	} 
	if (isset($this->data[$this->modelClass]['return_to'])) {
		$this->set('return_to',$this->data[$this->modelClass]['return_to']);
	} else {
		$this->set('return_to', false);
	}
	$this->render('admin_login');

}

public function admin_login() { 

	$this->set('breadcrumb', '<h1>Login <span>Required</span></h1>');

	if ($this->Auth->user()) {
		
		$this->User->id = $this->Auth->user('id');
		$this->User->saveField('last_login', date('Y-m-d H:i:s'));

		if ($this->here == $this->Auth->loginRedirect) {
			$this->Auth->loginRedirect = 'admin/';
		}

		$this->Session->setFlash(sprintf(__d('users', '%s you have successfully logged in.', true), $this->Auth->user('username')),'success');

		if (!empty($this->data)) {
			$data = $this->data[$this->modelClass];
			$this->_setCookie();
		}

		if (empty($data['return_to'])) {
			$data['return_to'] = null;
		}
		$red = $this->Auth->redirect($data['return_to']);

		$redarray = explode("/",$red);
		if(isset($redarray[0]) && $redarray[0]=='admin'){
			$this->redirect($this->Auth->redirect($data['return_to']));exit;
		} else {
			$this->redirect('/admin');exit;
		}


	}

	if(isset($this->params['url']['fail']) && $this->params['url']['fail']==1){
		$message = __( 'Invalid User-ID / password combination. Please try again.', true);
		$this->Session->setFlash($message,'error');
	}

	if (isset($this->params['named']['return_to'])) {
		$this->set('return_to', urldecode($this->params['named']['return_to']));
	} else {
		$this->set('return_to', false);
	}
	$this->set('referer', $this->referer());

}



/**
 * Common Login action
 *
 * @return void
 */
public function login() 
{ 
	$this->set('breadcrumb', '<h1>Login <span>Required</span></h1>');
	$this->set('referer', $this->referer());


	if ($this->request->is('post')) {
        $user = $this->Auth->identify();
        if ($user) {
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
        } else {
            $this->Flash->error(__('Username or password is incorrect'));
        }
	}


	if (isset($this->params['named']['return_to'])) {
		$this->set('return_to', urldecode($this->params['named']['return_to']));
	} else {
		$this->set('return_to', false);
	}


	/*$this->set('referer', $this->referer());
	$this->set('breadcrumb', '<h1>Login <span>Required</span></h1>');
	if ($this->Auth->user()) {
		
		$this->User->id = $this->Auth->user('id');
		$last_login =  $this->Auth->user('last_login');
		$time      = strtotime($last_login);
		$this->loadModel('CaseNotification');
		$notification = $this->CaseNotification->find('count',array('conditions'=>array('user_id'=>$this->Auth->user('id'),'notification_type'=>'Admin','is_new'=>1
			)));//Query("SELECT count(*) FROM `case_notifications` WHERE user_id='" .$this->Auth->user('id') . "' AND  notification_type='Admin' AND is_new=1");
		
		if($notification!= 0){

			$this->Session->write('notification',1);
		}




		$this->User->saveField('last_login', date('Y-m-d H:i:s'));

		if ($this->here == $this->Auth->loginRedirect) {
			$this->Auth->loginRedirect = '/';
		}

		$this->Session->setFlash(sprintf(__d('users', '%s you have successfully logged in.', true), $this->Auth->user('username')),'success');

		if (!empty($this->data)) {
			$data = $this->data[$this->modelClass];
			$this->_setCookie();
		}

		if (empty($data['return_to'])) {
			$data['return_to'] = null;
		}
			//pr($this->Auth->redirect($data['return_to']));exit;
		$red = $this->Auth->redirect($data['return_to']);
		$redarray = explode("/",$red);
		if(isset($redarray[0]) && $redarray[0]=='admin'){
			$this->redirect('/');
		} else {
			$this->redirect($this->Auth->redirect($data['return_to']));exit;
		}
	}

	if (isset($this->params['named']['return_to'])) {
		$this->set('return_to', urldecode($this->params['named']['return_to']));
	} else {
		$this->set('return_to', false);
	}*/
}	


/**
 * Common logout action
 *
 * @return void
 */
public function admin_logout() {
	$message = sprintf(__d('users', '%s you have successfully logged out.', true), $this->Auth->user('username'));
		//$this->Session->destroy();
	$this->Cookie->destroy();	
	$this->Session->setFlash($message,'success');
	$this->redirect($this->Auth->logout());
}

/**
 * Common logout action
 *
 * @return void
 */
public function logout() {
	$message = sprintf(__d('users', '%s you have successfully logged out.', true), $this->Auth->user('username'));
		//$this->Session->destroy();
	$this->Cookie->destroy();	
	$this->Session->setFlash($message,'success');
	$this->redirect($this->Auth->logout());
}

/**
 * Sets the cookie to remember the user
 *
 * @param array Cookie component properties as array, like array('domain' => 'yourdomain.com')
 * @param string Cookie data keyname for the userdata, its default is "User". This is set to User and NOT using the model alias to make sure it works with different apps with different user models accross different (sub)domains.
 * @return void
 * @link http://api13.cakephp.org/class/cookie-component
 */
protected function _setCookie($options = array(), $cookieKey = 'User') {
	if (empty($this->data[$this->modelClass]['remember_me'])) {
		$this->Cookie->delete($cookieKey);
	} else {
		$validProperties = array('domain', 'key', 'name', 'path', 'secure', 'time');
		$defaults = array(
			'name' => 'rememberMe');

		$options = array_merge($defaults, $options);
		foreach ($options as $key => $value) {
			if (in_array($key, $validProperties)) {
				$this->Cookie->{$key} = $value;
			}
		}

		$cookieData = array();
		$cookieData[$this->Auth->fields['username']] = $this->data[$this->modelClass][$this->Auth->fields['username']];
		$cookieData[$this->Auth->fields['password']] = $this->data[$this->modelClass][$this->Auth->fields['password']];
		$this->Cookie->write($cookieKey, $cookieData, true, '1 Month');
	}
	unset($this->data[$this->modelClass]['remember_me']);
}


public function myaccount() {
		//pr($this);


	$this->set('breadcrumb', '<h1 class="relative">My <span>Details </span></h1>');
	$user =  $this->User->read(null, $this->Auth->user('id'));
	if (!empty($this->data)) {
		$this->data['User']['temppassword']	= $user['User']['password_token'];

		if(isset($this->data['User']['newpassword']) && $this->data['User']['newpassword']!=''){
			$this->data['User']['passwd'] = $this->data['User']['newpassword'];	
		}else{
			$this->data['User']['passwd'] =  $user['User']['password_token'];
		}

		$this->{$this->modelClass}->setValidation('admin_myaccount');
		$this->User->set($this->data); 
		if ($this->User->validates()) {
			$data['User']['password_token'] = $this->data['User']['passwd'];
			$data['User']['passwd'] = Security::hash($this->data['User']['passwd'], 'sha1', true);
			$data['User']['username'] = $this->data['User']['username'];
			$data['User']['fname'] = $this->data['User']['fname'];
			$data['User']['phone'] = $this->data['User']['phone'];
			$data['User']['email'] = $this->data['User']['email'];




			$this->User->id = $this->Auth->user('id');
			$this->User->save($data);
			$this->Session->setFlash(__( 'Your account setting has been updated successfully.', true),'success');
			$user = $this->User->read(null, $this->Auth->user('id'));
			$this->Session->write($this->Auth->sessionKey, $user['User']);
				//$this->data =$user;
				//$this->data['User']['password']		= $this->data['User']['password_token'];
			$this->redirect(array('plugin'=>'','controller'=>'pages','action'=>'dashboard'));
		}	
	}
	else {
		$this->data = $user;
		$this->data['User']['password']		= $this->data['User']['password_token'];

	}
}	
public function admin_myaccount() {
		//pr($this);
	$this->set('breadcrumb', '<h1 class="relative">Admin <span>Details </span> <div class="btnh1"><div class="btnlt"></div>
		<div class="btnmid"><a href="#" id="add_user">Add new users</a></div>
		<div class="btnrt"></div></div></h1>');
	if($this->Auth->User("role")!='Administrator'){
		$this->set('breadcrumb', '<h1 class="relative">Admin <span>Details </span></h1>');

	}

	$user =  $this->User->read(null, $this->Auth->user('id'));
	if (!empty($this->data)) {
		$this->data['User']['temppassword']	= $user['User']['password_token'];

		if(isset($this->data['User']['newpassword']) && $this->data['User']['newpassword']!=''){
			$this->data['User']['passwd'] = $this->data['User']['newpassword'];	
		}else{
			$this->data['User']['passwd'] =  $user['User']['password_token'];
		}

		$this->{$this->modelClass}->setValidation('admin_myaccount');
		$this->User->set($this->data); 
		if ($this->User->validates()) {
			$this->data['User']['password_token'] = $this->data['User']['passwd'];
			$this->data['User']['passwd'] = Security::hash($this->data['User']['passwd'], 'sha1', true);


			$this->User->id = $this->Auth->user('id');
			$this->User->save($this->data);
			$this->Session->setFlash(__( 'Your account setting has been updated successfully.', true),'success');
			$user = $this->User->read(null, $this->Auth->user('id'));
			$this->Session->write($this->Auth->sessionKey, $user['User']);
				//$this->data =$user;
				//$this->data['User']['password']		= $this->data['User']['password_token'];
			$this->redirect(array('plugin'=>'','controller'=>'pages','action'=>'dashboard','admin'=>true));
		}	
	}
	else {
		$this->data = $user;
		$this->data['User']['password']		= $this->data['User']['password_token'];

	}
}	

public function admin_add() {
	if($this->Auth->User("role")!='Administrator'){
		$this->Session->setFlash(__("You do not have privilege to add user.", true), 'error');
		if ($this->referer() != '/') {
			$this->redirect($this->referer());
		} else {
			$this->redirect(array('action' => 'casebrowser'));
		}

	}

	$this->set('breadcrumb', '<h1 class="relative">Add <span>New User </span> <div class="btnh1"><div class="btnlt"></div>
		<div class="btnmid"><a href="#" id="view_users">View users</a></div>
		<div class="btnrt"></div></div></h1>');
	$user_types = $this->User->UserType->find('list',array('conditions'=>array('id !='=>'1'),'order'=>'title ASC'));	
	$this->set('user_types',$user_types);

	if (!empty($this->data)) {


		if(isset($this->data[$this->modelClass]['newpassword']) && $this->data[$this->modelClass]['newpassword']!=''){
			$this->data[$this->modelClass]['passwd'] = $this->data[$this->modelClass]['newpassword'];	
		}
		$this->User->set($this->data); 
		$this->{$this->modelClass}->setValidation('admin_add');

		if ($this->User->validates()) {
			$this->data[$this->modelClass]['password_token'] = $this->data['User']['passwd'];
			$this->data[$this->modelClass]['passwd'] = Security::hash($this->data['User']['passwd'], 'sha1', true);
			$this->data[$this->modelClass]['role'] = Configure::read('user_types.'.$this->data['User']['user_type_id']);

			$this->User->create();
			$this->User->save($this->data);
			$this->Session->setFlash(__( 'User has been added successfully.', true),'success');
			$this->redirect(array('plugin'=>'users','controller'=>'users','action'=>'myaccount','admin'=>true));
		}	
	}

}
function admin_view() {
	if($this->Auth->User("role")!='Administrator'){
		$this->Session->setFlash(__("You do not have privilege to view user.", true), 'error');
		if ($this->referer() != '/') {
			$this->redirect($this->referer());
		} else {
			$this->redirect(array('action' => 'casebrowser'));
		}

	}
		// Breadcrumb
	$this->set('breadcrumb', '<h1>View <span>Users </span></h1>');

	$this->Prg->commonProcess();
		$limitValue = 	$limit =  1000;//Configure::read('defaultPaginationLimit');
		$case_status =  Configure::read('case_status');	
		$this->set('limitValue', $limitValue);
		$this->set('limit', $limit);

		
		$this->{$this->modelClass}->data[$this->modelClass] = $this->passedArgs;
		
		$parsedConditions = $this->{$this->modelClass}->parseCriteria($this->passedArgs);
		
		
		
		$this->paginate[$this->modelClass]['limit'] = $limit;
		$parsedConditions[$this->modelClass.'.user_type_id !='] = 1;
		$parsedConditions[$this->modelClass.'.role !='] = 'Investigator';
		$parsedConditions[$this->modelClass.'.id !='] =  $this->Auth->user('id');
		$this->paginate[$this->modelClass]['conditions'] = $parsedConditions;
		$this->paginate[$this->modelClass]['order'] = array($this->modelClass . '.created' => 'desc');
		$this->{$this->modelClass}->recursive = -1;
		$this->set('result', $this->paginate());	
		




	}

	public function admin_edit($id= null) {
		if($this->Auth->User("role")!='Administrator'){
			$this->Session->setFlash(__("You do not have privilege to edit user.", true), 'error');
			if ($this->referer() != '/') {
				$this->redirect($this->referer());
			} else {
				$this->redirect(array('action' => 'casebrowser'));
			}
			
		}
		
		$this->set('breadcrumb', '<h1 class="relative">Edit <span>New User </span> <div class="btnh1"><div class="btnlt"></div>
			<div class="btnmid"><a href="#" id="view_users">View users</a></div>
			<div class="btnrt"></div></div></h1>');
		$user_types = $this->User->UserType->find('list',array('conditions'=>array('id !='=>'1'),'order'=>'title ASC'));	
		$this->set('user_types',$user_types);
		$user =  $this->User->read(null, $id);
		if($user[$this->modelClass]['user_type_id']==1 || $user[$this->modelClass]['id']==$this->Auth->user('id')){
			$this->Session->setFlash(__( 'Invalid user id.', true),'error');
			$this->redirect(array('plugin'=>'users','controller'=>'users','action'=>'view','admin'=>true));
		}
		if (!empty($this->data)) {
			
			
			if(isset($this->data[$this->modelClass]['newpassword']) && $this->data[$this->modelClass]['newpassword']!=''){
				$this->data[$this->modelClass]['passwd'] = $this->data[$this->modelClass]['newpassword'];	
			}
			$this->User->set($this->data); 
			$this->{$this->modelClass}->setValidation('admin_add');
			
			if ($this->User->validates()) {
				$this->data[$this->modelClass]['password_token'] = $this->data['User']['passwd'];
				$this->data[$this->modelClass]['passwd'] = Security::hash($this->data['User']['passwd'], 'sha1', true);
				$this->data[$this->modelClass]['role'] = Configure::read('user_types.'.$this->data['User']['user_type_id']);
				
				$this->User->id = $user[$this->modelClass]['id'] ;
				$this->User->save($this->data);
				$this->Session->setFlash(__( 'User has been updated successfully.', true),'success');
				$this->redirect(array('plugin'=>'users','controller'=>'users','action'=>'view','admin'=>true));
			}	
		}
		else {
			$this->data = $user;
			$this->data['User']['newpassword']		= $this->data['User']['password_token'];
			$this->data['User']['temppassword']		= $this->data['User']['password_token'];
			
		}
		
	}	
	
	public function admin_delete($id= null) {
		if($this->Auth->User("role")!='Administrator'){
			$this->Session->setFlash(__("You do not have privilege to edit user.", true), 'error');
			if ($this->referer() != '/') {
				$this->redirect($this->referer());
			} else {
				$this->redirect(array('action' => 'casebrowser'));
			}
			
		}
		$user =  $this->User->read(null, $id);
		if(!empty($user)  && $user[$this->modelClass]['user_type_id']!=1 ){
			$this->User->delete($id);
			$this->Session->setFlash(__( 'User has been deleted successfully.', true),'success');

		} else {
			$this->Session->setFlash(__( 'Invalid user id.', true),'error');
		}
		$this->redirect(array('plugin'=>'users','controller'=>'users','action'=>'view','admin'=>true));
		
	}	
	public function getParentId(){
		$loggeduser = $this->Auth->User();
		
		if($loggeduser['User']['parent_id'] == 0){
			return $loggeduser['User']['id'];
		}else{
			return $loggeduser['User']['parent_id'];
		}

	}

	/**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
	
	
	// Pankaj S: 10/04/2012

	
}
