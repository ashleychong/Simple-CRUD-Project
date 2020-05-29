<?php
include_once("dbconfig.php");

if(isset($_POST['update']))
{	
	//The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
	$product_id = mysqli_real_escape_string($mysqli, $_POST['product_id']);	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$size = mysqli_real_escape_string($mysqli, $_POST['size']);
	$price = mysqli_real_escape_string($mysqli, $_POST['price']);	
	
	// checking empty fields
	if(empty($name) || empty($size) || empty($price)) {	
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
	} else {	
		//Step 3. Execute the SQL query.
		//updating the table
		$sql = "UPDATE product SET Name = '$name', Size = '$size', Price = '$price' WHERE Product_ID = $product_id";
        
        if (mysqli_query($mysqli, $sql)) {  
			echo '<script type="text/javascript">'; 
			echo 'alert("Item has been successfully updated.");'; 
			echo 'window.location.href = "index.php";';
			echo '</script>';
		// 	echo '<script type="text/javascript">'; 
		// echo 'window.location.href = "javascript:self.history.back();";';
		// echo '</script>';          
        } else {
             echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }

		
		//Step 5: Freeing Resources and Closing Connection using mysqli
		mysqli_close($mysqli);
	}
}
?>
<?php
//getting product_id from url
$product_id = $_GET['product_id'];
// echo $product_id;
//selecting data associated with this particular product_id
$result = mysqli_query($mysqli, "SELECT * FROM Product WHERE Product_ID = $product_id");
// if (!$result) {
// 	printf("Error: %s\n", mysqli_error($con));
//     exit();
// }

while($res = mysqli_fetch_array($result)) {
	$name = $res[1];
	$size = $res[2];
	$price = $res[3];
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        body {
            background: -webkit-linear-gradient(to right, #e8cbfd, #86c5fc);
            background: linear-gradient(to right, #e8cbfd, #86c5fc);
            min-height: 100vh;
        }

        .text-gray {
            color: #aaa;
        }

        .signup-content {
            background-color: #ffffff;
            padding: 50px, 85px;
        }
    </style>
    <title>Edit a Product</title>
</head>

<body>
    <main>
        <section class="signup">
            <div class="container">
                <main>
                    <section class="signup">
                        <div class="container">
                            <div class="signup-content">
                                <form action="edit.php" method="POST" id="signup-form" class="signup-form">
                                    <h2 class="form-title">Edit Item</h2>

                                    <div class="form-group">
                                        <input type="text" class="form-input" name="name" id="name"
                                            value="<?php echo $name ?>" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-input" name="size" id="size"
                                            value="<?php echo $size ?>" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" step=".01" class="form-input" name="price" id="price"
                                            value="<?php echo $price ?>" />
                                    </div>
                            </div>
                            <div class="form-group mt-4">
								<input type="hidden" name="product_id" value=<?php echo $_GET['product_id']?>>
                                <input type="submit" class="form-submit" name="update" value="update" />
                            </div>
                            </form>
                        </div>

            </div>
        </section>
    </main>

    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>
