<?php

class PostTable extends Doctrine_Table
{
	public static function retrieveAllUserPost($user_id)
	{

	 $q = Doctrine_Query::create()
      ->select('p.*')
      ->from('Post p')
      ->innerJoin('p.User u ON p.user_id=u.id')
      ->where('p.user_id = ?',$user_id);
      
    return $q->execute(); 
    
    }

}
