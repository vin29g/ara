<?php $this->load->view('errors/flashdata');?>
<form class="form-horizontal" action="<?=base_url()?>viewRequests" method="post">
  <fieldset>
    <legend><center>Request ID No. <b><?php echo $data['request_id']?></b></center></legend>
    <br>

    <div class="form-group">
      <label name="req_id" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="req_id" value="<?php echo $data['name']?>" readonly>
      </div>
    </div>

    <div class="form-group">
      <label name="req_id" class="col-lg-2 control-label">Roll Number</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="req_id" value="<?php echo $data['rollno']?>" readonly>
      </div>
    </div>

    <div class="form-group">
      <label name="req_id" class="col-lg-2 control-label">Course</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="req_id" value="<?php echo $data['course_type']?>" readonly>
      </div>
    </div>

    <div class="form-group">
      <label name="req_id" class="col-lg-2 control-label">Branch</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="req_id" value="<?php echo $data['course']?>" readonly>
      </div>
    </div>

    <div class="form-group">
      <label name="req_id" class="col-lg-2 control-label">Batch</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="req_id" value="<?php echo $data['batch']?>" readonly>
      </div>
    </div>

    <div class="form-group">
      <label name="req_id" class="col-lg-2 control-label">Contact</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="req_id" value="<?php echo $data['contact']?>" readonly>
      </div>
    </div>

    <div class="form-group">
      <label name="req_id" class="col-lg-2 control-label">Address</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="req_id" value="<?php echo $data['address']?>" readonly>
      </div>
    </div>

    <div class="form-group">
      <label name="req_id" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="req_id" value="<?php echo $data['email']?>" readonly>
      </div>
    </div>

    <div class="form-group">
      <label name="req_id" class="col-lg-2 control-label">Country</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="req_id" value="<?php echo $data['country']?>" readonly>
      </div>
    </div>

    <div class="form-group">
      <label name="req_id" class="col-lg-2 control-label">Transaction Amount</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="req_id" value="<?php echo $data['txnamount']?>" readonly>
      </div>
    </div>

    <?php $status_val=array("Registered Succesfully","Payment Made","Payment Succesful","Request Assigned","Request Succesful"); ?>

      <div class="form-group">
      <label name="select" class="col-lg-2 control-label">Status</label>
      <div class="col-lg-10">
        <br>
       <select id="status" class="required valid" style="width:235px;" name="status">
       <option value="<?php echo $data['status']-'0'?>"><?php echo $status_val[$data['status']-'0']?></option>
            <?php
            for($i=1;$i<5;$i++) { 
              if($data['status']==$i)
                continue;
              ?>
              <option value="<?php echo $i?>"><?php echo $status_val[$i]?></option>
            <?php
            }?>     
        </select>
      </div>
    </div>
 


    <div class="form-group">
      <label name="assigned" class="col-lg-2 control-label">Assigned To</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="assigned" value="<?php echo $data['assigned']?>" readonly>
      </div>
    </div>
      
      
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button onclick="close_window();" class="btn btn-primary">Go Back</button>
      </div>
    </div>
  </fieldset>
</form>

<script>
  function close_window()
  {
    window.close();
  }
</script>
