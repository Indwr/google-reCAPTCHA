<!DOCTYPE html>
<html lang="en">

<head>
    <title>Google reCAPTCHA</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form'])) {
        $recaptchaResponse = $_POST['g-recaptcha-response'];
        $secretKey = ''; // Replace with your actual secret key

        // Verify the reCAPTCHA response with Google
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $response = file_get_contents($url . '?secret=' . $secretKey . '&response=' . $recaptchaResponse);
        $responseKeys = json_decode($response, true);

        if ($responseKeys['success']) {
            // reCAPTCHA validated
            echo "Form submitted successfully!";
        } else {
            // reCAPTCHA failed
            echo "reCAPTCHA verification failed. Please try again.";
        }
    }
    ?>
    <form action="/" method="post">
        <div class="g-recaptcha" data-sitekey="Enter Your site key"></div>
        <button name="form" type="submit">Submit</button>
    </form>
</body>

</html>