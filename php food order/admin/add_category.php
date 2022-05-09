<?php

include('./partials/menu.php');
?>



<div class="main_content">
    <div class="wrapper">
        <?php
        
        if(isset($_SESSION['addd_category'])){
            echo $_SESSION['addd_category'];
            unset($_SESSION['addd_category']);
        };
        // if(isset($_SESSION['uploaded'])){
        //     echo $_SESSION['uploaded'];
        //     unset($_SESSION['uploaded']);
        // }
        
        
        ?>
        <h1>Add Category</h1>
        <br/><br/>
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
                    <input type="submit" value="Add_Category" name="add_category" class="btn-primary"/>
                </tr>
            </table>
        </form>
        <!-- adding data of form to database -->
        <?php
        
        if(isset($_POST['add_category'])){
            //echo "clicked";
            $title=$_POST['title'];
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
                $image_name = "food_category_".rand(000,999).".".$ext;
                ////////////////////////////////////////////////////
                $src_path = $_FILES['uploaded_image']['tmp_name'];
                $dest_path = "../images/category/".$image_name;
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
            $sql = "INSERT INTO tbl_category SET 
        title='$title',
        featured='$featured',
        image_name='$image_name',
        active='$active'
        ";
            $result= mysqli_query($conn, $sql);
            if($result){
                $_SESSION['addd_category'] = "<div class='success'>Category is added successfully</div>";
                header("Location:".SITEURL."admin/manage_category.php");
            }else{
                $_SESSION['addd_category'] = "<div class='error'>Category is NOT added successfully</div>";
                header("Location:".SITEURL."admin/add_category.php");
            }
        };
        
        
        ?>
    </div>
</div>







<?php

include('./partials/footer.php');
?>