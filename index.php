<?php
  include('connection.php');

  $sql1="SELECT * from `product` where optionName='dvd'";
  $res1=mysqli_query($con,$sql1);

  $sql2="SELECT * from `product` where optionName='furniture'";
  $res2=mysqli_query($con,$sql2);

  $sql3="SELECT * from `product` where optionName='book'";
  $res3=mysqli_query($con,$sql3);

  if(isset($_POST['delete-product-btn'])){
    $all_id = $_POST['delete-checkbox'];
    
    foreach($all_id as $id){
        $sql=mysqli_query($con,"DELETE from `product` where id='$id'");
        $con->query($sql);
    }
    header('location:index.php');
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Product List</title>
        <?php include('header.php');?>
    </head>

    <body>
        <form method="post" id="product_list">
            <section>
                <div class="container">

                    <div class="row mt-5 pb-2 border-bottom border-dark">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <h1>Product List</h1>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="float-end">
                                <a href="addproduct.php"><button type="button" class="btn btn-primary mr-2">Add</button></a>
                                <button type="button delete-product-btn" class="btn btn-danger" id="delete-product-btn" name="delete-product-btn" form="product_list">Mass Delete</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">

                            <?php while($row=mysqli_fetch_assoc($res1)): ?>

                            <div class="col-lg-3 col-md-3 mt-3">
                                <div class="border border-dark">

                                    <div class="form-check">
                                        <input class="form-check-input delete-checkbox" name="delete-checkbox[]"  type="checkbox" value="<?php echo $row['id']; ?>" id="flexCheckDefault">
                                    </div>

                                    <div class="align-middle text-center">
                                        <h6><?php echo $row['sku'];?></h6>
                                        <h6><?php echo $row['name'];?></h6>
                                        <h6><?php echo $row['price'];?> $</h6>
                                        <h6>Size: <?php echo $row['size'];?> MB</h6>
                                    </div>

                                </div>
                            </div>

                            <?php endwhile;?>

                            <?php while($row=mysqli_fetch_assoc($res2)): ?>

                            <div class="col-lg-3 col-md-3 mt-3">
                                <div class="border border-dark">

                                    <div class="form-check">
                                        <input class="form-check-input delete-checkbox" name="delete-checkbox[]" type="checkbox" value="<?php echo $row['id'] ?>" id="flexCheckDefault">
                                    </div>

                                    <div class="align-middle text-center">
                                        <h6><?php echo $row['sku'];?></h6>
                                        <h6><?php echo $row['name'];?></h6>
                                        <h6><?php echo $row['price'];?> $</h6>
                                        <h6>Dimension: <?php echo $row['height'];?>x<?php echo $row['width'];?>x<?php echo $row['length'];?></h6>
                                    </div>

                                </div>
                            </div>

                            <?php endwhile;?>

                            <?php while($row=mysqli_fetch_assoc($res3)): ?>

                            <div class="col-lg-3 col-md-3 mt-3">
                                <div class="border border-dark">

                                    <div class="form-check">
                                        <input class="form-check-input delete-checkbox" name="delete-checkbox[]" type="checkbox" value="<?php echo $row['id'] ?>" id="flexCheckDefault">
                                    </div>

                                    <div class="align-middle text-center">
                                        <h6><?php echo $row['sku'];?></h6>
                                        <h6><?php echo $row['name'];?></h6>
                                        <h6><?php echo $row['price'];?> $</h6>
                                        <h6>Weight: <?php echo $row['weight'];?>KG</h6>
                                    </div>

                                </div>
                            </div>

                            <?php endwhile;?>

                    
                    </div>

                </div>
            </section>
        </form>

        <?php include('footer.php'); ?>
    </body>
</html>