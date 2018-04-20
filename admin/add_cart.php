<?php 
define('BASEURL',$_SERVER['DOCUMENT_ROOT'].'/perfume/system/init.php');

$product_id=sanitize($_POST['product_id']);
$quantity= sanitize($_POST['quantity']);
$available= sanitize($_POST['available']);
$item=array();
$item[]=array(
'id' =>$product_id,
'quantity' =>$quantity,
);

$domain=($_SERVER['HTTP_HOST']!='localhost')?'.'.$_SERVER['HTTP_HOST']:false;
$query=$db->query("select * from product where id = '{$product_id}'");
$product=mysqli_fetch_assoc($query);
$_SESSION['success_flash']=$product['title'].'was added to your cart.';

//check to see if the cart cooie exists
if($cart_id !='')
{
	$cartQ = $db->query("select * from cart where id= '{$cart_id}'");
	$cart=mysqli_fetch_assoc($cartQ);
	
	
}else{
	//add the cart to the database and set cookie
	$items_json=json_encode($item);
	$cart_expire=data("Y-m-d H:i:s",strtotime("+30 days"));
	$db->query("insert into cart(items,expire_date) values('{$items_json}','{$cart_expire}')");
	$cart_id=$db->insert_id;
	setcookie(CART_COOKIE,$cart_id,CART_COOKIE_EXPIRE,'/',$domain,false);
}
?>