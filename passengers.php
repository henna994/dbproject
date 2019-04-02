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
        <a class="nav-link" href="tickets.php">Tickets</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="passengers.php">Passengers <span class="sr-only">(current)</span></a>
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
    <h3 style="text-align: center; font-weight: bold;">Passengers</h3>
    <div class="row">
        <form class="form-horizontal" action="passengers.php" method="POST">

        <div class="input-group mb-3">
                 <label class="col-lg-2 control-label">ID</label>
            <div class="col-lg-8">
                 <input type="text" class="form-control" name="id" placeholder="name">
            </div>
            </div> 
            <div class="input-group mb-3">
                 <label class="col-lg-2 control-label">Adult/Child</label>
            <div class="col-lg-8">
                 <input type="radio" name="ac" value="adult">Adult
                 <input type="radio" name="ac" value="child">Child
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
                 <th>Adult/Child</th> 
                 <th>Cell</th>
                 
            </tr>
        </thead>
        
                 <tbody>
                 <?php
                    include("config/db.php");
                    if(isset($_POST['all'])){
                       
                        $id = $_POST['id'];
                                          
                           $queryy = "SELECT * FROM passenger";
                            
                           $dataa = mysqli_query($conn, $queryy) or die('error');
                        if(mysqli_num_rows($dataa) > 0){
                            while($row = mysqli_fetch_assoc($dataa)){
                                $id = $row['id'];
                                $first = $row['first'];
                                $last = $row['last'];
                                $ac = $row['ac'];
                                $cell = $row['cell'];
                                                             
                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $first;?></td>
                                    <td><?php echo $last;?></td>
                                    <td><?php echo $ac;?></td>
                                    <td><?php echo $cell;?></td>
                                                                    
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
                        $ac = $_POST['ac'];

                       

                        if($id != "" || $ac != ""){
                           $query = "SELECT * FROM passenger WHERE id = '$id' OR ac = '$ac'";
                            
                           $data = mysqli_query($conn, $query) or die('error');
                        if(mysqli_num_rows($data) > 0){
                            while($row = mysqli_fetch_assoc($data)){
                                $id = $row['id'];
                                $first = $row['first'];
                                $last = $row['last'];
                                $ac = $row['ac'];
                                $cell = $row['cell'];
                               
                                ?>
                                <tr>
                                <td><?php echo $id;?></td>
                                    <td><?php echo $first;?></td>
                                    <td><?php echo $last;?></td>
                                    <td><?php echo $ac;?></td>
                                    <td><?php echo $cell;?></td>
                                   
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
