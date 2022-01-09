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

        <!-- Menu NavigationBBar Begin-->
        <?php
        include '../view/layout/menunavigationbar.php';
        ?>
        <!-- Menu NavigationBBar End-->

        <!--Searching Area Begin-->

        <!--Searching Area End-->


        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="../view/img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Organi Shop</h2>
                            <div class="breadcrumb__option">
                                <a href="./index.php">Home</a>
                                <span>Shop</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Product Section Begin -->
        <section class="product spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="sidebar">
                            <div class="sidebar__item">
                                <h4>Department</h4>
                                <ul>
                                    <li><a href="#">Fresh Meat</a></li>
                                    <li><a href="#">Vegetables</a></li>
                                    <li><a href="#">Fruit & Nut Gifts</a></li>
                                    <li><a href="#">Fresh Berries</a></li>
                                    <li><a href="#">Ocean Foods</a></li>
                                    <li><a href="#">Butter & Eggs</a></li>
                                    <li><a href="#">Fastfood</a></li>
                                    <li><a href="#">Fresh Onion</a></li>
                                    <li><a href="#">Papayaya & Crisps</a></li>
                                    <li><a href="#">Oatmeal</a></li>
                                </ul>
                            </div>
                            <div class="sidebar__item">
                                <h4>Price</h4>
                                <div class="price-range-wrap">
                                    <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                         data-min="10" data-max="540">
                                        <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    </div>
                                    <div class="range-slider">
                                        <div class="price-input">
                                            <input type="text" id="minamount">
                                            <input type="text" id="maxamount">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__item sidebar__item__color--option">
                                <h4>Colors</h4>
                                <div class="sidebar__item__color sidebar__item__color--white">
                                    <label for="white">
                                        White
                                        <input type="radio" id="white">
                                    </label>
                                </div>
                                <div class="sidebar__item__color sidebar__item__color--gray">
                                    <label for="gray">
                                        Gray
                                        <input type="radio" id="gray">
                                    </label>
                                </div>
                                <div class="sidebar__item__color sidebar__item__color--red">
                                    <label for="red">
                                        Red
                                        <input type="radio" id="red">
                                    </label>
                                </div>
                                <div class="sidebar__item__color sidebar__item__color--black">
                                    <label for="black">
                                        Black
                                        <input type="radio" id="black">
                                    </label>
                                </div>
                                <div class="sidebar__item__color sidebar__item__color--blue">
                                    <label for="blue">
                                        Blue
                                        <input type="radio" id="blue">
                                    </label>
                                </div>
                                <div class="sidebar__item__color sidebar__item__color--green">
                                    <label for="green">
                                        Green
                                        <input type="radio" id="green">
                                    </label>
                                </div>
                            </div>
                            <div class="sidebar__item">
                                <h4>Popular Size</h4>
                                <div class="sidebar__item__size">
                                    <label for="large">
                                        Large
                                        <input type="radio" id="large">
                                    </label>
                                </div>
                                <div class="sidebar__item__size">
                                    <label for="medium">
                                        Medium
                                        <input type="radio" id="medium">
                                    </label>
                                </div>
                                <div class="sidebar__item__size">
                                    <label for="small">
                                        Small
                                        <input type="radio" id="small">
                                    </label>
                                </div>
                                <div class="sidebar__item__size">
                                    <label for="tiny">
                                        Tiny
                                        <input type="radio" id="tiny">
                                    </label>
                                </div>
                            </div>
                            <div class="sidebar__item">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7">
                        <div class="filter__item">
                            <div class="row">
                                <div class="col-lg-4 col-md-5">
                                    <div class="filter__sort">
                                        <span>Sort By</span>
                                        <select>
                                            <option value="0">Default</option>
                                            <option value="0">Default</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="filter__found">
                                        <h6><span>16</span> Products found</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-3">
                                    <div class="filter__option">
                                        <span class="icon_grid-2x2"></span>
                                        <span class="icon_ul"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <?php
                            for ($i = 0; $i < count($data["product_list"]); $i++) {
                                echo '<div class = "col-lg-4 col-md-6 col-sm-6">';
                                echo '<form action="../controller/OrderController.php" method="POST">';
                                echo '<div class = "product__item">';
                                echo '<div class = "product__item__pic set-bg" data-setbg = "' . $data["product_list"][$i]["image"] . '">';
                                echo '<ul class = "product__item__pic__hover">';
                                //*********************************************** add item (value)
                                echo '<li><button type= "submit" name="order_action" value="add"><i class = "fa fa-shopping-cart"></i></button></li>';
//                                echo '<li><button type = ""><i class = "fa fa-heart"></i></button></li>';
//                                echo '<li><button type = ""><i class = "fa fa-retweet"></i></button></li>';
                                echo '</ul>';
//                                echo '<button type= "submit" name="order_action" value="add">Add to cart</button>';
                                echo '</div>';
                                echo '<div class = "product__item__text">';
                                echo '<h6><a href = "#">' . $data["product_list"][$i]["name"] . '</a></h6>';
                                echo '<h5>' . $data["product_list"][$i]["price"] . '</h5>';
                                echo '<input type="text" hidden name="product_id" value= "' . $data["product_list"][$i]["id"] . '"</>';
                                echo '<input type="text" hidden name="product_name" value= "' . $data["product_list"][$i]["name"] . '"</>';
                                echo '<input type="text" hidden name="product_image" value= "' . $data["product_list"][$i]["image"] . '"</>';
                                echo '<input type="text" hidden name="product_price" value= "' . $data["product_list"][$i]["price"] . '"</>';
                                echo '</div>';
                                echo '</div>';
                                echo '</form>';
                                echo '</div>';
                            }
                            ?>
                            <div class="product__pagination">
                                <?php
                                $product = new ProductModel("", "", "", "", "", 0);
                                $product_all = $product->getAllProduct();
                                $product_count = count($product_all);
                                $product_button = $product_count/3;
                                echo '<p>Page: </p>';
                                for ($i = 1 ; $i < $product_button; $i++)
                                {
                                    echo '<a href = "../controller/OrderController.php?page='. $i . '">' . $i . '</a>';
                                }     
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- Product Section End -->

        <!-- Footer Section Begin -->
        <?php
        include '../view/layout/footer.php';
        ?>
        <!-- Footer Section End -->

        <!-- Js Plugins -->
        <?php
        include '../view/layout/script.php';
        ?>





