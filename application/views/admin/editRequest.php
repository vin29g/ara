<?php $this->load->view('errors/flashdata');?>
<form class="form-horizontal" action="<?=base_url()?>updateRequest" method="post" id="editreq">
  <fieldset>
    <legend>Update Information</legend>

    <div class="form-group">
      <label name="req_id" class="col-lg-2 control-label">Request ID</label>
      <div class="col-lg-4">
        <input type="text" class="form-control" name="req_id" value="<?php echo $data['request_id']?>" readonly>
      </div>
    </div>


    <?php $status_val=array("Registered Succesfully","Payment Made","Payment Succesful","Request Assigned","Request Succesful"); ?>

      <div class="form-group">
      <label name="select" class="col-lg-2 control-label">Status</label>
      <div class="col-lg-10">
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
      <div class="col-lg-4">
        <input type="text" class="form-control" name="assigned" value="<?php echo $data['assigned']?>">
      </div>
    </div>
      
      
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </fieldset>
</form>
