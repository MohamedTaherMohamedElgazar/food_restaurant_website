<!--menu section starts here-->
<?php include('./partials/menu.php')?>
<!--menu section ends here-->

<?php

if(isset($_GET['id'])){


    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_order Where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        $count = mysqli_num_rows($result);
        if($count==1){
            while($row = mysqli_fetch_array($result)){
                $id = $row['id'];
                $C_contact = $row['customer_contact'];
                $C_name = $row['customer_name'];
                $food = $row['food'];
                $qty = $row['qty'];
                $price = $row['price'];
                $total = $row['total'];
                $status = $row['status'];
            }
        }
        else{
            header('Location:'.SITEURL.'/admin/manage_order.php');
        }
    }


}else{
    header('Location:'.SITEURL.'admin/manage_order.php');
}

?>



<div class="main_content">
        <div class="wrapper">
            <h1>Update Orders</h1>
            <form action="" method="post">
                <table class="tbl_30">
                    <tr>
                        <td>Customer_ID</td>
                        <td><?php echo $id;?></td>
                    </tr>
                    <tr>
                        <td>Customer_Contact</td>
                        <td>
                            <input type="text" name="customer_contact" value="<?php echo $C_contact;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Customer_name</td>
                        <td>
                            <input type="text" name="customer_name" value="<?php echo $C_name;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Food Name</td>
                        <td><b><?php echo $food;?></b></td>
                    </tr>
                    <tr>
                        <td>QTY</td>
                        <td><input type="number" name="qty" value="<?php echo $qty;?>"/></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><b><?php echo $price;?></b></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status">
                                <option <?php if($status == "ordered"){echo "selected";}?> value="ordered" >
                                ordered
                                </option>
                                <option <?php if($status == "delivered"){echo "selected";}?> value="delivered" >
                                    delivered
                                </option>
                                <option <?php if($status == "on delivery"){echo "selected";}?> value="on delivery" >
                                    on delivery
                                </option>
                                <option <?php if($status == "canceled"){echo "selected";}?> value="canceled" >
                                    canceled
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                            <input type="hidden" name="price" value="<?php echo $price; ?>"/>
                            <input type="submit" name="update" value="Update Order" class="btn-secondary"/>
                        </td>
                    </tr>
                </table>
            </form>
            <?php
            
            if(isset($_POST['update'])){
                $id = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $qty*$price;
                $status = $_POST['status'];
                $C_name = $_POST['customer_name'];
                $C_contact = $_POST['customer_contact'];



                // query to update order
                $sql = "UPDATE tbl_order SET
     qty='$qty',
     status = '$status',
     customer_name = '$C_name',
     customer_contact = '$C_contact',
     total = '$total'
      WHERE id='$id'";



$result = mysqli_query($conn,$sql);
            if($result){
                $_SESSION['update_order'] = "<div class='success'>order is updated successfully</div>";
                header("Location:".SITEURL."admin/manage_order.php");
            }else{
                $_SESSION['update_order'] = "<div class='error'>order is NOT updated successfully</div>";
                header("Location:".SITEURL."admin/update_order.php");
            }

            }
            
            
            
            
            ?>
        </div>
</div>










<!--footer section starts here-->
<?php include('./partials/footer.php')?>
<!--footer section ends here-->