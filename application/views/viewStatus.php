<?php $this->load->view('errors/flashdata');?>
<form class="form-horizontal" action="<?=base_url()?>/index/check" method="post" >
  <fieldset>
    <legend>View Status Of Application</legend>

    <div class="form-group">
      <label name="req_id" class="col-lg-2 control-label">Request ID</label>
      <div class="col-lg-4">
        <input type="text" class="form-control" name="req_id" placeholder="">
      </div>
    </div>
    <input type="hidden">
      
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>