<?php
session_start();
$serverrname = "localhost";
$username = "tolenhen_web";
$password = "//String password;";
$fu = false;
$fp = false;



if(isset($_POST['uname'])){
try {
    $conn = new PDO("mysql:host=$serverrname;dbname=tolenhen_bank", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'conection succcessfull';
    $stmt= "SELECT username,password FROM login";
    foreach($conn->query($stmt) as $row){
        if($_POST['uname'] == $row['username']){
            $fu=true;
            if($_POST['psw'] == $row['password']){
                $_SESSION['logged'] = true;
                echo "<div id='con'>Logged in!</div>";
                $fp=true;
                $_SESSION['user'] = $_POST['uname'];
            }

        }
        
    }
    if($fu and !$fp){
        
                echo "<div id='non'>Wrong password!</div>";
            
    }
    if(!$fu){
        echo "<div id='non'>Username not found!</div>";
    }
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;}

if(isset($_POST['name']) ){
    if($_POST['psw'] == $_POST['psw-repeat']){
    try {
    $conn = new PDO("mysql:host=$serverrname;dbname=tolenhen_bank", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql1 = "INSERT INTO login (username,password) VALUES('" . $_POST['name'] . "'," . $_POST['psw'] . ")";
    $stmt = $conn->prepare($sql1);
    $success = $stmt->execute();

    if ($success) {
        echo "<div id='con'>Login account created succefully</div>";
    } else {
        echo "<div id='non'>Not abble to create account!</div>";
    }
    
} catch (Exception $e) {
    echo "<div id='non'>Not abble to create account!(Username has to be unique)</div>";
}

$conn = null;}else{echo "<div id='non'>Not abble to create account! Passwords not equal! </div>";}
if($success){
try {
    $conn = new PDO("mysql:host=$serverrname;dbname=tolenhen_bank", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql1 = "INSERT INTO account (username,account_type,firstname,lastname) Values('" . $_POST['name'] . "','" . $_POST['aType'] . "','". $_POST['fName'] . "','". $_POST['lName'] ."')";
    $stmt = $conn->prepare($sql1);
    $success = $stmt->execute();

    if ($success) {
        echo "<div id='con'>Account created succefully</div>";
    } else {
        echo "<div id='non'>Not abble to create account!</div>";
    }
    
} catch (Exception $e) {
    echo "<div id='non'>Not abble to create account!(Username has to be unique)</div>";
}

$conn = null;}
}
if(isset($_POST['dValue'])){
    if($_POST['dValue'] > 0){
    if($_SESSION['logged']){
    try {
    $conn = new PDO("mysql:host=$serverrname;dbname=tolenhen_bank", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql1 = "UPDATE account SET balance = balance + ". $_POST['dValue'] ." WHERE username = '" . $_SESSION['user'] . "' " ;
    $stmt = $conn->prepare($sql1);
    $success = $stmt->execute();

    if ($success) {
        echo "<div id='con'>Deposit sucessully made!</div>";
    } else {
        echo "<div id='non'>Not to complete deposit!</div>";
    }
    
} catch (Exception $e) {
    echo "<div id='non'>Not abble to deposit(Check input)</div>". $e->getMessage();
}

    $conn = null;}
    else{
        echo "<div id='non'>You need to be logged in!</div>";
    }
    
}
else{
    echo "<div id='non'>Invalid ammount!</div>";
}
}

if(isset($_POST['wValue'])){
    if($_SESSION['logged']){
    try {
    $conn = new PDO("mysql:host=$serverrname;dbname=tolenhen_bank", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt= "SELECT username,account_type,firstname,lastname,balance FROM account";
    foreach($conn->query($stmt) as $row){
        if($_SESSION['user'] == $row['username']){
           
            $balance = $row['balance'];

    }}
    if($balance > $_POST['wValue']){
    $sql1 = "UPDATE account SET balance = balance - ". $_POST['wValue'] ." WHERE username = '" . $_SESSION['user'] . "' " ;
    $stmt = $conn->prepare($sql1);
    $success = $stmt->execute();

    if ($success) {
        echo "<div id='con'>Withdrawal sucessully made!</div>";
    } else {
        echo "<div id='non'>Not to complete withdrawal!</div>";
    }}
    else{
        echo "<div id='non'>Not enough funds in the bank to complete transaction!</div>";
    }
    
} catch (Exception $e) {
    echo "<div id='non'>Not abble to deposit</div>". $e->getMessage();
}

    $conn = null;}
    else{
        echo "<div id='non'>You need to be logged in!</div>";
    }
    
}   
//echo $_SESSION['user'];
//echo "UPDATE account SET balance = balance + ". $_POST['dValue'] ." WHERE username = '" . $_SESSION['user'] . "' " ;
?>

<html>
<head>
<style>
    #con{
        background-color: green;
        text-align: center;
        
    }
    #non{
      background-color: red;
        text-align: center;  
    }
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: grey;
    }

    li {
        float: left;
        border-right:1px solid #bbb;
    }

    li:last-child {
        border-right: none;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover:not(.active) {
        background-color: green;
    }

    .active {
        background-color: #4CAF50;
    }
    .mySlides {
        display:none;
    }
</style>
</head>
<body>

<ul>
  <li><a href="login.php">Login</a></li>
  <li><a href="accountForm.php">Create Account</a></li>
  <li><a href="depositForm.php">Deposit</a></li>
  <li><a href="withdrawal.php">Withdraw</a></li>
  <li><a href="balanceForm.php">Balance</a></li>
</ul>

</body>
</html>
