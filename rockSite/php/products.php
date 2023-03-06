<?php include('partials/menu.php'); ?>

    
    <!--Start of Categories-->
    <section>
    <br><br><br>
        <div class="center">
            <h2>Shop</h2>
        </div>
        </section>
    <!--Start of example Products-->
    <section>
        <div class="side-sort">
            <b nowrap>Filter by Categories<br></b>
 
            <div class="items">
                    <?php   
                    $sql = "SELECT * FROM prod_types";
                    $res = mysqli_query($conn, $sql);
                    if ($res==TRUE)
                    {
                        $count = mysqli_num_rows($res);
                        if ($count>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                $id = $rows['id'];
                                $type = $rows['type'];

                                ?>
                                   
                                        <a class="btn-sort" href="products.php?sort=<?php echo $type;?>"><?php echo $type; ?></a>
                                    
                                    
                                <?php
                                
                            }
                        }
                    }
                       ?>
                       <br>
                 
                        <a class="btn-sort" href="products.php">All</a>
                    
                        <br>
                        <form action="" method="POST">
                            <b style="padding-bottom:5px">Filter by Price Range<br></b>
                            <div class="center">
                                <label for="min-price" style="margin-right:10px;">Min:</label> <label for="max-price">Max:</label><br>
                                <input type="number" id="min-price" name="min-price" style="margin-right:10px;">
                                <input type="number" id="max-price" name="max-price"><br><br>
                                <input type="submit" class="btn-sort" name="range-submit" id="price-filter" value="Filter">
                            </div>
                        </form>
                        <?php
                    if(isset($_POST['range-submit']))
                    {
                        
                        $min = $_POST['min-price'];
                        $max = $_POST['max-price'];
                        
                        if($max==Null)
                        {
                            echo '<script>function jsFunction(){location.href = "products.php?sort-min-price='.$_POST['min-price'].'";}';
                            echo 'jsFunction();</script>';
                        }
                        if($min==Null)
                        {
                            echo '<script>function jsFunction(){location.href = "products.php?sort-max-price='.$_POST['max-price'].'";}';
                            echo 'jsFunction();</script>';
                        }
                        if(isset($_POST['min-price']) && isset($_POST['max-price']))
                        {
                            echo '<script>function jsFunction(){location.href = "products.php?sort-min-price='.$_POST['min-price'].'&sort-max-price='.$_POST['max-price'].'";}';
                            echo 'jsFunction();</script>';
                        }
                    }       
                        ?>
            </div>
        </div>
               
    </section>

    
    <table class="pro-tbl">
    <?php 
        $sql = "SELECT * FROM products WHERE sold = 0";
        $res = mysqli_query($conn, $sql);
        if ($res==TRUE)
        {
            $count = mysqli_num_rows($res);
            if ($count>0)
            {
                $counter = 0;
                while($rows=mysqli_fetch_assoc($res))
                {
                    $id = $rows['ID'];
                    $prod_name=$rows['Name'];
                    $prod_descr=$rows['Description'];
                    $image=$rows['imageFile'];
                    $price=number_format($rows['Price'], 2);
                    if(isset($_GET['sort'])){
                        $sorter = $_GET['sort'];
                        if($prod_descr != $sorter){
                            continue;
                        }
                    }
                    if(isset($_GET['sort-max-price'])){
                        $priceSorterMax = $_GET['sort-max-price'];
                        if($price > $priceSorterMax){
                            continue;
                        }
                    }
                    if(isset($_GET['sort-min-price'])){
                        $priceSorterMin = $_GET['sort-min-price'];
                        if($price < $priceSorterMin){
                            continue;
                        }
                    }
                    $counter++;
                    ?>
                    <?php 
                    if ($counter % 2 != 0)
                    {
                        echo "<tr>";
                    } ?>
                        <td style="padding-right: 15px; padding-bottom:10px;"><img src="<?php echo SITEURL;?>/images/<?php echo $image; ?>" alt="<?php echo $prod_descr;?>" width="300px" class="img-curve"></td>
                        <td style="padding-right: 145px; padding-bottom:10px;"><?php echo $prod_name;?><br> $<?php echo $price;?><br>
                            <button onclick="sendOrder(<?php echo $id;?>)" class="btn-secondary">Order</button><br>
                        </td>
                    <?php
                    if($counter % 2 == 0){
                        echo "</tr>";
                    }
                    ?>
                    <?php
                }
                if($counter == 0){
                    echo '<br><div class = "center">No Products Found</div>';
                }
            } else {
                echo '<br><div class = "center">No Products Found</div>';
            }
            
        }
    ?>
    </table>
    
</section>
        <script>
            function sendOrder(id=0) {
                location.href = "order.php?id=" + id;
            }
        </script>
    <!-- End of Categories -->

    
    </div>

<?php include('partials/footer.php'); ?>
