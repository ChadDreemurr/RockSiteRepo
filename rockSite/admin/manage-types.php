<?php include('partials/menu.php'); ?>
    <div class="main-content">
        <div class="wrapper">

            <div class = "title"><h1>Manage Types</h1></div>
            <br>

            
            <br><br>

            <table class= "tbl-full">
                <tr>
                    <th>Type</th>
                    <th>Edit Type</th>
                    <th>Remove Type</th>
                </tr>

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
                                $type=$rows['type'];
                                ?>
                               
                                <tr>
                                    <td width = "20%"><?php echo $type;?></td>
                                    
                                    <td width = '20%'>
                                        <button onclick="editType(<?php echo $id;?>)" class="btn-secondary">Edit Type</button>
                                    </td>
                                    <td width = '20%'>
                                        <button onclick="removeType(<?php echo $id;?>)" class="btn-third">Remove Type</button>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr>no data found</tr>";
                        }
                    }
                ?>
            </table>
            <script>
                function editType(id=0) {
                    location.href = "update-type.php?id=" + id;
                }
                function removeType(id=0) {
                    if (confirm("Are you sure you want to delete this product?") == true) {
                        location.href = "delete-type.php?id=" + id;
                    }
                }
            </script>
        </div>
    </div>

<?php include('partials/footer.php'); ?>
