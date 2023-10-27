<?php
/*
Author:
Date:
Purpose: Process a form with PHP
*/

# Initialize variables, without this you will get an error

# If the form was sent using the POST method

	# Validating a form is complicated, this is a very simplified example
	# If first name is blank

		# Store the error message for first name in a variable
		
		# Set valid to FALSE
		
	# Else if last name is blank
		
		# Store the error message for last name in a variable
		
		# Set valid to FALSE
	
	# Else if email is blank
		
		# Store the error message for email in a variable

		# Set valid to FALSE
	
	# Else if phone is blank

		# Store the error message for phone number in a variable
		
		# Set valid to FALSE
	
	# Else, it is valid	
		
		# Set valid to TRUE
		
	# If the input is valid, process it

	        # Retrieve the input from the form and store it in appropriate variables

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
	

?>
<!-- HTML goes here -->
