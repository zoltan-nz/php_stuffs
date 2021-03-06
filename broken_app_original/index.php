<?php

/*
 * Set up constant to ensure include files cannot be called on their own
*/
define ( "MY_APP", 1 );
/*
 * Set up a constant to your main application path
*/
define ( "APPLICATION_PATH", "application" );
define ( "TEMPLATE_PATH", APPLICATION_PATH . "/view" );

include (TEMPLATE_PATH . "/public/header.html");


?>


<div class="container">

    <div class="row">
    <div class="span12">
    
    <h1>Project Notes</h1>
<p>This project creates a list of confectionary products

<p>Fix the errors, configure and rebuild this project so that it allows you to:
<ol>
<li>List all products in the database
<li>Add products to the database
<li>Remove products from the database
<li>Add manufacturers to the database
<li>Remove manufacturers from the database
<li>Upload product images with each listing
<li>Add a NEW field to products showing country of origin. This can be text field or a select list. If using a select list, no more than 6 countries are required. Ensure updates handle the new country field.
</ol>
The sql setup is contained in the sqlsetup folder.
     
        
    </div>
    
    
    
    
   
    
    
    </div>
    
    
  
    
    

</div>



<?php include (TEMPLATE_PATH . "/public/footer.html"); ?>