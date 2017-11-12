<?php $this->load->view('errors/flashdata');?>

<?php if($data==NULL) : ?>
    <div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>Please enter a valid request ID</div>

<?php else : ?>
  <div class="container">
    <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th>Status</th>
        <th>Assigned TO</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td> <?php echo $data['status']; ?> </td>
        <td><?php echo $data['assigned']; ?></td>
        
      </tr>
    </tbody>

  </table> 
  </div>

<?php endif; ?>