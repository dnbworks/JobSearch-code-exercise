<?php

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desired_job = $_POST['desired_job'];
    $resume = $_POST['resume'];

    $errors = array();
    if(empty($first_name)){
        $errors['firstname'] = '<p  class="error">You forgot to enter your first name</p>';
    }

    if(empty($last_name)){
        $errors['lastname'] = '<p  class="error">You forgot to enter your last name</p>';
    }

    if(empty($email)){
        $errors['email'] = '<p  class="error">You forgot to enter your email</p>';
    }

    if(empty($phone)){
        $errors['phone'] = '<p  class="error">You forgot to enter your phone</p>';
    }

    if(empty($desired_job)){
        $errors['desiredjob'] = '<p  class="error">You forgot to enter your desired job</p>';
    }

    if(empty($resume)){
        $errors['resume'] = '<p  class="error">You forgot to enter your resume</p>';
    }



    $pattern = '/^\(?[2-9]\d{2}\)?[-\s]\d{3}-\d{4}$/';


    // we can directly use preg_match instead of first checking if the input isnt empty
    if(!empty($phone)){
       if(!preg_match('/^\(?[2-9]\d{2}\)?[-\s]\d{3}[-\s]\d{4}$/', $phone)){
            $errors['phone'] = '<p  class="error">Your phone number doesn\'t match the standard phone numbers formats. Formats allowed (831)-123-1258, (831) 123-1258, 831 123-1258, 831 123 1258</p>'; 
       } else {
            $errors['phone'] = '<p  class="error"></p>'; 
            $removeMetaCharaters = '/[\(\)\-\s]/';
            $newPhone = preg_replace($removeMetaCharaters, '', $phone);
            // echo 'Your phone number has be registered as ' . $newPhone;
       }
    }

    // checking the domain 
    function win_checkdnsrr($domain, $recType = ''){
        if(!empty($domain)){
            if($recType == '') $recType = "MX";
            exec("nslookup -type=$recType $domain", $output);
            foreach($output as $line){
                if(preg_match("/^$domain$/", $line)){
                    return true;
                }
            }
            return false;
        }
        return false;
    }

    if(!empty($email)){
        if(!preg_match('/[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/ ', $email)){
            $errors['email'] = '<p  class="error">Your email address is invalid</p>'; 
       } else {
            $domain = preg_replace('/[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/ ', '', $email);
            if(win_checkdnsrr($domain)){
                $errors['email'] = '<p  class="error">Your email address is invalid</p>'; 
            } else {
                $errors['email'] = '<p  class="error"></p>'; 
            }
       }
    }

   

    // echo $first_name . '<br>';
    // echo $last_name . '<br>';
    // echo $email . '<br>';
    // echo $phone . '<br>';
    // echo $desired_job . '<br>';
    // echo $resume . '<br>';

    
}