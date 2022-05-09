<?php include('./partials/menu.php');?>


<div class="main_content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br/><br/>
        <?php
        
        
        if(isset($_SESSION['addd_food'])){
            echo $_SESSION['addd_food'];
            unset($_SESSION['addd_food']);
        };
        
        
        ?>
        <!-- form for adding categories -->
        
        <form method="post" action="" enctype="multipart/form-data">

        <table class="tbl_30">
                <tr>
                    <td>title: </td>
                    <td>
                        <input type="text" name="title" placeholder="title"/>
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" col="30" rows="5" placeholder="description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>price: </td>
                    <td>
                        <input type="number" name="price"/>
                    </td>
                </tr>
                <tr>
                    <td>category: </td>
                    <td>
                        <select name="category">
                            <?php 
                            
                            $sql = "SELECT * FROM tbl_category where
                                active='yes'
                             ";
                            $result = mysqli_query($conn, $sql);
                            if($result) {
                                $count = mysqli_num_rows($result);
                                if($count > 0) {
                                    while($row = mysqli_fetch_array($result)){
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        ?>
                                        <option value="<?php echo $id?>"><?php echo $title?></option>
                                        <?php
                                    }
                                }else{
                                    ?>
                                    <option value="0">No categories</option>
                                    <?php
                                }
                            }
                            
                            
                            
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>select image</td>
                    <td>
                        <input type="file" name="uploaded_image"/>
                    </td>
                </tr>
                <tr>
                    <td>featured: </td>
                    <td>
                        <input type="radio" name="featured" value="yes"/>yes
                        <input type="radio" name="featured" value="no"/>no
                    </td>
                </tr>
                <tr>
                    <td>active: </td>
                    <td>
                        <input type="radio" name="active" value="yes"/>yes
                        <input type="radio" name="active" value="no"/>no           
                    </td>
                </tr>
                <tr colspan="2">
                    <td>
                        <input type="submit" value="Add_food" name="add_food" class="btn-primary"/>
                    </td>
                </tr>
        </table>

        </form>
                <!-- adding data of form to database -->
                <?php
        
        if(isset($_POST['add_food'])){
            //echo "clicked";
            $title=$_POST['title'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $category=$_POST['category'];
            // check if radio buttons is clicked or nor
            if(isset($_POST['featured'])){
                $featured = $_POST['featured'];
            }else{
                $featured="no";
            };
            if(isset($_POST['active'])){
                $active = $_POST['active'];
            }else{
                $active="no";
            };
            // image insert to db
            if(isset($_FILES['uploaded_image']['name'])){
                // we must have 3 things
                $image_name = $_FILES['uploaded_image']['name'];
                if($image_name){
                    // we must Auto_Rename
                $ext = end(explode('.', $image_name));
                $image_name = "food_name_".rand(000,999).".".$ext;
                ////////////////////////////////////////////////////
                $src_path = $_FILES['uploaded_image']['tmp_name'];
                $dest_path = "../images/food/".$image_name;
                $upload = move_uploaded_file($src_path,$dest_path);
                // if(!$upload){
                //     $_SESSION['uploaded'] = "<div class='error>failed to upload the image</div>";
                //     header("Location:".SITEURL."admin/add_category.php");
                    
                // }else{
                //     $image_name="";
                // }

                }
                
                
                
            }
            // sql query to insert into db
            $sql = "INSERT INTO tbl_food SET 
        title='$title',
        description = '$description',
        price = '$price',
        category_id = '$category',
        image_name='$image_name',
        featured='$featured',
        active='$active'
        ";
            $result= mysqli_query($conn, $sql);
            if($result){
                $_SESSION['addd_food'] = "<div class='success'>food is added successfully</div>";
                header("Location:".SITEURL."admin/manage_food.php");
            }else{
                $_SESSION['addd_food'] = "<div class='error'>food is NOT added successfully</div>";
                header("Location:".SITEURL."admin/add_food.php");
            }
        };
        
        
        ?>
    </div>
</div>
    








<?php include('./partials/footer.php');?>