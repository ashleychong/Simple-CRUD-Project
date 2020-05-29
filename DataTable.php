<?php
include_once('dbconfig.php');
$sql = "SELECT * FROM Product ORDER BY Product_ID ASC";
$SQLquery = mysqli_query($mysqli, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datatable</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <table id="productTable" class="table">
            <thead>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Size</th>
                <th>Price</th>
            </thead>
            <tbody>
                    <?php while ($res = mysqli_fetch_array($SQLquery)) { ?>
                        <tr>
                            <td><?php echo $res[0]; ?></td>
                            <td><?php echo $res[1]; ?></td>
                            <td><?php echo $res[2]; ?></td>
                            <td><?php echo $res[3]; ?></td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productTable').DataTable();
        });
    </script>
</body>

</html>