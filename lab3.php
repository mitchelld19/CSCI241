<?php
`if($_SERVER["REQUEST_METHOD"]=="GET")
{
?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>Invoice</title>
		</head>
		<body>
			<form method="post" action="lab3.php">
				<label for="invoiceItem1">Invoice Item 1: <input type="text" name="invoiceItem1"></label>
				<label for="invoiceItem1Price">Price: <input type="text" name="invoiceItem1Price"></label><br>
				<label for="invoiceItem2">Invoice Item 2: <input type="text" name="invoiceItem2"></label>
				<label for="invoiceItem2Price">Price: <input type="text" name="invoiceItem2Price"></label><br>
				<label for="invoiceItem3">Invoice Item 3: <input type="text" name="invoiceItem3"></label>
				<label for="invoiceItem3Price">Price: <input type="text" name="invoiceItem3Price"></label><br>
				<label for="invoiceItem4">Invoice Item 4: <input type="text" name="invoiceItem4"></label>
				<label for="invoiceItem4Price">Price: <input type="text" name="invoiceItem4Price"></label><br>
				<label for="applyTax"><input type="checkbox" name="applyTax"> Include tax?</label><br>
				<input type="submit" value="submit" name="submit">
			</form>
		</body>
	</html>`
<?php
	} 
	else if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$price1=$_POST["invoiceItem1Price"];
		$price2=$_POST["invoiceItem2Price"];
		$price3=$_POST["invoiceItem3Price"];
		$price4=$_POST["invoiceItem4Price"];
		$subtotal=$price1+$price2+$price3+$price4;
		$tax=0.07;
	//Addition
?>
	<!DOCTYPE html>
	<html>
		<body>
			<table>
				<tr>
					<td><?php echo "Invoice Item 1: ".$_POST["invoiceItem1"] ?></td>
					<td><?php echo "Price: $ ".$price1 ?></td>
				</tr>
				<tr>
					<td><?php echo "Invoice Item 2: ".$_POST["invoiceItem2"] ?></td>
					<td><?php echo "Price: $ ".$price2 ?></td>
				</tr>
				<tr>
					<td><?php echo "Invoice Item 3: ".$_POST["invoiceItem3"] ?></td>
					<td><?php echo "Price: $ ".$price3 ?></td>
				</tr>
				<tr>	
					<td><?php echo "Invoice Item 4: ".$_POST["invoiceItem4"] ?></td>
					<td><?php echo "Price: $ ".$price4 ?></td>
				</tr>	
			</table>
<?php
			echo "Subtotal: $ ".$subtotal."<br>";
			
			if(isset($_POST["applyTax"])==true)
			{
				echo "Tax: $ ".$tax*$subtotal."<br>";
				echo "Total: $ ".($subtotal+($subtotal*$tax));
			}
			else 
			{
				echo "Tax: $0"."<br>";
				echo "Total: $ ".$subtotal;
			}
?>
		</body>
	</html>
<?php
} 

else{
	//Unsupported	
}
