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
		$this->Auth->allow(['logout']); // Temporary Allow
    }
    
    public function index()
    {

    }

    public function add()
    {

    }

    public function edit()
    {

    }

    public function delete()
    {

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
				$this->Flash->error(__('Username or password is incorrect'));
			}
		}
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}