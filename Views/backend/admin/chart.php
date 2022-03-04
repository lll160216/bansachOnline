<?php if(isset($_SESSION['admin'])){
      include "logout.php";
    }
?>
<!DOCTYPE html>
<html lang="en-US">
<body>
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
          <a class="nav-link" href="index.php?controller=bill">Tất cả đơn hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="index.php?controller=detail&action=chart">Thống kê trạng thái đơn hàng </a>
        </li>        
      </ul>
</nav>
        <!-- <h1 id="demo">HELlo</h1> -->
        <div id="piechart"></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
                    // Load google charts
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    // Draw the chart and set the chart values
                    function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                            ['Task', 'Hours per Day'],
                            ['Chưa xác nhận', status1],
                            ['Đang chuẩn bị hàng', status2],
                            ['Đã giao cho đơn vị vận chuyển', status3],
                            ['Giao hàng thành công', status4],
                            
                            ]);
                var options = {'title':'Thống kê trạng thái đơn hàng', 'width':1200, 'height':500};
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
                }
        </script>
        <script> var status1 = <?php echo $static0; ?> ;
                 var status2 = <?php echo $static1; ?> ;
                 var status3 = <?php echo $static2; ?> ;
                 var status4 = <?php echo $static3; ?> ;
                // document.getElementById("demo").innerHTML = status2;
        
        </script>

</body>
</html>
