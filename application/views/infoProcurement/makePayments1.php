<?php $this->load->view('errors/flashdata');?>
<?php

// Read all session values
$set_data = $this->session->all_userdata();
$check_country=$set_data['step1_data']['country']===0||$set_data['step1_data']['country']==="India";
?>

<?php
//API reference : http://kuppalli.wordpress.com/2008/11/15/get-live-currency-value-using-yahoo-api/
//Author : Sridhar K N

$req_id=$this->session->userdata('req_id');
$server_cost=$set_data['price'];
if(!$check_country)$USD_CHECK=true;
else $USD_CHECK=false;
?>
<h1 style="text-align:center;">NITW - Alumni Request Payment Gateway</h1>
<!-- <p>Redirecting to Payment Portal</p> -->
<hr>
<div class="container">
	<div class="row">
	<div class="col-md-5">
		<table class="table table-bordered table-hover" align="center" border="0" style="display:none;">
			<form name="postForm" action="<?php echo base_url()?>form_process.php" method="POST" >
			<tr>
				<td>txnid</td>
				<td>
				<input type="hidden" name="txnid" value="<?php echo $request_id ?>" />
			</td>
			</tr>
			<tr>
				<td>amount</td>
				<td>
				<input type="hidden" name="amount" value="<?php if($USD_CHECK) {$server_cost = $server_cost*$dollarValue;} echo $server_cost; 
			?>" />
			</td>
			</tr>
			<tr>
				<td>firstname</td>
				<td>
				<input type="hidden" name="firstname" value="$firstname" />
			</td>
			</tr>
			<tr>
				<td>email</td>
				<td>
				<input type="hidden" name="email" value="$email" />
			</td>
			</tr>
			<tr>
				<td>phone</td>
				<td>
				<input type="hidden" name="phone" value="$phone" />
			</td>
			</tr>
			<tr>
				<td>productinfo</td>
				<td>
				<input type="hidden" name="productinfo" value="NA" />
			</td>
			</tr>
			<tr>
				<td>success url</td>
				<td>
				<input type="hidden" name="surl" value="<?php echo base_url();?>Response1.php" size="64" />
			</td>
			</tr>
			<tr>
				<td>failure url</td>
				<td>
				<input type="hidden" name="furl" value="<?php echo base_url();?>Response1.php" size="64" />
			</td>
			</tr>
		</table>
			<table align="center">

				<tr>

					<td><button type="submit" name="proceed" value="proceed"  class="btn btn-lg btn-block btn-success">Payu</button></td>

				</tr>

			</table>
		</form>
	</div>
	<div class="col-md-5">
		<form id="req_form" name="req_frm" action="http://www.nitw.ac.in/alumnirequest/getcheck.php" method="post" class="form-horizontal">

			<input type="hidden" name="action" value="process">
			<br>

			<table class="table table-bordered table-hover" align="center" border="0" style="display:none;">

			<tr>

			<td>Transaction ID</td>

			<td><input class="form-control input-md" type="hidden" name="txtTranID" readonly value="<?php echo $req_id ?>" /></td>

			</tr>

			<!--<td>Market Code</td>-->

			<td><input  type="hidden" name="txtMarketCode" readonly value="L3100" /></td>


			<!--<td>Account Number</td>-->

			<td><input  type="hidden" name="txtAcctNo" readonly value="1" /></td>


			<tr>

			<td>Amount</td>

			<td><input class="form-control input-md" type="hidden" name="txtTxnAmount" value="<?php if($USD_CHECK) {$server_cost = $server_cost*$dollarValue;} echo $server_cost; 
			?>"/></td>

			</tr>


			<!--<td>Bank</td>-->

			<td><input  type="hidden" name="txtBankCode" value="NA" /></td>



			</table>

			<table align="center">

			<tr>

			<td><button type="submit" name="proceed" value="proceed"  class="btn btn-lg btn-block btn" disabled>Paynimo</button></td>
			</tr>

			</table>
		<p align="center">(This payment gateway is not usable due to some reasons)</p>
		</form>
	</div>
</div>

