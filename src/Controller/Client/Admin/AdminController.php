<?php
namespace App\Controller\Client\Admin;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher; 

class AdminController extends AppController
{


	public function initialize()
	{
		parent::initialize();
		$this->Auth->allow(['casenotes2']);
	}


    public function index()
    {

    }

    public function casetracker($id){
        $this->viewBuilder()->setLayout('admin');
        $this->loadModel('Cases');
        $this->loadModel('CaseNotes');
        $this->loadModel('Users');

        $discounts = Configure::read('discount');
        $serviceLevel = Configure::read('service_level');
        $caseFee = Configure::read('case_fees');

        $case_status = Configure::read('case_status');
        $breadcrumb = '<h1 class="relative">Case <span>Tracker </span></h1>';
        $caseIcons = Configure::read('case_icon');
        $model = 'Cases';
        $case = $this->Cases->find('all',[
            'conditions' => [
                'id' => $id
            ]
        ])->contain(['CaseNotes'])->first();
        foreach ($case['case_notes'] as $key => $note) {
            $note_creator = $this->Users->find('all',[
                'conditions' => [
                    'id'=>$note['creator_id']
                ]
            ])->first();
            $case['case_notes'][$key]['creator_user']=$note_creator;
        }
        //dd($case);
        $investorList = $this->Users->find('all',[
            'conditions' => [
                'user_type_id'=>2
            ]
        ])->all()->toList();
        $inverstors = array();
        foreach($investorList as $key=>$investor){
            $investors[$investor['id']]=$investor['fname'].' '.$investor['lname'];
        }
        $caseStatus = array('2'=>'Case Saved','4'=>'Case In Progress','5'=>'Case Cancelled','6'=>'Case Closed','7'=>'Case On Hold');
        //TO DO Select fields values aren't updating
        if ($this->request->is(['post', 'put'])) {
            //print_r($this->request->getData());die();
            $data = $this->request->getData();
            // dd($data);
            $caseTable = TableRegistry::get('Cases');
            $caseUp = $caseTable->get($id);
            $caseUp->case_status=$case_status[$data['case_status_id']]['title'];
            $caseUp->case_status_id=$data['case_status_id'];
            $caseUp->assigned_to=$data['assigned_to'];
            $caseUp->due_date=(($data['due_date']==0)?$data['due_date']:strtotime($data['due_date']));
            $caseUp->service_level=$data['service_level'];
            $caseUp->discount=$data['discount'];
            $caseUp->fee=$data['fee'];
            $caseTable->save($caseUp);
            if($data['notes']!=''){
                $case_notes = $this->CaseNotes->newEntity();
                $caseNdata['case_id']=$id;
                $caseNdata['user_id']=$case['user_id'];
                $caseNdata['case_notes']=$data['notes'];
                $caseNdata['creator_id']=$this->Auth->User('id');
                $caseNdata['case_status_id']=$data['case_status_id'];
                $caseNdata['case_status']=$case_status[$data['case_status_id']]['title'];
                $caseNdata['created']=time();
                $caseNdata['modified']=time();
                $case_notes = $this->CaseNotes->patchEntity($case_notes, $caseNdata);
                $case_notes = $this->CaseNotes->patchEntity($case_notes, $caseNdata);
                $this->CaseNotes->save($case_notes);
            }
            $this->Flash->success('Case status updated.');
            return $this->redirect(['action' => 'casetracker',$id]);
        }
        $this->set(compact('id','breadcrumb','caseIcons','model','case','caseStatus','investors', 'discounts', 'serviceLevel', 'caseFee'));
    }

    public function caseedit($id){
        $this->viewBuilder()->setLayout('admin');
        $this->loadModel('Cases');
        $caseIcons = Configure::read('case_icon');
        $case = $this->Cases->find('all',[
            'conditions' => [
                'id' => $id
            ]
        ])->first();
        $this->set(compact('caseIcons','model','case'));

        // To Do Save entries
    }

