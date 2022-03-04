<?php if(isset($_SESSION['admin'])){
      include "logout.php";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="admin.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
  
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand" href="#">ADMIN  </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="#">Tất cả đơn hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?controller=detail&action=chart">Thống kê trạng thái đơn hàng </a>
        </li>        
      </ul>
</nav>
    <!-- Body -->
       <div class="mt-3">
          <h6> Tất cả đơn hàng: </h6>
        <table class="table table-striped" id="table_product" >
             <thead>
                 <th>Mã đơn hàng</th>
                 <!-- <th>Ngày đặt</th> -->
                 <th>Khách hàng</th>
                 <th>Thanh toán</th>
                 <th>Địa chỉ</th>
                 <th>Số điện thoại</th>
                 <th>Xem chi tiết</th>
                 <th> Trạng thái </th>
             </thead>
             <tbody id="table-body">

             </tbody>
        </table>
    </div>

    <script> 
          var listBill = <?php echo json_encode($bills); ?> 
  
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="javascript/bill.js"> </script>
    
</body>
</html>