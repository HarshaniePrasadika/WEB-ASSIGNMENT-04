<? php

$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Name validation and sanitization
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and spaces are allowed";
        }
    }

    // Email validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Message input sanitization
    if (empty($_POST["mess"])) {
        $messageErr = "Message is required";
    } else {
        $message = test_input($_POST["mess"]);
        // Sanitize the message to remove any potential malicious code or HTML tags
        $message = strip_tags($message);
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form - Response</title>
</head>
<body>
    <h2>Contact Form Response</h2>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($emailErr) && empty($messageErr)) { ?>
        <p>Thank you for your message!</p>
        <p>Name: <?php echo $name; ?></p>
        <p>Email: <?php echo $email; ?></p>
        <p>Message: <?php echo $message; ?></p>
    <?php } else { ?>
        <p>Please fill out the form correctly:</p>
        <ul>
            <li><?php echo $nameErr; ?></li>
            <li><?php echo $emailErr; ?></li>
            <li><?php echo $messageErr; ?></li>
        </ul>
        <p><a href="Contact.html">Go back to the form</a></p>
    <?php } ?>
</body>
</html>


