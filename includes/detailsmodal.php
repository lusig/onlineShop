<?php
require_once '..\system\init.php';
$id=$_POST['id'];
$id=(int)$id;
$sql="select * from product where id='$id'";
$result=$db->query($sql);
$producta=mysqli_fetch_assoc($result);
?>

<!--detail models-->
<?php ob_start();?>
<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog"
 aria-labelledby="details-modal" aria-hidden="true">
 <div class="modal-dialog modal-lg">
 <div class="modal-content">
 <div class="modal=header">
 <button class="close" type="button" onclick="closemodal()" arial-label="close">
 <span aria-hidden="true">&times;</span>
 </button>
 <h4 class="modal-title text-center"><?php echo $producta['title'];?></h4>
 </div>
 <div class="modal-body">
 <div class="container-fluid">
 <div class="row">
 <span id="modal_errors" class="bg-danger"></span>
 <div class="col-sm-6">
 <div  class="center-block">
 <img src="<?php echo $producta['image']; ?>" alt="body spray" class="details img-responsive">
 </div>
 </div>
 <div class="col-sm-6">
 <h4>details</h4>
 <p> <?php  echo $producta['description']; ?> </p>
  
 <hr>
 <p>price: <?php echo $producta['price']; ?></p>
 <form action="add_cart.php" method="post" id="add_product_form">
 <input type="hidden" name="product_id" value="<?php echo $id; ?>">
 <input type="hidden" name="available" id="available" value="">
 <div class="form-group">
 <div class="col-md-3">
 <label for="quantity">Quantity:</label>
 <input type="number" class="form-control" id="quantity" name="quantity" min="0">
 
 </div>

 </div>
 
 </form>
 </div>
 </div>
 </div>
 </div>
 <div class="modal-footer">
 <button class="btn btn-default" onclick="closemodal()">close</button>
 <button class="btn btn-warning" onclick="add_to_cart();return false;"><span class="glyphicon glyphicon-shopping-cart"></span>add to cart</button>
 </div>
 </div>
 </div>
 </div>
 <script>

 
 function closemodal(){
	 jQuery('#details-modal').modal('hide');
	 setTimeout(function(){jQuery('#details-modal').remove();
	 jQuery('.moda-backdrop').remove();
	 },500);
 }
 </script>
 <?php echo ob_get_clean();?>