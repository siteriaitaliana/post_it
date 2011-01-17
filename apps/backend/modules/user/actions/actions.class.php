<?php

require_once dirname(__FILE__).'/../lib/userGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/userGeneratorHelper.class.php';

/**
 * user actions.
 *
 * @package    postit
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends autoUserActions
{

  public function executeRegister($request)
  {
 	 $this->form = new sfForm();
	
    $this->form->setWidgets(array(
      'name'     => new sfWidgetFormInputText(),
      'surname'  => new sfWidgetFormInputText(),
      'username'  => new sfWidgetFormInputText(),
      'password'  => new sfWidgetFormInputText(),
      'email'  => new sfWidgetFormInputText()
      )); 

  $this->form->setValidators(array(
    'name'    => new sfValidatorString(),
    'email'   => new sfValidatorEmail(),
    'surname' => new sfValidatorString(),
    'username' => new sfValidatorString(),
    'password' => new sfValidatorString()
      ));
      
      $this->form->getWidgetSchema()->setNameFormat('user[%s]');

  if ($request->isMethod('post'))
  {
    $this->form->bind($request->getParameter('user'));
    if ($this->form->isValid())
    {
        
     $user= new User();
     $user->setName($this->form->getValue('name'));
     $user->setSurname($this->form->getValue('surname'));
     $user->setUsername($this->form->getValue('username'));
	 $password=sha1($this->form->getValue('password'));
     $user->setPassword($password);
     $user->setEmail($this->form->getValue('email'));
     //$user->setId(null);
     $user->save();
     
     $user_id=$user->getId();
     $username=$user->getUsername();
      
     $this->getUser()->setAttribute('user_id', $user_id);
	 $this->getUser()->setAttribute('username', $username);
     $this->getUser()->setAuthenticated(true);
     
     $this->redirect('post/index');
    }
  }
  
  }


}
