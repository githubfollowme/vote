<?php include_once "./api/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>問卷系統</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <style>
    .container {
      min-height: 544px;
    }

    body {
      background-image: url("paper.gif");
      background-color: #cccccc;
    }
  </style>
</head>

<body>

  <div class="jumbotron p-0 mb-0" style="overflow:hidden;height:250px">
    <a href="index.php">
      <div id="carouselExampleSlidesOnly" class="carousel slide position-relative" data-ride="carousel">
        <div class="carousel-inner position-absolute" style="top:-250px">
          <?php

          //取得資料表中狀態為1的廣告圖片
          $images = all('ad', ['sh' => 1]);

          //使用迴圈來將每一筆廣告圖片依照html的格式顯示在網頁上
          foreach ($images as $key => $image) {

            //判斷如果是第一筆，會加入一個active的class
            if ($key == 0) {
              echo "<div class='carousel-item active'>";
            } else {
              echo "<div class='carousel-item'>";
            }

            //帶入圖片的檔名及資訊
            echo "  <img class='d-block w-100' src='image/{$image['name']}' title='{$image['intro']}'>";
            echo "</div>";
          }


          ?>
        </div>
      </div>
    </a>
  </div>
  <nav class='bg-light shadow py-3 px-2 d-flex justify-content-between mb-4 bg-secondary text-gray'>
    <div>&nbsp;</div>
    <?php

    //判斷是否有任何的錯誤訊息存在，有則顯示
    if (isset($_SESSION['error'])) {
      echo "<span class='text-danger'>" . $_SESSION['error'] . "</span>";
    }

    //判斷是否有登入的紀錄，根據登入狀況，顯示不同的功能按鈕
    if (isset($_SESSION['user'])) {
      echo "<span class='pr-5 h2'>歡迎來到投票系統首頁！{$_SESSION['user']}</span>";
    ?>
      <div>
        <a class="btn btn-md btn-warning mx-1" href="index.php">囘到首頁</a>
        <a class="btn btn-md btn-primary mx-1" href="logout.php">登出</a>
        <a class="btn btn-md btn-info mx-1" href="backend/index.php">後台管理編輯</a>
      </div>

    <?php

    } else {
    ?>
      <div>
        <a class="btn btn-sm btn-primary mx-1" href="?do=login">會員登入</a>
        <a class="btn btn-sm btn-info mx-1" href="?do=reg">註冊新會員</a>
      </div>
    <?php
    }
    ?>
  </nav>
  <div class="container">
    <?php

    //根據網址帶的do參數內容來決定要include那一個檔案內容
    $do = (isset($_GET['do'])) ? $_GET['do'] : 'show_vote_list';

    //建立要引入的檔案路徑
    $file = "./frontend/" . $do . ".php";
    if (file_exists($file)) {
      include $file;
    } else {
      include "./frontend/show_vote_list.php";
    }
    ?>
  </div>
  <div class="p-3 text-center text-light bg-primary">版權所有~歡迎交流</div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    let opt_name = [];
    let opt_num = [];

    $.each($('.list-group-item'), function(indexInArray, valueOfElement) {
      opt_name.push($(this).find('span:nth-child(1)').html());
      opt_num.push($(this).find('.badge-info').html());
    });

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: opt_name,
        datasets: [{
          label: '投票數',
          data: opt_num,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>