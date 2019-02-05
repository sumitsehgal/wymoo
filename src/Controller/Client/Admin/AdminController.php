<?php
namespace App\Controller\Client\Admin;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher; 

class AdminController extends AppController
{

    public function index()
    {

    }

    public function casetracker($id){
        $this->viewBuilder()->setLayout('admin');
        $this->loadModel('Cases');
        $this->loadModel('Users');
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
                'user_type_id'=>2
            ]
        ])->all()->toList();
        $inverstors = array();
        foreach($investorList as $key=>$investor){
            $investors[$investor['id']]=$investor['fname'].' '.$investor['lname'];
        }
        $caseStatus = array();
        foreach ($case_status as $key => $status) {
            $caseStatus[$key]=$status['title'];
        }
        //to do case update and add notes
        $this->set(compact('id','breadcrumb','caseIcons','model','case','caseStatus','investors'));
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
            $directory = $filePath.'/'.$id.'_photo';
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

            $directory = $filePath.'/'.$id.'_document';
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


            $this->_sendEmail($mail, [Configure::read('default_email.email')], Configure::read('noreply_email.email'), 'Wymoo International #'.$id ,'casenotes', array('result' => $result ), $attachments );
            echo "success";
            exit;
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