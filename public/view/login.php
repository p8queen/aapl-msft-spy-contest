<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login System </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">



                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4>Login System </h4>
                    </div>
                    <div class="card-body">
                    
                    <?php if (isset($_SESSION['message'])){
                        echo "<div class='alert alert-danger'>";
                        echo $_SESSION['message'] = "Invalid Email or Password";
                        echo "</div>";
                    } ?>
                    
                        <form action="/login-credentials" method="POST">

                            <div class="mb-3">
                                <label>User</label>
                                <input type="text" name="username" placeholder="UserName">
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter Password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="login_button" class="btn btn-primary">Login</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>