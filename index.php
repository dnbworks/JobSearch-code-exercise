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
                                <th width="20%"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?search=<?php echo $user_search;?>&sort=<?php echo $defaultSort[0] ?>&page=<?php echo $current_page ?>">Job Title</a></th>
                                <th width="50%"><a href="#">Description</a></th>
                                <th width="10%"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?search=<?php echo $user_search;?>&sort=<?php echo $defaultSort[1] ?>&page=<?php echo $current_page ?>">State</a></th>
                                <th width="20%"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?search=<?php echo $user_search;?>&sort=<?php echo $defaultSort[2] ?>&page=<?php echo $current_page ?>">Date Posted</a></th>
                            </thead>
                        </tr>
                    
                    <?php
                                foreach($results as $result ){
                    ?>       
                    <tr>
                        <td width="20%" valign="top"><?php echo $result['title'] ?></td>
                        <td width="50%" valign="top"><?php echo substr($result['description'], 0, 100) ?>...</td>
                        <td width="10%" valign="top"><?php echo $result['state'] ?></td>
                        <td width="20%" valign="top"><?php echo substr($result['date_post'], 0, 10) ?></td>
                    </tr>
                    <?php
                                }
                    
                            } else {
                                echo 'no found'; 
                            }
                        }
                        
                    ?>
                    </table>
                    <div class="pagination">
                        <?php if(isset($pagination_links)) echo $pagination_links?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="asset/js/script.js"></script>
</body>
</html>