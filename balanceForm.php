<?php
session_start();
?>
<!DOCTYPE html>

<html>
<style>
    #php{
        text-align: center;
        font-weight: bold;
        background-color: lightgreen;
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
    input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: light-grey;
        box-sizing: border-box;
    }
	
    button {
        background-color: green;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: 8px solid;
        cursor: pointer;
        width: 100%;
    }

    .cancelbtn {
        padding: 14px 20px;
        background-color: #f44336;
    }

    .cancelbtn,.signupbtn {
        float: left;
        width: 50%;
    }

    .container {
        padding: 20px;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

</style>
<body>
<title>Balance</title>
<h2>Balance</h2>

<ul>
  <li><a href="login.php">Login</a></li>
  <li><a href="accountForm.php">Create Account</a></li>
  <li><a href="depositForm.php">Deposit</a></li>
  <li><a href="withdrawal.php">Withdraw</a></li>
  <li><a href="balanceForm.php">Balance</a></li>
</ul>

<form action="index.php" id="myForm" method="POST">
  <div class="container">
      <div id="php">
      <?php
     session_start();
      //echo $_SESSION['user'];
      
    $serverrname = "localhost";
$username = "tolenhen_web";
$password = "//String password;";
      try {
    $conn = new PDO("mysql:host=$serverrname;dbname=tolenhen_bank", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'conection succcessfull';
    $stmt= "SELECT username,account_type,firstname,lastname,balance FROM account";
    foreach($conn->query($stmt) as $row){
        if($_SESSION['user'] == $row['username']){
            echo $row['firstname']. " " . $row['lastname']."<br>";
            echo "Account type:   " . $row['account_type']."<br>";
            echo "Balance:   $" . $row['balance'];

        }
        
    }
   
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
      ?>
      </div>
    <div class="clearfix">
     
      <button type="submit" class="signupbtn">Back</button>
    </div>
  </div>
</form>

<script>
function myFunction() {
    document.getElementById("myForm").reset();
}
</script>

</body>
</html>
