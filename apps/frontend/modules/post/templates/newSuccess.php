<?php  if($sf_user->isAuthenticated()): ?>

<h1 class="title">New Post</h1>

<div id="new_form">
<?php include_partial('form', array('form' => $form)) ?>
</div>

<?php else : ?>

<h1 class="title">Post.It</h1>

   <div id="button-side">
   <?php echo link_to('Log-in','user/login', array('class'  => 'button')) ?>
   <?php echo link_to('Register','user/register', array('class'  => 'button'))  ?>
   </div>
   
    <div id="background">
   <?php echo link_to(image_tag('background.jpg'), 'user/register') ?>
   </div>

<?php endif ?>


