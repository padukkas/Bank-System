<!DOCTYPE html>
<html>
<style>
    form {
        border: 3px solid #f1f1f1;
    }

    input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    .cancelbtn {
        color: white;
        width: auto;
        padding: 10px 18px;
        background-color: red;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
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

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<body>
    <title>Deposit Page</title>
<h2>Deposit Money Here</h2>

<ul>
  <li><a href="login.php">Login</a></li>
  <li><a href="accountForm.php">Create Account</a></li>
  <li><a href="depositForm.php">Deposit</a></li>
  <li><a href="withdrawal.php">Withdraw</a></li>
  <li><a href="balanceForm.php">Balance</a></li>
</ul>

<form action="index.php" id="myForm" method="POST">
    
  <div class="container">
    

    <label><b>Deposit Value</b></label>
    <input type="text" placeholder="Enter the value you want to deposit" name="dValue" required>
    
    <div class="clearfix">
      <input class="cancelbtn" type="button" onclick="myFunction()" value="Clear Form">
      <button type="submit" class="signupbtn">Submit</button>
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
