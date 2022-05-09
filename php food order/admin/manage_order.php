<!--menu section starts here-->
<?php include('./partials/menu.php')?>
<!--menu section ends here-->



    <div class="main_content">
        <div class="wrapper">
            <?php
            
            
            
            if(isset($_SESSION['update_order'])){
                echo $_SESSION['update_order'];
                unset($_SESSION['update_order']);
            };
            
            ?>
            <br/><br/>
            <h1>orders management</h1>
            <table class="tbl_full">
                
                    <tr>
                        <th>sN</th>
                        <th>food</th>
                        <th>price</th>
                        <th>qty</th>
                        <th>total</th>
                        <th>order_date</th>
                        <th>status</th>
                        <th>C_name</th>
                        <th>Actions</th>
                    </tr>
                
                    <?php
                    
                    $sN = 1;
                    $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        $count = mysqli_num_rows($result);
                        if($count > 0){
                            while($row = mysqli_fetch_array($result)){
                                $id = $row['id'];
                                $title = $row['food'];
                                $qty = $row['qty'];
                                $price = $row['price'];
                                $total = $row['total'];
                                $O_date = $row['order_date'];
                                $status = $row['status'];
                                $C_name = $row['customer_name'];
                                $C_contact = $row['customer_contact'];;
                                $C_email = $row['customer_email'];
                                $C_address = $row['customer_address'];
                                ?>
                                    <tr>
                                        <td><?php echo $sN++;?></td>
                                        <td><?php echo $title;?></td>
                                        <td>
                                        <?php echo $price;?>    
                                        </td>
                                        <td><?php echo $qty;?></td>
                                        
                                        <td>
                                            <?php echo $total;?> 
                                        </td>
                                        <td>
                                        <?php echo $O_date;?>
                                        </td>
                                        <td>
                                            <?php
                                            
                                            if($status == 'ordered'){
                                                echo "<labl>$status</labl>";
                                            }else if($status == 'delivered'){
                                                echo "<labl style='color:green'>$status</labl>";
                                            }else if($status == 'on delivery'){
                                                echo "<labl style='color:orange'>$status</labl>";
                                            }else if($status == 'canceled'){
                                                echo "<labl style='color:red'>$status</labl>";
                                            }
                                            
                                            ?>
                                        </td>
                                        <td>
                                        <?php echo $C_name;?>
                                        </td>
                                        <td>
                                    
                                            <a href="<?php echo SITEURL;?>/admin/update_order.php?id=<?php echo $id;?>" class="btn-secondary">Update Order</a>
                                        </td>

                                    </tr>
                                <?php
                            }
                        }else{
                            echo "<tr><td colspan='10' class='error'>Order is not added yey</td></tr>";
                        }
                    }
                    
                    
                    
                    ?>
                    
            </table>
                    
                
        </div>
    </div>



<!--footer section starts here-->
<?php include('./partials/footer.php')?>
<!--footer section ends here-->