    public function casenotes($id) {
        $this->viewBuilder()->setLayout('fancybox');
        $this->loadModel('Cases');
        $this->loadModel('CaseNotes');
        $this->loadModel('CaseNotifications');
        $this->loadModel('Users');


        $role = $this->Auth->User('role');
        $breadcumb = '<h1 class="relative">Case <span>Notes </span></h1>';
        $caseIcons = Configure::read('case_icon');

        $case = $this->Cases->find('all',[
            'conditions' => [
                'id' => $id
            ]
        ])->contain(['Quotes','CaseNotes','CaseNotifications'])->first();
        $model = 'Cases';
        $user = $this->Users->find('all',[
            'conditions' => [
                'id' => $case['user_id']
            ]
        ])->first();
        foreach ($case['case_notifications'] as $key => $caseNote) {
            $creator = $this->Users->find('all',[
                'conditions' => [
                    'id' => $caseNote['creator_id']
                ]
            ])->first();
            $case['case_notifications'][$key]['creator_name'] = $creator['fname'].' '.$creator['lname'];
        }
        //echo"<pre>";print_r($case);echo "</pre>";die();
        $result[$model]=$case;
        $result['User']=$user;
        //print_r($result);die();
        if($this->request->is('post')){
            $data = $this->request->getData();
            $case_notifications = $this->CaseNotifications->newEntity();
            $caseNdata['case_id']=$id;
            $caseNdata['user_id']=$case['user_id'];
            $caseNdata['comments']=$data['Cases']['notes'];
            $caseNdata['creator_id']=$this->Auth->User('id');
            $caseNdata['notification_type']=$role;
            $caseNdata['created']=time();
            $caseNdata['modified']=time();
            $case_notifications = $this->CaseNotifications->patchEntity($case_notifications, $caseNdata);
            $case_notifications = $this->CaseNotifications->patchEntity($case_notifications, $caseNdata);
            $this->CaseNotifications->save($case_notifications);
            return $this->redirect(['action' => 'casenotes',$id]);
            //echo"<pre>";print_r($data);echo "</pre>";die();
        }
        $this->set(compact('id','role','breadcumb','caseIcons','model','result'));
    }

    public function casenotes2($id) {
        $this->viewBuilder()->setLayout('fancybox');
        $this->loadModel('Cases');
        $this->loadModel('Users');


        $role = $this->Auth->User('role');
        $breadcumb = '<h1 class="relative">Case <span>Notes </span></h1>';
        $caseIcons = Configure::read('case_icon');

        $case = $this->Cases->find('all',[
            'conditions' => [
                'id' => $id
            ]
        ])->contain(['Quotes','CaseNotes','CaseNotifications'])->first();
        $model = 'Cases';
        $user = $this->Users->find('all',[
            'conditions' => [
                'id' => $case['user_id']
            ]
        ])->first();
        $result[$model]=$case;
        $result['User']=$user;
        //print_r($result);die();
        $this->set(compact('id','role','breadcumb','caseIcons','model','result'));
    }

    public function casedelete($id){
        $this->loadModel('Cases');
        $this->loadModel('CaseNotes');
        $this->loadModel('CaseNotifications');
        $this->loadModel('Users');
        $entity = $this->Cases->get($id);
        $result = $this->Cases->delete($entity);
        $this->Flash->success(__('Case is successfully deleted.'));
        return $this->redirect(['action' => 'casebrowser']);
    }


    public function casesend($id)
    {
        if(!empty($_GET['email']))
        {
            $mail = $_GET['email'];

            $this->loadModel('Cases');
            $this->loadModel('Users');


            $role = $this->Auth->User('role');
            $breadcumb = '<h1 class="relative">Case <span>Notes </span></h1>';
            $caseIcons = Configure::read('case_icon');

            $case = $this->Cases->find('all',[
                'conditions' => [
                    'id' => $id
                ]
            ])->contain(['Quotes','CaseNotes','CaseNotifications'])->first();
            $model = 'Cases';
            $user = $this->Users->find('all',[
                'conditions' => [
                    'id' => $case['user_id']
                ]
            ])->first();
            $result[$model]=$case;
            $result['User']=$user;
            $result['model']=$model;
            $result['caseIcons']=$caseIcons;
            $result['id']=$id;

            $attachments = [];
            // Check Uploaded Files  // TODO: Need to Upload
            $filePath = Configure::read('AMU')['directory'];
            $directory = $filePath.'/CaseTable/'.$id.'_photo';
            if(is_dir($directory))
            {
                $files = glob ("$directory/*");
                if(!empty($files))
                {
                    foreach($files as $file)
                    {
                        $attachments[] = $file;
                    }
                }
            }

            $directory = $filePath.'/CaseTable/'.$id.'_document';
            if(is_dir($directory))
            {
                $files = glob ("$directory/*");
                if(!empty($files))
                {
                    foreach($files as $file)
                    {
                        $attachments[] = $file;
                    }
                }
            }

            // Notes
            $directory = $filePath."/Notes-" . $result['User']['lname'] . ".doc";

            $fp = fopen($directory, 'w+');

            $baseUrl =  $_SERVER['HTTP_HOST'];
            $htmlString = @file_get_contents('http://'.$baseUrl.'/client/admin/casenotes2/'.$id);
            fwrite($fp, $htmlString);
            fclose($fp);
            $attachments[] = Configure::read('AMU.directory'). DS . "Notes-" . $result['User']['lname'] . ".doc";

            $this->_sendEmail($mail, [Configure::read('default_email.email')], Configure::read('noreply_email.email'), 'Wymoo International #'.$id ,'casenotes', array('result' => $result ), $attachments );
            echo "success";
            exit;
        }
    }

