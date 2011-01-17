<?php

/**
 * user actions.
 *
 * @package    postit
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
 
class userActions extends sfActions
{

  public function executeLogin($request)
  {  	
      $this->form = new sfForm();
      
      $this->form->setWidgets(array(
      'username'     => new sfWidgetFormInputText(),
      'password'  => new sfWidgetFormInputText(),
      ));      
    
            
       $this->form->getWidgetSchema()->setNameFormat('user[%s]');
       
       $this->form->setValidators(array(
      'username'    => new sfValidatorString(),
      'password'   => new sfValidatorString()
      ));
       
	if ($request->isMethod('post'))
    {

    $this->form->bind($request->getParameter('user'));
      if ($this->form->isValid())
      {
      $username = addslashes(strip_tags(strtolower($this->form->getValue('username'))));  	
      $password=sha1($this->form->getValue('password'));
  
      $q = Doctrine_Query::create()
	  ->select('u.id')
	  ->from('user u')
	  ->where('u.username = ?', $username)
	  ->andWhere('u.password = ?', $password);
	
	  $esiste = $q->execute();
	  $user_id = $esiste[0]->id;
	
	    if (count($user_id)!=0)
	    {
	    $this->getUser()->setAuthenticated(true);
	    $this->getUser()->setAttribute('user_id', $user_id);
	    $this->getUser()->setAttribute('username', $username);
	    $this->redirect('post/index');
	    } else {$this->getUser()->setFlash('notice', 'Username e/o password errati!');}

	   }
	 }       
     
  
  }
    
  public function executeLogout(sfWebRequest $request)
  {
      $this->getUser()->getAttributeHolder()->clear();
      $this->getUser()->setAuthenticated(false);
      session_destroy();
      $this->redirect('post/index');
  }
  
  public function executeRegister($request)
  {
 	$this->form = new userForm();

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