<!--        <div class = "col-lg-4 col-md-6 col-sm-6">
            <form action="../controller/OrderController.php" method="POST">
                <div class = "product__item">
                    <div class = "product__item__pic set-bg" data-setbg = "' . $data["product_list"][$i]["image"] . '">
                        <ul class = "product__item__pic__hover">
                            <li><button type= "submit" name="order_action" value="add"><i class = "fa fa-shopping-cart"></i></button></li>
                            <li><button type = ""><i class = "fa fa-heart"></i></button></li>
                            <li><button type = ""><i class = "fa fa-retweet"></i></button></li>
                        </ul>
                        <button type= "submit" name="order_action" value="add">Add to cart</button>
                    </div>
                    <div class = "product__item__text">
                        <h6><a href = "#">' . $data["product_list"][$i]["name"] . '</a></h6>
                        <h5>' . $data["product_list"][$i]["price"] . '</h5>
                        <input type="text" hidden name="product_id" value= "' . $data["product_list"][$i]["id"] . '"</>
                        <input type="text" hidden name="product_name" value= "' . $data["product_list"][$i]["name"] . '"</>
                        <input type="text" hidden name="product_image" value= "' . $data["product_list"][$i]["image"] . '"</>
                        <input type="text" hidden name="product_price" value= "' . $data["product_list"][$i]["price"] . '"</>
                    </div>
                </div>
            </form>
        </div>-->

    </body>

</html>