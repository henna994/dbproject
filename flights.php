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
    
      <li class="nav-item active">
        <a class="nav-link" href="flights.php">Flights <span class="sr-only">(current)</span></a>
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
      <li class="nav-item">
        <a class="nav-link" href="airport.php">Airports</a>
      </li>
    </ul>
  </div>
</nav>
        
    <div class="container">
    <h3 style="text-align: center; font-weight: bold;">Flights</h3>
    <div class="row">
        <form class="form-horizontal" action="flights.php" method="POST">
        <div class="form-group mb-3">
                 <label class="control-label">Flights from</label>
            <div>
                 <input type="text" name="from_date" id="from" class="form-control">
            </div> 
            </div>
            <div class="form-group mb-3">
                 <label class="control-label">Flights to</label>
            <div>
                 <input type="text" name="to_date" id="to" class="form-control">
            </div> 
            </div>
           
            <div class="form-group mb-3">
                 <label class="control-label">Source</label>
            <div>
                 <input type="text" class="form-control" name="source" placeholder="source">
            </div>
            </div> 
            <div class="form-group mb-3">
                 <label class="control-label">Destination</label>
            <div>
                 <input type="text" class="form-control" name="destination" placeholder="destination">
            </div>
            </div> 
            <div class="input-group mb-3">
                 <label class="control-label"></label>
            <div>
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
                 <th>Date</th>
                 <th>Source</th>
                 <th>Destination</th>
                 <th>JetID</th>
                 <th>RunwayID</th>

            </tr>
        </thead>
        
                 <tbody>
                 <?php
                    include("config/db.php");
                    if(isset($_POST['all'])){
                       
                        $source = $_POST['source'];
                        $destination = $_POST['destination'];
                        $from_date = $_POST['from_date'];
                        $fdate = strtotime($from_date);
                        $fdate = date("Y/m/d", $fdate);
                        $to_date = $_POST['to_date'];
                        $tdate = strtotime($to_date);
                        $tdate = date("Y/m/d", $tdate);

                       
                           $queryy = "SELECT * FROM flights";
                            
                           $dataa = mysqli_query($conn, $queryy) or die('error');
                        if(mysqli_num_rows($dataa) > 0){
                            while($row = mysqli_fetch_assoc($dataa)){
                                $id = $row['id'];
                                $source = $row['source'];
                                $destination = $row['destination'];
                                $jetID = $row['jetID'];
                                $runwayID = $row['runwayID'];
                                $from_date = $row['from_date'];
                                $to_date = $row['to_date'];
                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $from_date;?></td>
                                    <td><?php echo $source;?></td>
                                    <td><?php echo $destination;?></td>
                                    <td><?php echo $jetID;?></td>
                                    <td><?php echo $runwayID;?></td>
                                   
                                </tr>
                                <?php

                            }
                        }

                    }
                    ?>
                    <?php
                    include("config/db.php");
                    if(isset($_POST['submit'])){
                       
                        $source = $_POST['source'];
                        $destination = $_POST['destination'];
                        $from_date = $_POST['from_date'];
                        $fdate = strtotime($from_date);
                        $fdate = date("Y/m/d", $fdate);
                        $to_date = $_POST['to_date'];
                        $tdate = strtotime($to_date);
                        $tdate = date("Y/m/d", $tdate);

                        if($source != "" || $destination != "" || $fdate != "" || $tdate != ""){
                           $query = "SELECT * FROM flights WHERE source = '$source' OR destination = '$destination' OR from_date >= '$fdate' AND to_date <= '$tdate'";
                            
                           $data = mysqli_query($conn, $query) or die('error');
                        if(mysqli_num_rows($data) > 0){
                            while($row = mysqli_fetch_assoc($data)){
                                $id = $row['id'];
                                $source = $row['source'];
                                $destination = $row['destination'];
                                $jetID = $row['jetID'];
                                $runwayID = $row['runwayID'];
                                $from_date = $row['from_date'];
                                $to_date = $row['to_date'];
                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $from_date;?></td>
                                    <td><?php echo $source;?></td>
                                    <td><?php echo $destination;?></td>
                                    <td><?php echo $jetID;?></td>
                                    <td><?php echo $runwayID;?></td>
                                   
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
