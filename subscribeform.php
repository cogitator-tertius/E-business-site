<html>
	<head>
		<style>
		.errortext {color: red}
	</style>
	</head>
<body>
	<?php
	// start by defining the variables to be used in this function for data validation
	$errorFName = $errorLName = $errorEmail = $errorPhone = $errorWebsite = "";
	$name = $Lname = $Email = $Phone = $Website = "";
	// Create a static variable to count visitors to the page (put in function)
	static $visNumber = 0;
	//Create another static variable to count submissions on the page (move to fn)
	static $subCounter = 0;
	// create a time and date variable to display on the page.
	$timedate = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		++$subCounter;
		if (empty($_POST["firstName"])) {
			$errorFName = "First name is required";
		} 
		else {
			$name = test_input($_POST["firstName"]);
			// check if name only contains letters and whitespace
		if (!preg_match("/^[-'\w\s]+$/",$name)) {
			$errorFName = "Only letters, spaces, hyphens and apostrophes allowed."; 
	}
	}
	}

	if (empty($_POST["lastName"])) {
		$errorLName = "Last name is required";
	} 
	else {
		$Lname = test_input($_POST["lastName"]);
		// check if name only contains letters and whitespace
	if (!preg_match("/^[-'\w\s]+$/",$Lname)) {
		$errorLName = "Only letters, spaces, hyphens and apostrophes allowed."; 
	}
	}

  
    if (empty($_POST["eMail"])) {
        $errorEmail = "Email is required";
    } 
    else {
        $email = test_input($_POST["eMail"]);
        // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail = "Invalid email format"; 
	}
	}
    
    if (empty($_POST["website"])) {
        $website = "";
    }
    else {
        $website = test_input($_POST["website"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
		$errorWebsite = "Invalid URL"; 
	}
	}

	if (empty($_POST["phoneNumber"])) {
        $errorPhone = "";
    }
    else {
		$Phone = test_input($_POST["phoneNumber"]);
		// check if phone number has the right amount of digits
		preg_replace("/[^0-9]/", "", $Phone);
		$phonecheck = strlen($Phone);
    if (!$phonecheck = 7 || 10 || 11){
        $errorPhone = "Invalid number of digits in phone number. US numbers only please.";
    }
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	} 
	?>
    <table>
        <tr>
            <td class="headerfooter" colspan="5"><img src="../images/logo.png" alt="This Man Loves Games banner"/></td>
        </tr>
        <tr class="menubg">
            <td><a href="../index.html">Home</a></td>
            <td><a href="../reviews/newreview.html">Newest Review</a></td>
            <td><a href="../reviews/words.html">Popular</a></td>
            <td><a href="store.html">Store</a></td>
            <td><a href="subscribeform.html">Contact</a></td>
        </tr>
        <tr>
            <td colspan="3">
            <h2>Sign up for our newsletter and more!</h2><br />
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <fieldset>
                        <legend>Please enter your information below</legend>
                        <table>
							<tr>
							</tr>
                            <tr>
                                <td >
                                    <select name="salut.">
                                    <option>&nbsp;</option>
                                    <option>Mr.</option>
                                    <option>Mrs.</option>
                                    <option>Dr.</option>
                                    <option>Hon.</option>
                                    <option>None</option>
                                    </select>
									<p class="errortext">* Required Field</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    First: <input type="text" name="firstName" class="namefields" required/>
									<span class="errortext"> * <?php echo $errorFName ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Last: <input type="text" name="lastName" class="namefields" required/>
									<span class="errortext"> * <?php echo $errorLName ?></span>
                                 </td>
                            </tr>
                            <tr>
                                <td>
                                    E-mail: <input type="text" name="eMail" class="namefields" required/>
									<span class="errortext"> * <?php echo $errorEmail ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Phone: <input type="text" name="phoneNumber" class="namefields" />
									<span class="errortext"><?php echo $errorPhone ?></span>
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Website: <input type="text" name="website" class="namefields" />
									<span class="errortext"> <?php echo $errorWebsite ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="Submit"/>
                                </td>
                                <td>
                                    <input type="reset" value="Reset Form"/>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $subCounter ?> users have submitted their data so far. </td>
                            </tr>
                            
                        </table>
                    </fieldset>
                </form>
            </td>
            <td colspan="2">
                <h3>Recent articles</h3>
                <ul>
                    <li>Title 1</li>
                    <li>Title 2</li>
                    <li>Title 3</li>
                    <li>Title 4</li>
                    <li>Title 5</li>
                </ul>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="headerfooter">
                <h4>This Man Loves Games &copy;  2018 TMLG, LLC</h4>
            </td>
        </tr>
	</table>
	</body>
</html>