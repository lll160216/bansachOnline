<?php 
if(isset($_SESSION['admin'])){
      include "logout.php";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Chi tiết</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand" href="#">Quản lý đơn hàng</a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="#">Chi tiết đơn hàng </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" id="demo"> </a>
        </li>
        
      </ul>
    </nav>
    <!-- Body -->
    <div class="table">
      <tbody>
        <tr>
          <td> Tên khách hàng: </td>
          <td> <h6 id="nameKH"> </h6></td>
        </tr>
        <tr>
          <td> Địa chỉ giao hàng: </td>
          <td>  <h6 id="address">  </h6> </h6></td>
        </tr>
        <tr>
          <td> Số điện thoại liên lạc: </td>
          <td> <h6 id="phone"></h6>  </h6></td>
        </tr>
            
           
              
      </tbody>
    </div>
       <div class="container mt-3">
          <h6> Chi tiết đơn hàng: </h6>
        <table class="table table-bordered" id="table_product" >
             <thead>
                 <th>Mã sản phẩm</th>
                 <th>Tên sản phẩm</th>
                 <th>Số lượng</th>
                 <th>Giá thành</th>
                 <th>Thành tiền</th>
                 <th>Ảnh sản phẩm</th>
                 <th>Hành động</th>
                 
             </thead>
             <tbody id="DS">
               
             </tbody>
        </table>
    </div>
    <div class="row"> 
        <div class="col-9"> </div>
        <div class="col-3"> <a href="index.php?controller=bill" > <button class="btn-success"> Quay về </button></a> </div>
    </div>

    <script> 
          var id = <?php echo $id ?>;
          document.getElementById("demo").innerHTML = id;
          var details =<?php echo json_encode($details); ?>;
          var bills = <?php echo json_encode($bill); ?>;
          for (let index = 0; index < bills.length; index++) {
            const element = bills[index];
            if(parseInt(element.bill_id)==parseInt(id)){
                document.getElementById("nameKH").innerHTML = element.name;
                document.getElementById("address").innerHTML = element.address;
                document.getElementById("phone").innerHTML = element.phone;
            }
          }
          
          
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="javascript/details.js"></script>
    
</body>
</html>