<?php
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get POST data
        $name = isset($_POST['fullname']) ? strip_tags(trim($_POST['fullname'])) : ''; // Fixed the input name
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $message = isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : '';

        // Validate form fields
        if (empty($name)) {
            $errors[] = 'Name is empty';
        }

        if (empty($email)) {
            $errors[] = 'Email is empty';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email is invalid';
        }

        if (empty($message)) {
            $errors[] = 'Message is empty';
        }

        // If no errors, send email
        if (empty($errors)) {
            // Recipient email address (replace with your own)
            $recipient = "hiluaa7@gmail.com";

            // Additional headers
            $headers = "From: $name <$email>\r\n";
            $headers .= "Reply-To: $email\r\n"; // To allow replies

            // Send email
            if (mail($recipient, "Contact Form Submission", $message, $headers)) {
                echo "<p>Email sent successfully!</p>";
            } else {
                echo "<p>Failed to send email. Please try again later.</p>";
            }
        } else {
            // Display errors
            echo "<div class='error-messages'>The form contains the following errors:<br>";
            foreach ($errors as $error) {
                echo "- $error<br>";
            }
            echo "</div>";
        }
    } else {
        // Not a POST request, display a 403 forbidden error
        header("HTTP/1.1 403 Forbidden");
        echo "<p>You are not allowed to access this page.</p>";
        exit();
    }
    ?>