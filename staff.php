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
      <li class="nav-item active">
        <a class="nav-link" href="staff.php">Staff<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="airport.php">Airports</a>
      </li>
    </ul>
  </div>
</nav>
        
    <div class="container">
    <h3 style="text-align: center; font-weight: bold;">Staff</h3>
    <div class="row">
        <form class="form-horizontal" action="staff.php" method="POST">

        <div class="input-group mb-3">
                 <label class="col-lg-2 control-label">ID</label>
            <div class="col-lg-8">
                 <input type="text" class="form-control" name="id" placeholder="name">
            </div>
            </div> 
        <div class="input-group mb-3">
                 <label class="col-lg-2 control-label">Job</label>
            <div class="col-lg-8">
                 <select name="job" class="course form-control">
                    <option>Select</option>
                    <option value="pilot">Pilot</option>
                    <option value="attendant">Attendant</option>
                    <option value="security">Security</option>
                    <option value="it">IT</option>
                    <option value="business">Buisness</option>
                    <option value="customer">Customer Service</option>


                    </select>
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
                 <th>First Name</th>
                 <th>Last Name</th>  
                 <th>Job</th> 
                 <th>Email</th>
                
            </tr>
        </thead>
        
                 <tbody>
                 <?php
                    include("config/db.php");
                    if(isset($_POST['all'])){
                       
                        $id = $_POST['id'];
                        $job = $_POST['job'];
                     
                       
                           $queryy = "SELECT * FROM staff";
                            
                           $dataa = mysqli_query($conn, $queryy) or die('error');
                        if(mysqli_num_rows($dataa) > 0){
                            while($row = mysqli_fetch_assoc($dataa)){
                                $id = $row['id'];
                                $first = $row['first'];
                                $last = $row['last'];
                                $job = $row['job'];
                                $email = $row['email'];
                              
                               
                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $first;?></td>
                                    <td><?php echo $last;?></td>
                                    <td><?php echo $job;?></td>
                                    <td><?php echo $email;?></td>
                                                                    
                                </tr>
                                <?php

                            }
                        }

                    }
                    ?>
                    <?php
                    include("config/db.php");
                    if(isset($_POST['submit'])){
                       
                        $id = $_POST['id'];
                        $job = $_POST['job'];

                       

                        if($id != "" || $job != ""){
                           $query = "SELECT * FROM staff WHERE id = '$id' OR job = '$job'";
                            
                           $data = mysqli_query($conn, $query) or die('error');
                        if(mysqli_num_rows($data) > 0){
                            while($row = mysqli_fetch_assoc($data)){
                                $id = $row['id'];
                                $first = $row['first'];
                                $last = $row['last'];
                                $job = $row['job'];
                                $email = $row['email'];
                               
                                ?>
                                <tr>
                                <td><?php echo $id;?></td>
                                    <td><?php echo $first;?></td>
                                    <td><?php echo $last;?></td>
                                    <td><?php echo $job;?></td>
                                    <td><?php echo $email;?></td>
                                   
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
