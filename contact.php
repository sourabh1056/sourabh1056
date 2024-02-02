<?php
include("header.php"); //Developed by Students
?>
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
        <?php
		include("menusidebar.php");
		?>
        </div>
        <div id="content" class="float_r">
        	<h1>Contact</h1>
            <div class="content_half float_l">
               
                <div id="contact_form">
                   <form method="post" name="contact" action="#">
                        
                        <label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field" />
                        <div class="cleaner h10"></div>
                        <label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                        <div class="cleaner h10"></div>
                        
                        <label for="phone">Phone:</label> <input type="text" name="phone" id="phone" class="input_field" />
                        <div class="cleaner h10"></div>
        
                        <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                        <div class="cleaner h10"></div>
                        
                        <input type="submit" class="submit_btn" name="submit" id="submit" value="Send" />
                        
                    </form>
                </div>
            </div>
        <div class="content_half float_r">
        	<h5>Primary Office</h5>
			 <br />
			<br />
			<br /><br />
						
			Phone: 7777777777<br />
			Email: <a href="mailto:carshowrrom@gmail.com">carshowrrom@gmail.com</a><br/>
			
            <div class="cleaner h40"></div>
			
            <h5>Secondary Office</h5>
			
			Phone: 7777777777<br />
			Email: <a href="mailto:carshowrrom@gmail.com">carshowrrom@gmail.com</a><br/>
			<br />
             
        </div>
        
        <div class="cleaner h40"></div>
        
        <iframe width="680" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30642.47995513271!2d74.46571681485253!3d16.255875130997563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc093ea3b2d7157%3A0x58670f775c160f63!2sSankeshwar%2C%20Karnataka!5e0!3m2!1sen!2sin!4v1581418861768!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" ></iframe>
            
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
  <?php
include("footer.php");
?>