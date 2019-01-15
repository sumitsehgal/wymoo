# Users Plugin for CakePHP #

Version 1.1

The users plugin is for allowing users to register and login manage their profile. It also allows admins to manage the users.

The plugin is thought as a base to extend your app specific users controller and model from.

## Installation ##

The plugin is pretty easy to set up, all you need to do is to copy it to you application plugins folder and load the needed tables. You can create database tables using sql files  the schema folder 

Activate some necessary core components:

	public $components = array('RequestHandler', 'Session', 'Auth');

Add some lines to your `beforeFilter` and configure at your taste:

	$this->Auth->fields = array('username' => 'email', 'password' => 'passwd');
	$this->Auth->loginAction = array('plugin' => 'users', 'controller' => 'users', 'action' => 'login', 'admin' => false);
	$this->Auth->loginRedirect = '/';
	$this->Auth->logoutRedirect = '/';
	$this->Auth->authError = __('Sorry, but you need to login to access this location.', true);
	$this->Auth->loginError = __('Invalid e-mail / password combination.  Please try again', true);
	$this->Auth->autoRedirect = false;
	$this->Auth->userModel = 'Users.User';
	$this->Auth->userScope = array('User.active' => 1);

## What it is capable of ##

You can use the plugin as it comes if you're happy with it or, more common, extend your app specific user implementation from the plugin.

The plugin itself is already capable of:

* User registration (http://localhost/users/users/register)
* Account verification by a token sent via email
* User login (email / password) (http://localhost/users/users/login)
* Password reset based on requesting a token by email and entering a new password
* Simple profiles for users
* User search
* User management using the "admin" section

## How to extend the plugin ##

### Extending the controller ###

Declare the controller class

	App::import('Controller', 'Users.Users');
	AppUsersController extends UsersController

In the case you want to extend also the user model it's required to set the right user class in the beforeFilter() because the controller will use the inherited model which would be Users.User.

	public function beforeFilter() {
		parent::beforeFilter();
		$this->User = ClassRegistry::init('AppUser');
	}

You can overwrite the render() method to fall back to the plugin views in the case you want to use some of them

	public function render($action = null, $layout = null, $file = null) {
		if (is_null($action)) {
			$action = $this->action;
		}
		if (!file_exists(VIEWS . $this->viewPath . DS . $action . '.ctp')) {
			$file = App::pluginPath('users') . 'views' . DS . 'users' . DS . $action . '.ctp';
		}
		return parent::render($action, $layout, $file);
	}

### Extending the model ###

Declare the model

	App::import('Model', 'Users.User');
	AppUser extends User {
		public $useTable = 'users';
		public $name = 'AppUser';
	}

It's important to override the AppUser::useTable property with the 'users' table.

You can override/extend all methods or properties like validation rules to suit your needs.

## Requirements ##

* PHP version: PHP 5.2+
* CakePHP version: Cakephp 1.3 Stable




## License ##

Copyright 2010-2011, [Gempulse Infotech Pvt. Ltd.](http://www.fullestop.com)

Licensed under [The MIT License](http://www.opensource.org/licenses/mit-license.php)<br/>
Redistributions of files must retain the above copyright notice.

## Copyright ###

Copyright 2010-2011<br/>
[Gempulse Infotech Pvt. Ltd.(http://www.fullestop.com)<br/>
510, Fourth Floor, Apex Mall,<br/>
Lal Kothi, Tonk Road,<br/>
Jaipur - 302015<br/>
RAJASTHAN<br/>
INDIA<br/>
http://www.fullestop.com<br/>

