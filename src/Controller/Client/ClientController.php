<?php
namespace App\Controller\Client;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

class ClientController extends AppController
{

    public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		$this->Auth->allow(['logout']); // Temporary Allow
    }

    public function tracker($id = null)
    {
        $this->loadModel('Cases');
        $this->loadModel('Users');
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
        $breadcrumb = '<h1 class="relative">Case <span>Tracker </span></h1>';
        $caseIcons = Configure::read('case_icon');
        $model = 'Cases';
        $case = $this->Cases->find('all',[
            'conditions' => [
                'id' => $id
            ]
        ])->contain(['CaseNotes', 'CaseNotes.Users'])->first();
        if($case['assigned_to']!='')
        $investor = $this->Users->find('all',[
            'conditions' => [
                'id'=>$case['assigned_to']
            ]
        ])->first();
        
        $caseStatus = array();
        $this->set(compact('id','breadcrumb','caseIcons','model','case','investor'));
    }

    public function notifications()
    {
        $this->loadModel('Cases');
        $this->loadModel('CaseNotifications');
		$this->CaseNotifications->updateAll(array('is_new'=>0),array('user_id'=>$this->Auth->User('id')));

		$result = $this->Cases->find('all',array('conditions'=>array('Cases.user_id'=>$this->Auth->User('id'))))->first();
        if(!empty($result) && $result->is_exported==1)
        {
            $this->Flash->error('Your case is in progress and notifications are now closed.  Contact your investigator for assistance.');
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
			
        }
        $notifications = $this->CaseNotifications->find('all', [
            'conditions' => [
                        'case_id' => $result->id,
            ]
        ])->all();

        $this->set(compact('notifications'));


        $this->viewBuilder()->setLayout('client');
    }

    public function caseedit()
    {
        $this->viewBuilder()->setLayout('client');
    }

}