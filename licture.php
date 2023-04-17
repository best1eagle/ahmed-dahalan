
<!-- name : ahmed dahalan

id: 1301201663 -->

<?php

$host='localhost';
$username='root';
$passwordMYsql='';
$dbname='HW1';

$conn1=mysqli_connect($host,$username,$passwordMYsql,$dbname);

if($conn1->connect_error){
	echo 'error';
}else{
	echo 'done';
}


$name='';
$email='';
$password='';
$gender='';
$rememberme='';
$image = '';
$errors=[];



//name
if(!empty($_POST['name'])){
	$name=htmlspecialchars($_POST['name']);
}
else{

	$errors[]="name field can not be empty";
}





//email
if(!empty($_POST['email'])){
	$email=htmlspecialchars($_POST['email']);

	if (filter_var($email, FILTER_VALIDATE_EMAIL) !==$email) {
		$errors[]="email is not valid";
	}
}
else{

	$errors[]="email field can not be empty";
}





// password
if (!empty($_POST['password'])) {
    $password = $_POST['password'];
    $min_length = 6;

    if (strlen($password) < $min_length) {
        $errors[] = "password must be above 6 characters";
    } else {
        // Hash the password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
    }
} else {
    $errors[] = "password field can not be empty";
}





//gender

$gender = htmlspecialchars($_POST['gender']);

if ($gender !== 'male' && $gender !== 'female') {
    $errors[]="choose a gender ";
}


//remember me

if(!empty($_POST['rememberme'])){
	$rememberme=htmlspecialchars($_POST['rememberme']);

	if($rememberme!=="true"){

		$errors[]="the box selected is not on the list";
	}

}




// image
if(!empty($_FILES['image'])){
    $image = $_FILES['image'];
    $fileError = $_FILES['image']['error'];
    $filename = $_FILES['image']['name'];
    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError !== 0){
            $errors[] = "There is an error in uploading this file";
        } else {
            $fileDestination = 'uploads/' . $filename;
            move_uploaded_file($_FILES['image']['tmp_name'], $fileDestination);
        }
    } else {
        $errors[] = "Invalid file type";
    }
} else {
    $errors[] = "The image field is required";
}




//insert with a prepared statment

$stmt = $conn1->prepare("INSERT INTO account (name, email, password, gender, image) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $password_hash, $gender, $fileDestination);
if($stmt->execute()){
	echo'add successfuly';
}else{
	echo 'error'. connection_error($conn1);
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">


	<form id="signup-form" method="post"  enctype='multipart/form-data'>
			<h1 >sign up</h1>
			<div>
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" required>
			</div>

			<div>
				<label for="email">Email:</label>
				<input type="email" id="email" name="email" required>
			</div>

			<div>
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" minlength="6" required>
			</div>

			<div>
				<label for="gender">Gender:</label>

				<select id="gender" name="gender" required>
					<option value="">Select gender</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
			</div>

			<div>
				<label for="rememberme">Remember Me:</label>
				<input type="checkbox" id="rememberme" name="rememberme" value="true">
			</div>

			<div>
				<label for="image">Image upload:</label>
				<input type="file" id="image" name="image" accept="image/*"  required>
			</div>

			<button type="submit" name="submit">Sign Up</button>
	</form>
</div>
	
</body>
</html>







