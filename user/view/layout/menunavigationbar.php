<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> ndn@gmail.com</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>

                        <div class="header__top__right__auth">
                            <a href="../view/signup.php"><i class="fa fa-user-plus"></i>Sign up</a>
                        </div>

                        <div class="header__top__right__auth">
                            <a href="../view/signin.php"><i class="fa fa-user"></i>Sign in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="../view/index.php"><img src="../view/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="../view/index.php">Home</a></li>
                        <li><a href="../controller/OrderController.php">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="../view/shop-details.php">Shop Details</a></li>
                                <li><a href="../view/shoping-cart.php">Shoping Cart</a></li>
                                <li><a href="../view/checkout.php">Check Out</a></li>
                                <li><a href="../view/blog-details.php">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="../view/blog.php">Blog</a></li>
                        <li><a href="../view/contact.php">Contact</a></li>
                        <li><a href="../controller/OrderController.php?action=clear">Empty Cart</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <?php
                        if(!empty($_SESSION["cart_item"])){
                             echo '<li><a href = "../controller/OrderController.php?action=checkout"><i class = "fa fa-shopping-bag"></i> <span>' . count($_SESSION["cart_item"]) . '</span></a></li>';
                        } else {
                             echo '<li><a href = "../controller/OrderController.php"><i class = "fa fa-shopping-bag"></i> <span>0</span></a></li>';
                        }
                        ?>
                    </ul>

                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section Begin -->