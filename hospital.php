<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>wdcarh </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<style type="text/css">
		a.head{
			font-family: 'Pacifico', cursive;
			font-size: 30px;
		}
	</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<div class="container-fluid p-0">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0">
  <a class="navbar-brand head" style="color: #2268FF" href="">WDCARH</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link"href=hospital.php>HOSPITAL<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link"href=physician.php>PHYSICIAN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"href="patient.php">PATIENT</a>
      </li>
    </ul>
    <span class="navbar-text" style="font-size: 20px;font-weight: bold;">
      HOSPITAL
    </span>
  </div>
</nav>
<div class="container-fluid">
<div class="card shadow mb-4 mt-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-primary float-left">HOSPITAL</h3>
              <a class="btn btn-primary float-right" href="Add_Hospital.php"><i class="fas fa-user-plus"></i> Add New HOSPITAL</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Hospital ID</th>
                      <th>Hospital Name</th>
                      <th>Hospital Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Zipcode</th>
                
					  <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Hospital ID</th>
                      <th>Hospital Name</th>
                      <th>Hospital Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Zipcode</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                    
                    $sql2="SELECT * FROM `HOSPITAL` ORDER BY `HID` ASC";
                    $result2=mysqli_query($conn,$sql2);
                    if(!$result2){
                      header('location: https://httpstat.us/500');
                    }
                    if(mysqli_num_rows($result2)>0){
                      while($row=mysqli_fetch_assoc($result2)){
                        echo "<tr>
                            <td>".$row['hid']."</td>
                            <td>".$row['hname']."</td>
                            <td>".$row['hst_addrress']."</td>
                            <td>".$row['hst_city']."</td>
                            <td>".$row['hstate']."</td>
                            <td>".$row['hzip']."</td>
                        	<td><button name='Edit' onclick='window.location.assign(\"HEdit.php?q=".$row['hid']."\")' class='ml-4 btn btn-success rounded-circle' style=\"width: 40px;Heigth: 40px; \" title='Edit'><i style='color:white;' class=\"fas fa-user-edit\"></i></button>


                        	<button onclick='window.location.assign(\"Hdelete.php?q=".$row['hid']."\")' class='ml-4 btn btn-danger rounded-circle' style=\"width: 40px;Heigth: 40px; \" title='Delete'><i style='color:white;' class=\"fas fa-trash-alt\"></i></button></td>
                          </tr>";   
                      }
                    }else{
                      echo "<tr><td colspan=\"11\"><center>No Record Found</center></td></tr>";
                    }
                    mysqli_close($conn);
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
</div>
<footer class="bg-light pr-3 text-right text-secondary font-weight-bold">
	Hongyu and Haosong
</footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
