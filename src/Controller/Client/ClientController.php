<?php
namespace App\Controller\Client;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher; 

class ClientController extends AppController
{

    public function beforeFilter(Event $event) {
      parent::beforeFilter($event);
        $this->Auth->allow(['logout']); // Temporary Allow
        
        $this->loadComponent('Csrf');
    }

    public function tracker($id = null)
    {
        $this->loadModel('Cases');
        $this->loadModel('Users');
        $this->loadModel('CaseNotes');
        $user_id = $this->Auth->User('id');
        if(empty($id))
        {
            $firstCase = $this->Cases->find('all', [
                'conditions' => [
                    'user_id' => $user_id
                ]
            ])->first();
            $id = $firstCase['id'];
        }
        $this->viewBuilder()->setLayout('client');
        $case_status = Configure::read('case_status');
        $breadcrumb = '<h1 class="relative">Case<span>Tracker</span></h1>';
        $caseIcons = Configure::read('case_icon');
        $model = 'Cases';
        $case = $this->Cases->find('all',[
            'conditions' => [
                'id' => $id
            ]
        ])->contain(['CaseNotes', 'CaseNotes.Users'])->first();
        $investor = null;
        if($case['assigned_to']!=''){
            $investor = $this->Users->find('all',[
                'conditions' => [
                    'id'=>$case['assigned_to']
                ]
            ])->first();
        }
        if($this->request->is(['post', 'put'])) {
            $data = $this->request->getData();
            if($data['request']=="submit"){
                $caseTable = TableRegistry::get('Cases');
                $caseUp = $caseTable->get($id);
                if($caseUp->is_submited == 0)
                {
                    $caseUp->case_status=$case_status[$data['case_status_id']]['title'];
                    $caseUp->case_status_id=$data['case_status_id'];
                    $caseUp->submited_date = mktime(0,0,0,date('n'),date('j'),date('Y'));
                    $caseUp->is_submited = 1;
                    $caseTable->save($caseUp);
                    $case_notes = $this->CaseNotes->newEntity();
                    $caseNdata['case_id']=$id;
                    $caseNdata['user_id']=$case['user_id'];
                    $caseNdata['case_notes']=$case_status[$data['case_status_id']]['description'];
                    $caseNdata['creator_id']=$this->Auth->User('id');
                    $caseNdata['case_status_id']=$data['case_status_id'];
                    $caseNdata['case_status']=$case_status[$data['case_status_id']]['title'];
                    $caseNdata['created']=time();
                    $caseNdata['modified']=time();
                    $caseNdata['fields_values']="[]";
                    $case_notes = $this->CaseNotes->patchEntity($case_notes, $caseNdata);
                    $case_notes = $this->CaseNotes->patchEntity($case_notes, $caseNdata);
                    $this->CaseNotes->save($case_notes);
                    $this->Flash->success(__('Your case data has been submitted successfully.'));
                    return $this->redirect(['action' => 'tracker']);
                }
                else
                {
                    $this->Flash->error(__('Case has already been Submitted.'));
                    return $this->redirect(['action' => 'tracker']);
                }
            }
        }
        $caseStatus = array();
        $this->set(compact('id','breadcrumb','caseIcons','model','case','investor'));
    }

    public function notifications()
    {
        $this->loadModel('Cases');
        $this->loadModel('CaseNotifications');
        $this->CaseNotifications->updateAll(array('is_new'=>0),array('user_id'=>$this->Auth->User('id')));

        $result = $this->Cases->find('all',array('conditions'=>array('Cases.user_id'=>$this->Auth->User('id'))))->first();
        // echo "<pre>"; print_r($result); die;
        if(!empty($result) && $result->is_exported==1)
        {
            $this->Flash->error('Your case is in progress and notifications are now closed.  Contact your investigator for assistance.');
            $this->set('valid', 'disabled');

        }

        $this->set('result', $result);

        $isPost = $this->request->is('post');
        
        if ($isPost) 
        {
            if(!empty($result) && $result->is_exported==1)
            {
                if ($this->referer() != '/') 
                {
                 $this->redirect($this->referer());
             } 
             else 
             {
                 $this->redirect(array('action' => 'casetracker'));
             }
         }

         $data = $this->request->getData();
        if(!empty($data) && !empty($data['notification']) && !empty($result) )
        {
         $data['notify'] = '';

            // TODO: Validation Pending
         $cases= TableRegistry::get('Cases');
            $case = $cases->get($result->id); // Return article with id = $id (primary_key of row which need to get updated)
            $case->is_notifications = '';


            $case_notification = $this->CaseNotifications->newEntity();
            $caseNdata['user_id'] = $result->user_id;
            $caseNdata['case_id'] = $result->id;
            $caseNdata['comments'] = $data['notification'];
            $caseNdata['creator_id'] = $this->Auth->User('id');
            $caseNdata['notification_type'] = 'Client';
            $caseNdata['created'] = time();
            $caseNdata['modified'] = time();
            $case_notification = $this->CaseNotifications->patchEntity($case_notification, $caseNdata);
            $this->CaseNotifications->save($case_notification);
            $this->Flash->success('Notification sent successfully.');
            
            $updatedData['is_read'] = 0;
            $cases = TableRegistry::get('Cases');
            $query = $cases->query();
            $query->update()
                    ->set($updatedData)
                    ->where(['id' => $result->id])
                    ->execute();  

        } }
        if(!empty($result->id))
        { 
            $notifications = $this->CaseNotifications->find('all', [
              'conditions' => [
                'case_id' => $result->id,
              ]
            ])->all();
            $this->set(compact('notifications'));
        }
        $this->viewBuilder()->setLayout('client');
    }

