<?php include'DB.php' ?>
<?php
    $db = new Database();
?>

<htmL>
	<body>

		<center>
<?php
    if(!isset($_GET['editid']) || $_GET['editid'] == NULL){
        echo "<script>window.location = 'table.php'; </script>";
       // header("Location:catlist.php");
        
    }else{
        $id = $_GET['editid'];
    }
?>
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
                    $query = "UPDATE table1 SET
                                product_name = '$name',
                                model        = '$model',
                                price        = '$price',
                                Quantity 	 = '$quantity'
                                WHERE id 	 = '$id'";

                     $updated_row = $db->update($query);
                        if($updated_row){
                           echo "<script>alert('Data Updated Successfully.')</script>";
            			   echo "<script>window.location = 'table.php'; </script>";

                        }
                        else{
                            echo "<span class='error'>Product not updated !.</span>"; 
                        }
                    }
                    
                 }

    ?>
				<?php
           $query = "SELECT * FROM table1 where id='$id'";
           $data = $db->select($query);
           if($data){
               while($result = $data->fetch_assoc()){
        
        ?> 
				<form action="" method="post">
					<table>
						<tr>
							<td>
						Product Name : 
							</td>
							<td>
							<input type="text" name="product_name" value="<?php echo $result['product_name']; ?>" >
							</td>
						</tr>
						<tr>
							<td>
						Model : 
							</td>
							<td>
								<input type="text" name="model" value="<?php echo $result['model']; ?>" >
							</td>
						</tr>
						<tr>
							<td>
						Price : 
							</td>
							<td>
								<input type="text" name="price" value="<?php echo $result['price']; ?>" >
							</td>
						</tr>
						<tr>
							<td>
						Quantity : 
							</td>
							<td>
								<input type="text" name="quantity" value="<?php echo $result['quantity']; ?>" >
							</td>
						</tr>
					

					</table>
					<input type="submit" name="submit" value="Update">
				</form>
			<?php } } ?>
			</center>	
		</body>
	</html>