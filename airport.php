<!doctype html>
<!DOCTYPE html>
<html>
<head>
    <title>Filters in PHP</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <script type="text/javascript" src="js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript">
            $( function() {
                $( "#from" ).datepicker();
                 } );
             $( function() {
                $( "#to" ).datepicker();
                 } );
        </script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="flights.php">Flights</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tickets.php">Tickets</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="passengers.php">Passengers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="staff.php">Staff</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="airport.php">Airports<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
        
<div class="container">
    <h3 style="text-align: center; font-weight: bold;">Airport</h3>
    <div class="row">
        <form class="form-horizontal" action="airport.php" method="POST">
            <div class="input-group mb-3">
                 <label class="col-lg-2 control-label">City</label>
            <div class="col-lg-8">
                 <input type="text" class="form-control" name="location" placeholder="name">
            </div>
            </div> 
            <div class="input-group mb-3">
                 <label class="col-lg-2 control-label">IATA</label>
            <div class="col-lg-8">
                 <input type="text" class="form-control" name="iata" placeholder="name">
            </div>
            </div> 
            <div class="input-group mb-3">
                 <label class="col-lg-2 control-label"></label>
            <div class="col-lg-8">
                 <input type="submit" name="submit" class="btn btn-primary">
            </div> 
            </div>
            <div class="input-group mb-3">
                 <label class="control-label"></label>
            <div class="col-lg-8">
                 <input type="submit" value="Show All" name="all" class="btn btn-danger">
            </div> 
            </div>
        </form>
    </div>

    <div class="row">
        <table class="table table-striped table-hover">
        <thead>
            <tr>
                 <th>ID</th>
                 <th>name</th>
                 <th>City</th>
                 <th>IATA</th>
               
            </tr>
        </thead>
        
                 <tbody>
                 <?php
                    include("config/db.php");
                    if(isset($_POST['all'])){
                       
                        $location = $_POST['location'];
                        $iata = $_POST['iata'];
                       

                       
                           $queryy = "SELECT * FROM airport";
                            
                           $dataa = mysqli_query($conn, $queryy) or die('error');
                        if(mysqli_num_rows($dataa) > 0){
                            while($row = mysqli_fetch_assoc($dataa)){
                                $id = $row['id'];
                                $name = $row['name'];
                                $location = $row['location'];
                                $iata = $row['iata'];
                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $name;?></td>
                                    <td><?php echo $location;?></td>
                                    <td><?php echo $iata;?></td>
                                   
                                   
                                </tr>
                                <?php

                            }
                        }

                    }
                    ?>
                    <?php
                    include("config/db.php");
                    if(isset($_POST['submit'])){
                       
                        $location = $_POST['location'];
                        $iata = $_POST['iata'];
                       

                        if($location != "" || $iata != ""){
                           $query = "SELECT * FROM airport WHERE location = '$location' OR iata = '$iata'";
                            
                           $data = mysqli_query($conn, $query) or die('error');
                        if(mysqli_num_rows($data) > 0){
                            while($row = mysqli_fetch_assoc($data)){
                                $id = $row['id'];
                                $name = $row['name'];
                                $location = $row['location'];
                                $iata = $row['iata'];
                                ?>
                                <tr>
                                <td><?php echo $id;?></td>
                                    <td><?php echo $name;?></td>
                                    <td><?php echo $location;?></td>
                                    <td><?php echo $iata;?></td>
                                   
                                </tr>
                                <?php

                            }
                        }

                       
                        
                        }
                    }
                    
                    
                    ?>
        </tbody>
        </table>
        </div>
        </div>
    </body>
    </html>
