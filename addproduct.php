<?php 
   include('connection.php');

   $skuError="";

   if(isset($_POST['submit'])){
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];
        $weight = $_POST['weight'];
        $optionName = $_POST['optionName'];

        $sql=mysqli_query($con,"SELECT * from `product` where sku = '$sku'");
        $row=mysqli_fetch_array($sql);
        

        if ($row == 0) { 
            if ($optionName=='dvd'){
                $sql="INSERT INTO `product` (`sku`, `name`, `price`, `size`, `height`, `width`, `length`, `weight`, `optionName`) VALUES ('".$sku."', '".$name."', '".$price."', '".$size."', 0 , 0 , 0 , 0, '".$optionName."');";
 
                $con->query($sql);
                header('location:index.php');
            }

            else if ($optionName=='furniture'){
                $sql="INSERT INTO `product` (`sku`, `name`, `price`, `size`, `height`, `width`, `length`, `weight`, `optionName`) VALUES ('".$sku."', '".$name."', '".$price."', 0, '".$height."', '".$width."', '".$length."', 0, '".$optionName."');";
 
                $con->query($sql);
                header('location:index.php');
            }

            else if ($optionName=='book'){
                $sql="INSERT INTO `product` (`sku`, `name`, `price`, `size`, `height`, `width`, `length`, `weight`, `optionName`) VALUES ('".$sku."', '".$name."', '".$price."', 0, 0, 0, 0, '".$weight."', '".$optionName."');";
 
                $con->query($sql);
                header('location:index.php');
            }
        }

        else{
            $skuError = "*SKU already exists";
        }
   }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Product</title>
        <?php include('header.php');?>
    </head>

    <body>
        
        <section>
            <div class="container">

                <div class="row mt-5 pb-2 border-bottom border-dark">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <h1>Product Add</h1>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="float-end">
                            <button type="button submit" name="submit" class="btn btn-primary mr-2" form="product_form">Save</button>
                            <a href="index.php"><button type="button" class="btn btn-danger">Cancel</button></a>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-6">
                        <form method="post" id="product_form">

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">SKU</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sku" id="sku" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57))' required>
                                    <span class="text-danger"><?php echo $skuError;?></span>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57))' required>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Price ($)</label>
                                <div class="col-sm-10">
                                    <input type="number" step="any" class="form-control" name="price" id="price" required>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Type Switcher</label>
                                <div class="dropdown col-sm-10">
                                    <select class="form-select" name="optionName" aria-label="Default select example" required onchange="dropdownlist(this.value)">
                                        <option value="">Type Switcher</option>
                                        <option value="dvd">DVD</option>
                                        <option value="furniture">Furniture</option>
                                        <option value="book">Book</option>
                                    </select>
                                </div>
                            </div>

                            <div class="dropbox form-group row mb-2" id="dvd">
                                <label class="col-sm-2 col-form-label">Size (MB)</label>
                                <div class="col-sm-10">
                                    <input type="number" step="any" class="form-control" name="size" id="size">
                                </div>
                                <p>*Please provide a Size in MB for a DVD*</p>
                            </div>

                            <div class="dropbox form-group row mb-2" id="furniture">
                                <label class="col-sm-2 col-form-label">Height (CM)</label>
                                <div class="col-sm-10">
                                    <input type="number" step="any" class="form-control" name="height" id="height">
                                </div>

                                <label class="col-sm-2 col-form-label">Width (CM)</label>
                                <div class="col-sm-10">
                                    <input type="number" step="any" class="form-control" name="width" id="width">
                                </div>

                                <label class="col-sm-2 col-form-label">Length (CM)</label>
                                <div class="col-sm-10">
                                    <input type="number" step="any" class="form-control" name="length" id="length">
                                </div>
                                <p>*Please provide a Dimensions in HxWxL format for a Furniture*</p>
                            </div>

                            <div class="dropbox form-group row mb-2" id="book">
                                <label class="col-sm-2 col-form-label">Weight (KG)</label>
                                <div class="col-sm-10">
                                    <input type="number" step="any" class="form-control" name="weight" id="weight">
                                </div>
                                <p>*Please provide a Weight in KG for a Book*</p>
                            </div>

                        </form>
                    </div>
                </div>
                
            </div>
        </section>

        <?php include('footer.php'); ?>
    </body>
</html>