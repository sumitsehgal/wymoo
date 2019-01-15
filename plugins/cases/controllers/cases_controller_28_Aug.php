<?php
/**
 * Copyright 2012, Gempulse Infotech Pvt. Ltd. (http://www.fullestop.com)
 *
 * @copyright Copyright 2010, Gempulse Infotech Pvt. Ltd. (http://www.fullestop.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 *
 * PHP version 5
 * CakePHP version 1.3
 
*/

/**
 * Frontusers Users Controller
 *
 * @package frontusers
 * @subpackage users.controllers
 */
class CasesController extends CasesAppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Cases';
	public $uses = 'Cases.CaseTable';

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html', 'Javascript', 'Form', 'Session', 'Time', 'Text', 'Utils.Gravatar','AjaxMultiUpload.Upload');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Auth', 'Session', 'Email', 'Cookie', 'Search.Prg');

/**
 * $presetVars
 *
 * @var array $presetVars
 */
	public $presetVars = array(
		array('field' => 'search', 'type' => 'value'),
		array('field' => 'due', 'type' => 'value'),
		array('field' => 'due_date', 'type' => 'value'),
		array('field' => 'site_id', 'type' => 'value'));
/**
 * $role
 *
 * @var string 
 */		
	public $role = 'FrontUser';
/**
 * beforeFilter callback
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('model', $this->modelClass);
	}
	
/**
 * Client Casetracker 
 *
 * @return void
 */	
  	function casetracker(){
		// Breadcrumb
		$this->set('breadcrumb','<h1>Case <span>Tracker </span></h1>');
		$this->{$this->modelClass}->recursive = 1;
		$this->{$this->modelClass}->virtualFields = array('assigned_name'=> 'SELECT CONCAT(AssignTo.fname, " ", AssignTo.lname) FROM users as AssignTo WHERE AssignTo.id='.$this->modelClass.'.assigned_to') ;

		$result = $this->{$this->modelClass}->find('first',array('contain'=>array('User','CaseNote'),'conditions'=>array($this->modelClass.'.user_id'=>$this->Auth->User('id'))));
		$this->set('result', $result);	
					

	}
/**
 * Client notifications 
 *
 * @return void
 */	
 	function newnotification(){
		$this->loadModel('CaseNotification');
		return $this->CaseNotification->find('count',array('conditions'=>array('is_new'=>1,'notification_type != '=>'Investigator', 'user_id'=>$this->Auth->User('id'))));
	}	
	function notifications() {
		$this->loadModel('CaseNotification');
		$this->CaseNotification->updateAll(array('is_new'=>0),array('user_id'=>$this->Auth->User('id')));
		$this->Session->delete('notification');
		$this->set('breadcrumb','<h1 class="relative">Case <span>Notification</span></h1>');
		$result = $this->{$this->modelClass}->find('first',array('contain'=>array('Communication'),'conditions'=>array($this->modelClass.'.user_id'=>$this->Auth->User('id'))));
		//$result = $this->CaseNotification->find('all',array('orderby'=>'created DESC','conditions'=>array('user_id'=>$this->Auth->User('id'))));
		 //pr($result);
		 if(!empty($result) && $result[$this->modelClass]['is_exported']==1){
			$this->Session->setFlash(__('Your case is in progress and notifications are now closed.  Contact your investigator for assistance.', true), 'error');
	  	}
		$this->set('result', $result);	
		if (!empty($this->data)) {
			if(!empty($result) && $result[$this->modelClass]['is_exported']==1){
		  		//$this->Session->setFlash(__('The case has been locked, you cannont change anything.', true), 'error');
				if ($this->referer() != '/') {
					$this->redirect($this->referer());
				} else {
					$this->redirect(array('action' => 'casetracker'));
				}
	  		}
			$this->data[$this->modelClass]['notify'] = '';
			$this->{$this->modelClass}->setValidation('notify');
			$this->{$this->modelClass}->set($this->data);
			if ($this->{$this->modelClass}->validates()) {
				$this->{$this->modelClass}->id = $result[$this->modelClass]['id'];
				$this->{$this->modelClass}->saveField('is_notifications','');
				
				$this->CaseNotification->create();
				$CaseNotification['user_id'] = $result[$this->modelClass]['user_id'];
				$CaseNotification['case_id'] = $result[$this->modelClass]['id'];
				$CaseNotification['comments'] = $this->data[$this->modelClass]['notification'];
				$CaseNotification['notification_type'] = 'Client';
				$CaseNotification['creator_id'] = $this->Auth->User('id');
				$this->CaseNotification->save($CaseNotification);
				$this->data[$this->modelClass]['notification'] = '';
				$this->Session->setFlash(__('Notification sent successfully.', true), 'success');
				$this->redirect(array('action'=>'notifications'));
				exit;

				} else {
					$this->Session->setFlash(__('You have not completed mandatory fields. Please complete the form and submit again.', true), 'error');

				}
				
			
			
			
		}

	}
