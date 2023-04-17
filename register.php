<?php
$register_page = true;
include 'navbar.php';
include 'conn.php';

if (isset($_POST['register'])) {
    //get the data from the registration form
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $row = $conn->prepare("SELECT * FROM users WHERE email = ? ");
    $row->execute([$email]);

    if($row->rowCount() == 1){
        $message = "Email Already registered";
    }elseif ($password != $confirm_password) {
        $message = "Password do not match";
    }else{
        //insert to DB
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $insert = $conn->prepare("INSERT INTO users(first_name, last_name, email, password) VALUES(?, ?, ?, ?)");
        //data binding
        $insert->execute([
            $first_name,
            $last_name,
            $email,
            $hashed
        ]);

        $message = "User Added!";
    }
}
?>
<div class="row justify-content-center">
    <div class="col-5 mt-4 mb-5 shadow p-4">
        <?php 
            if(isset($message)){
                echo '<div class="alert alert-warning" role="alert">
                        '.$message.'
                    </div>';
            }
        ?>
        <form action="register.php" method="POST" class="row g-3 needs-validation" novalidate>
            <div class="col-md-12">
                <label for="validationCustom01" class="form-label">First name</label>
                <input type="text" class="form-control" id="validationCustom01" name="fname" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationCustom02" class="form-label">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" name="lname" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationCustomUsername" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="email" required>
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Password</label>
                <input type="password" class="form-control" id="validationCustom01" name="password" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Confirm-Password</label>
                <input type="password" class="form-control" id="validationCustom01" name="confirm_password" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="register">Register</button>
            </div>
        </form>
    </div>
</div>
</body>

</html>