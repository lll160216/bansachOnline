<link rel="stylesheet" href="css/login.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->
<title>Đăng nhập</title>
<div class="sidenav">
         <div class="login-main-text">
            <h2>ThanhLongBooks<br> Login Page</h2>
            <p>Login.</p>
         </div>
</div>
<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">
            <form action="index.php?controller=login" method="post">
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" name="username" placeholder="User Name">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-black">Login</button>
                
            </form>
        </div>
    </div>
</div>

<?php 
    session_start(); 
        if(isset($_SESSION["wrong"]))
        {
            echo "<script> Sai tên đăng nhập hoặc mật khẩu </script>" ; 
        }      
?>    

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>