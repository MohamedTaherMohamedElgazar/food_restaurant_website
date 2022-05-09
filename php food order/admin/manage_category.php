<!--menu section starts here-->
<?php include('./partials/menu.php')?>
<!--menu section ends here-->


    <div class="main_content">
        <div class="wrapper">
            <h1>categories management</h1>
            <br/><br/>
            <?php
        
        if(isset($_SESSION['addd_category'])){
            echo $_SESSION['addd_category'];
            unset($_SESSION['addd_category']);
        };
        if(isset($_SESSION['delete_category'])){
            echo $_SESSION['delete_category'];
            unset($_SESSION['delete_category']);
        };
        if(isset($_SESSION['notFounded_category'])){
            echo $_SESSION['notFounded_category'];
            unset($_SESSION['notFounded_category']);
        }
        
        
        ?>
        <br/><br/>
            <!-- button for adding categories -->
            <a href="<?php echo SITEURL;?>admin/add_category.php" class="btn-primary">Add Category</a>
            <br/><br/>
            <table class="tbl_full">
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    
                    //query to get all admin + display them
                    $sql = "SELECT * FROM tbl_category";
                    $result = mysqli_query($conn, $sql);
                    $SN = 1; // INSTEAD OF ID A.I
                    if ($result) {
                        $count = mysqli_num_rows($result);
                        if($count > 0) {
                            while ($row = mysqli_fetch_array($result)){
                                $id = $row['id'];
                                $title = $row['title'];
                                $image = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>
                            <tr>
                                <td><?php echo $SN++?></td>
                                <td><?php echo $title?></td>
                                <td>
                                    <?php
                                    
                                    if($image){
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/category/<?php echo $image; ?>" width="100px" height="100px" alt=""/>
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
                                    
                                    <a href="<?php echo SITEURL;?>admin/update_category.php?id=<?php echo $id;?>&image=<?php echo $image;?>" class="btn-secondary">Update Category</a>
                                    <a href="<?php echo SITEURL;?>admin/delete_category.php?id=<?php echo $id;?>&image=<?php echo $image;?>" class="btn-third">Delete Category</a>
                                </td>
                            </tr>


                                <?php
                            }
                        }
                    }
                    
                    ?>
                    
                </table>
        </div>
    </div>


<!--footer section starts here-->
<?php include('./partials/footer.php')?>
<!--footer section ends here-->