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
                                        <h4 class="card-title">Quản lý Users</h4>
                                        <p class="card-description"> Danh sách Users </p>
                                        <div class="row">
                                            <a href="usercreatepage.php" type="button" class="btn btn-primary">
                                                Thêm mới 
                                            </a>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>User Name</th>
                                                    <th>Email Adress</th>
                                                    <th>Password</th>
                                                    <th>Bio<th>
                                                    <th>Gender</th>               
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Jacob</td>
                                                    <td>53275531</td>
                                                    <td>12 May 2017</td>
                                                    <td><label class="badge badge-danger">Pending</label></td>
                                                    <td>Male<td>
                                                <tr>
                                                    <td>Messsy</td>
                                                    <td>53275532</td>
                                                    <td>15 May 2017</td>
                                                    <td><label class="badge badge-warning">In progress</label></td>
                                                    <td>Male<td>
                                                </tr>
                                                <tr>
                                                    <td>John</td>
                                                    <td>53275533</td>
                                                    <td>14 May 2017</td>
                                                    <td><label class="badge badge-info">Fixed</label></td>
                                                    <td>Male<td>
                                                </tr>
                                                <tr>
                                                    <td>Peter</td>
                                                    <td>53275534</td>
                                                    <td>16 May 2017</td>
                                                    <td><label class="badge badge-success">Completed</label></td>
                                                    <td>Male<td>
                                                </tr>
                                                <tr>
                                                    <td>Dave</td>
                                                    <td>53275535</td>
                                                    <td>20 May 2017</td>
                                                    <td><label class="badge badge-warning">In progress</label></td>
                                                    <td>Male<td>
                                                </tr>
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