    public function exportcase($id)
    {

        if(!empty($_GET['email']))
        {
            $mail = $_GET['email'];

            $this->loadModel('Cases');
            $this->loadModel('Users');


            $role = $this->Auth->User('role');
            $breadcumb = '<h1 class="relative">Case <span>Notes </span></h1>';
            $caseIcons = Configure::read('case_icon');

            $case = $this->Cases->find('all',[
                'conditions' => [
                    'id' => $id
                ]
            ])->contain(['Quotes','CaseNotes','CaseNotifications'])->first();
            $model = 'Cases';
            $user = $this->Users->find('all',[
                'conditions' => [
                    'id' => $case['user_id']
                ]
            ])->first();
            $result[$model]=$case;
            $result['User']=$user;
            $result['model']=$model;
            $result['caseIcons']=$caseIcons;
            $result['id']=$id;

            $this->viewBuilder()->setLayout('fancybox');
            $this->set(compact('result'));
        }

    }
    
    public function casebrowser()
    {
        $this->viewBuilder()->setLayout('admin');
        $this->loadModel('Cases');
        $caseIcons = Configure::read('case_icon');

        $this->paginate = [];
        $pages = $this->paginate($this->Cases);
        $this->set(compact('pages', 'caseIcons'));
    }

    public function changeCase()
    {
        $data = $this->request->getData();
        if(!empty($data['case_id']) && !empty($data['case_status']))
        {
            $this->loadModel('Cases');
            $result = $this->Cases->findById($data['case_id'])->first();
            if(!empty($result))
            {
                //$this->loadModel('CaseStatus');
                $case_status = Configure::read('case_status');


                $updatedData = ['case_status_id' => $data['case_status'], 'case_status' => $case_status[$data['case_status']]['title'] ];

                

                if($data['case_status'] >= 4  && $result['is_submited']!=1)
                {
                    $updatedData['is_submited'] = 1;
                    $updatedData['submited_date'] = mktime(0,0,0,date('n'),date('j'),date('Y'));
                }

                $cases = TableRegistry::get('Cases');
                $query = $cases->query();
                $query->update()
                    ->set($updatedData)
                    ->where(['id' => $data['case_id']])
                    ->execute();

                $this->Flash->success(__('Case Status has been updated.'));

                $this->loadModel('CaseNotes');
                $case_notes = $this->CaseNotes->newEntity();
                $caseNdata['case_id']=$data['case_id'];
                $caseNdata['user_id']=$result['user_id'];
                $caseNdata['case_notes']=$case_status[$result['case_status_id']]['description'];
                $caseNdata['creator_id']=$this->Auth->User('id');
                $caseNdata['case_status_id']=$result['case_status_id'];
                $caseNdata['case_status']=$case_status[$result['case_status_id']]['title'];
                $caseNdata['created']=time();
                $caseNdata['modified']=time();
                $caseNdata['fields_values']="";
                $case_notes = $this->CaseNotes->patchEntity($case_notes, $caseNdata);
                $this->CaseNotes->save($case_notes);
                
            }

        }

        if ($this->referer() != '/') {
            $this->redirect($this->referer());
        } else {
            $this->redirect(array('action' => 'casebrowser'));
        }

    }

    public function myaccount()
    {
        $this->viewBuilder()->setLayout('admin');
        $this->loadModel('Users');
        $user = $this->Users->find('all',[
            'conditions' => [
                'username' => $this->Auth->user('username')
            ]
        ])->first();
        
        if ($this->request->is(['post', 'put'])) {
            $data = $this->request->getData();
            if(!empty($data['passwd']) && ((new DefaultPasswordHasher)->check($data['passwd'], $user->passwd)))
            {
                if(!empty($data['newpassword']))
                {
                    $data['passwd'] = $data['newpassword'];
                }
                $this->Users->patchEntity($user, $data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your user has been updated.'));
                }
                else
                {
                    $this->Flash->error(__('Unable to update your user.'));
                }
            }
            else
            {
                $this->Flash->error(__('Please Enter Correct Current Password.'));
            }
        }
        $this->set('user', $user);
    }
}