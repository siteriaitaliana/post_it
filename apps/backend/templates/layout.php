<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
     
     <div id="container_backend">
     
      <div id="header_backend">
        <h1>
          <a href="<?php echo url_for('homepage') ?>">
            <h1 class="title">Post.It</h1>
          </a>
        </h1>
   
 
      <div id="menu_backend">
        <ul>
          <li>
            <?php echo link_to('Users', 'user') ?>
          </li>
          <li>
            <?php echo link_to('Categories', 'category') ?>
          </li>
          <li>
            <?php echo link_to('Posts', 'post') ?>
          </li>
        </ul>
      </div>
 	   </div>
      <div id="content_backend">
        <?php echo $sf_content ?>
      </div>

  
   <div id="footer">
     <hr  />
     <p>This application is made by: <a href="mailto:urbinilorenzo@libero.it">SiteriaItaliana</a> &copy; 2010 - London (UK)</p>
   </div>
   
   </div>
   
  </body>
</html>
