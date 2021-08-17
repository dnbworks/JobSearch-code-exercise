<?php
    include_once('app/search.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>risky jobs</title>

    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
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
                    <h4>Risky Jobs - search</h4>
                    <p>Find your risky job:</p>
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
                        <input type="text" name="search" id="search">
                        <input type="submit" value="Submit" name="submit">
                    </form>

                    <?php
                        if(isset($rowcount)){
                            if($rowcount > 0){
                    ?>
                    <table>
                        <tr>
                            <thead>
                                <th>Job Title</th>
                                <th>Description</th>
                                <th>State</th>
                                <th>Date Posted</th>
                            </thead>
                        </tr>
                    
                    <?php
                                foreach($results as $result ){
                    ?>       
                    <tr>
                        <td><?php echo $result['title'] ?></td>
                        <td><?php echo $result['description'] ?></td>
                        <td><?php echo $result['state'] ?></td>
                        <td><?php echo $result['date_post'] ?></td>
                    </tr>
                    <?php
                                }
                    
                            } else {
                                echo 'no found'; 
                            }
                        }
                        
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>