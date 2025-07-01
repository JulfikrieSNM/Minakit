<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit1']))
{
    $fname = $_POST['fname'];
    $email = $_POST['email'];    
    $mobile = $_POST['mobileno'];
    $subject = $_POST['subject'];    
    $description = $_POST['description'];

    $sql = "INSERT INTO tblenquiry (FullName, EmailId, MobileNumber, Subject, Description) VALUES (:fname, :email, :mobile, :subject, :description)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->bindParam(':subject', $subject, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();

    if($lastInsertId)
    {
        $msg = "Enquiry Successfully Submitted";
    }
    else 
    {
        $error = "Something went wrong. Please try again";
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Minakit Retreat</title>
    <link rel="icon" type="image/png" href="images/minakit.png" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Tourism Management System In PHP" />
    <script type="application/x-javascript"> 
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
        function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script> new WOW().init(); </script>

    <style>
        body {
            background-size: cover;
            font-family: 'Montserrat', sans-serif;
        }
        .banner-1 {
            background: url(images/banners.png) no-repeat center center fixed;
            background-size: cover;
            min-height: 700px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .privacy {
            padding: 50px 0;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .container h3 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 20px;
            padding: 15px;
            margin-bottom: 15px;
            width: 100%;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 20px;
            padding: 12px 25px;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<!-- top-header -->
<div class="top-header">
    <?php include('includes/header.php'); ?>
</div>

<!-- Banner -->
<div class="banner-1">
    <div class="container">
        <h1 class="wow zoomIn animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Enquiry Form</h1>
    </div>
</div>

<!-- Privacy Section -->
<div class="privacy">
    <div class="container">
        <h3 class="wow fadeInDown animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Submit Your Enquiry</h3>

        <form name="enquiry" method="post">
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
            else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

            <div class="form-group">
                <label for="fname"><b>Full Name</b></label>
                <input type="text" name="fname" class="form-control" id="fname" placeholder="Full Name" required>
            </div>

            <div class="form-group">
                <label for="email"><b>Email</b></label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Valid Email ID" required>
            </div>

            <div class="form-group">
                <label for="mobileno"><b>Mobile No</b></label>
                <input type="text" name="mobileno" class="form-control" id="mobileno" maxlength="10" placeholder="10 Digit Mobile No" required>
            </div>

            <div class="form-group">
                <label for="subject"><b>Subject</b></label>
                <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" required>
            </div>

            <div class="form-group">
                <label for="description"><b>Description</b></label>
                <textarea name="description" class="form-control" rows="6" id="description" placeholder="Description" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" name="submit1" class="btn-primary btn">Submit</button>
            </div>
        </form>
    </div>
</div>

<!-- Footer -->
<?php include('includes/footer.php'); ?>

<!-- Signup Modal -->
<?php include('includes/signup.php'); ?>            

<!-- Signin Modal -->
<?php include('includes/signin.php'); ?>            

<!-- Write Us -->
<?php include('includes/write-us.php'); ?>

</body>
</html>
