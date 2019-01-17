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
        $this->viewBuilder()->setLayout('admin');
    }

    public function add()
    {
        $this->viewBuilder()->setLayout('admin');
    }

    public function edit()
    {
        $this->viewBuilder()->setLayout('admin');
    }

    public function delete()
    {
        $this->viewBuilder()->setLayout('admin');
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
}