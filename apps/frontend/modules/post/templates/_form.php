<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

 
<form action="<?php echo url_for('post/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
 
    <tbody>
      <?php echo $form ?>
    </tbody>
    
       <tfoot>
      <tr>
        <td colspan="2">
          
        
          <?php if (!$form->getObject()->isNew()): ?>
          <?php echo link_to('Delete', 'post/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure you want to delete this post-it?','class' => 'button')) ?>
      
          <?php endif; ?>
          <input type="submit" value="Save" class="button" />
          <?php echo link_to('Back to list','post/index', array('class'  => 'button')) ?>
        </td>
      </tr>
      
    </tfoot>
    
  </table>
  

  
</form>


