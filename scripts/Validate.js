// Validation for forms that appear on the website
// Wll return errors if the fields do not validate

function formValidate()
{
    // Creates an object from the contact form
    // Creates new variables from all the input fields
    // Sets the default for the variable that will pass/fail
    
    var contactFormObj = document.getElementById("ContactForm");
    var firstName = contactFormObj.firstName.value;
    var lastName = contactFormObj.lastName.value;
    var eMail = contactFormObj.eMail.value;
    var phoneNumber = contactFormObj.phoneNumber.value;
    var allvalid = true;
    
    // Checks each field for the appropriate data.
    // If the field comes back as truthful it is failed
    // and the validation variable is set to false.
    // The later functions will return true if the first
    // charcter that matches is at the 0 index
    // and false if they fail to satisfy the search criteria.
    
    if (!validateName(firstName))
    {
        alert("Error: Please enter a valid First Name.");
        allvalid=false;
    }
    
    if (!validateName(lastName))
    {
        alert("Error: Please enter a valid Last Name.");
        allvalid=false;
    }
    
    if (!validatePhone(phoneNumber))
    {
        alert("Error: Please enter a valid phone number.");
        allvalid=false;
    }
    
    if (!validateeMail(eMail))
    {
        alert("Error: Please enter a valid E-Mail address");
        allvalid=false;
    }
    
    // Gives the user a nice message if they fill all forms correctly!
    // Otherwise will create an error message.
    
    if (allvalid)
    {
        alert("Thank you! We will contact you soon.");
        return true
    }
    else
    {
        return false
    }
}


function validateName(name)
{
    // Searches the name, from beginning to end, for any alpha-numeric 
    // character, space, or select special characters. Will return a
    // match for the first occurence of each case to the variable n.
    // This search only checks that there is some kind of input in the field
    // which can easily be accomplished using the required tag in HTML5.
 var n = name.search(/^[-'\w\s]+$/);
    if (n==0)
        return true;
    else
        return false;
     
}

function validatePhone(phone)
{
    // Searches the input field for any digits and returns them in order
    // as the array pnum. If it matches
    // the selected phone number lengths it passes true, otherwise it fails.
    // Eventually this could be used to pull all the digits out into an array
    // and allow them to be parsed into any format that is desired.

    var numb = phone.match(/\d/g);
    var nL = numb.length;
    if (nL == 7 || nL == 10 || nL == 11)
        return true;
    else
        return false;
}

function validateeMail(email)
{
    // Trims any extra empty spaces from the email field.
    // Checks that the email string does not start with a ., that all the
    // characters are legal, that the @ symbol appears followed by one or
    // more subdomains, and that the domain has a period before it, is
    // A-Z, and more than 2 letters. Ignores upper/lower case.

    var etrim = email.trim();
    console.log(etrim);
    var e = etrim.search(/^[^.][\w._%+-]+@(?:[\w._%+-]+\.)+[A-Z]{2,}$/i);
    if (e == 0)
        return true;
    else
        return false;
}