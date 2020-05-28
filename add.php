<?php
    include_once("dbconfig.php");

    if(isset($_POST['submit'])) {	
	//The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
    $product_id = mysqli_real_escape_string($mysqli, $_POST['product_id']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $size = mysqli_real_escape_string($mysqli, $_POST['size']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);
		
	// checking empty fields
	if(empty($product_id) || empty($name) || empty($size) || empty($price)) {
		if(empty($product_id)) {
			echo '<script type="text/javascript">'; 
			echo 'alert("Product ID field is empty.");'; 
			echo '</script>';
        }
        		
		if(empty($name)) {
			echo '<script type="text/javascript">'; 
			echo 'alert("Name field is empty.");'; 
			echo '</script>';
		}
		
		if(empty($size)) {
			echo '<script type="text/javascript">'; 
			echo 'alert("Size field is empty.");'; 
			echo '</script>';
		}
		
		if(empty($price)) {
			echo '<script type="text/javascript">'; 
			echo 'alert("Price field is empty.");'; 
			echo '</script>';
		}
		
		//link to the previous page
		echo '<script type="text/javascript">'; 
		echo 'window.location.href = "javascript:self.history.back();";';
		echo '</script>';
	}
	else { 
		// check whether the product already exists
		$statement="SELECT * FROM Product WHERE Product_ID = $product_id";
            $response=mysqli_query($mysqli,$statement);
		if (mysqli_num_rows($response) > 0) {
			echo '<script type="text/javascript">'; 
			echo 'alert("Product ID already exists.");'; 
			//go back to previous page after alert button is clicked
			echo 'window.location.href = "javascript:self.history.back();";';
			echo '</script>';
		}
		else {
			// if all the fields are filled (not empty) 		
			//Step 3. Execute the SQL query.	
			//insert data to database	
		
			$sql = "INSERT INTO product (Product_ID, Name, Size, Price) VALUES ('$product_id','$name','$size','$price')";
			
			if (mysqli_query($mysqli, $sql)) {
				echo '<script type="text/javascript">'; 
				echo 'alert("Item has been successfully updated.");'; 
				echo 'window.location.href = "index.php";';
				echo '</script>';
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
			}
	}

	
		//Step 5: Freeing Resources and Closing Connection using mysqli
		mysqli_close($mysqli);
	}
}
?>