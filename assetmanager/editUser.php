<?php
/**
 * Created by PhpStorm.
 * User: Surangi
 * Date: 6/19/2016
 * Time: 2:13 AM
 */
require_once("conection.php");

$user_details = $_SESSION['user_details'];
$first_name = $user_details['first_name'];
$last_name = $user_details['last_name'];

if(isset($_GET['user_id']))
{
    $user_id=$_GET['user_id'];
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $email=$_POST['email'];
    
    $Division=$_POST['Division'];
    $Contact=$_POST['Contact'];
//echo "update itemcategory set itemname='$name', itemdesc='$age' where itemid='$id'";
    $query3=mysqli_query($conn,"update user set user_email='$email',  division='$Division', Contact_Number='$Contact' where user_ID='$user_id'");
    if(!$query3){
        echo "error";
    }
    else{
        header('location:userDetails.php');

    }
}

$query1=mysqli_query($conn,"select * from user where user_id='$user_id'");
$query2=mysqli_fetch_assoc($query1);

/*
$itemid=$_GET['itemid'];
$itemname = $_POST['itemcategory_name'];
$Description = $_POST['itemcategory_Description'];
$query = "Update itemcategory set itemname='$itemname' and itemdesc='$itemdesc' where itemid='$itemid'";
$result=mysqli_query($conn,$query);
*/
if(!$query2){
    echo "Failed to insert";
}
else{
    echo "pass";

}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AMS</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">

    <link href="js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery.min.js"></script>

    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body class="nav-md">

<div class="container body">


<div class="main_container">

<div class="col-md-3 left_col">
    <div class="left_col scroll-view">


        <div class="clearfix"></div>

        <!-- menu prile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $first_name;?></h2>
            </div>
        </div>
        <!-- /menu prile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <!--   <h3>General</h3> -->
                <ul class="nav side-menu">
		<li><a href="createDivision.php"><i class="fa fa-building"></i> Create Division </span></a></li>
                <li><a href="divisionDetails.php"><i class="fa fa-building"></i> View Divisions </span></a></li>
                <li><a href="createRoom.php"><i class="fa fa-building"></i> Create Room </span></a></li>
                <li><a href="roomdetails.php"><i class="fa fa-building"></i> View Rooms </span></a></li>		
                <li><a href="createuser.php"><i class="fa fa-user"></i> Create User </span></a></li>
                <li><a href="userDetails.php"><i class="fa fa-user"></i> View Users </span></a></li>
               </ul>
            </div>

        </div>
        <!-- /sidebar menu -->


    </div>
</div>

<!-- top navigation -->
<div class="top_nav">

    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <?php echo $first_name;?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;">  Profile</a>
                        </li>
                        <!--  <li>
                            <a href="javascript:;">Help</a>
                          </li> -->
                        <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                    </ul>
                </li>


                <!--<li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>chathura</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        add a asset to the system
                                    </span>
                            </a>
                        </li>
                        <li>
                            <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>chathura</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                       add a asset to the system
                                    </span>
                            </a>
                        </li>


                        <li>
                            <div class="text-center">
                                <a>
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>-->

            </ul>
        </nav>
    </div>

</div>
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <!--
              <div class="title_left">
               <h3>
                      Users
                      <small>
                          Some examples to get you started
                      </small>
                  </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
              -->

        </div>

        <form name="editUser" method="POST" action="">
            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Edit user details</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                </thead>
                                <tbody>
                                <tr>
                                    <td align="style="justify"><strong >&nbsp;&nbsp;Email Address </strong></td>
                                    <td><input type="text" name="email" id="email" class="form-control" value="<?php echo $query2['user_email'];?>" required/></td>
                                </tr>
                                <!--<tr>
                                    <td align="style="justify"><strong >&nbsp;&nbsp;Password </strong></td>
                                    <td><input type="text" name="pass" id="pass" class="form-control" value="<?php echo $query2['user_password'];?>"/></td>
                                </tr>-->
                                <tr>
                                    <td align="style="justify"><strong >&nbsp;&nbsp;Division </strong></td>
                                    <td><?php
                                            $sql = "SELECT Division_Code,Division_Name FROM division ";
                                            $query1=  mysqli_query($conn,$sql);
                                            //$query2=mysqli_fetch_assoc($query1);
                                            ?>
                                            <select id="Division" name="Division" class="form-control">
                                                <?php
                                                foreach($query1 as $i) {
                                                    echo "<option value=" . $i['Division_Code'] . ">" . $i['Division_Name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="style="justify"><strong >&nbsp;&nbsp;Contact Number </strong></td>
                                    <td><input type="text" name="Contact" id="Contact" class="form-control" value="<?php echo $query2['Contact_Number'];?>" required/></td>
                                </tr>
                                </tbody>
                            </table>

                        </div> <br> &nbsp;&nbsp;<input type="submit" value="submit">
                    </div>
                </div>

            </div>
        </form>

    </div>
</div>  </div>
<!-- /page content -->

<!-- footer content -->
<footer>
    <div class="pull-right">
        UCSC Asset Management System
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>






<script src="js/bootstrap.min.js"></script>

<!-- bootstrap progress js -->
<script src="js/progressbar/bootstrap-progressbar.min.js"></script>
<!-- icheck -->
<script src="js/icheck/icheck.min.js"></script>

<script src="js/custom.js"></script>


<!-- Datatables -->
<!-- <script src="js/datatables/js/jquery.dataTables.js"></script>
<script src="js/datatables/tools/js/dataTables.tableTools.js"></script> -->

<!-- Datatables-->
<script src="js/datatables/jquery.dataTables.min.js"></script>
<script src="js/datatables/dataTables.bootstrap.js"></script>
<script src="js/datatables/dataTables.buttons.min.js"></script>
<script src="js/datatables/buttons.bootstrap.min.js"></script>
<script src="js/datatables/jszip.min.js"></script>
<script src="js/datatables/pdfmake.min.js"></script>
<script src="js/datatables/vfs_fonts.js"></script>
<script src="js/datatables/buttons.html5.min.js"></script>
<script src="js/datatables/buttons.print.min.js"></script>
<script src="js/datatables/dataTables.fixedHeader.min.js"></script>
<script src="js/datatables/dataTables.keyTable.min.js"></script>
<script src="js/datatables/dataTables.responsive.min.js"></script>
<script src="js/datatables/responsive.bootstrap.min.js"></script>
<script src="js/datatables/dataTables.scroller.min.js"></script>


<!-- pace -->
<script src="js/pace/pace.min.js"></script>
<script>
    var handleDataTableButtons = function() {
            "use strict";
            0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                    extend: "copy",
                    className: "btn-sm"
                }, {
                    extend: "csv",
                    className: "btn-sm"
                }, {
                    extend: "excel",
                    className: "btn-sm"
                }, {
                    extend: "pdf",
                    className: "btn-sm"
                }, {
                    extend: "print",
                    className: "btn-sm"
                }],
                responsive: !0
            })
        },
        TableManageButtons = function() {
            "use strict";
            return {
                init: function() {
                    handleDataTableButtons()
                }
            }
        }();
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
            keys: true
        });
        $('#datatable-responsive').DataTable();
        $('#datatable-scroller').DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });
        var table = $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });
    });
    TableManageButtons.init();
</script>
</body>

</html>
<?php mysqli_close($conn); ?>