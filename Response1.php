<!DOCTYPE html>
<html>
<head>
</head>
<body onload="submit()">
	<div>
		<h2>Payment Details</h2>
	</div>

	<div>
		<?php 
			if(isset($_POST['status'])){
				if($_POST['status']=="success"){
					echo "<p>Payment Done Successfully.<br>Details Are Below.</p>";
					echo "<p>Txn Id: ".$_POST['txnid']."</p>";
					echo "<p>Name: ".$_POST['firstname']."</p>";
					echo "<p>Email: ".$_POST['email']."</p>";
					echo "<p>Amount: ".$_POST['amount']."</p>";
					echo "<p>Phone No: ".$_POST['phone']."</p>";
					echo "<p>Product Info: ".$_POST['productinfo']."</p>";
				}
				else if($_POST['status']=="failure"){
					echo "<p>Payment Failed.<br>Details Are Below.</p>";
					echo "<p>Failure Reason: ".$_POST['unmappedstatus']."</p>";
					echo "<p>Txn Id: ".$_POST['txnid']."</p>";
					echo "<p>Name: ".$_POST['firstname']."</p>";
					echo "<p>Email: ".$_POST['email']."</p>";
					echo "<p>Amount: ".$_POST['amount']."</p>";
					echo "<p>Phone No: ".$_POST['phone']."</p>";
					echo "<p>Product Info: ".$_POST['productinfo']."</p>";
				}
			}

			?>
	</div>
	<form action="http://www.nitw.ac.in/alumnirequest/index/transactionStatus" id="payform" method="POST">
		<input type="hidden" name="req_id" value="<?php echo $_POST['txnid'] ?>"/>
		<input type="hidden" name="txnrefno" value="<?php echo $_POST['mihpayid'] ?>">
		<input type="hidden" name="bankrefno" value="<?php echo $_POST['bank_ref_num'] ?>">
		<input type="hidden" name="txnamount" value="<?php echo $_POST['amount'] ?>">
		<input type="hidden" name="errorStatus" value="<?php echo $_POST['Error'] ;?>">
		<input type="hidden" name="status" value="<?php echo $_POST['status'] ?>"/>
	</form>
	<h2 style="text-align:center;">Redirecting to NITW - Alumni Request Automation Page</h2>
	<script>
		document.getElementById("payform").submit();
	</script>
</body>
</html>