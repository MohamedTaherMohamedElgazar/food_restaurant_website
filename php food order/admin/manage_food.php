<!--menu section starts here-->
<?php include('./partials/menu.php')?>
<!--menu section ends here-->



    <div class="main_content">
        <div class="wrapper">
            <h1>food management</h1>
            <br/><br/>
            <?php
        $sN = 1;
        if(isset($_SESSION['addd_food'])){
            echo $_SESSION['addd_food'];
            unset($_SESSION['addd_food']);
        };
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        };
        if(isset($_SESSION['unauthorized'])){
            echo $_SESSION['unauthorized'];
            unset($_SESSION['unauthorized']);
        };
        if(isset($_SESSION['newali_update'])){
            echo $_SESSION['newali_update'];
            unset($_SESSION['newali_update']);
        };
        
        ?>
        <br/><br/>
            <!-- button for adding categories -->
            <a href="<?php echo SITEURL;?>admin/add_food.php" class="btn-primary">Add Food</a>
            <br/><br/>
            <table class="tbl_full">
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    
                    
                    $sql = "SELECT * FROM tbl_food";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        $count = mysqli_num_rows($result);
                        if($count > 0){
                            while($row = mysqli_fetch_array($result)){
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>
                                    <tr>
                                        <td><?php echo $sN++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td>
                                            <?php 
                                            if($image){
                                                ?>
                                                <img src="<?php echo SITEURL;?>images/food/<?php echo $image; ?>" width="100px" height="100px" alt=""/>
                                                <?php
                                            }
                                            
                                            
                                            ?>
                                            </td>
                                        <td>
                                            <?php if($featured == "yes"){
                                            ?>
                                            <i class="fa-solid fa-check"></i>
                                            <?php
                                            }?>
                                            <?php if($featured == "no"){
                                            ?>
                                            <i class="fa-solid fa-xmark"></i>
                                            <?php
                                            }?>
                                        </td>
                                        <td>
                                            <?php if($active == "yes"){
                                            ?>
                                            <i class="fa-solid fa-check"></i>
                                            <?php
                                            }?>
                                            <?php if($active == "no"){
                                            ?>
                                            <i class="fa-solid fa-xmark"></i>
                                            <?php
                                            }?>
                                        </td>
                                        <td>
                                            <a class="btn-secondary" href="<?php echo SITEURL;?>admin/update_food.php?id=<?php echo $id;?>">Update food</a>
                                            <a class="btn-third" href="<?php echo SITEURL;?>admin/delete_food.php?id=<?php echo $id;?>&&image_name=<?php echo $image; ?>">Delete food</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }else{
                            echo "<tr><td colspan='7' class='error'>food is not added yey</td></tr>";
                        }
                    }
                    
                    
                    
                    ?>
                    
            </table>
        </div>
    </div>



<!--footer section starts here-->
<?php include('./partials/footer.php')?>
<!--footer section ends here-->