<?php require_once('header.php');
    require_once('config.php');
 ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">All Orders</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Customers Orders
                            </div>
                            <div class="card-body">
                                <?php
                                $src="SELECT o.*, b.*, u.*, c.cat_name FROM Orders o INNER JOIN book b ON o.item_id=b.b_id INNER JOIN category c ON b.cat_id=c.cat_id INNER JOIN user u ON o.cust_id=u.uid ORDER BY o.date DESC";
                                $rs=mysqli_query($con, $src)or die(mysqli_error($con));
                                if(mysqli_num_rows($rs)>0){
                                    ?>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Book Image</th>
                                                <th>Order By</th>
                                                <th>Mobile</th>
                                                <th>Name of the Book</th>
                                                <th>Date of Order</th>
                                                <th>Price</th>
                                                <th>Payment Method</th>
                                                <th>Payment ID</th>
                                                <th>Name of Category</th>
                                                <th>Delivery At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while($rec=mysqli_fetch_assoc($rs)){
                                                ?>
                                                <tr>
                                                    <td><img src="<?php echo "../".$rec['b_img'] ?>" width="75" height="75"></td>
                                                    <td><?php echo $rec['f_name']." ".$rec['l_name'] ?></td>
                                                    <td><?php echo $rec['phone'] ?></td>
                                                    <td><?php echo $rec['b_title'] ?></td>
                                                    <td><?php echo $rec['date'] ?></td>
                                                    <td><?php echo $rec['price'] ?></td>
                                                    <td><?php echo ucfirst($rec['payment_mode']) ?></td>
                                                    <td><?php echo $rec['payment_id'] ?></td>
                                                    <td><?php echo $rec['cat_name'] ?></td>
                                                    <td><?php echo $rec['address'] ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table> 
                                    <?php
                                }else{
                                    echo "Sorry No Book details found";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </main>
                <?php require('footer.php') ?>