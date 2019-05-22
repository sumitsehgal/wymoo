<?php
namespace App\Controller\Client\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

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

            $validator = new Validator();

            $validator
					->requirePresence('username')
					->notEmpty('username','This field cannot be left blank, please try again.')
			         ->add('username', [
						'length' => [
							'rule' => ['minLength', 3],
							'message' => ' Username length must be minimum  3.',
						]
					])

                    ->requirePresence('fname')
					->notEmpty('fname','This field cannot be left blank, please try again.')
                    ->add('fname', [
						'length' => [
							'rule' => ['minLength', 3],
							'message' => ' First Name  length must be minimum 3.',
						]
                    ])
                    
                    ->requirePresence('lname')
					->notEmpty('lname','This field cannot be left blank, please try again.')
                    ->add('lname', [
						'length' => [
							'rule' => ['minLength', 3],
							'message' => ' Last Name  length must be minimum 3.',
						]
                    ])
                    
                    ->requirePresence('newpassword')
					->notEmpty('newpassword','This field cannot be left blank, please try again.')
                    ->add('newpassword', [
						'length' => [
							'rule' => ['minLength', 3],
							'message' => ' Password  length must be minimum 3.',
						]
                    ])
                    
                    ->requirePresence('temppassword')
					->notEmpty('temppassword','This field cannot be left blank, please try again.')
                    ->add('temppasslnameword', [
						'length' => [
							'rule' => ['minLength', 3],
							'message' => ' Password  length must be minimum 3.',
						]
					])

					->requirePresence('email')
					->notEmpty('email','This field cannot be left blank, please try again.')
					->add('email', 'validFormat', [
						'rule' => 'email',
						'message' => 'Must be a valid email address.'
                    ])
                    
					->requirePresence('phone')
					->notEmpty('phone','This field cannot be left blank, please try again.');

					
			        $errors = $validator->errors($this->request->getData());

                    
                    $oldData = $this->request->getData();
                    if(!empty($oldData['phone']))
                    {
                        if(!preg_match("/^\d+\.?\d*$/",$oldData['phone']))
                        {
                            $errors['phone'][] = 'Must be a valid Phone Number';
                        }
                    }

                    if(!empty($oldData['username']))
                    {
                        $user = $this->Users->find('all',[
                            'conditions' => [
                                'username' => $oldData['username']
                            ]
                        ])->first();

                        if($user)
                        {
                            $errors['username'][] = 'This Username is already in use.';
                        }
                    }

                    if(!empty($oldData['email']))
                    {
                        $user = $this->Users->find('all',[
                            'conditions' => [
                                'email' => $oldData['email']
                            ]
                        ])->first();

                        if($user)
                        {
                            $errors['email'][] = 'This email is already in use.';
                        }
                    }


                    if($oldData['newpassword'] != $oldData['temppassword'])
                    {
                        $errors['temppassword'][] = 'Password not matched.';
                    }

            $data['slug'] = $data['username'];
            $data['passwd'] = $data['newpassword'];

            if(!empty($errors))
			{
                //$user = $oldData;
				$this->set(compact('errors', 'oldData'));
			      //dd($errors);
            }
            
            else
            {
                $user = $this->Users->newEntity();
                if(empty($data['slug']))
                {
                    $data['slug']=$data['username'];
                }  
                $user = $this->Users->patchEntity($user, $data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
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
                $this->Flash->success(__($user['email'].' you have successfully logged in.'));
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
            $this->_sendEmail($result['email'], [Configure::read('default_email.email')], Configure::read('noreply_email.email'), 'Forgot your password?' ,'admin_forgot_password', array('result' => $result ) );
            $this->Flash->success(__('An email was sent to '.$result["email"].' with your password.'));
            return $this->redirect('/client/admin/users/login');
        }
        else
        {
            $this->Flash->error(__('Invalid email address.'));
            return $this->redirect('/client/admin/users/login');
        }
    }
}