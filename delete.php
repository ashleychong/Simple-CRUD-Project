<?php
include("dbconfig.php");

//getting id of the data from url
$product_id = $_GET['product_id'];

//3. Execute the SQL query.
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM product WHERE product_id=$product_id");

//Step 5: Freeing Resources and Closing Connection using mysqli
mysqli_close($mysqli);

//4. Process the results.
//redirecting to the display page (index.php in our case)
header("Location:index.php");

?>