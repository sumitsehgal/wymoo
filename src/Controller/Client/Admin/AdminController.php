<?php
namespace App\Controller\Client\Admin;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

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
            
            $this->User->patchEntity($user, $this->request->getData());
            if ($this->user->save($user)) {
                $this->Flash->success(__('Your user has been updated.'));
                //return $this->redirect('/client/admin/myaccount');
            }
            else
            {
                $this->Flash->error(__('Unable to update your user.'));
            }
        }
        $this->set('user', $user);
    }
}