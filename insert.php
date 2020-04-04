<?php include'DB.php' ?>
<?php
    $db = new Database();
?>

<htmL>
	<body>

		<center>
				<h2>Add Product</h2>
				<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $name = mysqli_real_escape_string($db->link, $_POST['product_name']);
       $model = mysqli_real_escape_string($db->link, $_POST['model']);
       $price = mysqli_real_escape_string($db->link, $_POST['price']);
       $quantity = mysqli_real_escape_string($db->link, $_POST['quantity']);


       if($name == "" || $model == "" || $price == "" || $quantity == ""   ){
                        echo "<span style='color:red;' >Field must not be empty !.</span>";
                    }else{

        $query = "INSERT INTO table1(product_name, model, price, quantity) VALUES('$name', '$model', '$price', '$quantity')"; 
                   
                   $inserted_rows = $db->insert($query);
                   if ($inserted_rows) {
                    
                    header('Location:table.php');
                    echo "<span style='color:green;' >Product Inserted Successfully.
                    </span>";
                   }else {
                     echo "<span>Product Not Inserted !</span>";
                   }
               }
            }
?>


				<form action="" method="post">
					<table>
						<tr>
							<td>
						Product Name : 
							</td>
							<td>
							<input type="text" name="product_name" placeholder="Enter Product Name" >
							</td>
						</tr>
						<tr>
							<td>
						Model : 
							</td>
							<td>
								<input type="text" name="model" placeholder="Enter Model" >
							</td>
						</tr>
						<tr>
							<td>
						Price : 
							</td>
							<td>
								<input type="text" name="price" placeholder="Enter Price" >
							</td>
						</tr>
						<tr>
							<td>
						Quantity : 
							</td>
							<td>
								<input type="text" name="quantity" placeholder="Enter Quantity" >
							</td>
						</tr>
					

					</table>
					<input type="submit" name="submit" value="create">
				</form>
			</center>	
		</body>
	</html>