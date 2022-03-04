<?php
    session_start();
    if($_REQUEST != null){
      include "request.php";
      return;
    } 
    if(isset($_SESSION['user'])){
      include "logout.php";
    }
    // var_dump(json_encode($_POST['json']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
   
    <title>Trang chủ</title>
</head>
<body>
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
<!-- Carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner" >
   
    <div class="carousel-item active">  
      <img src="img/book4.jpg" alt="Los Angeles" width="100%">
    </div>
    <div class="carousel-item"> 
      <img src="img/banner1.jpg" alt="Chicago" width="100%">
    </div>
    <div class="carousel-item">
      <img src="img/banner3.jpg" alt="New York" width="100%">
    </div>
  </div>
  



  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
<!-- Navigation -->
    
<!-- Gian Hàng -->

<div class="container">
  <h1 id ="demo"></h1>
    <div class="row">
        <h3 class="list-product-title mt-5 mb-2 col-3" id="helo">  Tất cả sản phẩm</h3>  
        <div class="product-group">

        <div class="row" id="list-product">
          </div>
        </div>
        
    </div>  
</div>
<!--Footer-->
  

<!--Modal-->
<div class="container mt-3">
  
  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-primary" id="myBtn">Open Modal</button> -->

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title" id="title">Modal Heading</h3>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div  class="modal-body">
          
              <div class="row">
                <div class="col-6 ">
                  <!--Tác giả-->
                  <h6> Tác giả: <h5 id="tac-gia">    </h5> </h6>
                  
                  <span style="display: flex;"> Mã sách: &nbsp; <p id="ma-sach">   </p></span>
                  <!--Giá-->
                  
                  <span style="display: flex; "> Giá sản phẩm:&nbsp;
                      <p style="margin-right: 2px ; margin-right: 2px;" id="gia-thanh">   </p> VNĐ  
                  </span>
  
                  <!--Input số lượng-->
                  <span style="display: flex;margin-bottom: 10px;">
                    Số lượng:&nbsp; 
                    <input style="width: 100px; " id= "input-sl" oninput="sum();" type="number" min="1" class="input-group-sm" placeholder="" value="1"> 
                  </span>
  
                  <!-- Tổng số tiền phải trả -->
                    <p > Thành tiền: 
                       <span id="thanh-tien">  </span>
                       VNĐ
                    </p>
                    <p id="test"> </p>
                </div>
                <div class="col-6" id="img-modal">
                    
                </div>
              </div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="btn-save" onclick="SaveBtn();"> Thêm  </button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" >Hủy bỏ</button>
        </div>
        
      </div>
    </div>
  </div>
  <!-- <h1 id = "demo"> </h1> -->

</div>
<div class="container mt-20">
  
  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-primary" id="myBtn">Open Modal</button> -->

  <!-- The Modal -->
  <div class="modal fade" id="myModalBuyComplete">
    <div class="modal-dialog">
      <div class="modal-content">      
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title" id="title">Đã thêm vào giỏ hàng</h3>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>  
        <!-- Modal body -->   
        <!-- Modal footer -->
        <div class="modal-footer">
          <a href="index.php?controller=cart"> <button type="button" class="btn btn-success" id="btn-save"> Đi tới giỏ hàng  </button> </a>
          <button type="button" class="btn btn-danger" data-dismiss="modal" >Tiếp tục mua hàng</button>
        </div>
        
      </div>
    </div>
  </div>
</div>
<!-- Boostrap -->



<?php 
  include 'inc/footer.php';  
?>
 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <!-- Popper JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

 <!-- Latest compiled JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
 <script src="javascript/home.js"></script>
 <script> 
        var productsBook;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                productsBook = this.responseText;  
                init(productsBook); 
            }};
        xhttp.open("GET","index.php?controller=product&action=get", true);
        xhttp.send();
        

</script>
</body>


</html>