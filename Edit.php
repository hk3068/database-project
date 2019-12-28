<?php
include 'connection.php';
if(isset($_POST['submit'])){
    $pid=$_POST['pid'];
    $pfname=$_POST['pfname'];
    $plname=$_POST['plname'];
    $pgender=$_POST['pgender'];
    $pbd=$_POST['pbd'];
    $prace=$_POST['prace'];
    $pstatus=$_POST['pstatus'];
    $plname=strtoupper($plname);
    $pfname=strtoupper($pfname);
    $sql="UPDATE PATIENT set pid=$pid,pfname='$pfname',plname='$plname',pgender='$pgender',pbd='$pbd',prace='$prace',pstatus='$pstatus'where pid=$pid";
    if(mysqli_query($conn,$sql)){
        echo '<script>alert("Employee record of *** '.$pfname.' '.$plname.' *** updated")</script>';
    }else{
        echo '<script>alert("Employee record could not be updated")</script>';
    }
}
    $pid=null;
    $pfname=null;
    $plname=null;
    $pgender=null;
    $pbd=null;
    $prace=null;
    $pstatus=null;
    if(isset($_GET['q'])){
        $pid = $_GET['q'];
        $pid=(int) $pid;
        $sql="SELECT * FROM PATIENT where PID=$pid";
        //echo $sql;
        $r=mysqli_query($conn, $sql);
        if($r){
            $cnt=(int) mysqli_num_rows($r);
            if($cnt>0){
                $row=mysqli_fetch_assoc($r);
                $pfname=$row['pfname'];
                $plname=$row['plname'];
                $pgender=$row['pgender'];
                $pbd=$row['pbd'];
                $prace=$row['prace'];
                $pstatus=$row['pstatus'];
            }
        }
    }
    ?>
    <!DOCTYPE html>
<html>
<head>
	<title>Edit Patient</title>
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
        <a class="nav-link"href="hospital.php">HOSPITAL</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"href="physician.php">PHYSICIAN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Patient.php">PATIENT <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span class="navbar-text" style="font-size: 20px;font-weight: bold;">
      <?= $pfname.' '.$plname; ?>
    </span>
  </div>
</nav>
<div class="container-fluid">
<div class="card shadow mb-4 mt-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-primary float-left">About Patient</h3>
            </div>
            <div class="card-body p-5">
            <div class="container py-4 px-5 bg-light rounded">
            	<div class="h4 mx-auto text-center">Fill out the below information</div>
              <form method="POST" class="form-wrapper px-5">
              <div class="form-group">
              		<label class="h6">Patient's Name <span class="light" style="color: #cacaca;">[Firstname Lastname]</span></label><br>
              		<div class="row">
              			<div class="col-md-6">
              				 <input type="text" name="pfname" placeholder="John"value='<?=$pfname?>' required class="form-control form-control-user">
              			</div>
              			<div class="col-md-6">
              				<input type="text" name="plname" placeholder="Deo"value='<?=$plname?>' required class="form-control form-control-user">	 
              			</div>
              		</div>
              	</div>
              	<div class="form-group">
              		<div class="row">
              			<div class="col-md-6">
              				<label class="h6">Patient's ID</label><br>
              				<input type="text" name="pid" value='<?=$pid?>' readonly class="form-control  form-control-user" value="'.$id.'">
              			</div>
              			<div class="col-md-6">
		              		<label class="h6">Date</label><br>
              				<input type="datetime" name="pbd" plcaeholder="2019-11-16 08:08:57"required class="form-control form-control-user">
              			</div>
              			</div>
              	</div>
              	<div class="form-group">
              		<div class="row">
              		<div class="col-md-6">
              				<label class="h6">Patient's gender</label><br>
              				<select title="Please select correct input" id="pgender" onchange="call()" required class="form-control form-control-user" name="pgender">
				              	<option value="none">
				              		--SELECT--
				              	</option>
					            <option value="M">
					            	Male
					            </option>
					           	<option value="F">
					           		Female
					           	</option>
				              	<option value="U">
				              		Unknown
				              	</option>
				           	</select>	
              			</div>
              			<div  class="col-md-6">
              				<label class="h6">Status</label><br>
              				<select title="Please select correct input" id="pstatus" onchange="call()" required class="form-control form-control-user" name="pstatus">
		              			<option value="none">
				              		--SELECT--
				              	</option>
				              	<option value="M">
					            	Married
					            </option>
					            <option value="S">
					            	Single
					            </option>
					            <option value="D">
					            	Divorced
					            </option>
					            <option value="W">
					            	Widow
					            </option>
				              	
		              			
		              		</select>	
              			</div>
              		</div>
              	</div>
              	<div class="form-group">
              		<label class="h6">Race <span class="light" style="color: #cacaca;"></span></label><br>
              		<div class="row">
              			<div class="col-md-6">
              				 <input type="text" name="prace"value='<?=$prace?>' placeholder="Asian" required class="form-control form-control-user">
              			</div>
              		</div>
              	</div>
              	<div class="form-group">
              		<input type="submit" name="submit" value="Update Record" class="float-right btn-success btn form-control form-control-user">
              	</div>
              	</form>
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