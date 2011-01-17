<div id="header">

<h1 class="title">Register</h1>
<div id="button-back">
<?php echo link_to('Back to home','post/index', array('class'  => 'button')) ?><?php echo link_to('Log-in','user/login', array('class'  => 'button')) ?> 
</div>

</div>

<div id="content">
<?php echo $form->renderFormTag('register') ?>
  <table>
    <?php echo $form ?>
    <tr>

      <td colspan="2">
         <br />
        <input type="submit" class="button" id="register_button" value="Register"/>       
      </td>
    </tr>
  </table>
</form>

</div>