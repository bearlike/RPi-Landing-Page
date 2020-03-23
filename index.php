    <!--
        task: A Landing page with redirects and system information for Raspberry Pi
        author: Krishnakanth Alagiri (KK)
        gh-link: https://github.com/K-Kraken/
        web: https://thekrishna.in/
    !-->
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="icon" href="assets/img/logorpi.ico">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/lato-font.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/line-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <!-- set hostname as page title !-->
        <?php
        $hostname_ = exec("hostname");;
        ?>
        <title>::<?php echo "$hostname_";?>::</title>
    </head>

    <body>
        <!-- php grab local IP !-->
        <?php
        $localIP = $_SERVER['SERVER_ADDR'];
        ?>
        <nav class="navbar navbar-light navbar-expand bg-light navigation-clean">
            <div class="container"><a class="navbar-brand" href="#">Welcome to <?php echo "$hostname_";?><br></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"></button>
                <div class="collapse navbar-collapse" id="navcol-1"></div>
            </div>
        </nav>
        <section class="features-icons bg-light text-center" style="height: 304px;padding: 40px;padding-right: 60px;padding-left: 60px;padding-top: 10px;padding-bottom: 40px;">
            <div class="container">
                <div class="row">
                    <!-- Shortcuts are here -->
                    <div class="col-lg-4">
                        <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3"><a href="/html">
                            <div class="d-flex features-icons-icon" href="#"><i class="la la-file-code-o m-auto text-primary"></i></div>
                            </a><a href="/html">
                                <h3><strong>Local Sites</strong><br/></h3>
                            </a>
                            <p class="lead mb-0">Access the sites that are running on the host </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3"><a href="/phpmyadmin">
                        <div class="d-flex features-icons-icon"><i class="fas fa-database m-auto text-primary"></i></div>
                        </a><a href="/phpmyadmin">
                            <h3><strong>PHPMyAdmin</strong><br /></h3>
                        </a>
                        <p class="lead mb-0">Administration tool for MySQL and MariaDB.<br></p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3"><a href="<?php echo "http://$localIP:3000";?>">
                        <div class="d-flex features-icons-icon"><i class="fas fa-drafting-compass m-auto text-primary"></i></div>
                        </a><a href="<?php echo "http://$localIP:3000";?>">
                            <h3>Grafana</h3>
                        </a>
                        <p class="lead mb-0">Analytics and interactive visualization software for supported data sources.<br></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="showcase">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image:url(&quot;assets/img/bg-showcase-1.jpg&quot;);"><span></span><img src="assets/img/bg-showcase-rpi.jpg" style="width: 728px;"></div>
                    <div class="col-lg-6 my-auto order-lg-1 showcase-text" style="height: 485px;">
                        <h2 style="margin-top: -70px;margin-bottom: 10px;">System Information</h2>
                        <!-- php functions !-->
                        <?php
                            function UPTIME(){
                                $upSeconds = exec("/usr/bin/cut -d. -f1 /proc/uptime");
                                $secs=$upSeconds%60;
                                $mins=$upSeconds/60%60;
                                $hours=$upSeconds/3600%24;
                                $days=$upSeconds/86400;
                                if ($days > 1){
                                    echo "$days <strong>day</strong>, $hours <strong>hrs.</strong> $mins <strong>min.</strong> $secs <strong>sec.</strong>";
                                }
                                else {
                                    echo "$hours <strong>hrs.</strong> $mins <strong>min.</strong> $secs <strong>sec.</strong>";
                                }
                            }
                            function MEMORY($opt){
                                $freemem = exec("cat /proc/meminfo | grep MemFree | awk {'print $2/1024'}");
                                $totmem = exec("cat /proc/meminfo | grep MemTotal | awk {'print $2/1024'}");
                                if ($opt==1){
                                    $perc=floor(($freemem/$totmem)*100);
                                    // For development testing, uncomment to see changes
                                    //$perc=10; // Right
                                    //$perc=80; // Block
                                    //$perc=50; // Warning
                                    echo "$freemem <strong>MB</strong> ";
                                    if ($perc<45){
                                        echo "<b style=\"color:DarkGreen;\">";
                                        echo "($perc %)&nbsp;&nbsp;</b>";
                                        echo "<i style=\"color:DarkGreen;\" class=\"fas fa-check-circle\"></i>";
                                    }
                                    else if ($perc<70){
                                        echo "<b style=\"color:DarkOrange;\">";
                                        echo "($perc %)&nbsp;&nbsp;</b>";
                                        echo "<i style=\"color:DarkOrange;\" class=\"fas fa-warning\"></i>";
                                    }
                                    else {
                                        echo "<b style=\"color:DarkRed;\">";
                                        echo "($perc %)&nbsp;&nbsp;</b>";
                                        echo "<i style=\"color:DarkRed;\" class=\"fas fa-ban\"></i>";
                                    }
                                }
                                else {
                                    echo "$totmem <strong>MB</strong>";
                                }
                            }

                            function TEMP(){
                                $temp = floor(exec("cat /sys/class/thermal/thermal_zone0/temp")/1000);
                                // For development testing, uncomment to see changes
                                //$perc=40; // Right
                                //$perc=49; // Block
                                //$perc=80; // Warning
                                if ($temp<45){
                                    echo "<b style=\"color:DarkBlue;\">";
                                    echo "$temp oC  </b>&nbsp;&nbsp;";
                                    echo "<i style=\"color:DarkBlue;\" class=\"fas fa-temperature-low\"></i>";
                                }
                                else if ($temp<50){
                                    echo "<b style=\"color:DarkOrange;\">";
                                    echo "$temp oC </b>&nbsp;&nbsp;";
                                    echo "<i style=\"color:DarkOrange;\" class=\"fas fa-temperature-high\"></i>";
                                }
                                else {
                                    echo "<b style=\"color:DarkRed;\">";
                                    echo "$temp oC </b>&nbsp;&nbsp;";
                                    echo "<i style=\"color:DarkRed;\" class=\"fas fa-temperature-high\">&nbsp;</i>";
                                    echo "<i style=\"color:DarkRed;\" class=\"fas fa-fire-alt\"></i>";
                                }
                            }
                        ?>

                        <p class="lead mb-0"><?php system("date +'%A, %d %h %Y, %l:%M:%S %p'") ?><br>
                        <?php system("uname -srmo"); ?><br>
                        <br>- <strong>Uptime</strong>:&nbsp; <?php UPTIME(); ?>
                        <br>- <strong>Free Memory</strong>: <?php MEMORY(1); ?>
                        <br>-&nbsp;<strong>Total Memory</strong>:&nbsp; <?php MEMORY(2); ?>
                        <br>-&nbsp;<strong>CPU Temperature</strong>:&nbsp; <?php TEMP(); ?>
                        <br>- <strong>Running Processes</strong>:&nbsp; <?php system("ps ax | wc -l | tr -d \" \""); ?>
                        <br>- <strong>Connected Network </strong>:&nbsp; <?php system("iwgetid -r"); ?>
                        <br>- <strong>IP Address</strong>:&nbsp; <?php echo "$localIP" ?></p>
                        <br> <button class="btn btn-primary" type="button" onClick="window.location.reload()">Refresh Values</button>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 my-auto h-100 text-center text-lg-left">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item"><a href="https://thekrishna.in">About</a></li>
                            <li class="list-inline-item"><span></span></li>
                            <li class="list-inline-item"><a href="/phpmyadmin">phpMyAdmin</a></li>
                            <li class="list-inline-item"><span></span></li>
                            <li class="list-inline-item"><a href="<?php echo "http://$localIP:3000";?>">Grafana<br></a></li>
                            <li class="list-inline-item"><span></span></li>
                            <li class="list-inline-item"><a href="/html"><br>Local Sites<br></a></li>
                        </ul>
                        <p class="text-muted small mb-4 mb-lg-0"> Krishnakanth Alagiri (KK)</p>
                    </div>
                    <div class="col-lg-6 my-auto h-100 text-center text-lg-right">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="https://www.linkedin.com/in/krishnaalagiri/"><i class="fa fa-linkedin fa-2x fa-fw"></i></a></li>
                            <li class="list-inline-item"><a href="https://github.com/K-Kraken"><i class="fa fa-github fa-2x fa-fw"></i></a></li>
                            <li class="list-inline-item"><a href="https://thekrishna.in"><i class="fas fa-globe-americas fa-2x fa-fw"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>

    </html>
	

