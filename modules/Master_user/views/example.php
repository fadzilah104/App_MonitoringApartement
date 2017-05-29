<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
		foreach($css_files as $file){  ?>
			<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
		<?php }?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
</style>
</head>
<body>
	<div>
		<a href='<?php echo site_url('Master_user/customers_management')?>'>Customers</a> |
<!-- 		<a href='<?php echo site_url('Grocery/orders_management')?>'>Orders</a> |
		<a href='<?php echo site_url('Grocery/products_management')?>'>Products</a> |
		<a href='<?php echo site_url('Grocery/offices_management')?>'>Offices</a> | 
		<a href='<?php echo site_url('Grocery/employees_management')?>'>Employees</a> |		 
		<a href='<?php echo site_url('Grocery/film_management')?>'>Films</a> |
		<a href='<?php echo site_url('Grocery/multigrids')?>'>Multigrid [BETA]</a>
		 -->
	</div>
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>
