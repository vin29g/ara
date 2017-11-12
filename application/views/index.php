<?php $this->load->view('errors/flashdata');?>

<?php if(isset($message)) : ?>
    <div class="alert alert-success"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a><?php echo $message ?></div>
<?php endif; ?>

<div class="container text-center">
<div class="row">
    <div class="col-lg-12">
    <h2>Select an option</h2>
      <p>
        <a href="<?=base_url('index/viewStatus')?>" class="btn btn-squared-default btn-primary">
            <i class="fa fa-paper-plane-o fa-5x"></i><br/>
            View Status of <br/>Application
        </a>
        <a href="<?=base_url()?>index/applyForTranscript" class="btn btn-squared-default btn-success">
          <i class="fa fa-mortar-board fa-5x"></i><br/>
          Apply for <br/>Transcripts
        </a>
        <!-- <a href="<?=base_url('index/employeeVerification')?>" class="btn btn-squared-default btn-warning">
          <i class="fa fa-user fa-5x"></i><br/>
          Employee <br/> Verification
        </a> -->
      </p>
    </div>
</div>
<p>
  <a href="auth/login" class="btn btn-primary">Admin Login</a>
</p>
</div>
