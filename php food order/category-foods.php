<?php include('./partials_front/menu.php');?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
        <?php
            
            $id = $_GET['id'];
            $sql = "SELECT title FROM tbl_category where id='$id'";
            $result = mysqli_query($conn,$sql);
            if($result) {
                $count = mysqli_num_rows($result);
                if($count) {
                    while($row = mysqli_fetch_array($result)){
                        $title = $row['title'];
                    }
                }
            }
            
            ?>
            
            <h2>Foods on <a href="#" class="text-white"><?php echo $title; ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_food WHERE category_id='$id'";
                $result = mysqli_query($conn,$sql);
                if($result){
                    $count = mysqli_num_rows($result);
                    if($count>0){
                        while($row = mysqli_fetch_array($result)){
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

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
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
    <<?php include('./partials_front/footer.php');?>
    <!-- footer Section Ends Here -->

</body>
</html>