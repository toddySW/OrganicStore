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
                                    foreach ($data["current_cart"] as $product) {
                                        echo'<tr>';
                                        echo '<td class = "shoping__cart__item">';
                                        echo '<img src = "'. $product->getImage().'" alt = "">';
                                        echo '<h5>'. $product->getName().'</h5>';
                                        echo '</td>';
                                        echo '<td class = "shoping__cart__price">' . $product->getPrice(). '</td>';
                                        echo '<td class = "shoping__cart__quantity">';
                                        echo '<div class = "quantity">';
                                        echo '<div class = "pro-qty">';
                                        echo '<input type = "text" value = "'. $product->getNumber().'">';
                                        echo '</div>';
                                        echo ' </div>';
                                        echo ' </td>';
                                        echo '<td class = "shoping__cart__total">' .$product->getPrice() * $product->getNumber() . '</td>';
                                        echo '<td class = "shoping__cart__item__close">';
                                        echo '<span class = "icon_close"></span>';
                                        echo '</td>';
                                        echo '</tr>';
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
                            <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                            <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                                Upadate Cart</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Discount Codes</h5>
                                <form action="#">
                                    <input type="text" placeholder="Enter your coupon code">
                                    <button type="submit" class="site-btn">APPLY COUPON</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Subtotal <span>$454.98</span></li>
                                <li>Total <span>$454.98</span></li>
                            </ul>
                            <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
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

    </body>

</html>