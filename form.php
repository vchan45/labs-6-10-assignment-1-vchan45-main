<?php
/*
Author: Victor Chan
Date: November 26, 2023
Purpose: Process a form with PHP
*/

# Initialize variables, without this you will get an error
$fName = $fNameErr =
$lName = $lNameErr =
$email = $emailErr =
$phone = $phoneErr =
$dob = $dobErr =
$password = $passwordErr =
$province =
$msg = "";
$valid = FALSE;

# If the form was sent using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	# Validating a form is complicated, this is a very simplified example
	# If first name is blank
	if ( empty($_POST["fName"]) ) {

		# Store the error message for first name in a variable
		$fNameErr = "* First Name cannot be empty";
		
		# Set valid to FALSE
		$valid = FALSE;
		
	# Else if last name is blank
	} elseif ( empty($_POST["lName"]) ) {
		
		# Store the error message for last name in a variable
		$lNameErr = "* Last Name cannot be empty";
		
		# Set valid to FALSE
		$valid = FALSE;
	
	# Else if email is blank
	} elseif ( empty($_POST["email"]) ) {
		
		# Store the error message for email in a variable
		$emailErr = "* Email cannot be empty";

		# Set valid to FALSE
		$valid = FALSE;
	
	# Else if phone is blank
	} elseif ( empty($_POST["phone"]) ) {

		# Store the error message for phone number in a variable
		$phoneErr = "* Phone number cannot be empty";
		
		# Set valid to FALSE
		$valid = FALSE;
	
	# Else, it is valid
	} else {
		
		# Set valid to TRUE
		$valid = TRUE;
		
	# If the input is valid, process it

	        # Retrieve the input from the form and store it in appropriate variables
		$fName = $_POST['fName'];
		$lName = $_POST['lName'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$province = $_POST['province'];
		$dob = $_POST['dob'];

        	# Remove any embedded, leading and trailing blanks
	        $fName = trim(ucfirst(str_replace(" ","",$fName)));
        	$lName = trim(ucfirst(str_replace(" ","",$lName)));
	        $email = trim(str_replace(" ","",$email));
        	$phone = trim(str_replace(" ","",$phone));

		# Join first and last name together, storing the result in $fullName
		$fullName = $fName . " " . $lName;
		
		# Create a message using the $fullName variable
		$msg = "Hello " . $fullName . "<br> Your email is: $email <br>" . "You were born on: $dob <br>" . "Your phone is: $phone <br>" . "You live in $province <br>" . "This form has been processed using php.";

		# Normally at this point you would connect to a database and insert the data, but that is beyond the scope of this course
		}
	}
?>
<!-- HTML goes here -->
<!DOCTYPE html>
<html>
    <head>
        <title>Form</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Victor Chan" content="Linus Torvalds">
        <link rel="stylesheet" type="text/css" 
            href="style.css">
        <!--Author's name is Victor Chan and student number is 301307184-->
    </head>
    <body>
	<nav role="menubar">
            <ul role="menu">
                <li role="menuitem"><a href="index.html">Home</a></li>
                <li role="menuitem"><a href="about.html">About</a></li>
                <li role="menuitem"><a href="media.html">Media</a></li>
                <li role="menuitem"><a class="active" href="#">Form</a></li>
                <li role="menuitem"><a href="accessibility.html">Accessibility</a></li>
            </ul>
        </nav>
		<main>
			<h1>User Registration</h1>
			<form method="post" action="form.php">
				First Name: <input type="text" name="firstName" value="<?php echo $fName;?>"><span class="error"><?php echo $fNameErr;?></span>
				<br>
				Last Name: <input type="text" name="lastName" value="<?php echo $lName;?>"><span class="error"><?php echo $lNameErr;?></span>
				<br>
				Email: <input type="email" name="email" value="<?php echo $email;?>"><span class="error"><?php echo $emailErr;?></span>
				<br>
				Password: <input type="password" name="password" value="<?php echo $password;?>"><span class="error"><?php echo $passwordErr;?></span>
				<br>
				Date of Birth: <input type="date" name="dateOfBirth" value="<?php echo $dob;?>"><span class="error"><?php echo $dobErr;?></span>
				<br>
				Phone Number: <input type="tel" name="phoneNumber" value="<?php echo $phone;?>"><span class="error"><?php echo $phoneErr;?></span>
				<br>
				<select name="province">
					<option value="Alberta">Alberta</option>
					<option value="British Columbia">British Columbia</option>
					<option value="Manitoba">Manitoba</option>
					<option value="New Brunswick">New Brunswick</option>
					<option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
					<option value="Nortwest Territories">Nortwest Territories</option>
					<option value="Nova Scotia">Nova Scotia</option>
					<option value="Nunavut">Nunavut</option>
					<option value="Ontario">Ontario</option>
					<option value="Prince Edward Island">Prince Edward Island</option>
					<option value="Quebec">Quebec</option>
					<option value="Saskatchewan">Saskatchewan</option>
					<option value="Yukon">Yukon</option>
				</select>
				<br>
				<input type="submit" name="submit" value="Submit"><input type="reset" name="clear" value="Clear">
			</form>
			<?php echo $msg; ?>
		</main>
    	</body>
</html>