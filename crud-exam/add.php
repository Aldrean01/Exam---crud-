<?php
include "connection.php";

if (isset($_POST['submit'])) {
    $productname = $_POST['productname'];
    $unit = $_POST['unit'];
    $price = $_POST['price'];
    $expired = $_POST['expired'];
    $inventory = $_POST['inventory'];
    $sales = $_POST['sales'];

    // Handle file upload
    $image = $_FILES['image'];
    $imageName = $image['name'];
    $imageType = $image['type'];
    $imageData = file_get_contents($image['tmp_name']);
    $imageData = mysqli_real_escape_string($conn, $imageData);

    $sql = "INSERT INTO `item`(`productname`, `unit`, `price`, `expired`, `inventory`, `sales`, `image`, `image_type`, `image_data`)
    VALUES ('$productname','$unit','$price','$expired','$inventory','$sales','$imageName','$imageType','$imageData')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: index.php?msg=New record created successfully");
    } else {
        echo "Failed " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
        <div class="tickcontainer">
            <div class="text-center">
                <h3>Add Tickets</h3>
                <p class="text-muted">Complete the form below to add a new user</p>
            </div>
            <form class="form" action="" method="post" enctype="multipart/form-data">

            <div class="col mb-3">
                <br>
                <div class="col">
                    <label class="form-lebel">Productname</label>
                    <input type="text" class="form-control" name="productname">
                </div>
            </div>

            <div class="col mb-3">
                <br>
                <div class="col">
                    <label class="form-lebel">Unit</label>
                    <input type="text" class="form-control" name="unit">
                </div>
            </div>

            <div class="col mb-3">
                <br>
                <div class="col">
                    <label class="form-lebel">price</label>
                    <input type="text" class="form-control" name="price">
                </div>
            </div>

            <div class="col mb-3">
                <br>
                <div class="col">
                    <label class="form-lebel">expired</label>
                    <input type="date" class="form-control" name="expired">
                </div>
            </div>

            <div class="col mb-3">
                <br>
                <div class="col">
                    <label class="form-lebel">inventory</label>
                    <input type="text" class="form-control" name="inventory">
                </div>
            </div>

            <div class="col mb-3">
                <br>
                <div class="col">
                    <label class="form-lebel">Total cost</label>
                    <input type="text" class="form-control" name="sales">
                </div>
            </div>

            <div class="col mb-3">
                <br>
                <div class="col">
                    <label class="form-lebel">Select Image:</label>
                    <input type="file" name="image" id="image">
                </div>
            </div>


            <div class="form-btn">
                <button type="submit" class="btn btn-success" name="submit">SUBMIT</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
            </form>
        </div>
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous">
    </script>
    

</body>
</html>