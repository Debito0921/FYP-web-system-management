<?php
    require_once "config.php";
    // require_once "session.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $name = trim($_POST['name']);
        $id = trim($_POST['id']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        if($query = $con->prepare("SELECT * FROM student WHERE student_email = ?")) {
            $error = '';

            $query->bind_param('s', $email);
            $query->execute();
            $query->store_result();

            if ($query->num_rows > 0) {
                $error .= "<p class='error'>The email has already registered!</p>";
            } else {
                if (strlen($password) < 6){
                    $error .= "<p class='error'>Password must have atleast 6 characters.</p>";
                }

                if(empty($error)){
                    $sql = $con->prepare("INSERT INTO student (student_name, student_id, student_password, student_email) VALUES (?,?,?,?);");
                    $sql->bind_param("ssss", $name, $id, $password, $email);
                    $result = $sql->execute();
                    if ($result) {
                        $error .= "<p class='success'>Successful Registered!</p>";
                    } else {
                        $error .= "<p class='error'>Not Successful Registered!</p>";
                    }
                }
            }

        }
        $query->close();
        $sql->close();
        mysqli_close($con);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- input script -->
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <main>
            <div class="container-fluid">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Name: </label>
                        <input type="text" class="form-control" name="name" id="name" value="" required />
                    </div>
                    <div class="form-group">
                        <label>ID: </label>
                        <input type="text" class="form-control" name="id" id="id" value="" required />
                    </div>
                    <div class="form-group">
                        <label>Password: </label>
                        <input type="password" class="form-control" name="password" id="password" value="" required />
                    <div class="form-group">
                        <label>Email: </label>
                        <input type="email" class="form-control" name="email" id="email" value="" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit" />
                    </div>
                    <p>Already have an account? <a href="login.php">Login here</a>.</p>
                </form>
            </div>
        </main>
    </body>
</html>


