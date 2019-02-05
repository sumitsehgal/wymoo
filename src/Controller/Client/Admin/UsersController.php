<?php
namespace App\Controller\Client\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

class UsersController extends AppController
{
    public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		$this->Auth->allow(['logout','forgotpassword']); // Temporary Allow
    }
    
    public function index()
    {
        $this->viewBuilder()->setLayout('admin');
        $conditions = [];
        if ($this->request->is('post')) 
        {
            $data = $this->request->getData();
            if(!empty($data))
            {
                if(!empty($data['fname']))
                    $conditions['fname LIKE'] = '%'.$data['fname'].'%';
                if(!empty($data['lname']))
                    $conditions['lname LIKE'] = '%'.$data['lname'].'%';
                if(!empty($data['email']))
                    $conditions['email LIKE'] = '%'.$data['email'].'%';
            }
        }
        $query = $this->Users->find('all')->where($conditions);
        $users = $this->paginate($query);
        $this->set(compact('users'));
    }

    public function add()
    {
        $this->viewBuilder()->setLayout('admin');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['slug'] = $data['username'];
            $data['passwd'] = $data['newpassword'];
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function edit($id)
    {
        $this->viewBuilder()->setLayout('admin');
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            if(!empty($data['newpassword']))
            {
                $data['passwd'] = $data['newpassword'];
            }
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function delete($id)
    {
        $this->viewBuilder()->setLayout('admin');
        
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function view()
    {
        $this->viewBuilder()->setLayout('admin');
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('admin');
        if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect('/client/admin');
			} else {
				$this->Flash->error(__('Invalid User-ID / password combination. Please try again'));
			}
		}
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    public function forgotpassword(){
        $data = $this->request->getData();
        print_r($data['data']['User']);
        $user = $this->Users->find('all',[
            'conditions' => [
                'email'=>$data['data']['User']['client_email']
            ]
        ])->first();
        // $this->_sendMail($data['data']['User']['client_email'], Configure::read('title').' <'.Configure::read('default_email.email').'>', Configure::read('noreply_email.email'), 'Forgot your password?' ,'forgot_password',array('result' => $user ), "", 'html' );
        $this->_sendEmail($data['data']['User']['client_email'], [Configure::read('default_email.email')], Configure::read('noreply_email.email'), 'Forgot Passowrd?','casenotes', array('result' => $user ) );
        print_r($user);
        die();
        // $user = $this->Users->find('all',[
        //     'conditions' => [
        //         'email'=>2
        //     ]
        // ])->all()->toList();
    }
}