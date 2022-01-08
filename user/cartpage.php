<!DOCTYPE html>
<html lang="en">
    <!-- Basic -->

    <head>
        <?php
        include '../view/layout/headerpage.php';
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                // code to read selected table row cell data (values).
                $('.quantity-box').click(function () {
                    $('.cart_item').click(function () {
                        $id = $(this).closest('tr').attr('id');
                        $.ajax({
                            url: '../view/getProductAjax.php',
                            data: {
                                id: $id
                            },
                            error: function () {
                                $('#txtHint').html('<p>An error has occurred</p>');
                            },
                            success: function (data) {
                                // $('#txtHint').val(data);
                                $('#hello' + $id).attr('max', data);

                            },
                            type: 'GET'
                        });
                    });

                });


            });



        </script>
    </head>

    <body>
        <!-- Start Main Top -->
        <?php
        include '../view/layout/menutoppage.php';
        ?>
        <!-- End Main Top -->

        <!-- Start Main Top -->
        <header class="main-header">
            <!-- Start Navigation -->
            <?php
            include '../view/layout/menupage.php';
            ?>
            <!-- End Navigation -->
        </header>
        <!-- End Main Top -->

        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search -->

        <!-- Start All Title Box -->
        <div class="all-title-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Cart</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End All Title Box -->

        <!-- Start Cart  -->
        <div class="cart-box-main">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="table-main table-responsive">
                            <table class="table" id="cart_table">
                                <thead>
                                    <tr>

                                        <th>Images</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($data["orders"] as $product) {
                                        echo'<tr class="cart_item" id="' . $product->getID() . '">';
                                        echo'    <td class="thumbnail-img">';
                                        echo'        <a href="#">';
                                        echo'            <img class="img-fluid" src="' . $product->getImage() . '" alt="" />';
                                        echo'        </a>';
                                        echo'    </td>';
                                        echo'    <td class="name-pr">';
                                        echo'        <a href="#">' . $product->getName() . '</a>';
                                        echo'    </td>';
                                        echo'    <td class="price-pr">';
                                        echo'        <p>' . number_format($product->getPrice()) . '</p>';
                                        echo'    </td>';
                                        echo'    <td class="quantity-box"><input type="number" size="4" value="' . $product->getNumber() . '" id="hello' . $product->getID() . '" min="0" step="1" class="c-input-text qty text"></td>';
                                        echo'    <td class="total-pr">';
                                        echo'        <p>' . number_format($product->getNumber() * $product->getPrice()) . '</p>';
                                        echo'    </td>';
                                        echo'    <td class="remove-pr">';
                                        echo'        <a href="../controller/OrderController.php?action=remove&id=' . $product->getID() . '">';
                                        echo'            <i class="fas fa-times"></i>';
                                        echo'        </a>';
                                        echo'    </td>';

                                        echo'</tr>';
                                        $total += $product->getNumber() * $product->getPrice();
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <div class="col-lg-6 col-sm-6">
                        <div class="coupon-box">
                            <div class="input-group input-group-sm">
                                <input class="form-control" id="txtHint" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                                <div class="input-group-append">
                                    <button class="btn btn-theme" type="button">Apply Coupon</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="update-box">

                            <input value="Update Cart" name="order_action" value="update" type="submit"><!-- comment -->

                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <div class="col-lg-8 col-sm-12"></div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="order-box">
                            <h3>Order summary</h3>
                            <div class="d-flex">
                                <h4>Sub Total</h4>
                                <div class="ml-auto font-weight-bold"> <?php echo number_format($total) ?> </div>
                            </div>

                            <div class="d-flex">
                                <h4>Shipping Cost</h4>
                                <div class="ml-auto font-weight-bold"> 0 </div>
                            </div>
                            <hr>
                            <div class="d-flex gr-total">
                                <h5>Grand Total</h5>
                                <div class="ml-auto h5">  <?php echo number_format($total) ?> </div>
                            </div>
                            <hr> </div>
                    </div>
                    <div class="col-12 d-flex shopping-box"><a href="../controller/OrderController.php?action=order" class="ml-auto btn hvr-hover">Order</a> </div>
                </div>
            </div>
        </div>
        <!-- End Cart -->

        <!-- Start Instagram Feed  -->
        <div class="instagram-box">
            <div class="main-instagram owl-carousel owl-theme">
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="../view/images/instagram-img-01.jpg" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="../view/images/instagram-img-02.jpg" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="../view/images/instagram-img-03.jpg" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="../view/images/instagram-img-04.jpg" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="../view/images/instagram-img-05.jpg" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="../view/images/instagram-img-06.jpg" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="../view/images/instagram-img-07.jpg" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="../view/images/instagram-img-08.jpg" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="../view/images/instagram-img-09.jpg" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="../view/images/instagram-img-05.jpg" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Instagram Feed  -->


        <!-- Start Footer  -->
        <?php
        include '../view/layout/footerpage.php';
        include '../view/layout/scriptpage.php';
        ?>

    </body>

</html>