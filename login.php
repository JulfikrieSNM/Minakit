<?php
session_start();
include('includes/config.php');

if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT EmailId, Password FROM tblusers WHERE EmailId=:email and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    
    if ($query->rowCount() > 0) {
        $_SESSION['login'] = $_POST['email'];
        echo "<script type='text/javascript'> document.location = 'package-list.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../images/minakit.png" sizes="16x16">
    <title>MINAKIT RETREAT | USER SIGN IN</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet'>
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet'>

    <style>
        body {
            background color: blue;
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
            background-color:black;
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
                <h1 class="text-center">SIGN IN | MINAKIT </h1>
                <form method="POST">
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button type="submit" name="signin" class="btn btn-primary">LOGIN</button>
                </form>

                <hr>
                <div class="text-center">
                    <a href="forgot-password.php">Forgot password?</a>
                </div>
                <div class="text-center mt-3">
                    <a href="index.php">Back to Homepage</a>
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
