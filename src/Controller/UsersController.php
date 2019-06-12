<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

	/**
	 * beforeFilter callback
	 *
	 * @return void
	 */
	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		$this->set('model', $this->modelClass);
		if (!Configure::read('App.defaultEmail')) {
			Configure::write('App.defaultEmail', Configure::read('noreply_email.email'));
		}
		 $this->Auth->allow(['add', 'logout', 'forgotpassword']); // Temporary Allow
	}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
	}
	
	/**
	 * Common Login action
	 *
	 * @return void
	 */
	public function login() 
	{ 
		$this->set('breadcrumb', '<h1>Login <span>Required</span></h1>');
		$this->set('referer', $this->referer());


		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
	        if ($user) {
				$this->Auth->setUser($user);
                $this->Flash->success(__($user['email'].' you have successfully logged in.'));
                return $this->redirect('/client/client/tracker');
			} else {
				$this->Flash->error(__('Username or password is incorrect'));
			}
		}


		if (isset($this->params) && isset($this->params['named']) && isset($this->params['named']['return_to'])) {
			$this->set('return_to', urldecode($this->params['named']['return_to']));
		} else {
			$this->set('return_to', false);
		}
    }
    
    public function logout()
    {
        $user = $this->Auth->user();
        $this->Flash->success(__($user['email'].' you have successfully logged out.'));
        return $this->redirect($this->Auth->logout());
    }

    public function forgotpassword()
    {
        $data = $this->request->getData();
        $result = $this->Users->find('all',['conditions'=>[
            'email' => $data['client_email']
            ]]);
            
        $result= (!empty($result->first())) ? $result->first()->toArray() : [];
        if(!empty($result))
        {
            // send email
            $this->_sendEmail($result['email'], [Configure::read('default_email.email')], Configure::read('noreply_email.email'), 'Forgot your password?' ,'forgot_password', array('result' => $result ) );
            $this->Flash->success(__('An email was sent to '.$result["email"].' with your password.'));
            return $this->redirect('/users/login');
        }
        else
        {
            $this->Flash->error(__('Invalid email address.'));
            return $this->redirect('/users/login');
        }
    }
}
