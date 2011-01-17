<div id="header">

<h1 class="title">Post.It</h1>
   
<?php  if($sf_user->isAuthenticated()): ?>

<div id="button-side">
<?php echo link_to('New PostIt','post/new', array('class'  => 'button', 'id' => 'newpostit')) ?>
<span class="welcome">Welcome <b><?php echo $sf_user->getAttribute('username') ?></b></span>
<?php echo link_to('Log-out','user/logout', array('class'  => 'button', 'id' => 'logout'))  ?>
</div>

</div>     

<div id="title_cat"><b class="cat_text">Category: </b><h3><?php echo $categoria ?></h3></div>



<div id="content_int">

<ul class="list_ext">
  <?php foreach ($posts as $i => $post): ?>	
  
	
  	  <li class="list_int">
  	  
      <div id="post_<?php echo $i ?>" class="post">
      <div id="postcontent"><a class="content_link" href="<?php echo url_for('post/show?id='.$post->getId()) ?>"><?php echo $post->getContent();?></a></div>
     
      <div id="category"><span class="cat_title"><b><?php echo "Category: "?></b></span>
      <?php foreach($post->getCategory() as $category): ?>
      <?php echo $category ?>
      <?php endforeach; ?>
      </div>
      
      <div id="date"><?php echo "<b>Updated at: </b>".$post->getUpdatedAt() ?></div>
      <div id="date"><?php echo "<b>Created at: </b>".$post->getCreatedAt() ?></div>
      
  	  </li>
 <?php endforeach; ?>
</ul>


</div>


<?php if(count($categories)!=0){?>
<div id="sidebar">
<ul>
<li><b>Categories:</b></li>
<hr />
	
	<?php foreach ($categories as $t => $categ): ?>	

		<?php if($categ->getName()!=null):?>
		<li><?php echo link_to( $categ->getName(),'category/index?name='.$categ->getName()) ?><?php echo link_to(' (Delete)', 'category/delete?id='.$categ->getId(), array		('method' => 'delete', 'confirm' => 'Are you sure to delete the'.$categ->getName().' category?')) ?>
		</li>
		<?php endif ?>




<?php endforeach; ?>
</ul>

<?php echo link_to('Show all posts','post/index', array('id' => 'show-all'))  ?>
</div>
<?php } ?>

       <?php else : ?>
   <div id="button-side">
   <?php echo link_to('Log-in','user/login', array('class'  => 'button')) ?>
   <?php echo link_to('Register','user/register', array('class'  => 'button'))  ?>
   </div>
   
   <div id="background">
   <?php echo link_to(image_tag('background.jpg'), 'user/register') ?>
   </div>
   
   <?php endif ?> 


