<?php
error_reporting(0);
if(isset($_POST['submit']))
{
$issue=$_POST['issue'];
$description=$_POST['description'];
$email=$_SESSION['login'];
$sql="INSERT INTO  tblissues(UserEmail,Issue,Description) VALUES(:email,:issue,:description)";
$query = $dbh->prepare($sql);
$query->bindParam(':issue',$issue,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Info successfully submited ";
echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
}
else 
{
$_SESSION['msg']="Something went wrong. Please try again.";
echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
}
}
?>	
<style>
    .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #dd3d36;
        box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
    .succWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #5cb85c;
        box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
    /* Same CSS as the My Profile page */
    .banner-1 {
        background: url(images/banners.png)no-repeat no-repeat center center fixed;
    background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    -moz-background-size: cover;
    min-height: 500px;


    }
    .privacy {
        padding: 40px 0;
    }
    .privacy h3 {
        font-size: 30px;
        text-align: center;
        font-family: Arial, sans-serif;
        margin-bottom: 30px;
        color: #333;
    }
    .form-control {
        width: 350px;
        margin-bottom: 15px;
    }
    button.btn-primary {
        width: 350px;
        background-color: #333;
        color: white;
    }
    button.btn-primary:hover {
        background-color: #555;
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
	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
							<section>
							<form name="help" method="post">
								<div class="modal-body modal-spa">
									<div class="writ">
										<h4>HOW CAN WE HELP YOU</h4>
											<ul>
												
												<li class="na-me">
													<select id="country" name="issue" class="frm-field required sect" required="">
														<option value="">Select Issue</option> 		
														<option value="Booking Issues">Booking Issues</option>
														<option value="Cancellation"> Cancellation</option>
														<option value="Refund">Refund</option>
														<option value="Other">Other</option>														
													</select>
												</li>
											
												<li class="descrip">
									<input class="special" type="text" placeholder="description"  name="description" required="">
												</li>
													<div class="clearfix"></div>
											</ul>
											<div class="sub-bn">
												<form>
													<button type="submit" name="submit" class="subbtn">Submit</button>
												</form>
											</div>
									</div>
								</div>
								</form>
							</section>
					</div>
				</div>
			</div>