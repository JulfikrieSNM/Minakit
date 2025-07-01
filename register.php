<?php
error_reporting(0);
session_start();
include('includes/config.php');
include('includes/functions.php'); // add this

if (isset($_POST['submit'])) {
    $lastInsertId = registerUser($dbh, $_POST['fname'], $_POST['mobilenumber'], $_POST['email'], $_POST['password']);
    
    if ($lastInsertId) {
        $_SESSION['msg'] = "You are successfully registered. Now you can login.";
    } else {
        $_SESSION['msg'] = "Something went wrong. Please try again.";
    }
    header('location:thankyou.php');
}



if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mnumber = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $sql = "INSERT INTO tblusers (FullName, MobileNumber, EmailId, Password) VALUES (:fname, :mnumber, :email, :password)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':mnumber', $mnumber, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    
    $lastInsertId = $dbh->lastInsertId();
    
    if ($lastInsertId) {
        $_SESSION['msg'] = "You are successfully registered. Now you can login.";
        header('location:thankyou.php');
    } else {
        $_SESSION['msg'] = "Something went wrong. Please try again.";
        header('location:thankyou.php');
    }
}
?>

<!-- Javascript for checking email availability -->
<script>
function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_availability.php",
        data: 'emailid=' + $("#email").val(),
        type: "POST",
        success: function(data) {
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
        },
        error: function () {}
    });
}
</script>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../images/minakit.png" sizes="16x16">
    <title>MINAKIT RETREAT | SIGN UP</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet'>
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet'>

    <style>
        body {
            background: url('../images/banner.png') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Montserrat', sans-serif;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.8);
        }

        .card-body {
            padding: 30px;
        }

        .card-body h1 {
            color: #333;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 20px;
            padding: 15px;
        }

        .btn-primary {
            background-color: black;
            border-color: black;
            border-radius: 20px;
            padding: 10px 20px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: black;
            border-color: black;
        }

        .text-center a {
            color: #007bff;
            font-size: 14px;
        }

        .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">MINAKIT RETREAT SIGN UP</h1>
                <form method="POST" name="signup">
                    <div class="form-group">
                        <input type="text" name="fname" placeholder="Full Name" class="form-control" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="mobilenumber" placeholder="Mobile number" class="form-control" maxlength="10" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Email id" class="form-control" onBlur="checkAvailability()" required autocomplete="off">
                        <span id="user-availability-status" style="font-size:12px;"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">CREATE ACCOUNT</button>
                </form>

                <hr>
                <div class="text-center">
                    <a href="login.php">Already have an account? Sign In</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
