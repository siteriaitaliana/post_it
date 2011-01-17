<?php

class CategoryTable extends Doctrine_Table
{

	public static function showAllCategory($category_id)
	{
	
	$t = Doctrine_Query::create()
	  ->select('c.*')
	  ->from('Category c, c.PostCategories pc')
	  ->where('pc.user_id = ?',$category_id);
	  
	return $t->execute();
	
	}
}
