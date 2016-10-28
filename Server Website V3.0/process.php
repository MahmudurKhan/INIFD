<?php

$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data

// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array

	if (empty($_POST['name']))
		$errors['name'] = 'Name is required.';

    if (empty($_POST['phone']))
        $errors['phone'] = 'Phone is required.';

	if (empty($_POST['email']))
		$errors['email'] = 'Email is required.';

	if ($_POST['dreamcareer']=="-- Select --")
		$errors['dreamcareer'] = 'Dream Career is required.';

// return a response ===========================================================

	// if there are any errors in our errors array, return a success boolean of false
	if ( ! empty($errors)) {

		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {

		// if there are no errors process our form, then return a message

		// DO ALL YOUR FORM PROCESSING HERE
		// THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)
        $msg = "The Following Person Needs Assistant.\n\nName: ".$_POST['name']."\nPhone: ".$_POST['phone']."\nEmail: ".$_POST['email']."\nDream Career: ".$_POST['dreamcareer'];

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
        mail("info@gesinifdbd.org","Free Consultation In Website",$msg);


		// show a message of success and provide a true success variable
		$data['success'] = true;
		$data['message'] = 'Thank You! <br>A representative will be in contact with you soon.';
	}

	// return all our data to an AJAX call
	echo json_encode($data);