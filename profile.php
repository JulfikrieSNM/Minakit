<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{   
    header('location:index.php');
}
else{
    if(isset($_POST['submit6']))
    {
        $name = $_POST['name'];
        $mobileno = $_POST['mobileno'];
        $email = $_SESSION['login'];

        $sql = "UPDATE tblusers SET FullName=:name, MobileNumber=:mobileno WHERE EmailId=:email";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $msg = "Profile Updated Successfully";
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Minakit Retreat </title>
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
        background: url(images/banners.png)no-repeat center center fixed;;
    background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    -moz-background-size: cover;
    min-height: 700px;
     justify-content: center; /* Center content horizontally */
    align-items: center; /* Center content vertically */
    text-align: center; /* Center text inside the banner */

    }
        .top-header {
            background: #fff;
            padding: 10px 0;
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

        p {
            font-size: 16px;
            color: #333;
        }

        .text-center a {
            color: #007bff;
            font-size: 14px;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        .form-group label {
            font-weight: 600;
        }
       /* General container styling */
    .container {
        max-width: 1000px;
        margin: 0 auto;
    }

     .container h3 {
    text-align: center;
    font-weight: 600;
    margin-bottom: 20px;
    color: #333; /* Text color */
}
.form-control {
    border-radius: 20px;
    padding: 15px;
    margin-bottom: 15px;
    width: 100%; /* Full width of the container */
}
button.btn-primary {
    width: 100%; /* Full width of the container */
    background-color: #333;
    color: white;
    border-radius: 20px; /* Rounded corners */
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
        <h1 class="wow zoomIn animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Minakit Retreat</h1>
    </div>
</div>

<!-- Privacy Section -->
<div class="privacy">
    <div class="container">
        <h3 class="wow fadeInDown animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">My Profile!!</h3>

        <form name="chngpwd" method="post">
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
            else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

            <?php 
                $useremail = $_SESSION['login'];
                $sql = "SELECT * from tblusers where EmailId=:useremail";
                $query = $dbh->prepare($sql);
                $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0)
                {
                    foreach($results as $result)
                    {   
            ?>
<div class= "container">
            <div class="form-group">
                <label for="name"><b>Name</b></label>
                <input type="text" name="name" value="<?php echo htmlentities($result->FullName);?>" class="form-control" id="name" required>
            </div>

            <div class="form-group">
                <label for="mobileno"><b>Mobile Number</b></label>
                <input type="text" class="form-control" name="mobileno" maxlength="10" value="<?php echo htmlentities($result->MobileNumber);?>" id="mobileno" required>
            </div>

            <div class="form-group">
                <label for="email"><b>Email Id</b></label>
                <input type="email" class="form-control" name="email" value="<?php echo htmlentities($result->EmailId);?>" id="email" readonly>
            </div>

            <div class="form-group">
                <label><b>Last Updation Date :</b></label>
                <?php echo htmlentities($result->UpdationDate);?>
            </div>

            <div class="form-group">
                <label><b>Reg Date :</b></label>
                <?php echo htmlentities($result->RegDate);?>
            </div>

            <?php }} ?>

            <div class="form-group">
                <button type="submit" name="submit6" class="btn-primary btn">Update</button>
            </div>
        </form>
    </div>
</div>
</form>

<!-- Footer -->
<?php include('includes/footer.php');?>

<!-- Signup Modal -->
<?php include('includes/signup.php');?>            

<!-- Signin Modal -->
<?php include('includes/signin.php');?>            

<!-- Write Us -->
<?php include('includes/write-us.php');?>

</body>
</html>
<?php } ?>
