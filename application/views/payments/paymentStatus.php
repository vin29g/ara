<?php $this->load->view('errors/flashdata');?>
<div class="container">
	<div class="row">
	<div class="col-md-6" align="center;">
		<div class="panel panel-primary">
			<div class="panel-heading">
			<h3 class="panel-title">Payment Status</h3>
			</div>
			<div class="panel-body">
				<table class="table table-hover table-bordered">
					<tr>
						<td>Transaction/Request ID</td>
						<td><?=$txnid?></td>
					</tr>
					<tr>
						<td>Transaction Reference No.</td>
						<td><?=$txnrefno;?></td>
					</tr>
					<tr>
						<td>Amount</td>
						<td><?=$amount;?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td>
						
							<?php if($status=="success"):?>
								<p class="text-success">Success</p>
							<?php elseif($status=="failure"):?>
								<p class="text-failure">Failed/Cancelled</p>
							<?php endif;?>
						</td>
					</tr>
				</table>
			</div>
			<center>
				<a href="<?=base_url()?>" class="btn btn-md btn-block">Go to Home</a>
			</center>
		</div>
	</div>
	</div>
</div>
