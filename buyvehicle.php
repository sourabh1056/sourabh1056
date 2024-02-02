<?php
session_start();
include("header.php"); //Developed by Students
include("fancybox.php");
?>
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
    	    <?php
		include("menusidebar.php");

$sql = "SELECT * FROM vehicle where vehid='$_GET[vid]'";
$result = mysqli_query($con, $sql);
$count = 1;
$rs = mysqli_fetch_array($result);

			$sqlimg = "SELECT * FROM images where vehid='$rs[vehid]' order by rand() limit 1";
			$resultimg = mysqli_query($con, $sqlimg);
			$rs1 = mysqli_fetch_array($resultimg);

			
           
?>   
    	</div>
      <div id="content" class="float_r">
       	  <h1><?php echo $rs[vehname]; ?></h1>
         
   <div class="content_half float_l">
        	<a  rel="lightbox[portfolio]" href="images/product/10_l.jpg"></a>
                 <?php
                if(mysqli_num_rows($resultimg) == 1)
				{
				echo "<a class='fancybox' href='imgvehicle/$rs1[imagepath]' data-fancybox-group='gallery' title='$rs1[imagename]'><img src='imgvehicle/$rs1[imagepath]' width='200' height='150' />";
				}
				else
				{
				echo "<img src='images/vehiclebg.jpg'  width='200' height='150' />";
				}
				?>
          </a> </div>
            <div class="content_half float_r">
              <table width="247">
                    <tr>
                        <td width="118">Price:</td>
                        <td width="117">₹ <?php echo $rs[vehcost]; ?></td>
                    </tr>
                   <tr>
    <td>vehtype:</td>
    <td><?php echo $rs['fuel_type']; ?></td>
</tr>

                    <tr>
                        <td>Model:</td>
                        <td><?php echo $rs[vehmodel]; ?> </td>
                    </tr>
                     <tr>
                        <td>Engine Power:</td>
                        <td><?php echo $rs[veheng]; ?> </td>
                    </tr>
                    <tr>
                        <td>Transmission:</td>
                        <td><?php echo $rs[transmission]; ?> </td>
                    </tr>
                        
<tr>
    <td>Color:</td>
    <td style="color: <?php echo $rs['color']; ?>"><?php echo $rs['color']; ?></td>
</tr>



    
                     <tr>
                        <td>Seating Capacity:</td>
                        <td><?php echo $rs[vehcap]; ?> </td>
                    </tr>
                     <tr>
                        <td>AirBags:</td>
                        <td><?php echo $rs[vehsaf]; ?> </td>
                    </tr>
                    <tr>
                        <td>Company:</td>
                        <td><?php
							$sql2 = "SELECT * FROM dealer where dealerid='$rs[dealerid]'  ";
							$result2 = mysqli_query($con, $sql2);
							$rs2= mysqli_fetch_array($result2);
						 echo $rs2[companyname]; 
						 
						 ?></td>
                    </tr>
                </table>
                <div class="cleaner h20"></div>

       

		  </div>
            <div class="cleaner h30"></div>
              
            <h5>Vehicle Description</h5>
        <p><?php echo $rs[vehdescription]; ?>
            
        <div class="cleaner h50"></div>

            
            <h1><font color="#000000"> Select showroom </font></h1>
<?php
$sql = "SELECT * FROM showroom ";
$result = mysqli_query($con, $sql);
$count = 1;
	while($rs5 = mysqli_fetch_array($result))
	{ 
		if($rs5[dealerid] == $rs[dealerid])	
		{
			
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
	            <h3><?php echo $rs5[showroomname]; ?></h3>
                <?php
                if($rs5[imagepath] != "")
				{
				echo "<img src='imgshowroom/$rs5[imagepath]'  width='200' height='150' />";
				}
				else
				{
				echo "<img src='images/noimage.gif' width='200' height='150' />";
				}
				?>
        <p align="left">
                Address: <?php echo $rs5[address]; ?><br />
                City: <?php echo $rs5[city]; ?><br />
                State: <?php echo $rs5[state]; ?><br />
                PIN Code: <?php echo $rs5[pincode]; ?><br />
                Contact No: <?php echo $rs5[contactno]; ?>
              </p>
              <a href="buyvehicleform.php?vid=<?php echo $_GET[vid];?>&showroomid=<?php echo $rs5[showroomid];?>"><img src="images/vehicleshowroom.png" width="132" height="30" /></a>
          </div>        	                    	
<?php
	$count++;
		}
	}
?>
         <div class="cleaner"></div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
<?php
include("footer.php");
?>