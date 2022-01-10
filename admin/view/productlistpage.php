<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include 'layout/head.php';
        ?>
    </head>
    <body>
        <div class="container-scroller">
            <!-- partial:../../partials/_navbar.html -->
            <?php
            include 'layout/menutop.php';
            ?>

            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:../../partials/_sidebar.html -->
                <?php
                include 'layout/menuleft.php';
                ?>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">

                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Quản lý sản phẩm</h4>
                                        <p class="card-description"> Danh sách sản phẩm </p>
                                        <div class="row">
                                            <a href="../view/productcreatepage.php" class="btn btn-success" >Thêm mới</a>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Quantity</th>   
                                                    <th scope="col">Action</th>  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $page = array(1);
                                                for ($i = 1; $i < count($data["product"]); $i++) {
                                                    if ($i % 6 == 0) {
                                                        $page[] = end($page) + 1;
                                                    }
                                                }
                                                for ($i = 0; $i < count($data["product_list"]); $i++) {
                                                    if (!empty($data['product_list'][$i]['name'])) {
                                                        echo '<tr>';
                                                        echo '<th scope="row">' . ($i + 1) . '</th>';
                                                        echo '<td><img style="width:100px; height:100px"  src="../../user' . substr($data['product_list'][$i]['image'], 2) . '"></td>';
                                                        echo '<td>' . $data['product_list'][$i]['name'] . '</td>';
                                                        echo '<td>$' .$data['product_list'][$i]['price'] . '</td>';
                                                        echo '<td>' . $data['product_list'][$i]['quantity'] . '</td>';
                                                        //getID --> editUser
                                                        echo '<td><a href="../controller/ProductController.php?action=editproduct&id=' . $data['product_list'][$i]['id'] . '" class="btn btn-success">Edit</a></td>';
                                                        echo '<td><a href="../controller/ProductController.php?action=delete&id=' . $data['product_list'][$i]['id'] . '" class="btn btn-danger">Delete</a></td>';
                                                        echo '</tr>';
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="pagination pg-primary justify-content-center">
                            <?php
                            for ($i = 1; $i <= count($page); $i++) {
                                echo '<li class="page-item" id="page-' . $i . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                            }
                            ?>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $('#page-<?= $_GET["page"] ?>').attr("class", "page-item active");
                            </script>
                        </ul>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                    <?php
                    include 'layout/footer.php';
                    ?>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <!-- plugins:js -->
        <?php
        include 'layout/script.php';
        ?>
    </body>
</html>