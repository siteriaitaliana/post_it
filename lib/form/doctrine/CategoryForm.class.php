<?php

/**
 * Category form.
 *
 * @package    postit
 * @subpackage form
 * @author     Lorenzo
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoryForm extends BaseCategoryForm
{
  public function configure()
  {
  	 unset($this['post_categories_list']);
  	 
  }

 
  
}
