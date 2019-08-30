<?php
namespace App\Controller\Client\Admin;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher; 
use Cake\Validation\Validator;

class AdminController extends AppController
{


    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['casenotes2','export']);
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
        
        $updatedData['is_read'] = 1;
        $cases = TableRegistry::get('Cases');
        $query = $cases->query();
        $query->update()
        ->set($updatedData)
        ->where(['id' => $id])
        ->execute(); 
        

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
        if(empty($investors))
        {
            $investors = null;
        }
        $caseStatus = array('2'=>'Case Saved','4'=>'Case In Progress','5'=>'Case Cancelled','6'=>'Case Closed','7'=>'Case On Hold');
        $casedescription =array('2'=>'Case data saved.','4'=>'Investigation in progress.  Report will be emailed to client on due date.','5'=>'Case cancelled.  Payment not received.','6'=>'Investigation complete.  Report emailed to client.','7'=>'Case on hold.  Full payment required to proceed.');
        //TO DO Select fields values aren't updating
        if ($this->request->is(['post', 'put'])) {

            $data = $this->request->getData();
            if(empty($data['assigned_to']))
            {
               $data['assigned_to']= 0;
            }
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
            else
            {   
                foreach ($casedescription as $key => $value)
                    {   if($data['case_status_id'] == $key)
                {
                    $casenote=$value;
                }
            } 
            $case_notes = $this->CaseNotes->newEntity();
            $caseNdata['case_id']=$id;
            $caseNdata['user_id']=$case['user_id'];
            $caseNdata['case_notes']=$casenote;
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

public function checkread()
{
    $this->loadModel('Cases');
    if($this->request->is('post'))
    {   
        $case = $this->Cases->find('all',[
            'conditions' => [
                'is_read'=> '1', 
                'id'     => $this->request->getData()['id'],
            ]])->first();
        if(!$case){
            echo 'notread';  die; 
        }else{
            echo 'isread'; die;
        } 

    }  

}
public function checknotify()
{
    if(!empty($this->request->getData()['id']))
    {
         $this->loadModel('CaseNotifications');  
                $notification = $this->CaseNotifications->find('all',['conditions'=>[
                    'user_id =' => $this->request->getData()['id'],
                    'is_new ='  => '1',
                    'notification_type !=' => 'Investigator',
                ]])->toArray();
        if($notification){
          echo '1'; die;
        }
        else{
          echo '0';  die;         
        }
    }
   
} 
public function caseedit($id){
    $this->viewBuilder()->setLayout('admin');
    $this->loadModel('Cases');
    $this->loadModel('CaseNotifications');
       
    $role = $this->Auth->User('role');
       
    $caseIcons = Configure::read('case_icon');
    $case = $this->Cases->find('all',[
        'conditions' => [
            'id' => $id
        ]
    ])->first();
    $folderid = $id;
    $attachments = [];
    $directory = Configure::read('AMU.directory') . DS . 'CaseTable' . DS. $folderid .'_photo';     
    $files = glob ("$directory/*");
    foreach($files as $key=>$file){
        $f          = basename($file);
        if($f == 'Thumbs.db') continue;
        $attachments['photo'][$key]['path'] = $file;
        $attachments['photo'][$key]['file'] = base64_encode($file);
        $attachments['photo'][$key]['filename'] = basename($file);
    }


    $directory = Configure::read('AMU.directory') . DS . 'CaseTable' . DS. $folderid .'_document'; 
    $files = glob ("$directory/*");
    foreach($files as $key=>$file){
        $f          = basename($file);
        if($f == 'Thumbs.db') continue;
        $attachments['document'][$key]['path'] = $file;
        $attachments['document'][$key]['file'] = base64_encode($file);
        $attachments['document'][$key]['filename'] = basename($file);
    }

    $this->set(compact('id','caseIcons', 'case', 'folderid', 'attachments'));
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
           if(!empty($oldData['notify']) && !empty($oldData['notification']))
           {
                $case_notifications = $this->CaseNotifications->newEntity();
                $caseNdata['case_id']=$id;
                $caseNdata['user_id']=$case['user_id'];
                $caseNdata['comments']=$oldData['notification'];
                $caseNdata['creator_id']=$this->Auth->User('id');
                $caseNdata['notification_type'] = 'Admin';
                $caseNdata['created']=time();
                $caseNdata['modified']=time();
                $case_notifications = $this->CaseNotifications->patchEntity($case_notifications, $caseNdata);
                $case_notifications = $this->CaseNotifications->patchEntity($case_notifications, $caseNdata);
                $this->CaseNotifications->save($case_notifications);
               return $this->Flash->success('Notification sent successfully.');
           }
           if(!empty($oldData['notify']) && empty($oldData['notification']) )
           {
             return $this->Flash->error(__('Please see the below error messages. Complete the form and submit again.'));   
           }
           if(!empty($errors))
           {
              return  $this->Flash->error(__('Please see the below error messages. Complete the form and submit again.'));            
           }else
            return $this->Flash->success('Case updated successfully.');
    }
    if($case->subject_dob != 0)
    {
            $case->subject_dob1 = date('d-m-Y', $case->subject_dob);
            $case->subject_dob = date('d-F-Y', $case->subject_dob);
    }

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
    $investor = null;
    if($case['assigned_to']!=''){
        $investor = $this->Users->find('all',[
            'conditions' => [
                'id'=>$case['assigned_to']
            ]
        ])->first();
    }
    $this->set('investor',$investor);
    
    $updatedData['is_read'] = 1;
    $cases = TableRegistry::get('Cases');
    $query = $cases->query();
    $query->update()
    ->set($updatedData)
    ->where(['id' => $id])
    ->execute(); 

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
    $result[$model]=$case;
    $result['User']=$user;
    $attachments = [];
    $directory = Configure::read('AMU.directory') . DS . 'CaseTable' . DS. $id .'_photo';     
    $files = glob ("$directory/*");
    foreach($files as $key=>$file){
        $f          = basename($file);
        if($f == 'Thumbs.db') continue;
        $attachments['photo'][$key]['path'] = $file;
        $attachments['photo'][$key]['file'] = base64_encode($file);
        $attachments['photo'][$key]['filename'] = basename($file);
    }
    $directory = Configure::read('AMU.directory') . DS . 'CaseTable' . DS. $id .'_document';      
    $files = glob ("$directory/*");
    foreach($files as $key=>$file){
        $f          = basename($file);
        if($f == 'Thumbs.db') continue;
        $attachments['document'][$key]['path'] = $file;
        $attachments['document'][$key]['file'] = base64_encode($file);
        $attachments['document'][$key]['filename'] = basename($file);
    }
    $this->set('attachments',$attachments);
    $extension = ["doc" => "doc.png", "docx" =>"docx.png", "xls" => "xls.png", "xlsx"=>"xlsx.png",
                  "pdf" => "pdf.png", "jpg" => "img.png", "gif" => "img.png",  "png" => "img.png", "jpeg" => "img.png"];
 
    if($this->request->is('post')){
        $data = $this->request->getData();
        if(isset($data['Cases']['notification']) && !empty($data['Cases']['notification']))
        {
            $case_notifications = $this->CaseNotifications->newEntity();
            $caseNdata['case_id']=$id;
            $caseNdata['user_id']=$case['user_id'];
            $caseNdata['comments']=$data['Cases']['notification'];
            $caseNdata['creator_id']=$this->Auth->User('id');
            $caseNdata['notification_type'] = (isset($data['Cases']['notification_type']) && !empty($data['Cases']['notification_type'])) ? $data['Cases']['notification_type'] : $role;
            $caseNdata['created']=time();
            $caseNdata['modified']=time();
            $case_notifications = $this->CaseNotifications->patchEntity($case_notifications, $caseNdata);
            $case_notifications = $this->CaseNotifications->patchEntity($case_notifications, $caseNdata);
            $this->CaseNotifications->save($case_notifications);
            
             $information = $this->Users->find('all',[
               'conditions' => [
                'email' => $user->email
               ]
            ])->first();
           $this->_sendEmail($user->email, [Configure::read('default_email.email')=>Configure::read('default_email.name')], Configure::read('noreply_email.email'),' Your case has been updated' ,'notify', array('result' =>  $information) );
        }
        if(isset($data['Cases']['notes']) && !empty($data['Cases']['notes']))
        {
            $case_notifications = $this->CaseNotifications->newEntity();
            $caseNdata['case_id']=$id;
            $caseNdata['user_id']=$case['user_id'];
            $caseNdata['comments']=$data['Cases']['notes'];
            $caseNdata['creator_id']=$this->Auth->User('id');
            $caseNdata['notification_type']='Investigator';
            $caseNdata['created']=time();
            $caseNdata['modified']=time();
            $case_notifications = $this->CaseNotifications->patchEntity($case_notifications, $caseNdata);
            $case_notifications = $this->CaseNotifications->patchEntity($case_notifications, $caseNdata);
            $this->CaseNotifications->save($case_notifications);
            

            // $caseNdata = [];
            // $case_notes = $this->CaseNotes->newEntity();
            // $caseNdata['case_id']=$id;
            // $caseNdata['user_id']=$case['user_id'];
            // $caseNdata['case_notes']=$data['Cases']['notes'];
            // $caseNdata['creator_id']=$this->Auth->User('id');
            // $caseNdata['fields_values']='[]';
            // $caseNdata['case_status'] = (isset($data['Cases']['case_status']) && !empty($data['Cases']['case_status'])) ? $data['Cases']['case_status'] : '';
            // $caseNdata['case_status_id'] = (isset($data['Cases']['case_status_id']) && !empty($data['Cases']['case_status_id'])) ? $data['Cases']['case_status_id'] : 0;
            // $caseNdata['created']=time();
            // $caseNdata['modified']=time();
            // $case_notes = $this->CaseNotes->patchEntity($case_notes, $caseNdata);
            // $case_notes = $this->CaseNotes->patchEntity($case_notes, $caseNdata);
            // $this->CaseNotes->save($case_notes);

        }
        return $this->redirect(['action' => 'casenotes',$id]);
    }
    $user_data = $this->Users->find('all')->toArray();
    $notification = $this->CaseNotifications->find('all',['conditions'=>[
            'user_id =' => $case['user_id'],
            'notification_type ='  => 'Investigator'
    ]])->toArray();
    if($notification)
    {   foreach($notification  as $userdata)
        {
            $detail = $this->Users->find('all',['conditions'=>[
            'id =' => $userdata['creator_id'],
            ]])->first();
            if($detail)
            {
                $data_list['fname']=$detail['fname'];
                $data_list['lname']=$detail['lname'];
                $data_list['comments']=$userdata['comments'];
                $data_list['created']=$userdata['created'];
            } 
            $userList[] = $data_list;
        } 
    }if(empty($userList)){
        $userList = '';
    }
    $this->set(compact('id','role','breadcumb','caseIcons','model','result', 'userList', 'extension'));
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
public function caseunlock($id = null)
{
    if($this->Auth->User("role")=='Administrator' || $this->Auth->User("role")=='Investigator' ){
        $this->loadModel('Cases');
         $case = $this->Cases->find('all',[
            'conditions' => [  'id' => $id ]])->first(); 
        if(empty($case)){
            $this->Session->setFlash(__('Invalid case id.', true), 'error');
            if ($this->referer() != '/') {
                $this->redirect($this->referer());
            } else {
                $this->redirect(array('action' => 'casenotes', $id));
            }
        }
        $updatedData['is_exported'] = 0;
        $cases = TableRegistry::get('Cases');
        $query = $cases->query();
        $query->update()
        ->set($updatedData)
        ->where(['id' => $id])
        ->execute();
    }
    $this->redirect(array('action' => 'casenotes',$id));
        
}
public function export($id)
{

    $this->viewBuilder()->setLayout('exportdoc');
    $this->loadModel('Cases');
    $this->loadModel('Users');
    $this->loadModel('CaseNotifications');
    $discounts = Configure::read('discount');
    
    $role = $this->Auth->User('role');
    $breadcumb = '<h1 class="relative">Case <span>Notes </span></h1>';
    $caseIcons = Configure::read('case_icon');

    $case = $this->Cases->find('all',[
        'conditions' => [
            'id' => $id
        ]
    ])->contain(['Quotes','CaseNotes','CaseNotifications'])->first();
    
    $discount= '';
    if(!empty($case['discount'])){
        foreach ($discounts as $key1 => $val1) {
            if($key1 == $case['discount']){
                $discount=$val1;
            }
        }
    }
    $investor = null;
    if($case['assigned_to']!=''){
        $investor = $this->Users->find('all',[
            'conditions' => [
                'id'=>$case['assigned_to']
            ]
        ])->first();
    }

    $caseTable = TableRegistry::get('cases');
    $caseObj = $caseTable->get($id);;
    $caseObj->is_exported= 1;
    $caseTable->save($caseObj);



    $dir = Configure::read('AMU.directory');

    $directory =  $dir .DS.  'CaseTable' . DS ;

    $model = 'Cases';
    $user = $this->Users->find('all',[
        'conditions' => [
            'id' => $case['user_id']
        ]
    ])->first();
    $result[$model]=$case;
    $result['User']=$user;
    $notification = $this->CaseNotifications->find('all',['conditions'=>[
            'user_id =' => $case['user_id'],
            'notification_type ='  => 'Investigator'
    ]])->toArray();
    if($notification)
    {   foreach($notification  as $userdata)
        {
            $detail = $this->Users->find('all',['conditions'=>[
            'id =' => $userdata['creator_id'],
            ]])->first();
            if($detail)
            {
                $fname=$detail['fname'];
                $lname=$detail['lname'];
                $data_list['created_by']=$fname.' '.$lname;
                $data_list['comments']=$userdata['comments'];
                $data_list['created']=$userdata['created'];
            } 
            $userList[] = $data_list;
            $result['InvestigatorNote']=$userList;
        } 
    }if(empty($userList)){
         $result['InvestigatorNote']='';
    }
    $notification1 = $this->CaseNotifications->find('all',['conditions'=>[
            'user_id =' => $case['user_id'],
            'notification_type !='  => 'Investigator'
    ]])->toArray();
    if($notification1)
    {   foreach($notification1  as $userdata1)
        {
            $detail1 = $this->Users->find('all',['conditions'=>[
            'id =' => $userdata1['creator_id'],
            ]])->first();
            if($detail1)
            {
                $data_list1['notification_type']=$userdata1['notification_type'];
                $data_list1['comments']=$userdata1['comments'];
                $data_list1['created']=$userdata1['created'];
            } 
            $userList1[] = $data_list1;
            $result['Communication']=$userList1;
        } 
    }if(empty($userList1)){
        $result['Communication'] = '';
    }
    $this->set(compact('id','role','breadcumb','caseIcons','model','result', 'directory','investor','discount'));

}

public function casedelete($id){
    $ids = explode(',', $id);
    $this->loadModel('Cases');
    $this->loadModel('CaseNotes');
    $this->loadModel('CaseNotifications');
    $this->loadModel('Users');
    if(!empty($ids))
    {
        foreach($ids as $id)
        {
            $case = $this->Cases->find('all',[
                'conditions' => [
                    'id' => $id
                ]])->first();
            $user_id=$case->user_id;  
            $this->Cases->deleteAll(
                array(  "id" => $id  ));
            $this->Users->deleteAll(
                array(  "id" => $user_id  ));
            $this->CaseNotes->deleteAll(
                array(  "user_id" => $user_id  ));
            $this->CaseNotifications->deleteAll(
                array(  "user_id" => $user_id  ));
        } 
        $this->Flash->success(__('Case is successfully deleted.'));
    }
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
    $this->loadModel('Users');
    
    $caseIcons = Configure::read('case_icon');
    $conditions = [];    
    $user = $this->Users->find('all',[
        'conditions' => [
            'username' => $this->Auth->user('username')
        ]
    ])->first();
    if ($this->request->is('post')) 
    {
        $data = $this->request->getData();
        if(!empty($data['data']['CaseTable']['due_date']) && 
        !empty($data['data']['CaseTable']['due']))
        {
            $op = '';
            switch ($data['data']['CaseTable']['due']) 
            {
                case 'On or before':
                $op = '<=';
                break;
                case 'After':
                $op = '>';
                break;
                case 'On':
                $starttime=date('m/d/Y',strtotime($data['data']['CaseTable']['due_date']));
                $endtime=date('m',strtotime($starttime)).'/'.(date('d',strtotime($starttime))+1).'/'.date('Y',strtotime($starttime));
                break;
                default:
                $op = '';    
                break;
            }
            $conditions['submited_date '.$op] = strtotime($data['data']['CaseTable']['due_date']); 
        }
        if($data['data']['CaseTable']['site_id'] != 'All Sites' )
        {
            $conditions['site_name'] = $data['data']['CaseTable']['site_id'];
        }
    }
    if(!empty($starttime))
    {
        $this->paginate = ['limit' => 1000];
      $where=['submited_date >=' => strtotime($starttime),'submited_date <=' => strtotime($endtime)];
      $getdata = $this->Cases->find('all')->where($where);
      $pages = $this->paginate($getdata);
      $this->set(compact('pages', 'caseIcons','user'));
    }else
    {
     $this->paginate = ['order'=>['Cases.id' => 'desc'], 'conditions'=>$conditions, 'limit' => 1000, 'maxLimit' => 1000];
     $pages = $this->paginate($this->Cases);
     $this->set(compact('pages', 'caseIcons','user'));
    }
          
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
            $caseNdata['case_notes']=$case_status[$data['case_status']]['description'];
            $caseNdata['creator_id']=$this->Auth->User('id');
            $caseNdata['case_status_id']=$data['case_status'];
            $caseNdata['case_status']=$case_status[$data['case_status']]['title'];
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
            $errors['passwd'][]='Current password does not match, please try again.';
        }
            $user['password_token'] = $data['passwd'];
            if(empty($errors))
            {            
                if(!empty($data['newpassword']))
                {
                    $data['passwd'] = $data['newpassword'];
                    $data['password_token'] = $data['newpassword'];
                } 
                $this->Users->patchEntity($user, $data);
                if ($this->Users->save($user)) {
                     $this->Auth->setUser($user);
                     $this->Flash->success(__('Your account setting has been updated successfully.'));
                     return $this->redirect('/client/admin/casebrowser');
                }
                  
            }
    }
    $this->set(compact('user','errors'));
}
}