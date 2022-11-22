<?php
session_start();
include "db.php";

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
    if(isset($_POST['login-select']) && $_POST['login-select'] == "student")
    {
        setcookie ('radio1', "true", 600, '/');
        setcookie ('radio2', "false", 600, '/');
        $radio1 = ' checked="checked"';
        $radio2 = '';

        if (isset($_COOKIE['radio1']) && $_COOKIE['radio1'] == "true") {
            $radio1 = ' checked="checked"';
            $radio2 = '';
        }
        
        if ($stmt = $con->prepare('SELECT id, stud_password FROM tbl_student WHERE stud_idnum = ?'))
        {
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();

            if ($stmt->num_rows > 0) 
            {
                $stmt->bind_result($stud_idnum, $stud_password);
                $stmt->fetch();
                // if (password_verify($_POST['password'], $password)) 
                if (password_verify($_POST['password'], $stud_password)) 
                {
                    $_SESSION['sloggedin'] = TRUE;
                    $_SESSION['sname'] = $_POST['username'];
                    $_SESSION['sid'] = $stud_idnum;
                    
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
                    header('Location: ../student/dashboard.php');
                } 
                else
                {
                    $_SESSION['status'] = "Oops! Please check your username and password";
                    $_SESSION['status_icon'] = "error";
                    header("Location: ../index.php");
                }
            } 
            else
            {
                $_SESSION['status'] = "Oops! Please check your username and password";
                $_SESSION['status_icon'] = "error";
                header("Location: ../index.php");
            }
        }
        $stmt->close();
        confirmQuery($stmt);
    }
    else if (isset($_POST['login-select']) && $_POST['login-select'] == "employee")
    {   
        setcookie('radio1', "false", 600, '/');
        setcookie('radio2', "true", 600, '/');
        $radio1 = '';
        $radio2 = ' checked="checked"';

        if (isset($_COOKIE['radio2']) && $_COOKIE['radio2'] == "true") {
            $radio1 = '';
            $radio2 = ' checked="checked"';
        }

        if ($stmt = $con->prepare('SELECT id, emp_password, emp_office FROM tbl_emp WHERE emp_num = ?'))
        {
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();

            if ($stmt->num_rows > 0) 
            {
                $stmt->bind_result($id, $emp_password, $emp_office);
                $stmt->fetch();
                if (password_verify($_POST['password'], $emp_password)) 
                {
                    if($emp_office == "Student Discipline Office")
                    {
                        $_SESSION['loggedin'] = TRUE;
                        $_SESSION['name'] = $_POST['username'];
                        $_SESSION['id'] = $id;

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
                        header('Location: ../prefect/dashboard.php');
                    }

                    else if($emp_office)
                    {
                        $_SESSION['hloggedin'] = TRUE;
                        $_SESSION['hname'] = $_POST['username'];
                        $_SESSION['hid'] = $id;

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
                        header('Location: ../clinic/dashboard.php');
                    }

                    else if($emp_office == "Campus Ministry Office")
                    {
                        $_SESSION['cloggedin'] = TRUE;
                        $_SESSION['cname'] = $_POST['username'];
                        $_SESSION['cid'] = $id;

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
                        header('Location: ../cmo/dashboard.php');
                    }
                } 
                else
                {   
                    $_SESSION['status'] = "Oops! Please check your username and password";
                    $_SESSION['status_icon'] = "error";
                    header("Location: ../index.php");
                }
            }
            else
            {
                $_SESSION['status'] = "Oops! Please check your username and password";
                $_SESSION['status_icon'] = "error";
                header("Location: ../index.php");
            }
        }
        $stmt->close();
        confirmQuery($stmt);
    }
    else
    {
        $_SESSION['status'] = "Oops! Please check your username and password";
        $_SESSION['status_icon'] = "error";
        header ('Location: ../index.php');
    }
}
?>