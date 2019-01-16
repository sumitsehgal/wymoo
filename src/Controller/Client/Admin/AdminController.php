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

        $this->paginate = [];
        $pages = $this->paginate($this->Cases);
        $this->set('pages', $pages);
    }

    public function myaccount()
    {
        $this->viewBuilder()->setLayout('admin');
    }
}