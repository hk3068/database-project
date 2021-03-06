<?php
include 'connection.php';
if(isset($_POST['submit'])){
    $phid=$_POST['phid'];
    $phfname=$_POST['phfname'];
    $phtel=$_POST['phtel'];
    $phspl=$_POST['phspl'];
    $hid=$_POST['hid'];
    $sql="UPDATE physician set phid=$phid,phfname='$phfname',phtel='$phtel',phspl='phspl',hid'$hid' where phid=$phid";
    if(mysqli_query($conn,$sql)){
        echo '<script>alert("physician record of *** '.$phfname.'  *** updated")</script>';
    }else{
        echo '<script>alert("physician record could not be updated")</script>';
    }
}
$phid=null;
$phfname=null;
$phtel=null;
$phspl=null;
$hid=null;
if(isset($_GET['q'])){
    $phid = $_GET['q'];
    $phid=(int) $phid;
    $sql="SELECT * FROM PHYSICIAN where PHID=$phid";
    //echo $sql;
    $r=mysqli_query($conn, $sql);
    if($r){
        $cnt=(int) mysqli_num_rows($r);
        if($cnt>0){
            $row=mysqli_fetch_assoc($r);
            $phfname=$row['phfname'];
            $phtel=$row['phtel'];
            $phspl=$row['phspl'];
            $hid=$row['hid'];
        }
    }
}
?>
    <!DOCTYPE html>
<html>
<head>
	<title>Edit Physician</title>
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
        <a class="nav-link" href="Patient.php">PATIENT </a>
      </li>
    </ul>
    <span class="navbar-text" style="font-size: 20px;font-weight: bold;">
      <?= $phfname; ?>
    </span>
  </div>
</nav>
<div class="container-fluid">
<div class="card shadow mb-4 mt-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-primary float-left">About Physician</h3>
            </div>
            <div class="card-body p-5">
            <div class="container py-4 px-5 bg-light rounded">
            	<div class="h4 mx-auto text-center">Fill out the below information</div>
              <form method="POST" class="form-wrapper px-5">
              <div class="form-group">
              		<label class="h6">Physician's Name <span class="light" style="color: #cacaca;"></span></label><br>
              		<div class="row">
              			<div class="col-md-6">
              				 <input type="text" name="phfname" value='<?=$phfname?>'required class="form-control form-control-user">
              			</div>
              		
              		</div>
              	</div>
              	<div class="form-group">
              		<div class="row">
              			<div class="col-md-6">
              				<label class="h6">Physician's ID</label><br>
              				<input type="number" name="phid" value='<?=$phid?>' readonly class="form-control  form-control-user" value="'.$id.'">
              			</div>
              			<div class="col-md-6">
		              		<label class="h6">Physician Tel</label><br>
              				<input type="tel" name="phtel" id="phtel" value='<?=$phtel?>'required class="form-control form-control-user">
              			</div>
              			</div>
              	</div>
              	<div class="form-group">
              		<div class="row">
              		<div class="col-md-6">
              				<label class="h6">Physician Spl</label><br>
              				<input type="text" name="phspl" id="phspl"value='<?=$phspl?>'required class="form-control form-control-user">
              			</div>
              			<div  class="col-md-6">
              				<label class="h6">Hospital Id</label><br>
              				<input type="text" name="hid"id="hid" value='<?=$hid?>'required class="form-control form-control-user">
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