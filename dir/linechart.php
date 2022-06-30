<?php
include("dbconth.php");
 ?>
<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Month','Humidity'],
        <?php
            $query = "SELECT * FROM dht11";
            $result = mysqli_query($virtual_con2, "SELECT * FROM dht11");
            while($row = mysqli_fetch_array($result)){
              $date = $row['id'];
              $humidity = $row['humidity'];
              ?>
              [<?php echo $date;?>,<?php echo $humidity; ?>],
            <?php }
        ?>
      ]);

      var options = {
        title: 'average',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart2'));

      chart.draw(data, options);
    }
  </script>
</head>
<body>
  <div id="curve_chart2" style="width: 900px; height: 500px"></div>
</body>
</html>
