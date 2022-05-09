<?php include('./partials_front/menu.php');?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
            
            $search = $_POST['search'];
            
            ?>
            <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search;?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            
            if(isset($_POST['search'])){
                $search = $_POST['search'];
                $sql = "SELECT * FROM tbl_food where title LIKE '%$search%' OR description LIKE '%$search%'";
                $result = mysqli_query($conn,$sql);
                if($result) {
                    $count = mysqli_num_rows($result);
                    if($count>0){
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $price = $row['price'];
                            $description = $row['description'];
                            $image_name = $row['image_name'];
                            ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            if($image_name){
                                ?>

                                    <img src="<?php echo SITEURL;?>/images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                            
                            ?>
                            
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="food-price">$<?php echo $price?></p>
                            <p class="food-detail">
                                    <?php echo $description;?>
                            </p>
                            <br>

                            <a href="order.html" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                    <?php
                        }
                    }
                }
            }
            
            
            
            
            
            ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <?php include('./partials_front/footer.php');?>
    <!-- footer Section Ends Here -->

</body>
</html>