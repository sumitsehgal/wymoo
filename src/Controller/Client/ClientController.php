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

    public function tracker($id)
    {
        $this->viewBuilder()->setLayout('client');
        $this->loadModel('Cases');
        $this->loadModel('Users');
        $user_id = $this->Auth->User('id');
        $case_status = Configure::read('case_status');
        $breadcrumb = '<h1 class="relative">Case <span>Tracker </span></h1>';
        $caseIcons = Configure::read('case_icon');
        $model = 'Cases';
        $case = $this->Cases->find('all',[
            'conditions' => [
                'id' => $id
            ]
        ])->contain(['CaseNotes', 'CaseNotes.Users'])->first();
        $investorList = $this->Users->find('all',[
            'conditions' => [
                'user_type_id'=>2,
                'id'=>$case['user_id']
            ]
        ])->all()->toList();
        $inverstors = array();
        foreach($investorList as $key=>$investor){
            $investors[$investor['id']]=$investor['fname'].' '.$investor['lname'];
        }
        //print_r($investors);die();
        $caseStatus = array();
        foreach ($case_status as $key => $status) {
            $caseStatus[$key]=$status['title'];
        }
        //print_r($case);die();
        $this->set(compact('id','breadcrumb','caseIcons','model','case','caseStatus','investors'));
    }

    public function notifications()
    {
        $this->viewBuilder()->setLayout('client');
    }

    public function caseedit()
    {
        $this->viewBuilder()->setLayout('client');
    }

}