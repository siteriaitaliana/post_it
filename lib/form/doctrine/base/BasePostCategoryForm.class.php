<?php

/**
 * PostCategory form base class.
 *
 * @method PostCategory getObject() Returns the current form's model object
 *
 * @package    postit
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePostCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'post_id'     => new sfWidgetFormInputHidden(),
      'category_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'post_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'post_id', 'required' => false)),
      'category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'category_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('post_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PostCategory';
  }

}
