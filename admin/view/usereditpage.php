<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include './layout/head.php';
        ?>
    </head>
    <body>
        <div class="container-scroller">
            <!-- partial:../../partials/_navbar.html -->
            <?php
            include './layout/menutop.php';
            ?>

            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:../../partials/_sidebar.html -->
                <?php
                include './layout/menuleft.php';
                ?>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">

                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Cập nhật thông tin người dùng</h4>
                                        
                                        <!--Chuyển dữ liệu lên từ người dùng qua form (thông qua attribute action = "path làm việc cùng" và method = "GET OR POST")
                                        key: attribute name = "txt_username" 
                                        value: giá trị người dùng nhập vào-->
                                        <form  class="forms-sample" action="../controller/UserController.php" method="POST">
                                            <div class="form-group">
                                                <label for="exampleInputUserName1">User name</label>
                                                <input type="text" class="form-control p-input" id="txt_username" name="txt_username" placeholder="UserName">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control p-input" id="txt_email" name="txt_email" aria-describedby="emailHelp" placeholder="Enter email">
                                                <small id="emailHelp" class="form-text text-muted text-success"><span class="fa fa-info mt-1"></span></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control p-input" id="txt_password" name="txt_password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleTextarea">Bio</label>
                                                <textarea class="form-control p-input" id="txt_bio" name="txt_bio" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Avatar</label>
                                                <input type="file" class="form-control-file" id="file_avatar" name="file_avatar" aria-describedby="fileHelp">
                                                <small id="fileHelp" class="form-text text-muted"></small>
                                            </div>
<!--                                            <fieldset class="form-group">
                                                <legend class="mb-4 mt-5">Gender</legend>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" id="optionsRadios1" name="rdo_male" value="male" checked>
                                                        Male
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" id="optionsRadios2" name="rdo_female" value="female">
                                                        Female
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" id="optionsRadios3" name="rdo_others" value="Others">
                                                        others
                                                    </label>
                                                </div>
                                            </fieldset>-->
                                            <div class="col-12">
                                                <input type="submit" name="user_action" class="btn btn-primary" value="edit">
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
                    include './layout/footer.php';
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
        include './layout/script.php';
        ?>
    </body>
</html>