<?php 
$sql = "select * from categories where parent=0";
$parentquery=$db->query($sql);
?>
<nav class="navbar navbar-default navbar-fixed-top">
<div class="container">
<a href="index.php" class="navbar-brand">perfume shop</a>
<ul class="nav navbar-nav">
<?php while($parent=mysqli_fetch_assoc($parentquery)) : ?>
<?php 
$parent_id=$parent['id'];
$sql2="select * from categories where parent = '$parent_id'";
$cquery= $db->query($sql2);
?>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $parent['category'];?> <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<?php while($menuu=mysqli_fetch_assoc($cquery)):?>
<li><a href="category.php?cat=<?php echo $menuu['id'];?>" ><?php echo $menuu['category']; ?> </a></li>
<?php endwhile; ?>
</ul>
</li>
<?php endwhile; ?>
</div>
</nav>