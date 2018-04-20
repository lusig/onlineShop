<?php
require_once 'system/init.php';
 include 'includes/head.php';
include 'includes/nav.php';
include 'includes/header.php';
include 'includes/leftbar.php';
$sql="select * from product where feature =1";
$featured=$db->query($sql);
?>
<!--main-->
<div class="col-md-8">
<div class="row">
<h2 class="text-center">feature products</h2>
<?php while($productt=mysqli_fetch_assoc($featured)):?>

<div class="col-md-3">
<h4><?php echo $productt['title']; ?></h4>
<img src="<?php echo $productt['image']; ?>" alt="perfume"  class="imgthumb" />
<p class="list-price text-danger">list price:<s><?php echo $productt['list_price']; ?></s></p>
<p class="price">our price:<?php echo $productt['price']; ?></p>
<button type="button" class="btn btn-sm btn-success" onclick="detailsmodal(<?php echo $productt['id']; ?>)">
details</button>
</div>
<?php endwhile;?>
</div>
</div>


<?php
//include 'includes/detailsmodal.php';
include 'includes/rightbar.php';
include 'includes/footer.php';
?>



























