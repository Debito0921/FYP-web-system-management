<?php
    require_once "config.php";
    // require_once "session.php";

    $error = '';
    if(isset($_POST['submit'])){

        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
    
        if ($email != "" && $password != ""){
    
            $sql_query = "select * from student where student_email='".$email."' and student_password='".$password."'";
            $result = mysqli_query($con,$sql_query);
            $row = mysqli_fetch_array($result);
    
            $count = $row;
    
            if($count > 0){
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $row['student_name'];
                // echo $_SESSION['uname'];
                header('Location: homepage.php');
            }else{
                echo "Invalid username and password";
            }
    
        }
    
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>FYP Portal Login Page</title>
        <link rel="stylesheet" href="css/login.css" />
    </head>
    <body>
        <img src="./images/mmulogo.png" alt="MMU Logo" />


        <form method="post" action="">
            <fieldset>
                <table>
                    <tr class="selectRole">
                        <td>
                            <label>Role:</label>
                        </td>
                        <td>
                            <input type="radio" name="role" value="Student" />Student
                            <input type="radio" name="role" value="Supervisor" />Supervisor
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="email" name="email" class="credential" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Password</label>
                        </td>
                        <td>
                            <input type="password" name="password" required />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        
                        <td>
                            <a href="" class="forgottenPassword">Forgotten password?</a>
                        </td><td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Login" /> <button onclick="document.location='register.php'">Sign up</button>.</p>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </body>
</html>


