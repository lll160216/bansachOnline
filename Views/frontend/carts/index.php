<?php if(isset($_SESSION['user'])){
      include "logout.php";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >Giỏ hàng của bạn</title>
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<!-- Navigation -->
<div>

<nav class="navbar navbar-expand-md sticky-top">
      <div class="container-fluid">
        <a  class="navbar-branch" href="https://facebook.com/thanhlong138"> <!-- Logo -->
            <img src="img/TLlogo.jpg" alt="Lỗi hiển thị" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toogle="collapse" data-target="#navbarResponsible">
          <span class="navbar-toggler-icon"> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsible">
          <ul class="navbar-nav  ml-auto">
            <li class="nav-item" style="margin-right: 60px; margin-top: 6px;">             
              <div class="input-group mb-3">
                <input id="search-value" style="width: 400px;" type="text" class="form-control" placeholder="Nhập để tìm kiếm...">
                <div class="input-group-append">
                  <button id="searchbtn"  onclick="Search();" class="btn" type="submit">Search</button>
                </div>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="index.php">Trang chủ</a>
            </li>          
            <li class="nav-item">
              <a class="nav-link" href="index.php?controller=cart">Giỏ hàng</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Đăng nhập</a>
            </li>          
          </ul>
        </div>
      </div>
    </nav> 
    <?php
?>

<!-- Danh sách sản phẩm trong giỏ hàng -->

<h1 id = "demo"></h1>
<div class="row" style = "display : flex">
  <div class="col-md-8 col-sm-12"  > <!-- <input type="text" name ="name"> <br>    -->
    <h2 class="text-danger" id='Title-Cart'></h2>
    <table id="cart" class="table table-hover table-condensed"> 
      <thead> 
      <tr> 
          <th></th> 
          <th style="width: 30%;"class="text-center">  Tên sản phẩm</th>
          <th style="width: 10%;"class="text-center">   Giá</th> 
          <th style="width: 10%;" class="text-center">  Số lượng</th> 
          <th style="width: 20%;" class="text-center">  Thành tiền</th> 
          <th style="width: 20%;" class="text-center"> </th> 
          </tr> 
      </thead>
    
      <tbody id="list-book">
        
      </tbody>
      <tfoot> 
    
        <tr> 
          <td></td>
          <td> </td>
        <td colspan="2" class="hidden-xs">  <strong style="margin-left: 30px; font-size :20px">Thành tiền:</strong></td> 
        <td  class="hidden-xs text-center">     <strong id = "thanh-tien"></strong>
        </td> 
        <td><input onclick="checkOut()"  class="btn btn-success btn-block" value="Thanh toán"> </a>
        </td> 
        </tr> 
      </tfoot> 
    </table>
  </div>
  <div  class="col-md-4 col-sm-12" id ="khach-hang" >
    <h3>Thông tin nhận hàng</h3>
   
   
  </div>
</div>
<!--Footer-->
<hr  width="100%" size="50 px" class="mb-0" />
<div class="mt-5 pt-5 pb-2 footer " style="background-color: #EEEEEE;">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-xs-12 about-company">
        <img src="img/TLlogo.jpg" style="width: 120px;" alt="">
        <h2>Thành Long Books</h2>
        
        <p class="pr-6 "> TL-Books nhận đặt hàng trực tuyến và giao hàng tận nơi </p>
        <p><a href="#"><i class="fa fa-facebook-square mr-1"></i></a><a href="#"><i class="fa fa-linkedin-square"></i></a></p>
      </div>
      <div class="col-lg-3 col-xs-12 links">
        <h4 class="mt-lg-0 mt-sm-3">Dịch vụ và hỗ trợ</h4>
          <ul class="m-0 p-0">

            <li> <a href="#">Điều khoản sử dụng</a></li>
            <li> <a href="#">Chính sách bảo mật</a></li>
            <li> <a href="#">Chính sách giao hàng</a></li>
            <li> <a href="#">Hệ thống trung tâm</a></li>
            <li> <a href="#">Hệ thống trung tâm nhà sách</a></li>
          </ul>
      </div>
      <div class="col-lg-4 col-xs-12 location">
        <h4 class="mt-lg-0 mt-sm-4">Liên hệ</h4>
        <p>137B Cự Lộc, Thanh Xuân, Hà Nội</p>
        <p class="mb-0"><i class="fa fa-phone mr-3"></i>Hotline: 0987.974.862</p>
        <p><i class="fa fa-envelope-o mr-3"></i>Email: thanhlongbooks@gmail.com</p>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col copyright">
        <p class=""><small >© 2019. All Rights Reserved.</small></p>
      </div>
    </div>
  </div>
</div>

<script src="javascript/cart.js"></script>
<script> </script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>