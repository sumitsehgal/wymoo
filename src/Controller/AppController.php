<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Mailer\Email;

use Cake\Mailer\TransportFactory;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        //$this->loadHelper('Paginator');
        
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'username', 'password' => 'passwd']
                ]
            ]
        ]);
        $this->Auth->allow('casebegin','login','logout','forgotpassword','cleancasefiles');
        $this->set('Auth', $this->Auth);                   
        /*
        * Enable the following component for recommended CakePHP security settings.
        * see https://book.cakephp.org/3.0/en/controllers/components/security.html
        */
        //$this->loadComponent('Security');
                    
    }

    public function _sendEmail($to, $from, $replyTo, $subject, $element , $parsingParams = array(),$attachments ="", $sendAs = 'html', $bcc = array())
    {
        $toAraay = array();
		if ( !is_array($to) ) {
			$toAraay[] = $to;
		} else {
			$toAraay = $to;
        }
        
        $emailObj = new Email('default');
		foreach ($toAraay as $email) {
            $emailObj->setFrom($from);
            $emailObj->setTo($email);
            $emailObj->setSubject($subject);
            $emailObj->setReplyTo($replyTo);
            $emailObj->viewBuilder()->setTemplate($element);
            $emailObj->setViewVars($parsingParams);
            $emailObj->setEmailFormat($sendAs);
            if(!empty($attachments))
            {
                // TODO: Need to make it More Intelligent
                $emailObj->setAttachments($attachments);

            }
            try{
                $emailObj->send();
            }catch(\Exception $ex)
            {
                dd($ex);
            }
		}
    }
}
