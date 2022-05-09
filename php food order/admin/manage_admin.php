<!--menu section starts here-->
<?php include('./partials/menu.php')?>
<!--menu section ends here-->


        <!--main_content section starts here-->
        <div class="main_content">
            <div class="wrapper">
                <h1>Admin Management</h1>
                <br/>
                <br/>
                <br/>
                <?php
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']); // dispaly msg only one time
                    };
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']); // dispaly msg only one time
                    };
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']); // dispaly msg only one time
                    };
                    if(isset($_SESSION['user_not_found'])){
                        echo $_SESSION['user_not_found'];
                        unset($_SESSION['user_not_found']); // dispaly msg only one time
                    };                    
                    if(isset($_SESSION['notMatch'])){
                        echo $_SESSION['notMatch'];
                        unset($_SESSION['notMatch']); // dispaly msg only one time
                    };
                    if(isset($_SESSION['change'])){
                        echo $_SESSION['change'];
                        unset($_SESSION['change']); // dispaly msg only one time
                    };

                
                
                
                ?>
                <br/>
                <br/>
                <br/>
                
                <a href="<?php echo SITEURL;?>admin/add_admin.php" class="btn-primary">Add Admin</a>
                <br/>
                <br/>
                <table class="tbl_full">
                    <tr>
                        <th>S.N</th>
                        <th>FULL NAME</th>
                        <th>USER NAME</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                    
                    //query to get all admin + display them
                    $sql = "SELECT * FROM tbl_admin";
                    $result = mysqli_query($conn, $sql);
                    $SN = 1; // INSTEAD OF ID A.I
                    if ($result) {
                        $count = mysqli_num_rows($result);
                        if($count > 0) {
                            while ($row = mysqli_fetch_array($result)){
                                $id = $row['id'];
                                $full_name = $row['full_name'];
                                $user_name = $row['user_name'];

                                ?>
                            <tr>
                                <td><?php echo $SN++?></td>
                                <td><?php echo $full_name?></td>
                                <td><?php echo $user_name?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/change_password.php?id=<?php echo $id;?>" class="btn-primary">change password</a>
                                    <a href="<?php echo SITEURL;?>admin/update_admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a>
                                    <a href="<?php echo SITEURL;?>admin/delete_admin.php?id=<?php echo $id;?>" class="btn-third">Delete Admin</a>
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
        <!--main_content ends here-->



<!--footer section starts here-->
<?php include('./partials/footer.php')?>
<!--footer section ends here-->
    </body>
</html>