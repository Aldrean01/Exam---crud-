<?php
    include('connection.php');
    if(isset($_POST['fetch'])){
        ?>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <th>ProductName</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Date of expired</th>
                <th>Available Items</th>
                <th>Total cost</th>
                <th>Image</th>
                <th>Action</th>
            </thead>
            <tbody>
            <?php
                $query=$conn->query("select * from item");
                while($row=$query->fetch_array()){
                    ?>
                    <tr>
                        <td><span id="productname<?php echo $row['id']; ?>"><?php echo $row['productname']; ?></span></td>
                        <td><span id="unit<?php echo $row['id']; ?>"><?php echo $row['unit']; ?></span></td>
                        <td><span id="price<?php echo $row['id']; ?>"><?php echo $row['price']; ?></span></td>
                        <td><span id="expired<?php echo $row['id']; ?>"><?php echo $row['expired']; ?></span></td>
                        <td><span id="inventory<?php echo $row['id']; ?>"><?php echo $row['inventory']; ?></span></td>
                        <td><span id="sales<?php echo $row['id']; ?>"><?php echo $row['sales']; ?></span></td>
                        <td><span id="image<?php echo $row['id']; ?>"><?php echo $row['image']; ?></span></td>
                        <td>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $row['id']?>" class = "text-light">Edit</a> || 
                            <a style="cursor:pointer;" class="btn btn-danger delete" data-id="<?php echo $row['id']; ?>"><i class="bi bi-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <?php
                }
             
            ?>
            </tbody>
        </table>
        <?php
    }
?>