    public function caseedit()
    {
        $this->viewBuilder()->setLayout('client');
        $this->loadModel('Cases');
        $user_id = $this->Auth->User('id');
        $breadcrumb = '<h1>Case Data<span>Center </span></h1>';
        $caseIcons = Configure::read('case_icon');
        $model = 'Cases';
        $case = $this->Cases->find('all', [
            'conditions' => [
                'user_id' => $user_id
            ]
        ])->first();

        $session = $this->getRequest()->getSession();
        if(!empty($case->id))
        { $folderid = $case->id;
          $this->set('folderid', $folderid);
          

        $attachments = [];
        $directory = Configure::read('AMU.directory') . DS . 'CaseTable' . DS. $folderid .'_photo';		
        $files = glob ("$directory/*");
        foreach($files as $key=>$file){
            $f 			= basename($file);
            if($f == 'Thumbs.db') continue;
            $attachments['photo'][$key]['path'] = $file;
            $attachments['photo'][$key]['file'] = base64_encode($file);
            $attachments['photo'][$key]['filename'] = basename($file);
        }


        $directory = Configure::read('AMU.directory') . DS . 'CaseTable' . DS. $folderid .'_document';		
        $files = glob ("$directory/*");
        foreach($files as $key=>$file){
            $f 			= basename($file);
            if($f == 'Thumbs.db') continue;
            $attachments['document'][$key]['path'] = $file;
            $attachments['document'][$key]['file'] = base64_encode($file);
            $attachments['document'][$key]['filename'] = basename($file);
        }

        $this->set('attachments',$attachments);
    }
        /**
         * <li class="search-choice" id="CaseTable20190305113856-263_photo_chzn_c_0"><span style="cursor: pointer;">Screenshot from 2019-01-14 22-27-53.png</span><a href="javascript:void(0)" class="search-choice-close" rel="0" deletelink="L3Zhci93d3cvaHRtbC93eW1vb0dpdC93eW1vby93ZWJyb290L1BocF9kYXRhL3VwbG9hZHMvZmlsZXMvQ2FzZVRhYmxlLzIwMTkwMzA1MTEzODU2LTI2M19waG90by9TY3JlZW5zaG90IGZyb20gMjAxOS0wMS0xNCAyMi0yNy01My5wbmc="></a></li>
         */

        

        
        if($this->request->is(array('post','put'))){


            $this->loadModel('Users');
			//validation
			$validator = new Validator();
			$validator
					->requirePresence('client_fname')
					->notEmpty('client_fname','This field cannot be left blank, please try again.')
					->add('client_fname', 'validFormat', [
						'rule' =>array('custom' ,'/^[a-zA-Z ]*$/'),
						'message' => ' First name should be letters only '
					])
			         ->add('client_fname', [
						'length' => [
							'rule' => ['minLength', 3],
							'message' => ' Firstname length must be minimum  3.',
						]
					])

                    ->requirePresence('client_lname')
					->notEmpty('client_lname','This field cannot be left blank, please try again.')
					->add('client_lname', 'validFormat', [
						'rule' =>array('custom','/^[a-zA-Z ]*$/'),
						'message' => ' LastName should be letters only'
					])
                    ->add('client_lname', [
						'length' => [
							'rule' => ['minLength', 3],
							'message' => ' LastName  length must be minimum 3.',
						]
					])

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
				$user = $this->Users->find('all',[
					'conditions' => [
                        'email' => $oldData['client_email'],
                        'email !=' => $case['client_email']
					]
				])->first();

				if($user)
				{
					$errors['client_email'][] = 'This email is already in use.';
				}
            }
            
            if(!empty($errors))
			{
				$this->set(compact('errors', 'oldData'));
			}
			else
			{
                $data = $this->request->getData();


				$duedate1 =  explode('-',$data['subject_dob']);
				$duedate =  explode('-',$data['subject_dob1']);
				if(count($duedate)==3 && $data['subject_dob1']!='' && (isset($duedate1[2]) && $duedate1[2]!=date('Y')))
				{
					$data['subject_dob'] =  mktime(23,59,59,$duedate[1]*1,$duedate[0]*1,$duedate[2]);	
				} 
				else 
				{
					$data['subject_dob'] = 0;
				}

                $entity = TableRegistry::get('Cases')->get($case->id);
                TableRegistry::get('Cases')->patchEntity($entity, $data);
                TableRegistry::get('Cases')->save($entity);
            }






            // $this->Cases->save($this->request->getData());
            // $this->Flash->success('Case updated successfully.');
            return $this->redirect(['action' => 'tracker']);
        }
        if(!empty($case->subject_dob) && $case->subject_dob != 0)
        {
            $case->subject_dob1 = date('d-m-Y', $case->subject_dob);
            $case->subject_dob = date('d-F-Y', $case->subject_dob);
        }
        $this->set(compact('breadcrumb','caseIcons','model','case'));
        //echo "here";die();
    }

    public function myaccount()
    {
        $this->viewBuilder()->setLayout('client');
        $this->loadModel('Users');
        $user = $this->Users->find('all',[
            'conditions' => [
                'username' => $this->Auth->user('username')
            ]
        ])->first();
        $errors='';
        $temppassword = '';
        if(!empty($user->password_token))
        { $temppassword= $user->password_token; }
        if ($this->request->is(['post', 'put']))
        {
            $validator = new Validator();
            $validator
                    ->requirePresence('username')
                    ->notEmpty('username','This field cannot be left blank, please try again.')
                    
                    ->requirePresence('fname')
                    ->notEmpty('fname','This field cannot be left blank, please try again.')
                    
                    ->requirePresence('lname')
                    ->notEmpty('lname','This field cannot be left blank, please try again.')
                    
                    ->requirePresence('email')
                    ->notEmpty('email','This field cannot be left blank, please try again.') 
                   
                    ->requirePresence('passwd')
                    ->notEmpty('passwd','This field cannot be left blank, please try again.')  
                  
                    ->add('email', 'validFormat', [
                        'rule' => 'email',
                        'message' => 'Must be a valid email address.'
                    ]);

            
            $data = $this->request->getData();
            if(!empty($data['newpassword']))
            {
               $validator->add('newpassword', 'length', ['rule' => ['lengthBetween', 6, 15], 'message'=>'Passwords must be between 6 and 15 characters long.' ]);
            }
            $errors = $validator->errors($this->request->getData());
            if(!empty($data['username']))
            {
                $check_username = $this->Users->find('all',[
                    'conditions' => [
                        'username' => $data['username'],
                        'id !=' =>  $user->id
                    ]
                ])->first();
                if($check_username)
                {   
                    $errors['username'][] = 'This username is already in use.';
                }
            }
            if(!empty($data['phone']))
            {
                if(!preg_match("/^\d+\.?\d*$/",$data['phone']))
                {
                    $errors['phone'][] = 'Must be a valid Phone Number';
                }
            }
            if(!empty($data['email']))
            {
                $check_email = $this->Users->find('all',[
                    'conditions' => [
                        'email' => $data['email'],
                        'id !=' =>  $user->id
                    ]
                ])->first();
                if($check_email)
                {   
                    $errors['email'][] = 'This email is already in use.';
                }
            }
            if(!empty($data['passwd']) &&  !empty($temppassword) && $temppassword != $data['passwd'])
            {
               $errors['passwd']['_empty']='Current password does not match, please try again.';
            }
            $user['password_token'] = $data['passwd'];
            if(empty($errors))
            {            
                if(!empty($data['newpassword']))
                {
                    $data['passwd'] = $data['newpassword'];
                    $data['password_token'] = $data['newpassword'];
                } 
                $check=$this->Users->patchEntity($user, $data);
                if ($this->Users->save($user)) {
                    $this->Auth->setUser($user);
                    $this->Flash->success(__('Your account setting has been updated successfully.'));
                    return $this->redirect(['action' => 'tracker']);
                }
            }
        }
        $this->set(compact('user','errors'));
    }

}