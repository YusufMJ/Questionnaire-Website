<?php

if(isset($_GET['user'])){

$username = $_GET['user'];
$unPattern = '/^[A-Za-z0-9]{3,15}$/';
$unErrorMsg = "";
if (preg_match($unPattern, $username)) {
    echo ""; //Valid username
} else {
    $minPattern = '/^[A-Za-z0-9]{0,2}$/';
    $maxPattern = '/^[A-Za-z0-9]{16,}$/';

    if (preg_match($minPattern, $username)) {
        $unErrorMsg .= "Minimum characters is 3<br>";
    }

    if (preg_match($maxPattern, $username)) {
        $unErrorMsg .= "Maximum characters is 15<br>";
    }

    echo $unErrorMsg;
}
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $startPattern = '/^[a-zA-Z0-9._-]+$/';
    $domainPattern = '/^[a-zA-Z0-9-]+$/';
    $endPattern = '/^[a-zA-Z]{2,5}$/';
    $emErrorMsg = "";

    $emailParts = explode('@', $email, 2);
    
    if (isset($emailParts[0])) {
        $start = $emailParts[0];
    } else {
        $start = '';
    }

    if (isset($emailParts[1])) {
        $domain = $emailParts[1];
    } else {
        $domain = '';
    }

    if (!strpos($email, '@')) {
        $emErrorMsg .= "You are missing the @<br>";
    } elseif (!preg_match($startPattern, $start)) {
        $emErrorMsg .= "Invalid string before the @<br>";
    }

    if (!strpos($email, '.')) {
        $emErrorMsg .= "You are missing a '.' after the @<br>";
    } elseif ($domain !== '') {
        $domainParts = explode('.', $domain, 2);
        
        if (isset($domainParts[0])) {
            $domain = $domainParts[0];
        } else {
            $domain = '';
        }

        if (isset($domainParts[1])) {
            $end = $domainParts[1];
        } else {
            $end = '';
        }

        if (!preg_match($domainPattern, $domain)) {
            $emErrorMsg .= "Invalid domain name after the @<br>";
        }

        if (!preg_match($endPattern, $end)) {
            $emErrorMsg .= "Invalid string after the .<br>";
        }
    }

    if ($emErrorMsg == "") {
        echo ""; //Valid email
    } else {
        echo $emErrorMsg;
    }
}

if (isset($_GET['password']) && $_GET['password'] != "") {
    $password = $_GET['password'];
    $lPattern = '/^.{6,30}$/';
    $ucPattern = '/[A-Z]/';
    $lcPattern = '/[a-z]/';
    $nPattern = '/[0-9]/';
    $scPattern = '/^[A-Za-z0-9_#@%*\-]+$/';
    $pwdErrorMsg = "";

    if (!preg_match($lPattern, $password)) {
        $pwdErrorMsg .= "The password must be between 6 and 30 characters long.<br>";
    }

    if (!preg_match($ucPattern, $password)) {
        $pwdErrorMsg .= "The password must contain at least one uppercase letter.<br>";
    }

    if (!preg_match($lcPattern, $password)) {
        $pwdErrorMsg .= "The password must contain at least one lowercase letter.<br>";
    }

    if (!preg_match($nPattern, $password)) {
        $pwdErrorMsg .= "The password must contain at least one digit.<br>";
    }

    if (!preg_match($scPattern, $password)) {
        $pwdErrorMsg .= "The password must include only letters, numbers, and specific special characters inside bracket (_#@%*-).<br>";
    }

    if ($pwdErrorMsg == "") {
        echo ""; //Valid password
    } else {
        echo $pwdErrorMsg;
    }
}


if (isset($_GET['oPassword']) && isset($_GET['cPassword'])) {
    $oPassword = $_GET['oPassword'];
    $confirmPassword = $_GET['cPassword'];

    if ($oPassword === $confirmPassword) {
        echo ""; //Matching password
    } else {
        echo "Passwords are not matching";
    }
}

?>