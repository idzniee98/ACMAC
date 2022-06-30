<!--index.php search TH start-->
<?php
 $connect = mysqli_connect("localhost", "root", "", "testing");
 $query = "SELECT * FROM tbl_order ORDER BY order_id desc";
 $result = mysqli_query($connect, $query);
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Webslesson Tutorial | Ajax PHP MySQL Date Range Search using jQuery DatePicker</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      </head>
      <body>
           <br /><br />
           <div class="container" style="width:900px;">
                <h2 align="center">Ajax PHP MySQL Date Range Search using jQuery DatePicker</h2>
                <h3 align="center">Order Data</h3><br />
                <div class="col-md-3">
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />
                </div>
                <div class="col-md-3">
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />
                </div>
                <div class="col-md-5">
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />
                </div>

                <br />
                <div id="order_table">
                     <table class="table table-bordered">
                          <tr>
                               <th width="5%">ID</th>
                               <th width="30%">Customer Name</th>
                               <th width="43%">Item</th>
                               <th width="10%">Value</th>
                               <th width="12%">Order Date</th>
                          </tr>
                     <?php
                     while($row = mysqli_fetch_array($result))
                     {
                     ?>
                          <tr>
                               <td><?php echo $row["order_id"]; ?></td>
                               <td><?php echo $row["order_customer_name"]; ?></td>
                               <td><?php echo $row["order_item"]; ?></td>
                               <td>$ <?php echo $row["order_value"]; ?></td>
                               <td><?php echo $row["order_date"]; ?></td>
                          </tr>
                     <?php
                     }
                     ?>
                     </table>
                </div>
           </div>
      </body>
 </html>
 <script>
      $(document).ready(function(){
           $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
           });
           $(function(){
                $("#from_date").datepicker();
                $("#to_date").datepicker();
           });
           $('#filter').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if(from_date != '' && to_date != '')
                {
                     $.ajax({
                          url:"filter.php",
                          method:"POST",
                          data:{from_date:from_date, to_date:to_date},
                          success:function(data)
                          {
                               $('#order_table').html(data);
                          }
                     });
                }
                else
                {
                     alert("Please Select Date");
                }
           });
      });
 </script>
<!--index.php search TH end-->
<!--filter.php search TH start-->
<?php
 //filter.php
 if(isset($_POST["from_date"], $_POST["to_date"]))
 {
      $connect = mysqli_connect("localhost", "root", "", "testing");
      $output = '';
      $query = "
           SELECT * FROM tbl_order
           WHERE order_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'
      ";
      $result = mysqli_query($connect, $query);
      $output .= '
           <table class="table table-bordered">
                <tr>
                     <th width="5%">ID</th>
                     <th width="30%">Customer Name</th>
                     <th width="43%">Item</th>
                     <th width="10%">Value</th>
                     <th width="12%">Order Date</th>
                </tr>
      ';
      if(mysqli_num_rows($result) > 0)
      {
           while($row = mysqli_fetch_array($result))
           {
                $output .= '
                     <tr>
                          <td>'. $row["order_id"] .'</td>
                          <td>'. $row["order_customer_name"] .'</td>
                          <td>'. $row["order_item"] .'</td>
                          <td>$ '. $row["order_value"] .'</td>
                          <td>'. $row["order_date"] .'</td>
                     </tr>
                ';
           }
      }
      else
      {
           $output .= '
                <tr>
                     <td colspan="5">No Order Found</td>
                </tr>
           ';
      }
      $output .= '</table>';
      echo $output;
 }
 ?>
