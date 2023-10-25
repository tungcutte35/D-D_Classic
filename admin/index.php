<?php
    include 'header.php';
?>
   <!-- <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/"> -->
    <style type="text/css">
        /* Chart.js */
        
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }
        
        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }
        
        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }
    </style>
    <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="index.php"><i class="fas fa-home"></i> Trang chính</a>
  </li>  <li class="nav-item">
    <a class="nav-link " href="category.php"><i class="fas fa-align-justify"></i> Danh mục</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="product.php"><i class="fas fa-tshirt"></i> Sản phẩm</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="carousel.php"><i class="fas fa-images"></i> Ảnh carousel</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="users.php"><i class="fas fa-address-card"></i> Khách hàng</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="donhang.php"><i class="fas fa-truck"></i> Đơn hàng</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="member.php"><i class="fas fa-address-card"></i> Thành viên</a>
  </li>
</ul>
<br>

<?php

    $don_hang_moi = mysqli_query($conn,"SELECT * FROM diachi_donhang WHERE trang_thai = '0'");
    $dh_moi = mysqli_num_rows($don_hang_moi);

    $don_hang_da_ht = mysqli_query($conn,"SELECT * FROM diachi_donhang WHERE trang_thai = '2'");

    $khachhang = mysqli_query($conn,"SELECT * FROM users ");

        $tong_dt = 0;
    $dt = mysqli_query($conn,"SELECT soluong,gia_sanpham FROM donhang WHERE trang_thai = '2'");
    foreach($dt as $key => $value) {
        $tong = $value['soluong'] * $value['gia_sanpham'];
        $tong_dt += $tong;
    }
?>
<h5></h5>

<div class="card-deck">
    <div class="card bg-secondary">
      <div class="card-body text-center">
        <p class="card-text">Đơn hàng mới</p>
        <h3><?php echo $dh_moi ?> đơn</h3>

      </div>
    </div>
    <div class="card bg-secondary">
      <div class="card-body text-center">
        <p class="card-text">Đơn đã hoàn thành</p>
            <h3><?php echo $dh_da_ht = mysqli_num_rows($don_hang_da_ht); ?> đơn</h3>
      </div>
    </div>
    <div class="card bg-secondary">
      <div class="card-body text-center">
        <p class="card-text">Khách hàng</p>
        <h3><?php echo mysqli_num_rows($khachhang) ?> khách hàng</h3>
      </div>
    </div>
    <div class="card bg-secondary">
      <div class="card-body text-center">
        <p class="card-text">Doanh thu</p>
        <h3><?php echo number_format($tong_dt) ?> VND</h3>
      </div>
    </div>
</div>


        <br>
        <h5>Thông tin (DEMO)</h5>

        <canvas class="my-4 chartjs-render-monitor" id="myChart" width="1056" height="444" style="display: block; height: 222px; width: 528px;"></canvas>




        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Chủ nhật", "Thứ hight", "Thứ bar", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"],
                datasets: [{
                    data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#343a40',
                    borderWidth: 4,
                    pointBackgroundColor: '#343a40'
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false
                        }
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });
    </script>

<?php
    include 'footer.php';
?>