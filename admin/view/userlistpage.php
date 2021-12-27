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
                                        <h4 class="card-title">Quản lý Users</h4>
                                        <p class="card-description"> Danh sách Users </p>
                                        <div class="row">
                                            <a href="../view/usercreatepage.php" class="btn btn-success" >Thêm mới</a>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email Adress</th>
                                                    <th scope="col">Bio</th>
                                                    <th scope="col">Action</th>               
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($i = 0; $i < count($data['user_list']); $i++) {
                                                    if (!empty($data['user_list'][$i]['username'])) {
                                                        echo '<tr>';
                                                        echo '<th scope="row">' . ($i + 1) . '</th>';
                                                        echo '<td>' . $data['user_list'][$i]['username'] . '</td>';
                                                        echo '<td>' . $data['user_list'][$i]['email'] . '</td>';
                                                        echo '<td>' . $data['user_list'][$i]['bio'] . '</td>';
                                                        //getID --> editUser
                                                        echo '<td><a href="../controller/UserController.php?action=getedit&id=' . $data['user_list'][$i]['ID'] . '" class="btn btn-success">Edit</a></td>';
                                                        echo '<td><a href="../controller/UserController.php?action=delete&id=' . $data['user_list'][$i]['ID'] . '" class="btn btn-danger">Delete</a></td>';
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