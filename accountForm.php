<!DOCTYPE html>
<html>
<style>
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
        background-color: red;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: 8px solid;
        cursor: pointer;
        width: 100%;
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

    @media screen and (max-width: 300px) {
        .cancelbtn, .signupbtn {
           width: 100%;
    }
}
</style>
<body>

<h2>Signup Page</h2>

<ul>
  <li><a href="login.php">Login</a></li>
  <li><a href="accountForm.php">Create Account</a></li>
  <li><a href="depositForm.php">Deposit</a></li>
  <li><a href="withdrawal.php">Withdraw</a></li>
  <li><a href="balanceForm.php">Balance</a></li>
</ul>

<form action="index.php" id="myForm" method="POST">
  <div class="container">
    <label><b>First Name</b></label>
    <input type="text" placeholder="Enter first name" name="fName" required>
    
    <label><b>Last Name</b></label>
    <input type="text" placeholder="Enter last name" name="lName" required>
    
    <label><b>Account type</b></label>
    <input type="text" placeholder="Enter acccount type" name="aType" required>
    
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="name" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    <input type="checkbox" checked="checked"> Remember me
    
    <div class="clearfix">
      <input class="cancelbtn" type="button" onclick="myFunction()" value="Clear Form">
      <button type="submit" class="signupbtn">Sign Up</button>
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
