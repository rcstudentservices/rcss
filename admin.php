<?php 
session_start();
include "includes/db.php";
include "includes/functions.php";

if(isset($_POST["login"]))
{
    if (mysqli_connect_errno()) 
    {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

    if ( !isset($_POST['username'], $_POST['password']) )   
    {
        exit('Please fill both the username and password fields!');

    }

        if ($stmt = $con->prepare('SELECT id, password FROM admin WHERE username = ?'))
        {
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();

            if ($stmt->num_rows > 0) 
            {
                $stmt->bind_result($stud_idnum, $password);
                $stmt->fetch();
                // if (password_verify($_POST['password'], $password)) 
                if (password_verify($_POST['password'], $password)) 
                {
                    $_SESSION['a_loggedin'] = TRUE;
                    $_SESSION['a_name'] = $_POST['username'];
                    $_SESSION['a_id'] = $stud_idnum;
                    
                    if(!empty($_POST["remember"])) 
                    {
                        setcookie ("user_login",$_POST["username"]);
            
                        setcookie ("userpassword",$_POST["password"]);
                    } 
                    else 
                    {
            
                        if(isset($_COOKIE["user_login"])) 
                        {
            
                            setcookie ("user_login","");
            
                        }
            
                        if(isset($_COOKIE["userpassword"])) 
                        {
            
                            setcookie ("userpassword","");
                        }
                    }
                    header('Location: ../admin/index.php');
                } 
                else
                {
                    header("Location: includes/login-err.php");
                }
            } 
            else
            {
                header("Location: includes/login-err.php");
            }
        }
        $stmt->close();
        confirmQuery($stmt);
}

if ( !isset($_SESSION['a_loggedin']))  
{   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login | RC Student Services</title>
    <meta charset="UTF-8">
    <link rel = "icon" href = "img/logo1.png" type = "image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/login_style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="" method="post">
                    
                    <div class="input-field">
                        <input name="username" class="form-control" id="username" type="text" placeholder="Enter your ID" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" class="input-field" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input name="password" id="password"  type="password" class="password" placeholder="Enter your password"  value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>" required> 
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" name="remember" id="rememberme" 
                            <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
                            <label for="rememberme" class="text">Remember me</label>
                        </div>
                    </div>
                    <div class="input-field button">
                        <input name="login" type="submit" value="Login">
                    </div>
                </form>
                
            </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="scripts/script.js"></script>
</body>
</html>
<?php 
} 
else if(isset($_SESSION['a_loggedin']) === TRUE)  
{  
    header("Location: admin/index.php");
} 
?>
<script> document.body.classList.remove('swal2-height-auto'); </script>
<?php
    if(isset($_SESSION['status']) && $_SESSION['status'] != "")
    {
        ?>
        <script>
            Swal.fire({
            icon: "<?php echo $_SESSION['status_icon']; ?>",
            title: "<?php echo $_SESSION['status']; ?>",
            showConfirmButton: false,
            timer: 1500
            })
        </script>
        <?php
        unset($_SESSION['status']);
    }
?>