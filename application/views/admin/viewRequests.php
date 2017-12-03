<style>
.panel-primary
{
	width: 102% !important;
}

.panel-title
{
	font-size: 25px;
}

.panel-body
{
	font-family: Helvetica;
}
</style>
<?php $this->load->view('errors/flashdata');?>
<div class="">
	<div class="row">	
		<div class="panel panel-primary">
			<div class="panel-heading clearfix">
				<h1 class="panel-title"><center>Requests List of all Successful Transactions</center></h1>
			</div>
			<div class="panel-body">
				    <table  id="example"  class="table table-bordered table-hover table-responsive table-condensed" cellspacing="0" width="100%">
				
	                <thead>
	                    <tr>
						    <th>Request ID</th>                                 
	                        <th>Name</th> 
	                        <th>Roll No</th> 
	                        <th>Contact</th>
	                        <th>Address</th>
							<th>E-mail</th>                               
	                        <th>Service</th>
							<th>Status</th>
							<th>Assigned To</th>
							<th>Date of Request</th>
							<th>Date of Completion</th>
							<th>Transaction Amount</th>
							<!-- <th>Transaction Status</th> -->
							<th>File Uploaded</th>
							<th class="action">Action</th>		
	                    </tr>
	                </thead>
	                <tbody>
	                     <?php

	                    $count=0;
	                     foreach ($data as $key => $value)
	                     { 
	                     	$count=$count+1;
	                     	?>
	                     	<tr>
			                	<td><a href="applicationForm<?php echo '?id='.$value['request_id'];?>" target="_blank"><?php echo $value['request_id']?></a></td>
			                	<td><?php echo $value['name']?></td>
			                	<td><?php echo $value['rollno']?></td>
			                	<td><?php echo $value['contact']?></td>
			                	<td><?php echo $value['address']?></td>
			                	<td><?php echo $value['email']?></td>
			                	<td><?php 
	                              foreach ($value['description'] as $record) {
	                              	echo $record;
	                              	?> <br><br> <?php 
	                              }
			                	?></td>
			                	<td><?php echo $value['status']?></td>
			                	<td><?php echo $value['assigned']?></td>
			                	<td><?php echo $value['date']?></td>
			                	<td><?php echo $value['completion_date']?></td>	
			                	<td><?php echo $value['txnamount']; ?></td>	
			                	<!-- <td><?php if($value['tstatus']==1)echo "Success";else echo "Not done";?></td> -->
			                    <td><a href="<?php echo base_url();?>uploads/transcripts/<?php echo $value['request_id']?>/<?php echo $value['doc1']?>" target="_blank">Uploaded</a></td>
			                    <td>
	                                <a href="editRequests<?php echo '?id='.$value['request_id'];?>" class="btn btn-success">Edit</a>
			                    </td>
	                        </tr>

	                     <?php
	                     }?>

                
                	</tbody>
            	</table>		
			</div>
		</div>
	</div>
</div>
