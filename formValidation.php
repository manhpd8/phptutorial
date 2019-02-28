
<?php
	$name = $email = $website = $gender = $comment="";
	$nameerr = $emailerr = $websiteerr = $gendererr = "";
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		if(empty($_POST['name'])){
			$nameerr = '<span style="color: red">Name is required</span>';
		}else{
			$name = check_input($_POST['name']);
		}

		if(empty($_POST['email'])){
			$emailerr = "Email is required";
		}else{
			$email = check_input($_POST['email']);
		}

		if(empty($_POST['website'])){
			$websiteerr = "website is required";
		}else{
			$website = check_input($_POST['website']);
		}

		if(isset($comment)){
			$comment = $_POST['comment'];
		}

		if(empty($_POST['gender'])){
			$gendererr = "gender is required";
		}else{
			$gender = check_input($_POST['gender']);
		}
	}
	function check_input($str){
		$str = trim($str);
		$str = stripslashes($str);
  		$str = htmlspecialchars($str);
  		return $str;
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		Name: <input type="text" name="name" value="<?php echo $name ?>"><?php echo $nameerr; ?><br>
		Email: <input type="text" name="email" value="<?php echo $email ?>"><?php echo $emailerr; ?><br>
		Website: <input type="text" name="website" value="<?php echo $website ?>"><?php echo $websiteerr; ?><br>
		Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment ?></textarea><br>
		<input type="radio" name="gender" value="female"
			<?php if (isset($gender) && $gender=="female") echo "checked";?> >female
		<input type="radio" name="gender" value="male"
			<?php if (isset($gender) && $gender=="male") echo "checked";?> >male
		<input type="radio" name="gender" value="other"
			<?php if (isset($gender) && $gender=="other") echo "checked";?> >other
		<?php echo $gendererr; ?><br>
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>
