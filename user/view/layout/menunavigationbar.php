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
                        <?php
                        if (isset($_SESSION["user"])) {

                            echo '<div class = "nav-profile-text">';
                            echo '<p class="mb-1 text-black">WELCOME ' . $_SESSION["user"]["email"] . '</p>';
                            echo '</div>';
                            
                            echo '<div class="header__top__right__auth">';
                            echo '<a href = "../view/signin.php"><i class = "fa fa-user-plus"></i>Sign out</a>';
                            echo ' </div>';
                            
                        } else {
                            echo '<div class="header__top__right__auth">';
                            echo ' <a href = "../view/signup.php"><i class = "fa fa-user-plus"></i>Sign up</a>';
                            echo '   </div>';

                            echo ' <div class = "header__top__right__auth">';
                            echo ' <a href="../view/signin.php"><i class="fa fa-user"></i>Sign in</a>';
                            echo ' </div>';
                        }
                        ?>
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
                        if (!empty($_SESSION["cart_item"])) {
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