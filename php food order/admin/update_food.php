<?php
include('./partials/menu.php');
?>


<?php


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_food where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result) {
        $count = mysqli_num_rows($result);
        if($count==1){
            while($row2 = mysqli_fetch_array($result)){
                $title = $row2['title'];
                $description = $row2['description'];
                $price = $row2['price'];
                $current_image = $row2['image_name'];
                $current_category = $row2['category_id'];
                $featured = $row2['featured'];
                $active = $row2['active'];
            }
        }
    }
}else{
    header("Location:".SITEURL."/admin/manage_food.php");
}


?>
<div class="main-content">
    <div class="wrapper">
        <h1>updating Foods</h1>
        <br/><br/>
        <!-- form for adding categories -->
        
<form method="post" action="" enctype="multipart/form-data">

<table class="tbl_30">
        <tr>
            <td>title: </td>
            <td>
                <input type="text" name="title" value="<?php echo $title;?>"/>
            </td>
        </tr>
        <tr>
            <td>Description: </td>
            <td>
                <textarea name="description" col="30" rows="5"><?php echo $description;?></textarea>
            </td>
        </tr>
        <tr>
            <td>price: </td>
            <td>
                <input type="number" name="price" value="<?php echo $price;?>"/>
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
                                <option value="<?php echo $id?>" <?php if($id == $current_category){echo 'selected';}?>><?php echo $title?></option>
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
            <td>Current Image: </td>
            <td>
            <?php
                        
                        if($current_image){
                            ?>

                            <img src="<?php echo SITEURL;?>images/food/<?php echo $current_image?>" width="100px"/>
                            <?php
                        }
                        
                        
                        
                        ?>
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
                        <input type="submit" value="Update_food" name="update_food" class="btn-secondary"/>
                    </td>
                </tr>
</table>

</form>


<?php

if(isset($_POST['update_food'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $current_image = $_POST['current_image'];
    $category = $_POST['category'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    // print_r($image_name);
    // echo "$id $title $description $price $current_image $category $featured $active";


    // updating image:
    
    if(isset($_FILES['uploaded_image'])){
        $image_name = $_FILES['uploaded_image']['name'];
        if($image_name != ""){
            // we must Auto_Rename
            $ext = end(explode('.', $image_name));
        $image_name = "food_name_".rand(000,999).".".$ext;
        ////////////////////////////////////////////////////
        $src_path = $_FILES['uploaded_image']['tmp_name'];
        $dest_path = "../images/food/".$image_name;
        move_uploaded_file($src_path,$dest_path);
        // if(!$upload){
        //     $_SESSION['uploaded'] = "<div class='error>failed to upload the image</div>";
        //     header("Location:".SITEURL."admin/add_category.php");
            
        // }else{
        //     $image_name="";
        // }

        }else{
            $image_name = $current_image;
        }
        if($current_image != ""){
            $remove_path = "../images/food/".$current_image;
            unlink($remove_path);
        }
        
    }else{
        $image_name = $current_image;
    }
    // }else{
    //     $image_name = $current_image;
    // }

    $sql = "UPDATE tbl_food SET
    title='$title',
    image_name = '$image_name',
    featured = '$featured',
    active = '$active'
     WHERE id='$id'";

    $resultthree = mysqli_query($conn,$sql);
    if($resultthree){
        $_SESSION['newali_update'] = "<div class='success>food is update successfully</div>";
        header("Location:".SITEURL."admin/manage_food.php");
    }

            

}

?>
    </div>
</div>



<?php
include('./partials/footer.php');
?>