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
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="flights.php">Flights</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tickets.php">Tickets</span></a>
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
    <h3 style="text-align: center; font-weight: bold;">Trial</h3>
    <div class="row">
        <form class="form-horizontal" action="index.php" method="POST">
            <div class="input-group mb-3">
                 <label class="col-lg-2 control-label">Name</label>
            <div class="col-lg-8">
                 <input type="text" class="form-control" name="name" placeholder="name">
            </div>
            </div> 
            <div class="input-group mb-3">
                 <label class="col-lg-2 control-label">Gender</label>
            <div class="col-lg-8">
                 <input type="radio" name="gender" value="Male">Male
                 <input type="radio" name="gender" value="Female">Female
                 <input type="radio" name="gender" value="Other" checked="true">Other

             </div>
             </div>
             <div class="input-group mb-3">
                 <label class="col-lg-2 control-label">Course</label>
            <div class="col-lg-8">
                 <select name="course" class="course form-control">
                    <option>Select</option>
                    <option value="B.A">B.A</option>
                    <option value="B.COM">B.COM</option>
                    <option value="B.SC">B.SC</option>
                    </select>
                </div>
            </div>  
            <div class="input-group mb-3">
                 <label class="col-lg-2 control-label">From</label>
            <div class="col-lg-8">
                 <input type="text" name="from_date" id="from" class="form-control">
            </div> 
            </div>
            <div class="input-group mb-3">
                 <label class="col-lg-2 control-label">To</label>
            <div class="col-lg-8">
                 <input type="text" name="to_date" id="to" class="form-control">
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
                 <th>Name</th>
                 <th>Email</th>
                 <th>Gender</th>  
                 <th>Course</th>
                 <th>From</th>
                 <th>To</th>
            </tr>
        </thead>
        
                 <tbody>
                    <?php
                    include("config/db.php");
                    if(isset($_POST['all'])){
                       
                        $name = $_POST['name'];
                        $course = $_POST['course'];
                        $gender = $_POST['gender'];
                        $from_date = $_POST['from_date'];
                        $fdate = strtotime($from_date);
                        $fdate = date("Y/m/d", $fdate);
                        $to_date = $_POST['to_date'];
                        $tdate = strtotime($to_date);
                        $tdate = date("Y/m/d", $tdate);

                       
                           $queryy = "SELECT * FROM records";
                            
                           $dataa = mysqli_query($conn, $queryy) or die('error');
                        if(mysqli_num_rows($dataa) > 0){
                            while($row = mysqli_fetch_assoc($dataa)){
                                $id = $row['id'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $gender = $row['gender'];
                                $course = $row['course'];
                                $from_date = $row['from_date'];
                                $to_date = $row['to_date'];
                                ?>
                                <tr>
                                <td><?php echo $id;?></td>
                                    <td><?php echo $name;?></td>
                                    <td><?php echo $email;?></td>
                                    <td><?php echo $gender;?></td>
                                    <td><?php echo $course;?></td>
                                    <td><?php echo $from_date;?></td>
                                    <td><?php echo $to_date;?></td>
                                   
                                </tr>
                                <?php

                            }
                        }

                    }
                    ?>
                    <?php
                    include("config/db.php");
                    if(isset($_POST['submit'])){
                        $name = $_POST['name'];
                        $course = $_POST['course'];
                        $gender = $_POST['gender'];
                        $from_date = $_POST['from_date'];
                        $fdate = strtotime($from_date);
                        $fdate = date("Y/m/d", $fdate);
                        $to_date = $_POST['to_date'];
                        $tdate = strtotime($to_date);
                        $tdate = date("Y/m/d", $tdate);

                        if($name != "" || $gender != "" || $course != "" || $fdate != "" || $tdate != ""){
                           $query = "SELECT * FROM records WHERE name = '$name' OR gender = '$gender' OR course = '$course' OR from_date >= '$fdate' AND to_date <= '$tdate'";
                            
                           $data = mysqli_query($conn, $query) or die('error');
                        if(mysqli_num_rows($data) > 0){
                            while($row = mysqli_fetch_assoc($data)){
                                $id = $row['id'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $gender = $row['gender'];
                                $course = $row['course'];
                                $from_date = $row['from_date'];
                                $to_date = $row['to_date'];
                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $name;?></td>
                                    <td><?php echo $email;?></td>
                                    <td><?php echo $gender;?></td>
                                    <td><?php echo $course;?></td>
                                    <td><?php echo $from_date;?></td>
                                    <td><?php echo $to_date;?></td>
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
