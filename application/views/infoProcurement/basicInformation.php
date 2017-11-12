
<div id="flashes"><?php $this->load->view('errors/flashdata');?></div>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <h1>Step 1</h1>
      <h3>ARA Information procurement</h3>
    </div>
    <div class="col-md-9">
      <form class="form-horizontal" action="<?=base_url()?>index.php/index/selectScripts" method="post" id="basicInfo">
        <fieldset>
          <legend>Enter Information</legend>
          <div class="form-group">
            <label name="name" class="col-lg-2 control-label">Name</label>
            <div class="col-lg-10">
              <input required type="text" class="form-control" name="name" placeholder="Name" data-validation="length" data-validation-length="min3max100" >
            </div>
          </div>
          <div class="form-group">
            <label name="rollno" class="col-lg-2 control-label">Roll No</label>
            <div class="col-lg-10">
              <input required type="text" class="form-control" name="rollno" placeholder="Ex:127223" data-validation="length alphanumeric" data-validation-length="max16" >
            </div>
          </div>
          <div class="form-group">
            <label name="select" class="col-lg-2 control-label">Course</label>
            <div class="col-lg-4">
            <select required id="course" class="selectpicker valid required" name="course_type" data-live-search="true" data-va>
                <option value="-1">Select course</option>

                <!-- SELECT COURSES LIST FROM CONSTANTS.PHP -->
                <?php
                $my_courses = json_decode(course_types);
                foreach($my_courses as $name) { ?>
                <option value="<?php echo $name ?>" <?php if($name=="B. Tech."){echo 'selected';}?> > <?php echo $name?> </option>
                <?php
              }?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label name="select" class="col-lg-2 control-label">Branch</label>
          <div class="col-lg-4">
            <select required id="branch" class="selectpicker valid required" name="branch" data-live-search="true" data-validation="required">
              <option value="-1">Select branch</option>
              <?php
              $my_courses = json_decode(courses);
              foreach($my_courses as $name) { ?>
              <option value="<?php echo $name ?>"><?php echo $name?></option>
              <?php
            }?>

          </select>
          <br>
        </div>
      </div>
      <div class="form-group">
        <label name="select" class="col-lg-2 control-label">Batch</label>
        <div class="col-lg-4">
          <select required id="year" class="selectpicker valid required" name="batch" data-live-search="true" data-validation="required">
            <option value="-1">Select year</option>
            <?php
            $toYear=date("Y");
            $fromYear=1964;
            ?>
            <?php for ($i=$fromYear; $i < $toYear; $i++) :?>

            <option value="<?=$i?>"><?=$i?></option>
            <?php endfor;?>
            </select>

            <br>
          </div>
        </div>

        <div class="form-group">
          <label name="contact" class="col-lg-2 control-label">Contact No</label>
          <div class="col-lg-10">
            <input required type="text" class="form-control" name="contact" placeholder="Ex:8374585983" data-validation="length alphanumeric" data-validation-allowing="+-" data-validation-length="max14min10">
          </div>
        </div>
        <div class="form-group">
          <label name="email" class="col-lg-2 control-label">Email</label>
          <div class="col-lg-10">
            <input required type="text" class="form-control" name="email" placeholder="Ex:sachin@gmail.com" data-validation="email">
          </div>
        </div>

        <div class="form-group">
          <label name="address" class="col-lg-2 control-label">Address <br>(<small class="text-muted" ><span id="maxaddresslength">200</span> characters left</small>)<small>Transcripts will be posted to this address</small></label>
          <div class="col-lg-10">
            <textarea class="form-control" rows="3" name="address" id="address"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label name="country" class="col-lg-2 control-label">Country</label>
          <div class="col-lg-10">
            <select required id="country" class="selectpicker valid" style="width:235px;" name="country" data-live-search="true" data-validation="required">
              <option value="-1">Select Country</option>
              <!-- SELECT COUNTRIES LIST FROM CONSTANTS.PHP -->
              <?php $my_countries = json_decode(countries);?>
              <?php foreach($my_countries as $name) :?>
              <option value="<?php echo $name ?>" <?php if($name==="India")echo "selected";?>><?php echo $name?></option>
              <?php endforeach;?>
              </select>
          </div>
        </div>
        <?php $this->load->view('infoProcurement/footer-buttons');?>
      </fieldset>
    </form>
  </div>
</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
<script>
$.validate({
    form : '#basicInfo',
    onError : function($form) {
      alert('Validation of form '+$form.attr('id')+' failed!');
    },
    onSuccess : function($form) {
      alert('The form '+$form.attr('id')+' is valid!');
      return false; // Will stop the submission of the form
    },
    onValidate : function($form) {
      return {
        element : $('#some-input'),
        message : 'This input has an invalid value for some reason'
      }
    },
    onElementValidate : function(valid, $el, $form, errorMess) {
      console.log('Input ' +$el.attr('name')+ ' is ' + ( valid ? 'VALID':'NOT VALID') );
    }
  });
$('#address').restrictLength($('#maxaddresslength'));
</script>
<script>

$(document).ready(function(){
$('#submit-button').on('click',function(e){
  e.preventDefault();
  var course=$('#course').val();
  var branch=$('#branch').val();
  var year=$('#year').val();
  var errorMsghead='<div class="alert alert-info"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>';
  var courseCheck=false,branchCheck=false,yearCheck=false;
  if(course!="-1"){
    courseCheck=true;
  }
  else{
    $('#flashes').html(errorMsghead+'Invalid Course'+"</div>");
  }
  if(branch!="-1"){
    branchCheck=true;
  }
  else{
    $('#flashes').html(errorMsghead+'Invalid Branch'+'</div>');
  }
  if(year!="-1"){
    yearCheck=true;
  }
  else{
    console.log(course+" "+branch+" "+year);
    $('#flashes').html(errorMsghead+'Year cant be empty'+'</div>');
  }
  if(courseCheck==true && branchCheck==true && yearCheck==true){
    // console.log(course+" "+branch+" "+year);

    $('#basicInfo').submit();
  }

});
});
</script>
