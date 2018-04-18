<?php
	
	include './system/init.php';

	session_start();
	$user = $_SESSION['username'];

	echo $user;

$file = $_FILES['image']['tmp_name'];

if(isset($file)){
	
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name = addslashes($_FILES['image']['name']);
	$image_size = getimagesize($_FILES['image']['tmp_name']);

	if($image_size==TRUE){
			if($update_image = mysqli_query($db,"UPDATE account set image = '$image' WHERE username = '".$user."'"))
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
else{
	echo "please select image";
}

	
if($user){
		if($_POST['submit'])
		{
			$oldpassword = $_POST['oldpassword'];
			$newpassword = $_POST['newpassword'];
			$repeatnewpassword = $_POST['repeatnewpassword'];
			$qry_password = " SELECT * FROM account WHERE username = '".$user."'" ;

			$qry_rs = mysqli_query($db , $qry_password);
			
			
			$row = mysqli_fetch_array($qry_rs);
			
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
			
			
			
			$DOB = $_POST['dob'];
			echo $DOB;
			$update_dob  = mysqli_query($db , " UPDATE account SET DOB = '".$DOB."' WHERE username = '".$user."'");
			
			
			$phone_num = $_POST['num'];
			
			$update_num = mysqli_query($db , "UPDATE account SET phone_num = $phone_num WHERE username = '".$user."'");

			
			
			$type_of = $_POST['gender'];
			
			$update_gender = mysqli_query($db , "UPDATE account SET gender = '".$type_of."' WHERE username = '".$user."'");
			}

}
else{
	echo"error ";
}

?>

<!DOCTYPE html>
<html>
<head>
<style>
.edit {
    padding: 50px;
    font-size: 20px;
    text-align: center;
   
}
</style>
</head>
<body>

<div class="edit">

		<?echo '<h3>your image :</h3><img src="data:image;base64,'.base64_encode($row['image']).'"/>';?>

<form action="editAcc.php" method="POST" enctype="multipart/form-data">

Your Image : <input type = "file" name="image">
<br>
Your used Password : <input type="text" placeholder=" enter your used password "  name="oldpassword">
<br>
Your new Password : <input type="text" placeholder=" enter your new password "  name="newpassword">
<br>
Confirm new Password : <input type="text" placeholder=" enter your new password again "  name="repeatnewpassword">
<br>


Date of Birth : <input type="date" name="dob">
<br>

Your used Email : <input type="email" placeholder = "<?= $row['email'] ?>"  name="oldemail">

<br>
Your new Email : <input type="email" value="" name="newemail">

<br>
Confirm new Email : <input type="email" value="" name="repeatnewemail">

<br>

Phone Number : <input type="number" placeholder="<?  $row['phone_num'] ?>" value=""  name="num">

<br>

 <input type="radio" name="gender" value="Male">male

<br>

<input type="radio" name="gender" value="Female">Female

<br>

<input type="submit" name="submit" value="Save">

</form>
</div>
</body>
</html>