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
				echo "<a class='fancybox' href='imgvehicle/$rs1[imagepath]' data-fancybox-group='gallery' title='$rs1[imagename]'><img src='imgvehicle/$rs1[imagepath]' width='250' height='200' />";
				}
				else
				{
				echo "<img src='images/vehiclebg.jpg'  width='250' height='200' />";
				}
				?>
                </a> </div>

    <div class="content_half float_r">

    <form action="v.php" method="post">
    <h3>Customizations</h3>
    <table>
        <!-- ... Other form fields ... -->

        <tr>
            <td>Transmission:</td>
            <td>
                <select id="transmission" name="transmission">
                    <option value="Automatic">Automatic</option>
                    <option value="Manual">Manual</option>
                    <!-- Add more transmission options as needed -->
                </select>
            </td>
        </tr>
        <!-- ... Other form fields ... -->

        <tr>
            <td>Color:</td>
            <td>
                <select id="color" name="color">
                    <option value="Red">Red</option>
                    <option value="Black">Black</option>
                    <option value="Blue">Blue</option>
                    <option value="White">White</option>
                    <!-- Add more color options as needed -->
                </select>
            </td>
        </tr>
        <!-- ... Other form fields ... -->

        <tr>
            <td>Fuel Type:</td>
            <td>
                <select id="fuel_type" name="fuel_type">
                    <option value="Petrol">Petrol</option>
                    <option value="Diesel">Diesel</option>
                    <!-- Add more fuel type options as needed -->
                </select>
            </td>
        </tr>
        <!-- ... Other form fields ... -->

        <input type="hidden" name="vid" value="<?php echo $_GET['vid']; ?>">
    </table>
    <div class="cleaner h20"></div>
  
    <!-- ... Your other form fields (Transmission, Color, Fuel Type) here ... -->
    
 

   <input type="submit" name="save" value="Save">

</form>

<?php
// Assuming you have a database connection ($con) established earlier in your code

if (isset($_POST['save'])) {
    // Retrieve selected options from the form
    $transmission = mysqli_real_escape_string($con, $_POST['transmission']);
    $color = mysqli_real_escape_string($con, $_POST['color']);
    $fuel_type = mysqli_real_escape_string($con, $_POST['fuel_type']);

    // Assuming $_POST['vid'] contains the vehicle ID
    $vehicle_id = mysqli_real_escape_string($con, $_POST['vid']);

    // Check if the data for this vehicle already exists in the database
    $check_sql = "SELECT * FROM vehicle WHERE vehid = '$vehicle_id'";
    $check_result = mysqli_query($con, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // Data already exists, so update the record
        $update_sql = "UPDATE vehicle SET transmission = '$transmission', color = '$color', fuel_type = '$fuel_type' WHERE vehid = '$vehicle_id'";
        mysqli_query($con, $update_sql);
    } else {
        // Data doesn't exist, so insert a new record
        $insert_sql = "INSERT INTO vehicle (vehid, transmission, color, fuel_type) VALUES ('$vehicle_id', '$transmission', '$color', '$fuel_type')";
        mysqli_query($con, $insert_sql);
    }

    // Redirect the user to the vehicle details page or another
    header("Location: veh.php?vid=$vehicle_id");
    exit; // Ensure script stops executing after redirection
}
?>
 <div class="cleaner h20"></div>
        <h3>key specifications</h3>
           <table>
                    <tr>
                        <td width="160">Price:</td>
                        <td><?php echo $rs[vehcost]; ?> INR</td>
                    </tr>

                    <tr>
                        <td>Model:</td>
                        <td><?php echo $rs[vehmodel]; ?> </td>
                    </tr>
                    <tr>
                        <td>Engine Power:</td>
                        <td><?php echo $rs[veheng]; ?> </td>
                    </tr>
                   <!-- Add Transmission option here -->

                     <tr>
                        <td>Seating Capacity:</td>
                        <td><?php echo $rs[vehcap]; ?> </td>
                    </tr>
                     <tr>
                        <td>AirBags:</td>
                        <td><?php echo $rs[vehsaf]; ?> </td>
                    </tr>
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
               

                <a href="buyvehicle.php?vid=<?php echo $rs[vehid];?>" class="addtocart"></a>



<div id="content" class="float_r">
    <!-- ... Existing vehicle details code ... -->

    <div class="cleaner h50"></div>

    <h3>Book a Test Drive</h3>
    <form action="process_test_drive.php" method="post">
        <input type="hidden" name="vehicle_id" value="<?php echo $rs['vehid']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="preferred_date">Preferred Date:</label>
        <input type="date" id="preferred_date" name="preferred_date" required>

        <label for="preferred_time">Preferred Time:</label>
        <input type="time" id="preferred_time" name="preferred_time" required>

        <textarea name="message" placeholder="Additional message (optional)"></textarea>

        <input type="submit" value="Request Test Drive">
    </form>
</div>


			</div>
            <div class="cleaner h30"></div>
              
            <h5>Vehicle Description</h5>
          <p><?php echo $rs[vehdescription]; ?>
            </p>
          <div class="cleaner h50"></div>
            
            <h3>Vehicle images</h3>            
                        
<?php
$count = 1;
 	
			$sql1 = "SELECT * FROM images where vehid='$_GET[vid]'  ";
			$result1 = mysqli_query($con, $sql1);
		while($rs = mysqli_fetch_array($result1))
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
	            <h3><?php echo $rs[imagename]; ?></h3>
            	<a href="vehicledetail.php">
                <?php
				echo "<a class='fancybox' href='imgvehicle/$rs[imagepath]' data-fancybox-group='gallery' title='$rs[imagename]'><img src='imgvehicle/$rs[imagepath]' alt='<?php $rs1[imagepath]; ?>' width='200' height='200' /></a>";
				?>
                </a>

            </div>        	                    	
<?php
			$count++;
		}
?>             
   <div class="cleaner h70"></div>


 <h2>Post Review</h2>

    <form action="reviews.php" method="post">
        <input type="hidden" name="vehid" value="<?php echo $_GET['vehid']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="rating">Rating (1-5):</label>
        <input type="number" name="rating" min="1" max="5" required><br>

        <label for="review_text">Review:</label>
        <textarea name="review_text" rows="4" required></textarea><br>

        <input type="submit" value="Submit Review">
    </form>
 
 <div class="cleaner h50"></div>
<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "vehiclewebshowroom";

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to retrieve reviews for the specific vehicle
// Assuming vid is the primary key of the vehicle in your database

$sql = "SELECT name, email, rating, review_text, review_date ,r_time  FROM reviews ORDER BY r_time DESC LIMIT 3";


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data from each review
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<h3>By: " . $row["name"] . "</h3>";
        echo "<p>Rating: " . $row["rating"] . "</p>";
        echo "<p>Review Text: " . $row["review_text"] . "</p>";
        echo "<p>Date: " . $row["review_date"] . "</p>";
        echo "<p>time: " . $row["r_time"] . "</p>";
        echo "<hr>";
    }
} else {
    echo "No reviews found for this vehicle.";
}


// Close the database connection
mysqli_close($conn);
?>

</div>

<div class="cleaner h60"></div>



<?php
include("footer.php");
?>








