<?php $this->load->view('errors/flashdata');?>
<div class="container">
		<div class="row">	
		<div class="panel panel-primary">
			<div class="panel-heading clearfix">
				<h1 class="panel-title">Requests List</h1>
			</div>
			<div class="panel-body">
				    <table  id="example"  class="table table-bordered table-hover table-responsive table-condensed" cellspacing="0" width="100%">
				
                <thead>
                    <tr>
					    <th>Request ID</th>                                 
                        <th>Name</th> 
                        <th>Roll No</th> 
                        <th>Contact</th>
						<th>E-mail</th>                               
                        <th>Service</th>
						<th>Status</th>
						<th>Assigned To</th>
						<th>Date of Request</th>
						<th>Date of Completion</th>
						<th>Transaction Status</th>
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
		                	<td><?php echo $value['request_id']?></td>
		                	<td><?php echo $value['name']?></td>
		                	<td><?php echo $value['rollno']?></td>
		                	<td><?php echo $value['contact']?></td>
		                	<td><?php echo $value['email']?></td>
		                	<td><?php 
                              foreach ($value['description'] as $record) {
                              	echo $record;
                              	?> <br> <?php 
                              }
		                	?></td>
		                	<td><?php echo $value['status']?></td>
		                	<td><?php echo $value['assigned']?></td>
		                	<td><?php echo $value['date']?></td>
		                	<td><?php echo $value['completion_date']?></td>		
		                	<td><?php if($value['tstatus']==1)echo "Success";else echo "Not done";?></td>
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