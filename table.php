<?php include'DB.php' ?>
<?php
    $db = new Database();
    

?>

<html>
<head>
	<title>DB_Table</title>
	    <link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>
	<h2>Product List</h2>
<table class="table">

	
		<tr>
			<th width="5%">Id. </th>
			<th width="25%">Product Name </th>
			<th width="25%">Model </th>
			<th width="15%">Unit Price</th>
			<th width="10%">Quantity</th>
			<th width="10%">Edit</th>
			<th width="10%">Delete</th>

		</tr>
		<?php
           $query = "SELECT * FROM table1 ";
           $data = $db->select($query);
           if($data){
           	$i = 1;
               while($result = $data->fetch_assoc()){
        		$i++;
        ?> 
		<tr>
			<td><?php echo $i ;?></td>
			<td><?php echo $result['product_name'] ;?></td>
			<td> <?php echo $result['model'] ;?></td>
			<td><?php echo $result['price'] ;?></td>
			<td><?php echo $result['quantity'] ;?></td>
			<td><a href="edit.php?editid=<?php echo $result['id'];?>">Edit</a></td>
			<td><a href="delete.php?delid=<?php echo $result['id'];?>">Delete</a></td>
		</tr>

		<?php } } ?>

</table>
	<a href="insert.php">Add Product</a>
</body>
</html>