<?php
require_once('funcs.php');

?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Inventory</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark static-top bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">Inventory</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a class="nav-link" href="index.php">Sale
              
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="order.php">Reorder Requests</a>
			<span class="sr-only">(current)</span>
          </li>
         
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Reorder Requests</h1>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item</th>
      <th scope="col">Reorder Quantity</th>
	  <th scope="col">Reorder Status</th>
	  <th scope="col">Reorder Date</th>
	   <th scope="col">Date Filled</th>
      <th scope="col">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $l = db();
  $sql = "select * from reorders";
  $re = mysqli_query($l,$sql);
  $reorder = array('Not Filled','Filled');
  while($res = mysqli_fetch_array($re))
  {
  ?>
    
    <tr>
      <th scope="row"><?php echo $res['id'];?><input type="hidden" name="rid" value="<?php echo $res['id'];?>"</th>
      <td><?php echo get_name($res['product_id']);?></td>
      <td><?php 
	  $qtty = get_reorder_qtty($res['product_id']);
	  echo $qtty;?>
	  </td>
	  <td><?php echo $reorder[$res['reorder_status']];?></td>
	  <td><?php echo $res['date_ordered'];?></td>
	  <td><?php echo $res['date_filled'];?></td>
      <td><button type="button" class="btn btn-primary" onclick=update('<?php echo $res['id'];?>') >Fill Request </button></td>
    </tr>
	
    <?php
  }
	?>
  </tbody>
		</table>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script type="text/javascript"> 
function update(id)
 {
	 $.ajax({
            url : 'process.php?rid=' + id,
            type: "GET",
            data: $(this).serialize(),
            success: function (data) {
			   alert(data);
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
	 
	 
 }
</script>
</body>

</html>
<?php



?>
