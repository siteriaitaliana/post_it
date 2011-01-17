<h1 class="title">Log-In</h1>

<div id="login_form">
<?php echo link_to('Back to home','post/index', array('class'  => 'button'))  ?>
<?php echo link_to('Register','user/register', array('class'  => 'button'))  ?>


<?php echo $form->renderFormTag('login') ?>
  <table class="login_table">
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" class="button" value="Log-In" /> 
      </td>
    </tr>
  </table>

</form>

<div class="error">
    <?php echo $sf_user->getFlash('notice') ?>
</div>


</div>