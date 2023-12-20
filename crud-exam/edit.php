<?php
include "connection.php";

if(isset($_POST["submit"])) {
    $id = $_POST['id'];
    $productname = $_POST['productname'];
    $unit = $_POST['unit'];
    $price = $_POST['price'];
    $expired = $_POST['expired'];
    $inventory = $_POST['inventory'];
    $sales = $_POST['sales'];

    // Assuming you have a file upload field
    $image = $_FILES['image'];
    $imageName = $image['name'];
    $imageType = $image['type'];
    $imageData = file_get_contents($image['tmp_name']);
    $imageData = mysqli_real_escape_string($conn, $imageData);

    $sql = "UPDATE `item` SET 
            `productname`='$productname', 
            `unit`='$unit', 
            `price`='$price', 
            `expired`='$expired', 
            `inventory`='$inventory', 
            `sales`='$sales', 
            `image`='$imageName', 
            `image_type`='$imageType', 
            `image_data`='$imageData' 
            WHERE `id`='$id'";

    $result = mysqli_query($conn, $sql);

    if($result) {
        header("location: index.php?msg=Data updated successfully");
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
        <!-- Update Tickets Form -->
        <div class="text-center">
            <h3>Edit Ticket</h3>
            <p class="text-muted">Edit the form below to update the user</p>
        </div>

        <?php 
        $id = $_GET['id'];
        $sql = "SELECT * FROM item WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <form class="form" action="" method="post" enctype="multipart/form-data">
            <!-- Hidden field to store the ID of the record being edited -->
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div class="col mb-3">
                <br>
                <div class="col">
                    <label class="form-lebel">product name</label>
                    <input type="text" class="form-control" name="productname" value="<?php  echo $row['productname']?>">
                </div>
            </div> 

            <div class="col mb-3">
                <br>
                <div class="col">
                    <label class="form-lebel">unit</label>
                    <input type="text" class="form-control" name="unit" value="<?php  echo $row['unit']?>">
                </div>
            </div>

            <div class="col mb-3">
                <br>
                <div class="col">
                    <label class="form-lebel">price</label>
                    <input type="text" class="form-control" name="price" value="<?php  echo $row['price']?>">
                </div>
            </div>

            <div class="col mb-3">
                <br>
                <div class="col">
                    <label class="form-lebel">expired</label>
                    <input type="text" class="form-control" name="expired" value="<?php  echo $row['expired']?>">
                </div>
            </div>

            <div class="col mb-3">
                <br>
                <div class="col">
                    <label class="form-lebel">inventory</label>
                    <input type="text" class="form-control" name="inventory" value="<?php  echo $row['inventory']?>">
                </div>
            </div>

            <div class="col mb-3">
                <br>
                <div class="col">
                    <label class="form-lebel">Total cost</label>
                    <input type="text" class="form-control" name="sales" value="<?php  echo $row['sales']?>">
                </div>
            </div>

            <div class="col mb-3">
                <br>
                <div class="col">
                    <label class="form-lebel">Select Image:</label>
                    <input type="text" class="form-control" name="sales" value="<?php  echo $row['sales']?>">
                </div>
            </div>

            <div class="form-btn">
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
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

