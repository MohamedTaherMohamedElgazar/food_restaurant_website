<?php include('./partials_front/menu.php');?>
    <!-- Navbar Section Ends Here -->



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
            
            /// getting categories from db and dispaly them
            $sql = "SELECT * FROM tbl_category where active='yes'";
            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
            if($count > 0){
                while($row = mysqli_fetch_array($result)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>

                <a href="category-foods.html">
                            <div class="box-3 float-container">
                                <?php
                                
                                if($image_name){
                                    ?>
                                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="" class="img-responsive img-curve">
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


    <!-- social Section Starts Here -->
    
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <?php include('./partials_front/footer.php');?>
    <!-- footer Section Ends Here -->

</body>
</html>