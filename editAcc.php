<?php
include 'imports/head.php';
include 'imports/navigation2.php';
include 'system/init.php';

	$user = $_SESSION['username'];
	$qry_password = " SELECT * FROM account WHERE username = '".$user."'" ;
	$qry_rs = mysqli_query($db , $qry_password);
	$row = mysqli_fetch_array($qry_rs);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])){
		$file = $_FILES['image']['tmp_name'];
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);

		if($image_size==TRUE){
				if($update_image = mysqli_query($db,"UPDATE account set image = '".$image."' WHERE username = '".$user."'"))
				{

				$qryyyy = "SELECT image FROM account WHERE username = '".$user."'";
				$result = mysqli_query($db , $qryyyy);
				$row = mysqli_fetch_array($result);
			}
			else
			{
				mysqli_error($insert);
			}
		}
		else{
			echo "thats not image";
		}
	}


	if($user){
			if($_POST['submit'])
			{

				if(isset($_POST['oldpassword']) && $_POST['oldpassword'] != null &&
					 isset($_POST['newpassword']) && $_POST['newpassword'] != null &&
					 isset($_POST['repeatnewpassword']) && $_POST['repeatnewpassword'] != null)
				{
					$oldpassword = $_POST['oldpassword'];
					$newpassword = $_POST['newpassword'];
					$repeatnewpassword = $_POST['repeatnewpassword'];
					$oldpassworddb =  $row['password'];
					if($oldpassword == $oldpassworddb)
					{
						if($newpassword == $repeatnewpassword)
						{
							$qry_update = mysqli_query($db , " UPDATE account SET password = $newpassword WHERE username = '".$user."'");
							session_destroy();
							echo " Your password have changed ";
							die("<a href='login.php'>return</a>");
						}
						else{
							echo"new password not matching ";
						}
					}
					else{
						echo" password not matching ";
					}
				}


				if($_POST['dob']){
					$DOB = $_POST['dob'];
					echo $DOB;
					$update_dob  = mysqli_query($db , " UPDATE account SET DOB = '".$DOB."' WHERE username = '".$user."'");
				}
				if($_POST['num']){
					$phone_num = $_POST['num'];
					$update_num = mysqli_query($db , "UPDATE account SET phone_num = $phone_num WHERE username = '".$user."'");
				}
				if($_POST['gender']){
					$type_of = $_POST['gender'];
					$update_gender = mysqli_query($db , "UPDATE account SET gender = '".$type_of."' WHERE username = '".$user."'");
				}

			}
	}
	else{
		echo"error ";
	}
header("location:account.php");
}


?>
<div class="container">
	<img class="center" height="200px" src="data:image;base64,<?=base64_encode($row["image"])?>"/>
	<div class="">
		<form action="editAcc.php" method="POST" enctype="multipart/form-data">
			<input class="form-control" type = "file" name="image">
			<br>
			<div class="form-group row">
				<label for="" class="col-sm-2 col-form-label">Your used Password</label>
				<div class="col-sm-10">
					<input class="form-control" type="text" placeholder=" enter your used password "  name="oldpassword">
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-sm-2 col-form-label">	Your new Password</label>
				<div class="col-sm-10">
					<input class="form-control" type="text" placeholder=" enter your used password "  name="newpassword">
					<input class="form-control" type="text" placeholder=" enter your new password again "  name="repeatnewpassword">
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-sm-2 col-form-label">Date of Birth</label>
				<div class="col-sm-10">
					<input class="form-control" type="date" name="dob">
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-sm-2 col-form-label">Phone Number</label>
				<div class="col-sm-10">
					<input class="form-control" type="number" placeholder="<?=  $row['phone_num'] ?>" value=""  name="num">
				</div>
			</div>
			<div class="form-group row">
				<legend class="col-form-label col-sm-2 pt-0">Gender</legend>
				<div class="col-sm-10">
					<div class="form-check">
          <input class="form-check-input" type="radio" name="gender" value="Male">
          <label class="form-check-label">
            Male
          </label>
        </div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="gender" value="Female">
					<label class="form-check-label">
						Female
					</label>
				</div>
				</div>
			</div>
			<input class="btn btn-primary" type="submit" name="submit" value="Save">
		</form>
	</div>
</div>






<?php include 'imports/footer.php'; ?>