<!--filter.php search TH end-->
<!--pagination start-->
<?php
	include 'conn.php';
	$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 5000;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	$result = $conn->query("SELECT * FROM customers LIMIT $start, $limit");
	$customers = $result->fetch_all(MYSQLI_ASSOC);

	$result1 = $conn->query("SELECT count(id) AS id FROM customers");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['id'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
	$Next = $page + 1;

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Learn Web Coding > Pagination in PHP and MySQL </title>
	<link rel="stylesheet" type="text/css" href="../library/css/bootstrap.min.css"/>
	<script type="text/javascript" src="../library/js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<div class="container well">
		<h1 class="text-center">Bootstrap Pagination in PHP and MySQL</h1>
		<div class="row">
			<div class="col-md-10">
				<nav aria-label="Page navigation">
					<ul class="pagination">
				    <li>
				      <a href="index.php?page=<?= $Previous; ?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo; Previous</span>
				      </a>
				    </li>
				    <?php for($i = 1; $i<= $pages; $i++) : ?>
				    	<li><a href="index.php?page=<?= $i; ?>"><?= $i; ?></a></li>
				    <?php endfor; ?>
				    <li>
				      <a href="index.php?page=<?= $Next; ?>" aria-label="Next">
				        <span aria-hidden="true">Next &raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
			</div>
			<div class="text-center" style="margin-top: 20px; " class="col-md-2">
				<form method="post" action="#">
						<select name="limit-records" id="limit-records">
							<option disabled="disabled" selected="selected">---Limit Records---</option>
							<?php foreach([10,100,500,1000,5000] as $limit): ?>
								<option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
							<?php endforeach; ?>
						</select>
					</form>
				</div>
		</div>
		<div style="height: 600px; overflow-y: auto;">
			<table id="" class="table table-striped table-bordered">
	        	<thead>
	                <tr>
	                    <th>Id</th>
	                    <th>Name</th>
	                    <th>Mobile</th>
	                    <th>Address</th>
	                    <th>Date</th>
	              	</tr>
	          	</thead>
	        	<tbody>
	        		<?php foreach($customers as $customer) :  ?>
		        		<tr>
		        			<td><?= $customer['id']; ?></td>
		        			<td><?= $customer['name']; ?></td>
		        			<td><?= $customer['mobile']; ?></td>
		        			<td><?= $customer['address']; ?></td>
		        			<td><?= $customer['createdOn']; ?></td>
		        		</tr>
	        		<?php endforeach; ?>
	        	</tbody>
      		</table>


		</div>

<div style="position: fixed; bottom: 10px; right: 10px; color: green;">
        <strong>
            Learn Web Coding
        </strong>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#limit-records").change(function(){
			$('form').submit();
		})
	})
</script>
</body>
</html>
<!--pagination end-->
<!--search staff start-->
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <meta charset="UTF-8">
  <title>PHP Search</title>
</head>
<body>
<div class="container">
   <div class="row">
   <div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
   <div class="row">

   <?php

     $conn = new mysqli('localhost', 'root', '', 'tutorial');
     if(isset($_GET['search'])){
        $searchKey = $_GET['search'];
        $sql = "SELECT * FROM friends WHERE name LIKE '%$searchKey%'";
     }else
     $sql = "SELECT * FROM friends";
     $result = $conn->query($sql);
   ?>

   <form action="" method="GET">
     <div class="col-md-6">
        <input type="text" name="search" class='form-control' placeholder="Search By Name" value=<?php echo @$_GET['search']; ?> >
     </div>
     <div class="col-md-6 text-left">
      <button class="btn">Search</button>
     </div>
   </form>

   <br>
   <br>
</div>

<table class="table table-bordered">
  <tr>
     <th>Name</th>
     <th>Amount</th>
     <th>City</th>
  </tr>
  <?php while( $row = $result->fetch_object() ): ?>
  <tr>
     <td><?php echo $row->name ?></td>
     <td><?php echo $row->amount ?></td>
     <td><?php echo $row->city ?></td>
  </tr>
  <?php endwhile; ?>
</table>
</div>
</div>
</div>
</body>
</html>
<!--search staff end-->

<!--Delete staff code start-->
<?php
include('includes/header.php');
require_once('dbcon.php');
$vid = $_GET['staffid'];
$sqldelete  = "DELETE FROM `staffinfo` WHERE `staffid` = '".$vid. "' ";
$result=mysqli_query($virtual_con, $sqldelete);
$to = "managestaff.php";

if($result>0){
  //delete Success
  function function_alert($message) {
  echo "<script>alert('$message');</script>";
}
  function_alert("Data Successfully Deleted.");
  echo " <script>window.location = '$to';</script>'";
}
else{
  //delete failure
  echo '<script>alert("Error: ")</script>'. $sqldelete . "<br>" . $virtual_con->error;
}
?>
<a href="deletestaff.php?staffid=<?php echo $row['staffid']; ?>">
  <button type="submit" name="delete" class="nav-link btn btn-danger btn-round">
    Revoke
  </button></a>
<!--Delete staff code end-->