/**
 * Client caseinfo 
 *
 * @return void
 */		
	function caseinfo() {
		$this->set('breadcrumb','<h1 class="relative">Case Data <span>Center </span> 
   	  <div class="secureicon">Secure Contact</div></h1>');
	  	$this->{$this->modelClass}->recursive = 1;
	   $result = $this->{$this->modelClass}->find('first',array('contain'=>null,'conditions'=>array($this->modelClass.'.user_id'=>$this->Auth->User('id'))));
	  if(!empty($result) && $result[$this->modelClass]['is_exported']==1){
		  //$this->Session->setFlash(__('The case has been locked, you cannont change anything.', true), 'error');
	  }
		$this->set('result', $result);	
		if (!empty($this->data)) {
			if(!empty($result) && $result[$this->modelClass]['is_submited']==1){
		  		$this->Session->setFlash(__('The case has been already submited,you cannont change anything.', true), 'error');
				if ($this->referer() != '/') {
					$this->redirect($this->referer());
				} else {
					$this->redirect(array('action' => 'casetracker'));
				}
	  		}
			if(!empty($result) && $result[$this->modelClass]['is_exported']==1){
		  		//$this->Session->setFlash(__('The case has been locked, you cannont change anything.', true), 'error');
				if ($this->referer() != '/') {
					$this->redirect($this->referer());
				} else {
					$this->redirect(array('action' => 'casetracker'));
				}
	  		}
			$this->data[$this->modelClass]['id'] = $result[$this->modelClass]['id'];;	
			$this->{$this->modelClass}->setValidation('edit_case');
			$this->{$this->modelClass}->set($this->data);
			if ($this->{$this->modelClass}->validates()) {
				$duedate =  explode('-',$this->data[$this->modelClass]['subject_dob']);
				if(count($duedate)==3){
					$this->data[$this->modelClass]['subject_dob'] =  mktime(23,59,59,$duedate[1]*1,$duedate[0]*1,$duedate[2]);	
			} else {
				$this->data[$this->modelClass]['subject_dob'] = 0;
				}
			$this->data[$this->modelClass]['case_status_id'] = 2;	
			$this->data[$this->modelClass]['case_status'] = Configure::read('case_status.2.title');	
			$this->data[$this->modelClass]['is_notifications'] ='';	
			
			$this->{$this->modelClass}->id = $result[$this->modelClass]['id'];
			if(isset($result[$this->modelClass]['user_id']) && $result[$this->modelClass]['user_id']!=0 && $result[$this->modelClass]['user_id']!=''){
				$this->{$this->modelClass}->save($this->data);
			
			$this->{$this->modelClass}->Query("UPDATE `users` SET `fname` = '".$this->data[$this->modelClass]['client_fname']."', 
										`lname` = '".$this->data[$this->modelClass]['client_lname']."',
										`email` = '".$this->data[$this->modelClass]['client_email']."'
					WHERE `users`.`id` =".$result[$this->modelClass]['user_id']);
			
			$fields_values = array();
			foreach($result[$this->modelClass] as $key=>$value){
				if(isset($this->data[$this->modelClass][$key]) && $this->data[$this->modelClass][$key] != $value){
						$fields_values[$key]['old_value'] = $value;
						$fields_values[$key]['new_value'] = $this->data[$this->modelClass][$key];
				}
			}
			$this->loadModel('CaseNote');
			$this->CaseNote->create();
			$CaseNote['user_id'] = $result[$this->modelClass]['user_id'];
			$CaseNote['case_id'] = $result[$this->modelClass]['id'];
			$CaseNote['case_notes'] = Configure::read('case_status.2.description');
			$CaseNote['creator_id'] = $this->Auth->User('id');
			$CaseNote['case_status_id'] = 2;
			$CaseNote['case_status'] =  Configure::read('case_status.2.title');
			$CaseNote['fields_values'] = json_encode($fields_values);
			
			$this->CaseNote->save($CaseNote);
			$this->Session->setFlash(__('Case data updated successfully.', true), 'success');
			}
			$this->redirect(array('action' => 'casetracker'));
			exit;
		} else {
					$this->Session->setFlash(__('You have not completed mandatory fields. Please complete the form and submit again.', true), 'error');

				}
		} else {
			
			//$result[$this->modelClass]['subject_dob'] = ($result[$this->modelClass]['subject_dob']==0) ? '' : date('d-m-Y',$result[$this->modelClass]['subject_dob']);	
			$subjectdob  = $result[$this->modelClass]['subject_dob'];
			$result[$this->modelClass]['subject_dob'] = ($result[$this->modelClass]['subject_dob']==0) ? '' : date('d-m-Y',$subjectdob);	
			$result[$this->modelClass]['subject_dob1'] = ($result[$this->modelClass]['subject_dob']==0) ? '' : date('d-F-Y',$subjectdob);	
		 	$this->data = $result;
		}
	}
/**
 * Client cleancasefiles 
 *
 * @return void
 */		
	function cleancasefiles() {
		Configure::write('debug',2);		
		$files = 	$this->{$this->modelClass}->find('list');
	
		$dir = Configure::read('AMU.directory');
		

		$directory =  $dir .DS.  $this->modelClass.  '/*'  ;
		$dirs = glob($directory);
	
		foreach($dirs as $d){
			$dir_name = explode('_',basename($d));
			if(!in_array($dir_name[0],$files)){
				$this->rrmdir($d);
			}
		}
	//$this->rrmdir($directory . $attachfolder.'_photo');
			
		exit;

	

	}	
/**
 * Client casebegin 
 *
 * @return void
 */		
	function casebegin() {
			
			
		$this->set('breadcrumb','<h1 class="relative">Case Data <span>Center </span> 
   	  <div class="secureicon">Secure Contact</div></h1>');
	  $timestamp = strftime("%Y%m%d%H%M%S");
		mt_srand((double)microtime()*1000000);
		$folderid = $timestamp."-".mt_rand(1, 999);
		
		$dir = Configure::read('AMU.directory');
		

		$directory =  $dir .DS.  $this->modelClass . DS ;
	  	
		if (!empty($this->data)) {
			
				$this->{$this->modelClass}->setValidation('edit_case');
				
				$this->{$this->modelClass}->set($this->data);
				$this->data['User']['fname'] 		= 	$this->data[$this->modelClass]['client_fname'];
				$this->data['User']['lname'] 		= 	$this->data[$this->modelClass]['client_lname'];
				$this->data['User']['email'] 		= 	$this->data[$this->modelClass]['client_email'];
				$this->data['User']['username'] 	= 	$this->data[$this->modelClass]['client_email'];
				$this->data['User']['password'] 	=	$this->{$this->modelClass}->User->generatePassword();
				$this->data['User']['temppassword'] =	$this->data['User']['password'];
				$this->data['User']['password_token'] =	$this->data['User']['password'];
				
				$this->{$this->modelClass}->set($this->data);
				$this->{$this->modelClass}->User->set($this->data);
				
				
				if ($this->{$this->modelClass}->validates() && $this->{$this->modelClass}->User->validates()) {
					
					$duedate =  explode('-',$this->data[$this->modelClass]['subject_dob']);
					if(count($duedate)==3){
						$this->data[$this->modelClass]['subject_dob'] =  mktime(23,59,59,$duedate[1]*1,$duedate[0]*1,$duedate[2]);	
					} else {
						$this->data[$this->modelClass]['subject_dob'] = 0;
						}
					
					
					$this->data['User']['passwd'] = Security::hash($this->data['User']['password'], 'sha1', true);;
					$this->data['User']['user_type_id'] = 1;
					$this->data['User']['is_admin'] = 0;
					$this->data['User']['role'] = Configure::read('user_types.1');
					$this->data['User']['active'] =1;
					$this->{$this->modelClass}->User->create();// = $result[$this->modelClass]['id'];
					
					$this->{$this->modelClass}->User->save($this->data);
					$user_id = $this->{$this->modelClass}->User->id;
					$this->{$this->modelClass}->create();// = $result[$this->modelClass]['id'];
					$this->data[$this->modelClass]['user_id'] =$user_id;
					$this->data[$this->modelClass]['client_login_id'] =$this->data['User']['username'] ;
					$this->data[$this->modelClass]['site_id'] =Configure::read('site_id'); 
					$this->data[$this->modelClass]['site_name'] =Configure::read('sites_id.'.Configure::read('site_id').'.display_name');
					$this->data[$this->modelClass]['service_type'] =1 ;
					$this->data[$this->modelClass]['case_status_id'] =1 ;
					$this->data[$this->modelClass]['case_status'] =Configure::read('case_status.1.title');
					
					$this->{$this->modelClass}->save($this->data);
					$case_id = $this->{$this->modelClass}->id;
					$this->loadModel('CaseNote');
					$this->CaseNote->create();
					$fields_values = array();
					$CaseNote['user_id'] = $user_id;
					$CaseNote['case_id'] = $case_id;
					$CaseNote['case_notes'] = Configure::read('case_status.1.description');
					$CaseNote['creator_id'] = $user_id;
					$CaseNote['case_status_id'] = 1;
					$CaseNote['case_status'] = Configure::read('case_status.1.title');
					$CaseNote['fields_values'] = json_encode($fields_values);
					$this->CaseNote->save($CaseNote);
					@rename($directory. $this->data[$this->modelClass]['folderid']."_photo",$directory. $case_id."_photo");
					@rename($directory. $this->data[$this->modelClass]['folderid']."_document",$directory. $case_id."_document");
					
					
					$this->{$this->modelClass}->Query("UPDATE `quotes` SET `case_id` = '".$case_id."' WHERE `case_id` ='0' AND email='". $this->data[$this->modelClass]['client_email'] ."' ORDER BY `create_dt` DESC LIMIT 1 ");
					
					$login_data = array();
					
					$logindata['User']['passwd'] = $this->data['User']['passwd'] ;
					$logindata['User']['username'] = $this->data['User']['username'] ;
					if($this->Auth->login($logindata)){
						$this->Session->write('case_data_center', 'success');
						$this->_sendMail($this->data['User']['email'], Configure::read('title').' <'.Configure::read('default_email.email').'>', Configure::read('noreply_email.email'), Configure::read('title').' received your Case Data' ,'case_data',array('result' => $this->data ), "", 'html' );

						
						
						$this->redirect(array('action' => 'casetracker'));
						//$this->redirect('home');
					}else{
						$this->redirect('/');
					}
					exit;
				
				} else {
					$this->Session->setFlash(__('Please see the below error messages. Complete the form and submit again.', true), 'error');

				}
			
			
			
		} else{
		
			$attachfolder =  ($this->Session->read($this->name.'.'.$this->action.'.folderid'))? $this->Session->read($this->name.'.'.$this->action.'.folderid') : '';	
			if($attachfolder!=''){
				
				$this->rrmdir($directory . $attachfolder.'_photo');
				$this->rrmdir($directory . $attachfolder.'_document');
			}
				
			$this->Session->write($this->name.'.'.$this->action.'.folderid', $folderid);
			
			@mkdir($directory . $folderid.'_photo',0777,true);
			@mkdir($directory . $folderid.'_document',0777,true);
				
				//pr($data);
			$thisdata[$this->modelClass]['folderid'] = $folderid;
			$this->data = $thisdata;
		}


	

	}
/**
 * Client submitcase 
 *
 * @return void
 */		
	function submitcase() {
		
		
		$this->set('breadcrumb','<h1 class="relative">Case Data <span>Center </span> 
   	  <div class="secureicon">Secure Contact</div></h1>');
	  $this->{$this->modelClass}->recursive = 1;
		$result = $this->{$this->modelClass}->find('first',array('contain'=>null,'conditions'=>array($this->modelClass.'.user_id'=>$this->Auth->User('id'))));
		if(!empty($result) && $result[$this->modelClass]['is_submited']==0){
			$this->{$this->modelClass}->id = $result[$this->modelClass]['id'];
			$this->{$this->modelClass}->saveField('is_submited',1);
			$this->{$this->modelClass}->saveField('case_status_id',3);
			//$this->{$this->modelClass}->saveField('is_notifications','');
			$this->{$this->modelClass}->saveField('submited_date',mktime(0,0,0,date('n'),date('j'),date('Y')));
			$this->{$this->modelClass}->saveField('case_status', Configure::read('case_status.3.title'));

			
			$this->loadModel('CaseNote');
			$this->CaseNote->create();
			$CaseNote['user_id'] = $result[$this->modelClass]['user_id'];
			$CaseNote['case_id'] = $result[$this->modelClass]['id'];
			$fields_values = array();
			$CaseNote['case_notes'] = Configure::read('case_status.3.description');
			$CaseNote['creator_id'] = $this->Auth->User('id');
			$CaseNote['case_status_id'] = 3;
			$CaseNote['case_status'] = Configure::read('case_status.3.title');
			$CaseNote['fields_values'] = json_encode($fields_values);
			$this->CaseNote->save($CaseNote);
					
			$this->Session->setFlash(__('Your case data has been submitted successfully.', true), 'success');
			$this->redirect(array('action' => 'casetracker'));
			exit;
				
		}else{
			$this->Session->setFlash(__('Invalid case id.', true), 'error');
			if ($this->referer() != '/') {
				$this->redirect($this->referer());
			} else {
				$this->redirect(array('action' => 'casetracker'));
			}
		
		}	

	}
/**
 * Admin Casetarcker 
 *
 * @return void
 */		
 	function admin_casetracker($id) {
			 $this->set('id', $id);	
			$this->set('breadcrumb', '<h1>Case <span>Tracker </span></h1>');
			$this->{$this->modelClass}->User->virtualFields = array('assigned_name'=> 'CONCAT(User.fname, " ", User.lname)') ;

			$assigned_to = $this->{$this->modelClass}->User->find('list',array(
										'fields' => array('id','assigned_name'),
										'conditions' => array('User.role =' =>  Configure::read('user_types.2')),
										'recursive' => -1
										)) ;
		
			$this->set('assigned_to', $assigned_to);
			$case_status = $this->{$this->modelClass}->CaseStatus->find('list') ;
		
			$this->set('case_status', $case_status);
		
		
			$this->{$this->modelClass}->virtualFields = array('assigned_name'=> 'SELECT CONCAT(User.fname, " ", User.lname) FROM users AS User WHERE User.id='.$this->modelClass.'.assigned_to') ;
			$this->{$this->modelClass}->recursive = 1;
			$result = $this->{$this->modelClass}->find('first',array('conditions'=>array($this->modelClass.'.id'=>$id),'contain'=>array('User','CaseNote')));
			if(empty($result)){
				$this->Session->setFlash(__('Invalid case id.', true), 'error');
					if ($this->referer() != '/') {
						$this->redirect($this->referer());
					} else {
						$this->redirect(array('action' => 'casebrowser'));
					}
			
			}
			if($result[$this->modelClass]['is_read'] ==0){
				$this->{$this->modelClass}->id = $result[$this->modelClass]['id'];	
				$this->{$this->modelClass}->saveField('is_read',1);
			}
			$is_notifications = array($this->Auth->User('id'));
			if($result[$this->modelClass]['is_notifications'] !=''){
				$is_notifications = json_decode($result[$this->modelClass]['is_notifications'],true);
				if(!in_array($this->Auth->User('id'),$is_notifications)){
					$is_notifications[] = $this->Auth->User('id');
				}
			}
			$this->{$this->modelClass}->id = $result[$this->modelClass]['id'];	
			$this->{$this->modelClass}->saveField('is_notifications',json_encode($is_notifications));

			$result[$this->modelClass]['password_token'] = $result['User']['password_token'];
			if($result[$this->modelClass]['due_date']!=0){
			$duedt = $result[$this->modelClass]['due_date'];
				$result[$this->modelClass]['due_date'] = date('d-m-Y',$duedt);
				$result[$this->modelClass]['due_date1'] = date('D, M j',$duedt);
				//$result[$this->modelClass]['due_date1'] =  date('D, M j',$result[$this->modelClass]['due_date']);
			}else{
			 	$result[$this->modelClass]['due_date'] ='';
				$result[$this->modelClass]['due_date1'] ='';
			}
			$this->set('result',$result );
			  if(!empty($result) && $result[$this->modelClass]['is_exported']==1){
		  		//$this->Session->setFlash(__('The case has been locked, you cannont change anything.', true), 'error');
			  }
			if(!empty($this->data)){
				if(!empty($result) && $result[$this->modelClass]['is_exported']==1){
		  		//$this->Session->setFlash(__('The case has been locked, you cannont change anything.', true), 'error');
				if ($this->referer() != '/') {
					$this->redirect($this->referer());
				} else {
					$this->redirect(array('action' => 'casetracker'));
				}
	  		}
				
				$this->{$this->modelClass}->setValidation('case_tracker');
				$this->{$this->modelClass}->set($this->data);
				if ($this->{$this->modelClass}->validates()) {
					
					$case_tracker['client_fname'] 		= $this->data[$this->modelClass]['client_fname'];
					$case_tracker['client_lname'] 		= $this->data[$this->modelClass]['client_lname'];
					$case_tracker['client_login_id'] 	= $this->data[$this->modelClass]['client_login_id'];
					$password_token 					= $this->data[$this->modelClass]['password_token'];
					$case_tracker['case_status_id'] 	= $this->data[$this->modelClass]['case_status_id'];
					$case_tracker['assigned_to'] 		= $this->data[$this->modelClass]['assigned_to'];
					
					$duedate =  explode('-',$this->data[$this->modelClass]['due_date']);
					if (count($duedate) == 3) {
						$duedate = mktime(23,59,59,$duedate[1]*1,$duedate[0]*1,$duedate[2]);
					} else {
						$duedate = 0;
					}
					
					$case_tracker['due_date'] =   $duedate;
					$case_tracker['service_level'] = $this->data[$this->modelClass]['service_level'];
					$case_tracker['discount'] = $this->data[$this->modelClass]['discount'];
					
					$case_tracker['case_status'] = $case_status[$this->data[$this->modelClass]['case_status_id']];
					if($this->data[$this->modelClass]['case_status_id'] >= 4  && $result[$this->modelClass]['is_submited']!=1){
						$case_tracker['is_submited'] = 1;
						$case_tracker['submited_date'] = mktime(0,0,0,date('n'),date('j'),date('Y'));	
					}
					

					
					$case_fees = Configure::read('case_fees');
					$discount = Configure::read('discount');
					
					$f = $case_fees[$this->data[$this->modelClass]['service_level']];
			  		$d = $discount[ $this->data[$this->modelClass]['discount']];
					$fee = ($f - ($f*$d)/100);
					$case_tracker['fee'] = $fee;
					$notes = $this->data[$this->modelClass]['notes'];
					$this->{$this->modelClass}->save($case_tracker);
						
					$this->loadModel('CaseNote');
					$this->CaseNote->create();
					$CaseNote['user_id'] = $result[$this->modelClass]['user_id'];
					$CaseNote['case_id'] = $result[$this->modelClass]['id'];			
					$CaseNote['case_notes'] = (trim($notes)=='') ? Configure::read('case_status.'.$this->data[$this->modelClass]['case_status_id'].'.description'): $notes;
					$CaseNote['creator_id'] = $this->Auth->User('id');
					$CaseNote['case_status_id'] = $this->data[$this->modelClass]['case_status_id'];
					$CaseNote['case_status'] = $case_status[$this->data[$this->modelClass]['case_status_id']];
					$fields_values = array();
					foreach($result[$this->modelClass] as $key=>$value){
						if(isset($this->data[$this->modelClass][$key]) && $this->data[$this->modelClass][$key] != $value){
								$fields_values[$key]['old_value'] = $value;
								$fields_values[$key]['new_value'] = $this->data[$this->modelClass][$key];
							}
						
					}
					$CaseNote['fields_values'] = json_encode($fields_values);
					$this->CaseNote->save($CaseNote);
					$this->{$this->modelClass}->User->id = $result[$this->modelClass]['user_id'];
						$this->{$this->modelClass}->User->saveField('fname',$this->data[$this->modelClass]['client_fname']);
						$this->{$this->modelClass}->User->saveField('lname',$this->data[$this->modelClass]['client_lname']);
						$this->{$this->modelClass}->User->saveField('username',$this->data[$this->modelClass]['client_login_id']);
						$this->{$this->modelClass}->User->saveField('passwd',Security::hash($password_token, 'sha1', true));
						$this->{$this->modelClass}->User->saveField('password_token',$password_token);
					
					$this->Session->setFlash(__('Case data saved successfully.', true), 'success');
					if ($this->referer() != '/') {
						$this->redirect($this->referer());
					} else {
						$this->redirect(array('action' => 'casenotes'));
					}
				
				} else {
					$this->Session->setFlash(__('You have not completed mandatory fields. Please complete the form and submit again.', true), 'error');

				}
			
				
				
			}else{
			 $this->data = $result;
			}

		
		
	}		
/**
 * Client Casebrowser 
 *
 * @return void
 */	
  	function admin_casebrowser(){
		// Breadcrumb
		$this->set('breadcrumb', '<h1>Case <span>Browser </span></h1>');
		$this->set('role',$this->Auth->User("role"));
		$this->Prg->commonProcess();
		$limitValue = 	$limit =  1000;//Configure::read('defaultPaginationLimit');
		$case_status =  Configure::read('case_status');	
		$this->set('limitValue', $limitValue);
	  	$this->set('limit', $limit);
	  	$this->set('case_status', $case_status);
		
		$this->{$this->modelClass}->data[$this->modelClass] = $this->passedArgs;
		
		$parsedConditions = $this->{$this->modelClass}->parseCriteria($this->passedArgs);
		
		if(isset($this->{$this->modelClass}->data[$this->modelClass]['due_date'])){
			$duedate = $this->{$this->modelClass}->data[$this->modelClass]['due_date'];
			$duedate = explode('-',$duedate);
			if(count($duedate)==3){
				$duedate = mktime(23,59,59,$duedate[1]*1,$duedate[0]*1,$duedate[2]);
				switch($this->{$this->modelClass}->data[$this->modelClass]['due']){
				 case 'on-or-before':
				 	$parsedConditions['due_date <='] = $duedate;
				 break;
				 case 'on':
				 	$parsedConditions['due_date'] = $duedate;
				 break;
				 case 'after':
				 	$parsedConditions['due_date >'] = $duedate;
				 break;
				}
			
			}
		
		}
		
		$this->paginate[$this->modelClass]['limit'] = $limit;
		
		$this->paginate[$this->modelClass]['conditions'] = $parsedConditions;
		$this->paginate[$this->modelClass]['order'] = array($this->modelClass . '.created' => 'desc');
		$this->{$this->modelClass}->recursive = -1;
		$this->set('result', $this->paginate());	
		
					

	}
/**
 * Client Caseinfo 
 *
 * @return void
 */	
	function admin_caseinfo($id) {
		$this->set('breadcrumb', '<h1 class="relative">Case <span>Information </span> 
		<div class="secureicon">Secure Contact</div></h1>');	
		$this->{$this->modelClass}->recursive = 1;
		$result = $this->{$this->modelClass}->find('first',array('conditions'=>array($this->modelClass.'.id'=>$id),'contain'=>null));
		if(empty($result)){
				$this->Session->setFlash(__('Invalid case id.', true), 'error');
					if ($this->referer() != '/') {
						$this->redirect($this->referer());
					} else {
						$this->redirect(array('action' => 'casebrowser'));
					}
			
			}
		if($result[$this->modelClass]['is_read'] ==0){
				$this->{$this->modelClass}->id = $result[$this->modelClass]['id'];	
				$this->{$this->modelClass}->saveField('is_read',1);
			}
		$is_notifications = array($this->Auth->User('id'));
			if($result[$this->modelClass]['is_notifications'] !=''){
				$is_notifications = json_decode($result[$this->modelClass]['is_notifications'],true);
				if(!in_array($this->Auth->User('id'),$is_notifications)){
					$is_notifications[] = $this->Auth->User('id');
				}
			}
			$this->{$this->modelClass}->id = $result[$this->modelClass]['id'];	
			$this->{$this->modelClass}->saveField('is_notifications',json_encode($is_notifications));	
			
		$this->set('result', $result);	
		 if(!empty($result) && $result[$this->modelClass]['is_exported']==1){
		  		//$this->Session->setFlash(__('The case has been locked, you cannont change anything.', true), 'error');
			  }
		if (!empty($this->data)) {
			if(!empty($result) && $result[$this->modelClass]['is_exported']==1){
		  		//$this->Session->setFlash(__('The case has been locked, you cannont change anything.', true), 'error');
				if ($this->referer() != '/') {
					$this->redirect($this->referer());
				} else {
					$this->redirect(array('action' => 'caseinfo'));
				}
	  		}
			if ($this->data[$this->modelClass]['notify'] == 1) {
				$this->data[$this->modelClass]['notify'] = '';
				$this->{$this->modelClass}->setValidation('notify');
				$this->{$this->modelClass}->set($this->data);
				if ($this->{$this->modelClass}->validates()) {
					$this->loadModel('CaseNotification');
					$this->CaseNotification->create();
					$CaseNotification['user_id'] = $result[$this->modelClass]['user_id'];
					$CaseNotification['case_id'] = $result[$this->modelClass]['id'];
					$CaseNotification['comments'] = $this->data[$this->modelClass]['notification'];
					$CaseNotification['notification_type'] = 'Admin';
					$CaseNotification['creator_id'] = $this->Auth->User('id');
					$this->CaseNotification->save($CaseNotification);
					$this->data[$this->modelClass]['notification'] = '';
					$this->_sendMail($result[$this->modelClass]['client_email'],Configure::read('title').' <'.Configure::read('default_email.email').'>', Configure::read('noreply_email.email'), 'Your case has been updated' ,'notification',array('result' => $result ),'', 'html' );	

					$this->Session->setFlash(__('Notification sent successfully.', true), 'success');
					
				
				} else {
					$this->Session->setFlash(__('You have not completed mandatory fields. Please complete the form and submit again.', true), 'error');

				}
				
			} else {
				$this->{$this->modelClass}->setValidation('edit_case');
				$this->{$this->modelClass}->set($this->data);
				if ($this->{$this->modelClass}->validates()) {
					$duedate =  explode('-',$this->data[$this->modelClass]['subject_dob']);
					if(count($duedate)==3){
						$this->data[$this->modelClass]['subject_dob'] =  mktime(23,59,59,$duedate[1]*1,$duedate[0]*1,$duedate[2]);	
					}
					$this->{$this->modelClass}->id = $result[$this->modelClass]['id'];


					$this->{$this->modelClass}->save($this->data);
					$this->{$this->modelClass}->Query("UPDATE `users` SET `fname` = '".$this->data[$this->modelClass]['client_fname']."', 
										`lname` = '".$this->data[$this->modelClass]['client_lname']."',
										`email` = '".$this->data[$this->modelClass]['client_email']."'
					WHERE `users`.`id` =".$result[$this->modelClass]['user_id']);
					$fields_values = array();
					foreach($result[$this->modelClass] as $key=>$value){
						if(isset($this->data[$this->modelClass][$key]) && $this->data[$this->modelClass][$key] != $value){
							$fields_values[$key]['old_value'] = $value;
							$fields_values[$key]['new_value'] = $this->data[$this->modelClass][$key];
						}
					
					}
					$this->loadModel('CaseNote');
					$this->CaseNote->create();
					$CaseNote['user_id'] = $result[$this->modelClass]['user_id'];
					$CaseNote['case_id'] = $result[$this->modelClass]['id'];
					$CaseNote['case_notes'] = Configure::read('case_status.'.$result[$this->modelClass]['case_status_id'].'.description');
					$CaseNote['creator_id'] = $this->Auth->User('id');
					$CaseNote['case_status_id'] = $result[$this->modelClass]['case_status_id'];
					$CaseNote['case_status'] = $result[$this->modelClass]['case_status'];
					$CaseNote['fields_values'] = json_encode($fields_values);
					$this->CaseNote->save($CaseNote);
					$this->Session->setFlash(__('Case updated successfully.', true), 'success');
					$this->redirect(array('action' => 'caseinfo',$result[$this->modelClass]['id']));exit;
				
				} else {
					$this->Session->setFlash(__('You have not completed mandatory fields. Please complete the form and submit again.', true), 'error');

				}
			}
			
			
		} else {
			$subjectdob  = $result[$this->modelClass]['subject_dob'];
		$result[$this->modelClass]['subject_dob'] = ($result[$this->modelClass]['subject_dob']==0) ? '' : date('d-m-Y',$subjectdob);	
		$result[$this->modelClass]['subject_dob1'] = ($result[$this->modelClass]['subject_dob']==0) ? '' : date('d-F-Y',$subjectdob);	
		
		 $this->data = $result;
		}
		$this->set('id', $id);	
	}
/**
 * Client Casenotes 
 *
 * @return void
 */		
	function admin_casenotes($id) {
		$this->layout = 'fancybox';
		//Configure::write('debug',0);
		$this->set('role',$this->Auth->User("role"));
		$this->set('breadcrumb', '<h1 class="relative">Case <span>Notes </span></h1>');
		$this->set('id', $id);	
		$this->{$this->modelClass}->recursive = 1;
		$this->{$this->modelClass}->virtualFields = array('assigned_name'=> 'SELECT CONCAT(User.fname, " ", User.lname) FROM users AS User WHERE User.id='.$this->modelClass.'.assigned_to') ;
		$result = $this->{$this->modelClass}->find('first',array('conditions'=>array($this->modelClass.'.id'=>$id)));
		if($result[$this->modelClass]['is_read'] ==0){
				$this->{$this->modelClass}->id = $result[$this->modelClass]['id'];	
				$this->{$this->modelClass}->saveField('is_read',1);
			}
		$is_notifications = array($this->Auth->User('id'));
			if($result[$this->modelClass]['is_notifications'] !=''){
				$is_notifications = json_decode($result[$this->modelClass]['is_notifications'],true);
				if(!in_array($this->Auth->User('id'),$is_notifications)){
					$is_notifications[] = $this->Auth->User('id');
				}
			}
			$this->{$this->modelClass}->id = $result[$this->modelClass]['id'];	
			$this->{$this->modelClass}->saveField('is_notifications',json_encode($is_notifications));	
		//	pr($result);
		$this->set('result', $result);	
		if (!empty($this->data)) {
			if($this->data[$this->modelClass]['notification_type']=='Admin') {
				$this->{$this->modelClass}->setValidation('notify');
				$this->{$this->modelClass}->set($this->data);
				if ($this->{$this->modelClass}->validates()) {
					$this->loadModel('CaseNotification');
					$this->CaseNotification->create();
					$CaseNotification['user_id'] = $result[$this->modelClass]['user_id'];
					$CaseNotification['case_id'] = $result[$this->modelClass]['id'];
					$CaseNotification['comments'] = $this->data[$this->modelClass]['notification'];
					$CaseNotification['notification_type'] = 'Admin';
					$CaseNotification['creator_id'] = $this->Auth->User('id');
					$this->CaseNotification->save($CaseNotification);
					$this->data[$this->modelClass]['notification'] = '';
					
					$this->_sendMail($result[$this->modelClass]['client_email'],Configure::read('title').' <'.Configure::read('default_email.email').'>', Configure::read('noreply_email.email'), 'Your case has been updated' ,'notification',array('result' => $result ),'', 'html' );	

					//$this->Session->setFlash(__('Notification sent successfully.', true), 'success');
					if ($this->referer() != '/') {
						$this->redirect($this->referer());
					} else {
						$this->redirect(array('action' => 'casenotes'));
					}
				
				} else {
					//$this->Session->setFlash(__('You have not completed mandatory fields. Please complete the form and submit again.', true), 'error');

				}
			}
			if($this->data[$this->modelClass]['notification_type']=='Investigator') {
				$this->{$this->modelClass}->setValidation('notes');
				$this->{$this->modelClass}->set($this->data);
				if ($this->{$this->modelClass}->validates()) {
					$this->loadModel('CaseNotification');
					$this->CaseNotification->create();
					$CaseNotification['user_id'] = $result[$this->modelClass]['user_id'];
					$CaseNotification['case_id'] = $result[$this->modelClass]['id'];
					$CaseNotification['comments'] = $this->data[$this->modelClass]['notes'];
					$CaseNotification['notification_type'] = 'Investigator';
					$CaseNotification['creator_id'] = $this->Auth->User('id');
					$this->CaseNotification->save($CaseNotification);
					$this->data[$this->modelClass]['notes'] = '';
					//$this->Session->setFlash(__('Note saved successfully.', true), 'success');
					if ($this->referer() != '/') {
						$this->redirect($this->referer());
					} else {
						$this->redirect(array('action' => 'casenotes'));
					}
				
				} else {
					//$this->Session->setFlash(__('You have not completed mandatory fields. Please complete the form and submit again.', true), 'error');
				}
			} 
		} 
	}
/**
 * Client Caseexport 
 *
 * @return void
 */	
 	function admin_unlocked($id = null){
		if($this->Auth->User("role")=='Administrator'){
			$result = $this->{$this->modelClass}->find('first',array('conditions'=>array($this->modelClass.'.id'=>$id)));
			if(empty($result)){
				$this->Session->setFlash(__('Invalid case id.', true), 'error');
				if ($this->referer() != '/') {
					$this->redirect($this->referer());
				} else {
					$this->redirect(array('action' => 'casenotes', $id));
				}
			}
			$this->{$this->modelClass}->id = $id;
			$this->{$this->modelClass}->saveField('is_exported',0);
		}
		$this->redirect(array('action' => 'casenotes',$id));
		
	}	
	function admin_caseexport($id) {
		$this->layout = 'export_word';
		$this->set('breadcrumb', '<h1 class="relative">Case <span>Notes </span></h1>');
		$this->set('id', $id);	
		Configure::write('debug',0);
		
		$this->{$this->modelClass}->recursive = 1;
		$this->{$this->modelClass}->virtualFields = array('assigned_name'=> 'SELECT CONCAT(User.fname, " ", User.lname) FROM users AS User WHERE User.id='.$this->modelClass.'.assigned_to') ;
		$result = $this->{$this->modelClass}->find('first',array('conditions'=>array($this->modelClass.'.id' => $id)));
		
		
		if(empty($result)){
			$this->Session->setFlash(__('Invalid case id.', true), 'error');
			if ($this->referer() != '/') {
				$this->redirect($this->referer());
			} else {
				$this->redirect(array('action' => 'casebrowser'));
			}
		
		}
		if(!empty($result) && $result[$this->modelClass]['is_exported']==1){
				//$this->Session->setFlash(__('The case has been locked, you cannont change anything.', true), 'error');
				if ($this->referer() != '/') {
					$this->redirect($this->referer());
				} else {
					$this->redirect(array('action' => 'casenotes', $id));
				}
	  	}
		$this->{$this->modelClass}->id = $id;
		$this->{$this->modelClass}->saveField('is_exported',1);
		$this->set('result', $result);		
	}		
/**
 * Client Caseemail
 *
 * @return void
 */		
	function admin_caseemail($id, $mailto= null) {
		$this->layout = 'sendmail';
		//Configure::write('debug',0);
		$this->set('breadcrumb', '<h1 class="relative">Case <span>Notes </span></h1>');
		$this->set('id', $id);	
		$this->{$this->modelClass}->recursive = 1;
		$this->{$this->modelClass}->virtualFields = array('assigned_name'=> 'SELECT CONCAT(User.fname, " ", User.lname) FROM users AS User WHERE User.id='.$this->modelClass.'.assigned_to') ;
		$result = $this->{$this->modelClass}->find('first',array('conditions'=>array($this->modelClass.'.id'=>$id)));
		if(empty($result)){
				$this->Session->setFlash(__('Invalid case id.', true), 'error');
					if ($this->referer() != '/') {
						$this->redirect($this->referer());
					} else {
						$this->redirect(array('action' => 'casebrowser'));
					}
			
			}
		if($result[$this->modelClass]['is_read'] ==0){
				$this->{$this->modelClass}->id = $result[$this->modelClass]['id'];	
				$this->{$this->modelClass}->saveField('is_read',1);
			}
		$is_notifications = array($this->Auth->User('id'));
			if($result[$this->modelClass]['is_notifications'] !=''){
				$is_notifications = json_decode($result[$this->modelClass]['is_notifications'],true);
				if(!in_array($this->Auth->User('id'),$is_notifications)){
					$is_notifications[] = $this->Auth->User('id');
				}
			}
			$this->{$this->modelClass}->id = $result[$this->modelClass]['id'];	
			$this->{$this->modelClass}->saveField('is_notifications',json_encode($is_notifications));		
			
		$this->set('result', $result);	
		if($mailto!=''){
			$attachments = '';
			$directory = Configure::read('AMU.directory') . DS . 'CaseTable' . DS. $result[$this->modelClass]['id'] .'_photo';		
			$files = glob ("$directory/*");
			foreach($files as $file){
				$f 			= basename($file);
				if($f == 'Thumbs.db') continue;
				$attachments[] = $file;
			}
			$directory = Configure::read('AMU.directory'). DS . 'CaseTable' . DS. $result[$this->modelClass]['id'] .'_document';		
			$files = glob ("$directory/*");
			foreach($files as $file){
				$f 			= basename($file);
				if($f == 'Thumbs.db') continue;
				$attachments[] = $file;
			}
			$fp = fopen(Configure::read('AMU.directory'). DS ."Notes-" . $result['User']['lname'] . ".doc", 'w+');
 			
			$this->layout = 'export_word';
   			$str = $this->render('/elements/email/html/sendmail');
   			fwrite($fp, $str);
    		fclose($fp);
			$attachments[] = Configure::read('AMU.directory'). DS . "Notes-" . $result['User']['lname'] . ".doc";
				
		 	$this->_sendMail($mailto,Configure::read('title').' <'.Configure::read('default_email.email').'>', Configure::read('noreply_email.email'), 'Case Information #'.$result[$this->modelClass]['id'] ,'sendmail',array('result' => $result ), $attachments, 'html' );	
			
			//$this->Session->setFlash(__('Email sent successfully.', true), 'success');
		 
		}else{
			//$this->Session->setFlash(__('Email sending failed.', true), 'error');	
		}
		if ($this->referer() != '/') {
			$this->redirect($this->referer());
		} else {
			$this->redirect(array('action' => 'casenotes'));
		}


	}
	
/**
 * Admin  Casedelete
 *
 * @return void
 */		function admin_casedelete() {
	 		if($this->Auth->User("role")!='Administrator'){
				$this->Session->setFlash(__("You do not have privilege to delete case.", true), 'error');
					if ($this->referer() != '/') {
						$this->redirect($this->referer());
					} else {
						$this->redirect(array('action' => 'casebrowser'));
					}
			
			}
	 		if(!empty($this->data)){
				$dir = Configure::read('AMU.directory');
				
				$directory =  $dir .DS.  $this->modelClass . DS ;
				foreach($this->data[$this->modelClass]['id'] as $caseid){
					$case = $this->{$this->modelClass}->findByid($caseid);
					if(!empty($case)){
					$this->{$this->modelClass}->Query('	DELETE `CaseTable` FROM `cases` AS `CaseTable` WHERE `CaseTable`.`id` =' . $caseid);
					$this->{$this->modelClass}->Query('	DELETE `CaseNote` FROM `case_notes` AS `CaseNote` WHERE `CaseNote`.`case_id` =' . $caseid);
					$this->{$this->modelClass}->Query('	DELETE `CaseNotification` FROM `case_notifications` AS `CaseNotification` WHERE `CaseNotification`.`case_id` =' . $caseid);
					$this->{$this->modelClass}->Query('	DELETE `Quote` FROM `quotes` AS `Quote` WHERE `Quote`.`case_id` =' . $caseid);
					$this->{$this->modelClass}->Query('	DELETE `User` FROM `users` AS `User` WHERE `User`.`id` =' . $case[$this->modelClass]['user_id']);	
					$this->rrmdir($directory . $caseid.'_photo');
					$this->rrmdir($directory . $caseid.'_document');
					}
					
					
					
					
				
				}
				$this->Session->setFlash(__('Selected case deleted successfully.', true), 'success');
					if ($this->referer() != '/') {
						$this->redirect($this->referer());
					} else {
						$this->redirect(array('action' => 'casebrowser'));
					}
				
				
			}

	}
	
	function admin_change_case_status(){
		if(!empty($this->data) && $this->data[$this->modelClass]['case_id']!='' && $this->data[$this->modelClass]['case_status']!=''){
			$result = $this->{$this->modelClass}->findById($this->data[$this->modelClass]['case_id']);
			if(!empty($result)){
				
				$case_status = $this->{$this->modelClass}->CaseStatus->find('list') ;
				$this->{$this->modelClass}->id = $this->data[$this->modelClass]['case_id'];
				$this->{$this->modelClass}->saveField('case_status_id',$this->data[$this->modelClass]['case_status']);
				$this->{$this->modelClass}->saveField('case_status',$case_status[$this->data[$this->modelClass]['case_status']]);
				if($this->data[$this->modelClass]['case_status'] >= 4  && $result[$this->modelClass]['is_submited']!=1){
						$case_tracker['is_submited'] = 1;
						$case_tracker['submited_date'] = mktime(0,0,0,date('n'),date('j'),date('Y'));	
						$this->{$this->modelClass}->saveField('is_submited',$case_tracker['is_submited']);
						$this->{$this->modelClass}->saveField('submited_date',$case_tracker['submited_date']);

					}
				$this->Session->setFlash(__('Case Status has been updated.', true), 'success');
				$this->loadModel('CaseNote');
				$this->CaseNote->create();
				$CaseNote['user_id'] = $result[$this->modelClass]['user_id'];
				$CaseNote['case_id'] = $result[$this->modelClass]['id'];
				$CaseNote['case_notes'] = Configure::read('case_status.'.$this->data[$this->modelClass]['case_status'].'.description');
				$CaseNote['creator_id'] = $this->Auth->User('id');
				$CaseNote['case_status_id'] = $this->data[$this->modelClass]['case_status'];
				$CaseNote['case_status'] = $case_status[$this->data[$this->modelClass]['case_status']];
				$this->CaseNote->save($CaseNote);

			}
			
	 		
		}
		if ($this->referer() != '/') {
						$this->redirect($this->referer());
					} else {
						$this->redirect(array('action' => 'casebrowser'));
					}
	}
	
}
