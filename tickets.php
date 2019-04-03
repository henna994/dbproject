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
      <li class="nav-item active">
        <a class="nav-link" href="tickets.php">Tickets<span class="sr-only">(current)</span></a>
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
    <h3 style="text-align: center; font-weight: bold;">Tickets</h3>
    <div class="row">
        <form class="form-horizontal" action="tickets.php" method="POST">

        <div class="form-group mb-3">
                 <label class="control-label">Class</label>
            <div>
                 <select name="class" class="course form-control">
                    <option>Select</option>
                    <option value="first">First</option>
                    <option value="business">business</option>
                    <option value="premium economy">Premium Economy</option>
                    <option value="economy">Economy</option>
                    </select>
                </div>
            </div>  
            <div class="form-group mb-3">
                 <label class="control-label">Seat</label>
            <div>
                 <select name="seat" class="course form-control">
                    <option>Select</option>
                    <option value="a">a</option>
                    <option value="b">b</option>
                    <option value="c">c</option>
                    <option value="d">d</option>
                    <option value="e">e</option>
                    <option value="f">f</option>
                    <option value="g">g</option>
                    <option value="h">h</option>
                    <option value="j">j</option>
                    <option value="k">k</option>

                    </select>
                </div>
            </div>  
            <div class="form-group mb-3">
                 <label class="control-label">Seat row</label>
            <div>
                 <input type="text" class="form-control" name="seatn" placeholder="Row">
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
                 <th>Class</th>
                 <th>Seat Letter</th>  
                 <th>Seat Row</th> 
                 <th>PassengerID</th>
                 <th>FlightID</th>
            </tr>
        </thead>
        
                 <tbody>
                 <?php
                    include("config/db.php");
                    if(isset($_POST['all'])){
                       
                        $class = $_POST['class'];
                        $seat = $_POST['seat'];
                        $seatn = $_POST['seatn'];
                       
                           $queryy = "SELECT * FROM tickets";
                            
                           $dataa = mysqli_query($conn, $queryy) or die('error');
                        if(mysqli_num_rows($dataa) > 0){
                            while($row = mysqli_fetch_assoc($dataa)){
                                $id = $row['id'];
                                $class = $row['class'];
                                $seat = $row['seat'];
                                $seatn = $row['seatn'];
                                $passengerID = $row['passengerID'];
                                $flightID = $row['flightID'];
                               
                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $class;?></td>
                                    <td><?php echo $seat;?></td>
                                    <td><?php echo $seatn;?></td>
                                    <td><?php echo $passengerID;?></td>
                                    <td><?php echo $flightID;?></td>
                                                                    
                                </tr>
                                <?php

                            }
                        }

                    }
                    ?>
                    <?php
                    include("config/db.php");
                    if(isset($_POST['submit'])){
                       
                        $class = $_POST['class'];
                        $seat = $_POST['seat'];
                        $seatn = $_POST['seatn'];

                       

                        if($class != "" || $seat != "" || $seatn != ""){
                           $query = "SELECT * FROM tickets WHERE class = '$class' OR seat = '$seat' OR seatn = '$seatn'";
                            
                           $data = mysqli_query($conn, $query) or die('error');
                        if(mysqli_num_rows($data) > 0){
                            while($row = mysqli_fetch_assoc($data)){
                                $id = $row['id'];
                                $class = $row['class'];
                                $seat = $row['seat'];
                                $seatn = $row['seatn'];
                                $passengerID = $row['passengerID'];
                                $flightID = $row['flightID'];
                               
                                ?>
                                <tr>
                                <td><?php echo $id;?></td>
                                    <td><?php echo $class;?></td>
                                    <td><?php echo $seat;?></td>
                                    <td><?php echo $seatn;?></td>
                                    <td><?php echo $passengerID;?></td>
                                    <td><?php echo $flightID;?></td>
                                   
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
