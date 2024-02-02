<?php
include("header.php"); //Developed by Students
include("dbconnection.php");
?>
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
        <?php
		include("menusidebar.php");
		?>=
        </div>
        <div id="content" class="float_r">
        	<div id="slider-wrapper">
                <div id="slider" class="nivoSlider">
                    <img src="images/slider/XUV.gif" alt=""  />
                    <a href="#"><img src="images/slider/thar.jpg" alt="" title="Weekends just got more interesting"  /></a>
                    <img src="images/slider/new.jpg" alt="" title="Perfect for family" />
                    <img src="images/slider/creta1.jpg" alt="" title="Fit For Your Everyday Potential" class="styled-title"/>
                </div>
                <div id="htmlcaption" class="nivo-html-caption">
                    <strong>User friendly advanced technology</strong>
                </div>
            </div>
            <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
            <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
            <script type="text/javascript">
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
            </script>
        	<h1>Newly Added Vehicles</h1>
            
<?php

$sql = "SELECT * FROM vehicle order by vehid desc LIMIT 0 , 12 ";
$result = mysqli_query($con, $sql);
//echo $sql;
$count = 1;
	while($rs = mysqli_fetch_array($result))
	{ 	
			$sql1 = "SELECT * FROM images where vehid='$rs[vehid]'  order by rand() limit 1";
			$result1 = mysqli_query($con, $sql1);
			$rs1 = mysqli_fetch_array($result1);
			//echo "SELECT * FROM images where vehid='$rs[vehid]'  order by rand() limit 1";
            if($count== 1 || $count == 2)
			{
			echo "<div class='product_box'>";
                      
			}
			else
			{
                            
            echo "<div class='product_box no_margin_right'>";
			$count=1;
			}
?>            
	            <h3><?php echo $rs[vehname]; ?></h3>
            	<a href="vehicledetail.php?vid=<?php echo $rs[vehid];?>">
                <?php
                if(mysqli_num_rows($result1) == 1)
				{
                    
				echo "<img src='imgvehicle/$rs1[imagepath]' alt='$rs1[imagename]' width='200' height='200' />";
				}
				else
				{
				echo "<img src='images/vehiclebg.jpg' alt='<?php $rs1[imagename]; ?>' width='200' height='200' />";
				}
				?>
                </a>
                <p><?php echo substr($rs[vehmodel],0,20); ?></p>
                
                <p>Engine: <?php echo $rs[veheng]; ?></p>
                <p class="product_price">₹ <?php echo $rs[vehcost]; ?></p>
                
                <a href="vehicledetail.php?vid=<?php echo $rs[vehid];?>" class="detail"></a>
            </div>        	                    	
<?php
	$count++;
	}
?>
           

 
     <div class="cleaner"></div>
        </div> 
        <div class="cleaner"></div>


    </div> <!-- END of templatemo_main -->
    
<?php
include("footer.php");
?>