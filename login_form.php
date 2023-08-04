<?php
require_once("connect.php"); 

if(!empty($_POST['save'])){
    $username=$_POST['user_name'];
    $password=$_POST["password"];
    $query= "select * from login where user_name='$username' and password = '$password'";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    if($count>0){
        echo "Login Successful";
        header('Location: cse_main_page.html');
    } 
    else{
        echo "Not successful";
    }
}
?>
<html>
    <title>JNTU GV COLLEGE OF ENGINEERING</title>
       <head>
        <style>
body 
{
  font-family:sans-serif; 
  background: -webkit-linear-gradient(to right, #155799, #159957);  
  background: linear-gradient(to right, #155799, #159957); 
  color:whitesmoke;
}


h1{
    text-align: center;
}


form{
    width:35rem;
    margin: auto;
    color:whitesmoke;
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    background-color: rgba(11, 15, 13, 0.582);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.125);
    padding: 20px 25px;
}

input[type=text], input[type=password]{
    width: 100%;
    margin: 10px 0;
    border-radius: 5px;
    padding: 15px 18px;
    box-sizing: border-box;
  }

button {
    background-color: #030804;
    color: white;
    padding: 14px 20px;
    border-radius: 5px;
    margin: 7px 0;
    width: 100%;
    font-size: 18px;
  }
.but {
  margin-top:120px;
}

button:hover {
    opacity: 0.6;
    cursor: pointer;
}

.headingsContainer{
    text-align: center;
}

.headingsContainer p{
    color: gray;
}
.mainContainer{
    padding: 16px;
}


.subcontainer{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
}

.subcontainer a{
    font-size: 16px;
    margin-bottom: 12px;
}

span.forgotpsd a {
    float: right;
    color: whitesmoke;
    padding-top: 16px;
  }

.forgotpsd a{
    color: rgb(74, 146, 235);
  }
  
.forgotpsd a:link{
    text-decoration: none;
  }

  .register{
    color: white;
    text-align: center;
  }
  
  .register a{
    color: rgb(74, 146, 235);
  }
  
  .register a:link{
    text-decoration: none;
  }
</style>
</head>
<body>
<div class="but">
    <h1>JNTUGV COLLEGE OF ENGINEERING</h1>
</div>
    <form action="" method="post">
        <!-- Headings for the form -->
        <div class="headingsContainer">
            <h3>Certificates Portal</h3>
            <p>Welcome To Certificates Portal</p>
        </div>

        <!-- Main container for all inputs -->
        <div class="mainContainer">
            <!-- Username -->
            <label for="username">Username</label>
            <input type="text" name="user_name" placeholder="username">

            <br><br>

            <!-- Password -->
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="password">

<br><br>
            <!-- Submit button -->
            <button type="submit" name="save" value="login">Login</button>


            

        </div>

    </form>
</body>
</html>