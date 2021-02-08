<!doctype html>
<html class="no-js" lang="en">
<?php
        include("../layout/header.php");
        use Classess\Auth\Customer;
        $data=$loginedUser->showCustomer($_SESSION['nic']);
        if (isset($_POST['edit'])){
            $currentDate=date('Y-m-d h:i:s a', time());
            $customer=new Customer($_REQUEST['email'],$_REQUEST['NIC'],$_REQUEST['firstName'],$_REQUEST['mobileNo'],$_REQUEST['openedBranch'],$_REQUEST['dob'],$_REQUEST['tempAddress'],$_REQUEST['permanentAddress'],$_REQUEST['job'],$_REQUEST['officialAddress'],$_REQUEST['openedBy'],$_REQUEST['dp'],$_REQUEST['joinedDate'],null);
            $result=$loginedUser->editCustomer($customer,$currentDate);
            if($result){
                echo "Edited";
                header("location: select-customer.php");
            }
            else{
                echo "Failed";
            }
        }
?>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Edit Customer</span>
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
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Edit Basic Information</a></li>
                                <li><a href="#reviews"> Edit Account Information</a></li>
                                <li><a href="#INFORMATION">Edit Social Information</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    <form action="edit-customer.php" method="POST" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>NIC</label>
                                                                    <input name="NIC" type="text" class="form-control" value=<?php echo $data['NIC'] ?> required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input name="firstName" type="text" class="form-control" value=<?php echo $data['name'] ?> required> 
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Mail</label>
                                                                    <input name="email" type="text" class="form-control" value=<?php echo $data['eMail'] ?> required>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label>Mobile No</label>
                                                                    <input name="mobileNo" type="number" class="form-control" value=<?php echo $data['mobileNo'] ?> required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Temporary Address</label>
                                                                    <input name="tempAddress" type="text" class="form-control" value=<?php echo $data['tempAddress'] ?> required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Permanent Address</label>
                                                                    <input name="permanentAddress" type="text" class="form-control" value=<?php echo $data['permanantAddress'] ?> required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>JOB</label>
                                                                    <input name="job"  type="text" class="form-control" value=<?php echo $data['job'] ?> required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Official Address</label>
                                                                    <input name="officialAddress" type="text" class="form-control" value=<?php echo $data['officialAddress'] ?> required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Date of Birth</label>
                                                                    <input name="dob" type="date" class="form-control" value=<?php echo $data['DOB'] ?> required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>DP</label>
                                                                    <input name="dp" class="hd-pro-img" type="file" value=<?php echo $data['dp'] ?>>
                                                                </div>
                                                                <!-- <div class="form-group alert-up-pd">
                                                                    <div class="dz-message needsclick download-custom">
                                                                        <i class="fa fa-download edudropnone" aria-hidden="true"></i>
                                                                        <h2 class="edudropnone">Drop image here or click to upload.</h2>
                                                                        <p class="edudropnone"><span class="note needsclick">(Select your profile picture)</span>
                                                                        </p>
                                                                        <input name="dp" class="hd-pro-img" type="file" />
                                                                    </div>
                                                                </div> -->

                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Opened By</label>
                                                                    <input name="openedBy" type="text" class="form-control" value=<?php echo $data['openedBy'] ?> required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Opened Branch</label>
                                                                    <input name="openedBranch" type="text" class="form-control" value=<?php echo $data['openedBranch'] ?> required> 
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Joined Date</label>
                                                                    <input name="joinedDate" type="text" class="form-control" value=<?php echo $data['joinedDate'] ?> required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Updated Date</label>
                                                                    <input name="updatedDate" type="text" class="form-control" value=<?php echo $data['updatedDate'] ?> required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="gender" class="form-control">
																		<option value="none" selected="" disabled="">Select Gender</option>
																		<option value="0">Male</option>
																		<option value="1">Female</option>
																	</select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="edit" class="btn btn-primary waves-effect waves-light">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="devit-card-custom">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Email" value="Admin@gmail.com">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" placeholder="Phone" value="01962067309">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" placeholder="Password" value="#123#123">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" placeholder="Confirm Password" value="#123#123">
                                                            </div>
                                                            <a href="#!" class="btn btn-primary waves-effect waves-light">Submit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="devit-card-custom">
															<div class="form-group">
																<input type="url" class="form-control" placeholder="Facebook URL" value="http://www.facebook.com">
															</div>
															<div class="form-group">
																<input type="url" class="form-control" placeholder="Twitter URL" value="http://www.twitter.com">
															</div>
															<div class="form-group">
																<input type="url" class="form-control" placeholder="Google Plus" value="http://www.google-plus.com">
															</div>
															<div class="form-group">
																<input type="url" class="form-control" placeholder="Linkedin URL" value="http://www.Linkedin.com">
															</div>
															<button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
														</div>
													</div>
												</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- dropzone JS
		============================================ -->
    <script src="js/dropzone/dropzone.js"></script>
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