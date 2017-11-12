<html>

<head>
<style>
h1,p{
	text-align: center;
}
</style>

<title>BILL PAYMENT</title>

</head>

<body>
<?php
//API reference : http://kuppalli.wordpress.com/2008/11/15/get-live-currency-value-using-yahoo-api/
//Author : Sridhar K N

$from   = 'USD'; /*change it to your required currencies */
$to     = 'INR';
$url = 'http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';
$handle = @fopen($url, 'r');
 
if ($handle) {
    $result = fgets($handle, 4096);
    fclose($handle);
}
$allData = explode(',',$result); /* Get all the contents to an array */
$dollarValue = $allData[1];
$req_id="1902201601";
$server_cost=1;
?>
	<h1>NITW - Alumni Request Payment Gateway</h1>
	<p>Redirecting to Payment Portal</p>

<form id="req_form" name="req_frm" action="getcheck.php" method="post">

<input type="hidden" name="action" value="process">

<p>&nbsp;</p>

<br>

<table align="center" border="0">

	<tr>

		<!-- <td>Transaction ID</td> -->

		<td><input type="hidden" name="txtTranID" readonly value="<?php echo $req_id ?>" /></td>

	</tr>

	<tr>

		<!--<td>Market Code</td>-->

		<td><input type="hidden" name="txtMarketCode" readonly value="L3100" /></td>

	</tr>

	<tr>

		<!--<td>Account Number</td>-->

		<td><input type="hidden" name="txtAcctNo" readonly value="1" /></td>

	</tr>

	<tr>

		<!-- <td>Amount</td> -->

		<td><input type="hidden" name="txtTxnAmount" value="<?php if($USD_CHECK) {$server_cost = $server_cost*$dollarValue;} echo $server_cost; 
?>"/></td>

	</tr>

	<tr>

		<!--<td>Bank</td>-->

		<td><input type="hidden" name="txtBankCode" value="NA" /></td>

	</tr>

	

</table>

<table align="center">

	<tr>

		<td><input type="hidden" name="proceed" value="Proceed"/></td>

	</tr>

</table>

</form>

<script>
document.getElementById("req_form").submit();
</script>

</body>

</html>


