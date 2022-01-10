<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include '../view//layout/head.php';
        ?>
    </head>
    <body>
        <div class="container-scroller">
            <!-- partial:../../partials/_navbar.html -->
            <?php
            include '../view/layout/menutop.php';
            ?>

            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:../../partials/_sidebar.html -->
                <?php
                include '../view/layout/menuleft.php';
                ?>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">

                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Thông tin người dùng</h4>

                                        <!--Chuyển dữ liệu lên từ người dùng qua form (thông qua attribute action = "path làm việc cùng" và method = "GET OR POST")
                                        key: attribute name = "txt_username" 
                                        value: giá trị người dùng nhập vào-->
                                        <form  class="forms-sample" action="../controller/ProductController.php" method="GET" enctype="multipart/form-data">
                                             <div class="form-group">
                                                <label for="exampleInputFile">ID</label>
                                                <input type="text"  readonly value="<?php echo $data["product_info"]["id"];?>"  class="form-control-file" id="txt_productId" name="txt_productId" aria-describedby="fileHelp">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputFile">Image</label>
                                                <input type="file" class="form-control-file" id="file_image" name="file_image" aria-describedby="fileHelp" >
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputUserName1">Name</label>
                                                <input type="text" value="<?php echo $data["product_info"]["name"];?>" class="form-control p-input" id="txt_productname" name="txt_productname" placeholder="Product Name">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Price</label>
                                                <input type="text" value="<?php echo $data["product_info"]["price"];?>" class="form-control p-input" id="txt_price" name="txt_price" placeholder="Product Price">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Quantity</label>
                                                <input type="text" value="<?php echo $data["product_info"]["quantity"];?>"class="form-control p-input" id="txt_password" name="txt_quantity" placeholder="Product quantity">
                                            </div>

                                            <div class="col-12">
                                                <input type="submit" name="product_action" class="btn btn-primary" value="edit">
                                                <input type="reset" name="btn_cancel" class="btn btn-danger" value="cancel">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                    <?php
                    include '../view/layout/footer.php';
                    ?>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-
            body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <!-- plugins:js -->
        <?php
        include '../view/layout/script.php';
        ?>
    </body>
</html>