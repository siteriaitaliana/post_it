<?php

/**
 * BaseUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $username
 * @property string $password
 * @property string $email
 * @property Doctrine_Collection $Post
 * 
 * @method integer             getId()       Returns the current record's "id" value
 * @method string              getName()     Returns the current record's "name" value
 * @method string              getSurname()  Returns the current record's "surname" value
 * @method string              getUsername() Returns the current record's "username" value
 * @method string              getPassword() Returns the current record's "password" value
 * @method string              getEmail()    Returns the current record's "email" value
 * @method Doctrine_Collection getPost()     Returns the current record's "Post" collection
 * @method User                setId()       Sets the current record's "id" value
 * @method User                setName()     Sets the current record's "name" value
 * @method User                setSurname()  Sets the current record's "surname" value
 * @method User                setUsername() Sets the current record's "username" value
 * @method User                setPassword() Sets the current record's "password" value
 * @method User                setEmail()    Sets the current record's "email" value
 * @method User                setPost()     Sets the current record's "Post" collection
 * 
 * @package    postit
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('name', 'string', 20, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '20',
             ));
        $this->hasColumn('surname', 'string', 20, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '20',
             ));
        $this->hasColumn('username', 'string', 20, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => '20',
             ));
        $this->hasColumn('password', 'string', 40, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '40',
             ));
        $this->hasColumn('email', 'string', 40, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '40',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Post', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}