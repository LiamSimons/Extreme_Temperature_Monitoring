<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Extreme Temperature monitoring | Database</title>

    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,700|" rel="stylesheet" type="text/css">
    <link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Loading main css file -->
    <link rel="stylesheet" href="style.css">

    <!--[if lt IE 9]>
    <script src="js/ie-support/html5.js"></script>
    <script src="js/ie-support/respond.js"></script>
    <![endif]-->

</head>


<body>

<div id="site-content">
    <div class="container">

        <header class="site-header">
            <a href="index.html" id="branding" class="pull-left">
                <img src="images/logo.jpg" height="80" width="80" alt="" class="logo">
                <div class="logo-text">
                    <h1 class="site-title">Extreme Temperature monitoring</h1>
                    <small class="site-description">EE5 project group4</small>
                </div>
            </a>

            <!-- Default snippet for navigation -->
            <div class="main-navigation">
                <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                <ul class="menu">
                    <li class="menu-item"><a href="index.html">Home</a></li>
                    <li class="menu-item"><a href="index.html#heatmap">Heat Map</a></li>
                    <li class="menu-item current-menu-item"><a href="database.html">Database</a></li>
                    <li class="menu-item"><a href="about.html">About Us</a></li>
                    <li class="menu-item"><a href="#contact">Contact</a></li>
                </ul> <!-- .menu -->
            </div> <!-- .main-navigation -->

            <div class="mobile-navigation"></div>
        </header> <!-- .site-header -->


        <title> Temperature data statistics | History</title>
        <?php
        $username = 'a20fire4';
        $password = 'kjwrp43x1s';

        try {
            //create connection
            $myDB = new PDO('mysql:host=mysql.studev.groept.be;dbname=a20fire4', $username, $password);
            echo 'Connected to Database<br/>';

            /*
            $sql = "SELECT * FROM Sensor WHERE sensor_id = '124'";
            foreach($myDB->query($sql) as $row) {
                print_r($row);
            }
            */
            $stmt = $myDB->prepare("SELECT * FROM Sensor WHERE sensor_id = ?");
            $stmt->bindValue(1,'124',PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchObject();
            echo $result->sensor_type;

            $dbh = null;
        } catch (PDOException $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        ?>



        <footer class="site-footer">
            <div class="row" >

                <div class="col-md-4">
                    <div class="widget">
                        <h3 class="widget-title">Quick Links</h3>
                        <ul class="no-bullet">
                            <li style="text-indent: 30px"><a href="index.html#heatmap">Heat Map</a></li>
                            <li style="text-indent: 30px"><a href="database.html">Database</a></li>
                            <li style="text-indent: 30px"><a href="https://openproject.groept.be/projects/a20firefighter4/wiki/wiki">Project Wiki </a></li>
                            <li style="text-indent: 30px"><a href="about.html">About us</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="widget">
                        <a name="contact"><h3 class="widget-title">Contact</h3></a>
                        <address>
                            <strong>EE5 project Group4</strong>
                            <p>Campus GroupT, KU Leuven</p>
                            <a href="mailto:songyao.jin@student.kuleuven.be">songyao.jin@student.kuleuven.be</a>
                            <p>+32 488718390</p>
                        </address>
                    </div>
                </div>
            </div>

            <div class="colophon">
                <p>Copyright &copy;2021 EE5 Group4. KUL. All right reserved</p>
            </div>
        </footer>
    </div> <!-- .container -->
</div> <!-- #site-content -->






<script src="js/jquery-1.11.1.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>

</body>

</html>