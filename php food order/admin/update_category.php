<?php include('./partials/menu.php')?>

<div class=main-content>
    <div class="wrapper">
        <h1>Update Categories</h1>
        <br/><br/>
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                /// guery to get data from db
                $sql = "SELECT * FROM tbl_category where id='$id'";
                $result=mysqli_query($conn,$sql);
                if($result) {
                    $count = mysqli_num_rows($result);
                    if($count==1){
                        if($row = mysqli_fetch_array($result)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $current_image = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                        }
                    }else{
                        $_SESSION['notFounded_category'] = "<div class='error'>category is not founded</div>";
                        header("Location:".SITEURL."admin/manage_category.php");
                    }
                }
            }
        
        
        
        
        ?>
        <form method="post" action="" enctype="multipart/form-data">
            <table class="tbl_30">
                <tr>
                    <td>title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title;?>"/>
                    </td>
                </tr>
                <tr>
                    <td>current image: </td>
                    <td>
                        <?php
                        
                        if($current_image){
                            ?>

                            <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image?>" width="100px"/>
                            <?php
                        }
                        
                        
                        
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>new image: </td>
                    <td>
                        <input type="file" name="uploaded_image"/>
                    </td>
                </tr>
                <tr>
                    <td>featured: </td>
                    <td>
                        <input <?php if($featured == "yes"){echo "checked";}?> type="radio" name="featured" value="yes"/>yes
                        <input <?php if($featured == "no"){echo "checked";}?> type="radio" name="featured" value="no"/>no
                    </td>
                </tr>
                <tr>
                    <td>active: </td>
                    <td>
                        <input <?php if($active == "yes"){echo "checked";}?> type="radio" name="active" value="yes"/>yes
                        <input <?php if($active == "no"){echo "checked";}?> type="radio" name="active" value="no"/>no           
                    </td>
                </tr>
                <tr colspan="2">
                    <td>
                        <input type="hidden" value="<?php echo $id;?>" name="id"/>
                        <input type="hidden" value="<?php echo $current_image;?>" name="current_image"/>
                        <input type="submit" value="Update_Category" name="update_category" class="btn-secondary"/>
                    </td>
                </tr>
            </table>
        </form>
        <?php
        
        if(isset($_POST['update_category'])){
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];


            // updating image:
            if(isset($_FILES['uploaded_image'])){
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
                $remove_path = "../images/category/".$current_image;
                unlink($remove_path);
            }else{
                $image_name = $current_image;
            }

            //query to update
            $sql = "UPDATE tbl_category SET
     title='$title',
     image_name = '$image_name',
     featured = '$featured',
     active = '$active'
      WHERE id='$id'";


            $result = mysqli_query($conn,$sql);
            if($result){
                $_SESSION['update_category'] = "<div class='success'>category is updated successfully</div>";
                header("Location:".SITEURL."admin/manage_category.php");
            }else{
                $_SESSION['update_category'] = "<div class='error'>category is NOT updated successfully</div>";
                header("Location:".SITEURL."admin/update_category.php");
            }


        }

        
        
        
        ?>
    </div>
</div>






<?php include('./partials/footer.php')?>