<?php

/**
 * Post form.
 *
 * @package    postit
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PostForm extends BasePostForm
{
  public function configure()
  {
  	  	
   unset($this['created_at'], $this['updated_at'], $this['user_id']);
   $this->embedForm('Add a new category: ', new categoryForm());

  }
  
  
  protected function doBind(array $values)
  {
    if ('' === trim($values['Add a new category: ']['name']))
    {
      unset($values['Add a new category: '], $this['Add a new category: ']);
    }
    
    parent::doBind($values);
  }
  



}
