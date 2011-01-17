<?php

/**
 * Post filter form base class.
 *
 * @package    postit
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePostFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'content'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'category_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Category')),
    ));

    $this->setValidators(array(
      'content'       => new sfValidatorPass(array('required' => false)),
      'user_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'category_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Category', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('post_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addCategoryListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.PostCategory PostCategory')
          ->andWhereIn('PostCategory.category_id', $values);
  }

  public function getModelName()
  {
    return 'Post';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'content'       => 'Text',
      'user_id'       => 'ForeignKey',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
      'category_list' => 'ManyKey',
    );
  }
}
