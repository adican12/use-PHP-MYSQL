<?php
session_start();
//error_reporting(0);
session_regenerate_id(true);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
	{
	header("Location: index.php"); //
	}
	else{?>
<table border="1">
									<thead>
										<tr>
										<th>#</th>
											<th>Name</th>
											<th>Email</th>
											<th>Gender</th>
											<th>Phone</th>
											<th>Image</th>
										</tr>
									</thead>

<?php
$filename="Users list";

$sql = "SELECT * FROM `users`";
$result = $conn->query($sql);
if($result === false)
{
   user_error("Query failed: ".$conn->error."<br />$sql");
   echo "false";
}

// $sql = "SELECT * from Users";
// $query = $dbh -> prepare($sql);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;


if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{

// if($query->rowCount() > 0)
// {
// foreach($results as $result)
// {

echo '
<tr>
<td>'.$cnt.'</td>
<td>'.$Name= $row['name'].'</td>
<td>'.$Email= $row['email'].'</td>
<td>'.$Gender= $row['gender'].'</td>
<td>'.$Phone= $row['mobile'].'</td>
<td>'.$Designation= $row['image'].'</td>
</tr>
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
</table>
<?php } ?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable
            ([['X', 'lineDashStyle: [1, 1]', 'lineDashStyle: [2, 2]',
               'lineDashStyle: [4, 4]', 'lineDashStyle: [5, 1, 3]',
               'lineDashStyle: [4, 1]',
               'lineDashStyle: [10, 2]', 'lineDashStyle: [14, 2, 7, 2]',
               'lineDashStyle: [14, 2, 2, 7]',
               'lineDashStyle: [2, 2, 20, 2, 20, 2]'],
              [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
              [2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
              [3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
              [4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
              [5, 6, 7, 8, 9, 10, 11, 12, 13, 14],
              [6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
              [7, 8, 9, 10, 11, 12, 13, 14, 15, 16],
              [8, 9, 10, 11, 12, 13, 14, 15, 16, 17],
              [9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
        ]);

        var options = {
          hAxis: { maxValue: 10 },
          vAxis: { maxValue: 18 },
          chartArea: { width: 380 },
          lineWidth: 4,
          series: {
            0: { lineDashStyle: [1, 1] },
            1: { lineDashStyle: [2, 2] },
            2: { lineDashStyle: [4, 4] },
            3: { lineDashStyle: [5, 1, 3] },
            4: { lineDashStyle: [4, 1] },
            5: { lineDashStyle: [10, 2] },
            6: { lineDashStyle: [14, 2, 7, 2] },
            7: { lineDashStyle: [14, 2, 2, 7] },
            8: { lineDashStyle: [2, 2, 20, 2, 20, 2] }
          },
          colors: ['#e2431e', '#f1ca3a', '#6f9654', '#1c91c0',
                   '#4374e0', '#5c3292', '#572a1a', '#999999', '#1a1a1a'],
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>
