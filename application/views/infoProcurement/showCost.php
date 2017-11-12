<?php $this->load->view('errors/flashdata');?>
<?php
// Read all session values
$set_data = $this->session->all_userdata();
$check_country=$set_data['step1_data']['country']===0||$set_data['step1_data']['country']==="India";
?>
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <h1>Step 3</h1>
      <h3>ARA Information Procurement : Cost of Service</h3>
    </div>
    <div class="col-md-8">
      <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th></th>
            <th>Request </th>
            <th>Cost</th>
          </tr>
        </thead>
        <tbody>
         <?php
         $i=1;
         if(isset($set_data['request_cost_array'])){
          foreach ($set_data['request_cost_array'] as $key => $value){
            ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $key ?></td>
              <td><?php if($check_country) 
                echo "Rs. " .$value;
                else 
                  echo "$ ".$value;
                ?></td>
              </tr>
              <?php $i=$i+1; } } ?>
              <tr>
                <td></td>
                <td><span style="font-weight:bold">TOTAL</span></td>
                <td><?php if($check_country) 
                  echo "Rs. " .$set_data['price'];
                  else 
                    echo "$ ".$set_data['price'];
                  ?></td>
                </tr>
              </tbody>

            </table> 
          </div>
        </div>
        <form method="POST" action="<?=base_url()?>index.php/index/confirmCost">
        <input type="hidden" value="<?=$set_data['step1_data']['rollno']?>" name="rollno">
        <div class="col-lg-offset-4">
          <?php $this->load->view('infoProcurement/footer-buttons');?>
        </div>
        </form>
        <br>  