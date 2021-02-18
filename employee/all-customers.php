<!doctype html>
<html class="no-js" lang="en">
<?php
  include("../layout/header.php");
  if (isset($_POST['edit'])){
      $_SESSION['nic']=$_REQUEST['edit'];
      header("location: edit-customer.php");
  }
?>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Data Table</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Projects <span class="table-project-n">Data</span> Table</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
											<option value="">Export Basic</option>
											<option value="all">Export All</option>
											<option value="selected">Export Selected</option>
										</select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        
                                            <tr>
                                                <th data-field="nic">NIC</th>
                                                <th data-field="name" data-editable="true">Name</th>
                                                <th data-field="email" data-editable="true">Email</th>
                                                <th data-field="phone" data-editable="true">Phone</th>
                                                <th data-field="tempAddress" data-editable="true">Temporary Address</th>
                                                <th data-field="permanentAddress" data-editable="true">Permanent Address</th>
                                                <th data-field="job" data-editable="true">Job</th>
                                                <th data-field="officialAddress" data-editable="true">Official Address</th>
                                                <th data-field="dob" data-editable="true">Date of Birth</th>
                                                <th data-field="dp" data-editable="true">DP</th>
                                                <th data-field="openedBy" data-editable="true">Opened By</th>
                                                <th data-field="openedBranch" data-editable="true">Branch</th>
                                                <th data-field="joinedDate" data-editable="true">Joined Date</th>
                                                <th data-field="updatedDate" data-editable="true">Updated Date</th>
                                                <th data-field="status">Status</th>
                                                <th data-field="edit"></th>
                                            </tr>
                                       
                                        <?php 
                                            $upload_dir = "../img/profile/";
                                            $all_customers=$loginedUser->showCustomers();
                                            foreach ($all_customers as $data){
                                        ?>
                                            <tr>
                                                <td><?php echo $data['NIC'] ?></td>
                                                <td><?php echo $data['name'] ?></td>
                                                <td><?php echo $data['eMail'] ?></td>
                                                <td><?php echo $data['mobileNo'] ?></td>
                                                <td><?php echo $data['tempAddress'] ?></td>
                                                <td><?php echo $data['permanantAddress'] ?></td>
                                                <td><?php echo $data['job'] ?></td>
                                                <td><?php echo $data['officialAddress'] ?></td>
                                                <td><?php echo $data['DOB'] ?></td>
                                                <td><?php echo "<img src='".$upload_dir.$data['dp']."' width='200px' height='200px'>" ?></td>
                                                <td><?php echo $data['openedBy'] ?></td>
                                                <td><?php echo $data['openedBranch'] ?></td>
                                                <td><?php echo $data['joinedDate'] ?></td>
                                                <td><?php echo $data['updatedDate'] ?></td>
                                                <td ><?php if ($data['leftDate']==null){echo "Active";}
                                                        else {echo "Deactivated";}
                                                    ?>
                                                </td>
                                                <td><form action="" method="POST"><button type="submit" name="edit" value=<?php echo $data['NIC'] ?> class="btn btn-primary waves-effect waves-light">Edit</button></form></td>
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
		============================================ -->
    <script src="js/editable/jquery.mockjax.js"></script>
    <script src="js/editable/mock-active.js"></script>
    <script src="js/editable/select2.js"></script>
    <script src="js/editable/moment.min.js"></script>
    <script src="js/editable/bootstrap-datetimepicker.js"></script>
    <script src="js/editable/bootstrap-editable.js"></script>
    <script src="js/editable/xediable-active.js"></script>
    <!-- Chart JS
		============================================ -->
    <script src="js/chart/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="js/tawk-chat.js"></script>
</body>

</html>