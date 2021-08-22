<?php
    include_once('app/register.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risky jobs Registration</title>

    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/register.css">
</head>
<body>
    <header>
        <div class="container">
            <img src="asset/img/logo.jpg" alt="" srcset="" width="250px">
            <p>Danger! Your dream job is out there. Do you have the guts to go find it?</p>
        </div>
       
    </header>

    <main>
    <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-10">
                    <h4>Risky Jobs - Registration</h4>
                    <p>Register with Risky jobs and post your resume</p>
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                        <div class="flex">
                            <label for="first_name">First Name:</label>
                            <input type="text" name="first_name" id="first_name" value="<?php if(!empty($first_name)) echo $first_name?>">
                        </div>
                         <?php if(isset($errors['firstname'])) echo $errors['firstname'] ?>
                        <div class="flex">
                            <label for="last_name">Last Name:</label>
                            <input type="text" name="last_name" id="last_name" value="<?php if(!empty($last_name)) echo $last_name?>">
                        </div>
                        <?php if(isset($errors['lastname'])) echo $errors['lastname'] ?>
                        <div class="d-flex">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" value="<?php if(!empty($email)) echo $email?>">
                        </div>
                        <?php if(isset($errors['email'])) echo $errors['email'] ?>
                        <div class="d-flex">
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" id="phone" value="<?php if(!empty($phone)) echo $phone?>">
                        </div>
                        <?php if(isset($errors['phone'])) echo $errors['phone'] ?>
                        <div class="d-flex">
                            <label for="desired_job">Desired Job:</label>
                            <input type="text" name="desired_job" id="desired_job" value="<?php if(!empty($desired_job)) echo $desired_job?>">
                        </div>
                        <?php if(isset($errors['desiredjob'])) echo $errors['desiredjob'] ?>
                        <div class="d-flex">
                            <label for="resume">Paste your resume here:</label>
                            <textarea name="resume" id="resume" cols="30" rows="5">
                                <?php if(!empty($resume)) echo $resume?>
                            </textarea>
                            <?php if(isset($errors['resume'])) echo $errors['resume'] ?>
                        </div> 
                        <input type="submit" value="Submit" name="submit">
                    </form>
                </div>
            </div>
    </div>
    </main>
</body>
</html>