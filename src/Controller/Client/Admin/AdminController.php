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