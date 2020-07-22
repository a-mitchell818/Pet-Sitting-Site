<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Ronin Home Pet Care</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/modern-business.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/main2.css">

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar fixed-top navbar-expand-lg navbar navbar-light" style="background-color: #359b93; fixed-top">
            <div class="container">
                <img class="navbar-brand" src="Images/rsslogo.jpg" alt="logo" width="65" height="65">
                <a class="navbar-brand" href="index.html">Ronin Home Pet Care</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bookit.html">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Photos
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                                <a class="dropdown-item" href="portfolio-3-col.html">Pet Photos</a>
                                <a class="dropdown-item" href="portfolio-2-col.html">Facilty Pictures</a>
                                <!--                <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>-->
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Email: Email@RoninHomePetCare.com
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                                <a class="dropdown-item" href="cancel.html">Cancel A Visit</a>
                                <a class="dropdown-item" href="update.html">Update A Visit</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tel: 863-555-5555
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                                <a class="dropdown-item" href="https://login.live.com/login.srf?wa=wsignin1.0&rpsnv=13&ct=1539539440&rver=7.0.6730.0&wp=MBI_SSL&wreply=https%3A%2F%2Flw.skype.com%2Flogin%2Foauth%2Fproxy%3Fclient_id%3D360605%26redirect_uri%3Dhttps%253A%252F%252Fsecure.skype.com%252Fportal%252Flogin%253Freturn_url%253Dhttps%25253A%25252F%25252Fsecure.skype.com%25252Fportal%25252Foverview%26response_type%3Dpostgrant%26state%3DRPtozC0N9r1n%26site_name%3Dlw.skype.com&lc=1033&id=293290&mkt=en-US&psi=skype&lw=1&cobrandid=2befc4b5-19e3-46e8-8347-77317a16a5a5&client_flight=ReservedFlight33%2CReservedFlight67" target="_blank">Schedule a Skype Call</a>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row justify-content-center">
                <div class="col-lg-6 col-xs-12 col-sm-6">
                 <div class="table-responsive">
                    
                        <?php
                        $servername = "localhost";

                        try{

                            $username= "amitch41";
                            $password= "WhileThat66";
                            $conn = new
                                PDO("mysql:host=$servername;dbname=amitch41",trim($username),trim($password));
                            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                            echo "Connected Successfully<br>";


                            echo "<h2>Booking Requests</h2>";
            
                            echo "<table style='border: solid 1px black; border-collapse: collapse; width: 100%; margin-left:auto; 
    margin-right:auto; '>";
                            echo "<tr><th>Full Name</th><th>Pet Name</th><th>Phone #</th><th>Email</th><th>Start Date</th><th>End Date</th><th>Promo</th><th>Comments</th></tr>";


                            class TableRows extends RecursiveIteratorIterator { 
                                function __construct($it) { 
                                    parent::__construct($it, self::LEAVES_ONLY); 
                                }

                                function current() {
                                    return "<td style='width:150px;border:1px solid black; text-align: left;
    padding: 10px;'>" . parent::current(). "</td>";
                                    
                                
                                }

                                function beginChildren() { 
                                    echo "<tr>"; 
                                } 

                                function endChildren() { 
                                    echo "</tr>" . "\n";
                                } 
                            } 

                            $stmt = $conn->prepare("SELECT flname, pname, tel, email, sdate, edate, promo, comments FROM BookingRequest"); 
                            $stmt->execute();
                            // set the resulting array to associative
                            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
                                echo $v;
                            }
                        }
                        catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        $conn = null;
                        echo "</table>";

                        ?>

                        <a href="index.html" class="btn btn-primary">Logout</a>
                    </div>
                </div>
        </div>

                <!-- Footer -->
                <footer class="py-5 bg-dark">
                    <div class="container">
                        <p class="m-0 text-center text-white">Copyright of Ronin Sun Services &copy; RoninHomePetCare.com 2018</p>
                    </div>
                    <!-- /.container -->
                </footer>

                <!-- Bootstrap core JavaScript -->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                </body>

            </html>
