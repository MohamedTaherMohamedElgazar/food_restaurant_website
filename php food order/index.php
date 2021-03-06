<?php include('./partials_front/menu.php');?>
    <!-- Navbar Section Ends Here -->


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php  echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php


if(isset($_SESSION['ordered'])){
    echo $_SESSION['ordered'];
    unset($_SESSION['ordered']); // dispaly msg only one time
};

?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
            
            /// getting categories from db and dispaly them
            $sql = "SELECT * FROM tbl_category where active='yes' AND featured='yes' limit 3";
            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
            if($count > 0){
                while($row = mysqli_fetch_array($result)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>

                <a href="<?php  echo SITEURL;?>/category-foods.php?id=<?php echo $id;?>">
                            <div class="box-3 float-container">
                                <?php
                                
                                if($image_name){
                                    ?>
                                    <img src="<?php echo SITEURL;?>/images/category/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                                
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title;?></h3>
                            </div>
                </a>
                    <?php
                }

            }else{
                echo "<div class='error'>Categories is not added</div>";
            }
            
            
            
            ?>
            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            
            
            $sql = "SELECT * FROM tbl_food where active='yes' AND featured='yes' limit 6";
            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);


            if($count>0){
                while($row= mysqli_fetch_assoc($result)){

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

            ?>
            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
<?php include('./partials_front/footer.php');?>
    <!-- footer Section Ends Here -->

</body>
</html>