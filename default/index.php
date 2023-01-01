<?php

require 'header.php';
include 'config.php';

if (isset($_GET['id'])) {
  $_SESSION["id"] = $_GET['id'];
  $_SESSION["ap"] = $_GET['ap'];
  $_SESSION["user_type"] = "new";
}

//# Checking DB to see if user exists or not.
//$result = mysqli_query($con, "SELECT * FROM `$table_name` WHERE mac='$_SESSION[id]'");
//
//if ($result->num_rows >= 1) {
//  $row = mysqli_fetch_array($result);
//
//  mysqli_close($con);
//
//  $_SESSION["user_type"] = "repeat";
//  header("Location: welcome.php");
//} else {
//  mysqli_close($con);
//}

$code_error = 0;

if (isset($_POST['accept'])) {
  $access_code = $_SERVER['ACCESS_CODE'];
  if ($_POST['code'] === $access_code) {
    header('Location: connect.php');
  } else {
    $code_error = 1;
  }
}

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>
      <?php echo htmlspecialchars($business_name); ?> WiFi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="../assets/styles/bulma.min.css"/>
    <link rel="stylesheet" href="../vendor/fortawesome/font-awesome/css/all.css"/>
    <link rel="icon" type="image/png" href="../assets/images/favicomatic/favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="../assets/images/favicomatic/favicon-16x16.png" sizes="16x16"/>
    <link rel="stylesheet" href="../assets/styles/style.css"/>
</head>

<body>
<div class="page">

    <div class="head">
        <br>
        <figure id="logo">
            <img src="../assets/images/logo.png">
        </figure>
    </div>

    <div class="main">
        <section class="section">
            <div class="container">
                <div id="login" class="content is-size-5 has-text-centered has-text-weight-bold">Free Internet Access
                </div>
                <div id="login" class="content is-size-6 has-text-centered">
                    Please review these <a href="policy.php">Terms and Conditions</a>
                </div>
                <div id="login" class="content is-size-6 has-text-centered">
                    Enter your access code and click "I Accept"
                </div>
                <br>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="field">
                        <div class="control has-icons-left">
                            <input class="input" type="text" name="code" placeholder="Code"
                                   required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                    </div>

                    <?php
                    if ($code_error == 1) { ?>
                    <div class="content is-size-6 has-text-centered has-text-danger">
                        Sorry! The code you entered is incorrect
                    </div>
                    <?php
                    }
                    ?>

                    <div class="buttons is-centered">
                        <input class="button is-link" type="submit" name="accept" value="I Accept">
                    </div>
                </form>
                <br>
                <div class="content is-size-6 has-text-centered">
                    For Technical Support
                    <br>
                    Call 800-650-4373
                </div>
            </div>
            <br>
        </section>
    </div>
</div>
</body>
</html>
