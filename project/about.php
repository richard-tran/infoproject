<?php
	include_once("config.php");
	$title ="AntiWageTheft.org";
	$menu=2;
	include_once("header.php");
	  session_start();
    if (!isset($_SESSION['userid'])) {
        // if this variable is not set, then kick user back to login screen
        header("Location: " . $baseURL . "login.php");
    }
	//if (isset($_SESSION['userid'])=='2')) {
        // check for usertype: admin
      //  header("Location: " . $baseURL . "admin.html");
  //  }
	
?>

            <div class="row">
                <div class="col-xs-12">
                    <div class="page-header">
                        <h1>Who and What Are We</h1>
                    </div>
                    
                    
                </div>
            </div>
           
            <div class="row">
                <div class="col-sm-9 col-xs-12">
                    <p>
                        AntiWageTheft.org<br>
                         <a href="https://en.wikipedia.org/wiki/Wage_theft" target="_blank">WageTheft</a> 
                    </p>
                    <img src="stopwagetheft.png" />
                </div>
               
            </div>
            <div>
                <p><br>
                    Wage Theft Definition.
                </p>
            </div>
            <div>
                <p>
                    Our goal:
                    Eliminate wage theft through the collection and anylization of real world wage data.
                </p>
            </div>
         
<?php
	include_once("footer.php");
?>


