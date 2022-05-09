<!--menu section starts here-->
<?php include('./partials/menu.php')?>
<!--menu section ends here-->


        <!--main_content section starts here-->
        <div class="main_content">
            <div class="wrapper">
                <h1>DASHBOARD</h1>
                <br/>

            <?php
            
            if(isset($_SESSION['logZAIn'])){
                echo $_SESSION['logZAIn'];
                unset($_SESSION['logZAIn']); // dispaly msg only one time
            };
            
            
            ?>
            <br/>
                <div class="col-4 text-center">
                    <?php
                    
                    
                    $sql = "SELECT * FROM tbl_category";
                    $result = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($result);
                    
                    
                    ?>
                    <h1><?php echo $count; ?></h1>
                    <br/>
                    Categories
                </div>

                <div class="col-4 text-center">
                <?php
                    
                    
                    $sql = "SELECT * FROM tbl_food";
                    $result = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($result);
                    
                    
                    ?>
                    <h1><?php echo $count; ?></h1>
                    <br/>
                    Foods
                </div>

                <div class="col-4 text-center">
                <?php
                    
                    
                    $sql = "SELECT * FROM tbl_order";
                    $result = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($result);
                    
                    
                    ?>
                    <h1><?php echo $count; ?></h1>
                    <br/>
                    Orders
                </div>

                <div class="col-4 text-center">
                    <?php
                    
                    $sql = "SELECT SUM(total) AS Total from tbl_order where status = 'delivered'";

                    $result = mysqli_query($conn, $sql);

                    $row = mysqli_fetch_assoc($result);

                    $total_revenue = $row['Total'];
                    
                    ?>
                    <h1>$<?php echo $total_revenue; ?></h1>
                    <br/>
                    Generated Revenue
                </div>

                

                <div class="clearfix">

                </div>
            </div>
        </div>
        <!--main_content ends here-->



<!--footer section starts here-->
<?php include('./partials/footer.php')?>
<!--footer section ends here-->
    </body>
</html>