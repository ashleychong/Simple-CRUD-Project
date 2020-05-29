<?php
include_once("dbconfig.php");
$result = mysqli_query($mysqli, "SELECT * FROM Product ORDER BY Product_ID ASC");
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/b8d1021c19.js" crossorigin="anonymous"></script>

    <style type="text/css">
        body {
            background: -webkit-linear-gradient(to right, #e8cbfd, #86c5fc);
            background: linear-gradient(to right, #e8cbfd, #86c5fc);
            min-height: 100vh;

        }

        .text-gray {
            color: #aaa;
        }
    </style>

    <title>View Products</title>
</head>

<body>
    <div class="container">
        <main>
            <div class="container py-5">
                <div class="row text-center text-white mb-5">
                    <div class="col-lg-7 mx-auto">
                        <h1 class="display-4">Welcome!</h1>
                        <p class="lead">Create, view, edit and delete an item</p>
                        <a href="add.html">
                            <button type="button" class="btn btn-outline-primary btn-rounded waves-effect">Add a new item</button>
                        </a>
                        <a href="DataTable.php">
                            <button type="button" class="btn btn-outline-primary btn-rounded waves-effect">DataTable</button>
                        </a>
                    </div>
                </div>
                <!-- End -->

                <div class="row">
                    <div class="col-lg-8 mx-auto">

                        <!-- List group-->
                        <ul class="list-group shadow">
                            <?php
                            while ($res = mysqli_fetch_array($result)) {
                                echo "<li class=\"list-group-item\">";
                                echo "<div class=\"media align-items-lg-center flex-column flex-lg-row p-3\">";
                                echo "<div class=\"media-body order-2 order-lg-1\">";
                                echo "<h5 class=\"mt-0 font-weight-bold mb-2\">" . $res[1] . "</h5>";//product name
                                echo "<div class=\"d-flex justify-content-between\">";
                                echo "<div>";
                                echo "<p class=\"mb-2 text-muted text-uppercase small\">Product ID: " . $res[0] . "</p>";
                                // echo "<p class=\"mb-2 text-muted text-uppercase small\">Color: ".$res['']. "</p>";
                                echo "<p class=\"mb-3 text-muted text-uppercase small\">Size: " . $res[2] . "</p>";
                                echo "</div>";
                                echo "</div>";
                                echo "<div class=\"d-flex justify-content-between align-items-center\">";
                                echo "<p class=\"mb-0\"><span><strong>RM" . $res[3] . "</strong></span></p>";
                                echo "<div>";
                                echo "<a href=\"edit.php?product_id=$res[0]\" type=\"button\" class=\"card-link-secondary small text-uppercase mr-3\"><i class=\"fas fa-edit mr-1\"></i> Edit item </a>";

                                echo "<a href=\"delete.php?product_id=$res[0]\" 
                                        onclick=\"return confirm('Are you sure to delete this item?');\"
                                        type=\"button\" class=\"card-link-secondary small text-uppercase\">
                                        <i class=\"fas fa-trash mr-1\" id=\"trash-icon\"></i>
                                        Remove item </a>";

                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</li>";
                            }
                            ?>

                        </ul>
                        <!-- End -->
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>