<?php
require_once 'system/init.php';
 include 'includes/head.php';
include 'includes/nav.php';
include 'includes/header.php';
include 'includes/leftbar.php';

if(isset($_GET['cat'])){$cat_id= sanitize($_GET['cat']);}
else{$cat_id='';}



$sql="select * from product where categories ='$cat_id'";
$productQ=$db->query($sql);
$category=get_category($cat_id);
?>
<!--main-->
<div class="col-md-8">
<div class="row">
<h2 class="text-center"><?php echo $category['parent'].' '.$category['child'];?></h2>
<?php while($productt=mysqli_fetch_assoc($productQ)):?>

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
include 'includes/detailsmodal.php';

include 'includes/rightbar.php';
include 'includes/footer.php';
?>

<?php 
function sanitize($dirty){
	return htmlentities($dirty,ENT_QUOTES,"UTF-8");
}

function get_category($child_id)
{
	global $db;
	$id=sanitize($child_id);
	$sql="
SELECT p.id AS 'pid', p.category AS 'parent' , c.id AS 'cid' , c.category AS 'child' 
FROM categories c 
INNER JOIN categories p 
ON c.parent=p.id
 WHERE c.id='$id'";
 $query=$db->query($sql);
 $category=mysqli_fetch_assoc($query);
 return $category;
}
?>

























