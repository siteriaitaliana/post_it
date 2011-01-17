<?php
/**
 * post actions.
 *
 * @package    postit
 * @subpackage post
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
 
class postActions extends sfActions
{

  public function executeIndex($request)
  {
  	if ( $this->getUser()->isAuthenticated() == true){
    $this->posts = PostTable::retrieveAllUserPost($this->getUser()->getAttribute('user_id')); 
    $this->categories = CategoryTable::showAllCategory($this->getUser()->getAttribute('user_id'));  
    }    
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new postForm();
  }

  public function executeCreate(sfWebRequest $request, $con=null)
  {
   
    $this->form = new postForm();	
	$this->forward404Unless($request->isMethod(sfRequest::POST));
	
    $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
    if ($this->form->isValid())
    {
	  $post = new Post();
	  $post = $this->form->save();
	  
	   $post_id = Doctrine_Query::create()
	  ->select('p.id')
	  ->from('Post p')
	  ->orderby('p.id DESC')
	  ->fetchOne();
	
	  $category_name = Doctrine_Query::create()
	  ->select('c.name')
	  ->from('Category c')
	  ->orderby('c.id DESC')
	  ->fetchOne();
	  
	  $category_id = Doctrine_Query::create()
	  ->select('c.id')
	  ->from('Category c')
	  ->orderby('c.id DESC')
	  ->fetchOne();
	  
	  if (null === $con)
     $con = Doctrine_Manager::connection();
     
	  try{
	  $con->beginTransaction();
	  
	 if($post_id!=null && $category_id!=null && $category_name!=null || !('' === trim($request->getParameter('Add a new category: '))))
	  {
	  
	  $postcategory = new PostCategory();
	  $postcategory->setPostId($post_id);
	  $postcategory->setCategoryId($category_id);
	  $postcategory->save();
	  
	  }
	  
      $user_id = $this->getUser()->getAttribute('user_id'); 
      $post->setUserId($user_id);
      $post->save();
      
      
       $con->commit();
        }
        catch (Exception $e)
        {
        $con->rollback();
      	throw $e;
    }
     
      $this->redirect('post/index');
	}
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($post = Doctrine::getTable('post')->find(array($request->getParameter('id'))), sprintf('Object post does not exist (%s).', $request->getParameter('id')));
    $this->form = new postForm($post);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($post = Doctrine::getTable('post')->find(array($request->getParameter('id'))), sprintf('Object post does not exist (%s).', $request->getParameter('id')));
    $this->form = new postForm($post);

    $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
    if ($this->form->isValid())
    {
	  $post = new Post();
      $post = $this->form->save();
      
      $this->redirect('post/index');
    }


    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($post = Doctrine::getTable('post')->find(array($request->getParameter('id'))), sprintf('Object post does not exist (%s).', $request->getParameter('id')));
    $post->delete();

    $this->redirect('post/index');
  }


      
}
