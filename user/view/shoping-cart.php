<!DOCTYPE html>
<html lang="zxx">

    <head>
        <?php
        include '../view/layout/head.php';
        ?>
    </head>

    <body>
        <!-- Menutop Begin--->
        <?php
        include '../view/layout/menutop.php';
        ?>
        <!-- Menutop End--->

        <!-- Menu Navigation Bar Begin-->
        <?php
        include '../view/layout/menunavigationbar.php';
        ?>
        <!-- Menu Navigation Bar End-->

        <!--Searching Area Begin-->
        <?php
//        include './layout/searching.php';
//        
        ?>
        <!--Searching Area End-->


        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="../view/img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Shopping Cart</h2>
                            <div class="breadcrumb__option">
                                <a href="./index.html">Home</a>
                                <span>Shopping Cart</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Shoping Cart Section Begin -->
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($data["current_cart"] as $product) {
                                        echo' <tr class="cart_item" id="' . $product->getId() . '">';
                                        echo '<td class = "shoping__cart__item">';
                                        echo '<img src = "' . $product->getImage() . '" alt = "">';
                                        echo '<h5>' . $product->getName() . '</h5>';
                                        echo '</td>';

                                        echo '<td class = "shoping__cart__price">' . number_format($product->getPrice()) . '</td>';

                                 
                                        echo '<td class = "shoping__cart__quantity"><input type="number" value="' . $product->getNumber() . '" id="hello"' . $product->getId() . ' min="0">';
                                        echo '</td>';

                                        echo '<td class = "shoping__cart__total">' . number_format($product->getPrice() * $product->getNumber()) . '</td>';

                                        echo '<td class = "shoping__cart__item__close">';
                                        echo '<a href="../controller/OrderController.php?action=remove&id=' . $product->getId() . '"><span class = "icon_close"></span></a>';
                                        echo '</td>';

                                        echo '</tr>';
                                        $total += $product->getNumber() * $product->getPrice();
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <button><a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a></button>
                            <form action="../controller/OrderController.php" method="POST">
                                <input name="order_action" value="update_cart" type="submit"/>
                            </form>
                            <button><a href="../controller/OrderController.php?action=checkout" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                                    Update Cart</a></button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Discount Codes</h5>
                                <form action="#">
                                    <input id="txtHint" type="text" placeholder="Enter your coupon code">
                                    <button type="submit" class="site-btn">APPLY COUPON</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Subtotal <span><?php echo number_format($total) ?> </span></li>
                                <li>Total <span><?php echo number_format($total) ?></span></li>
                            </ul>
                            <a href="../controller/OrderController.php?action=order" class="primary-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shoping Cart Section End -->

        <!-- Footer Section Begin -->
        <?php
        include '../view/layout/footer.php';
        ?>
        <!-- Footer Section End -->

        <!-- Js Plugins -->
        <?php
        include '../view/layout/script.php';
        ?>

        <!--                AJAX JavaScript: Get limit quantity of products ................................... 
                <script>
                    function getProductQuantityAjax() {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("txtHint").value = this.responseText;
                            }
                        }
                        xmlhttp.open("GET", "../view/getQuantityProductAjax.php", true);
                        xmlhttp.send();
                    }
                </script>-->
        <!--       End:  AJAX JavaScript: Get limit quantity of products ...............................-->


        <!--        AJAX JQuery: Get limit quantity of products ......................................  --> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.shoping__cart__quantity').click(function () {
                    $('.cart_item').click(function () {
                        $id = $(this).closest('tr').attr('id');
                        $.ajax({
                            url: '../view/getQuantityProductAjax.php',
                            data: {
                                id: $id
                            },
                            error: function () {
                                $('#txtHint').html('<p>An error has occurred</p>');
                            },
                            success: function (data) {
//                            $('#txtHint').val(data);
                                $('#hello').attr("max", data);
                            },
                            type: 'GET'
                        });
                    });
                });
            });
        </script>
        <!--       END AJAX JQuery: Get limit quantity of products .....................................--> 

    </body>

</html>