<?php
	include_once("config.php");
	include_once("util.php");
	$title ="AntiWageTheft.org";
	$menu=3;
	    session_start();
    if (!isset($_SESSION['username'])) {
        // if this variable is not set, then kick user back to login screen
        header("Location: " . $baseURL . "login.php");
    }
	
	include_once("header2.php");
	    // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
    
    // prepare sql statement to build current employer options list
    $query = "SELECT employerid, employername FROM Employer ORDER BY employername;";
    
    // execute sql statement
    $result = $db->query($query);
    //list for employer options
	$employerOptions = "";
	
    // check if it worked and add to employer options
    if ($result) {
        $numberofrows = $result->num_rows;
        
        for($i=0; $i < $numberofrows; $i++) {
            $row = $result->fetch_assoc();
			$employerOptions = $employerOptions . "\t\t\t";
			$employerOptions = $employerOptions . "<option value='";
			$employerOptions = $employerOptions . $row['employerid'];
			$employerOptions = $employerOptions . "'>" . $row['employername'] . "</option>";
			$employerOptions = $employerOptions . "\n";
		}
	} else {
		echo "There was a problem retrieving employers. " . $db->error;
		die();
	
	}
	$db->close();
?>
<html>

<head>
    <title>Add a Job</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wage Theft - My Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="../startbootstrap-sb-admin-2-1.0.8/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../startbootstrap-sb-admin-2-1.0.8/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../startbootstrap-sb-admin-2-1.0.8/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../startbootstrap-sb-admin-2-1.0.8/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../startbootstrap-sb-admin-2-1.0.8/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../startbootstrap-sb-admin-2-1.0.8/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- Calendar Jquery Plugin -->
	<link href="../Responsive-Event-Calendar-Date-Picker-jQuery-Plugin-Monthly/css/monthly.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="../Responsive-Event-Calendar-Date-Picker-jQuery-Plugin-Monthly/js/monthly.js"></script>
	
	<!-- Bower Timepicker Plugin -->
	<link type="text/css" href="../bootstrap-timepicker/css/bootstrap-timepicker.min.css" />
	<script type="text/javascript" src="../bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<link type="text/css" href="../bootstrap-timepicker/css/bootstrap-timepicker.css" />
	
	<script type="text/javascript" src="../bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body>
    
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="userpage.php">User Page</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Time</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
						<li class="active">
                            <a href="#"><i class="fa fa-table fa-fw"></i> Enter Work Info<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="active">
                                    <a href="userpage.php"><i class="fa fa-clock-o fa-fw"></i> Enter Hours</a>
                                </li>
                                <li>
                                    <a href="paycheck.php"><i class="fa fa-dollar fa-fw"></i> Enter Paycheck</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
							<a href="usersplash.php"><i class="fa fa-user fa-fw"></i> My Jobs</a>
                        </li>
						<li>
                            <a href="companylookup.html"><i class="fa fa-gear fa-fw"></i>My Employers</a>
                        </li>
						<li>
                            <a href="companyoverview.html"><i class="fa fa-bar-chart fa-fw"></i>Company Lookups</a>
                        </li>
						<li>
                            <a href="caselog.html"><i class="fa fa-sign-out fa-fw"></i>My CaseLogs</a>
                        </li>
              
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
					<h1 class="text-primary">Add A Job</h1>
					</div>
				</div>
			<!-- Span for error messages -->	
				<span style="color:red; font-weight:bold">
					<?php if(isset($_GET['msg']))
						echo $_GET['msg'];
					?>
			</span>
                <!-- /.col-lg-12 -->
            </div>
			<div class="row">
                <div class="col-lg-12">
					<form action="insertjob.php" method="post" enctype="multipart/form-data">
						<!-- employer options from above -->
						<div class="form-group">
							<label for="employer">Employer</label>
							<select name="employerid">
							<?php echo $employerOptions; ?>
							</select>
						</div>
						 <div>
						 <a href="addemployer.php" class="button">Add a new employer</a>
						 </div>
						<div class="form-group">
							<label for="jobTitle">Job Title</label>
							<input type="text" class="form-control" name="jobTitle"/>
						</div>
						<div class="form-group">
							<label for="houlyrate">Hourly Pay Rate</label>
							<input type="int" class="form-control" name="hourlyrate"/>
						</div>
						
						
						<button type="submit" class="btn btn-default">Add Job</button>
					</form>
				</div>
			</div>


</div> <!-- Closing container div -->

<!-- Code for editing form -->




</body>





</html>