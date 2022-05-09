<?php include('./partials_front/menu.php');?>
    <!-- Navbar Section Ends Here -->
<?php


if(isset($_GET['food_id'])){
    $food_id = $_GET['food_id'];
    $sql = "SELECT * FROM tbl_food WHERE id='$food_id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $count = mysqli_num_rows($result);
        if($count==1){
            while($row = mysqli_fetch_array($result)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
            }
        }
    }
}else{
    header("Location:".SITEURL);
}





?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="post" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php
                        if($image_name){
                            ?>
                                <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                            <?php
                        }
                        
                        ?>
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name="title" value="<?php echo $title;?>">
                        <p class="food-price">$<?php echo $price;?></p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Mohamed Elgazar" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. +20xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. m@elgazar.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
                    
                    <input type="submit" name="order" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <?php
            
            if(isset($_POST['order'])){
                $title=$_POST['title'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price*$qty;
                $order_date = date("Y-m-d H:i:sa");
                $status = "ordered";
                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];
                // echo $customer_contact;

                $sql = "INSERT INTO tbl_order SET 
        food='$title',
        price = '$price',
        qty = '$qty',
        total = '$total',
        order_date = '$order_date',
        status = '$status',
        customer_name = '$customer_name',
        customer_contact = '$customer_contact',
        customer_email = '$customer_email',
        customer_address = '$customer_address'
    ";



$result = mysqli_query($conn,$sql);
if($result){
    $_SESSION['ordered'] = "<div class='success'>Food ordered successfully</div>";
    header("Location:".SITEURL);
}else{
    $_SESSION['ordered'] = "<div class='error'>Food ordered successfully</div>";
    header("Location:".SITEURL);
}

            }
            
            
            
            
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    <?php include('./partials_front/footer.php');?>

    <!-- footer Section Ends Here -->

</body>
</html>