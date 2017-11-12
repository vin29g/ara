<div id="flashes"><?php $this->load->view('errors/flashdata');?></div>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h1>Step 4</h1>
			<h3>Alumni Request Automation </h3><h4>Information Procurement : Upload relevant Documents</h4>
		</div>
		<div class="col-md-8">

<form id="saveDocs" enctype="multipart/form-data" class="form-horizontal" action="<?=base_url()?>index.php/index/saveDocuments" method="post" novalidate="novalidate">
	<div class="well">
		Requires Merged PDF or ZIP of the following documents.
		<p>Upload 1: Proof of graduating from NIT Warangal.</p>
 		<p>Upload 2: (All Grade sheets(semester-wise) or Consolidated Grade sheet and Degree Certificate or Provisional Pass Certificate) and required documents(FIR copy incase of request for lost transcript)</p>

		<small>
 Proof of graduating from NIT Warangal is any one of :<br>
All Semester Grade Sheets | Consolidate Grade Sheet | Degree Certificate<br>

 *For TC and Migration, Provisional Pass Certificate is needed.If P.C. not furnished,you can upload any of:
<br>All Semester Grade Sheets | Consolidate Grade Sheet | Degree Certificate,but, the process will take longer.

 <br>Scanned copies of Degree and all semester mark-sheets (or consolidated grade sheet) are mandatory
 <br>Use <a href="http://pdfmerge.com/">PDF Merge</a> to merge your pdf files into one file
 <br><p class="text-warning">Good quality scanned copies are only allowed. Please refrain from uploading pictures taken by camera. </p></small>
	</div>
	<table class="table table-hover">
		<tbody>

			<tr>
				<td>Choose one supporting document type</td>
				<td>
					<select class="form-control input-md" id="select_secondary_type" name="secondary_type" required id="select-doc">
		          		<option value="1" selected=""> Provisional Pass Certificate</option>
		          		<option value="2"> Notorized Affidavit</option>
		          		<option value="3"> Degree Certificate</option>
									<option value="4"> Other </option>
			    	</select>
				</td>
			</tr>
			<tr>
				<td>Upload ZIP or PDF </td>
				<td><input name="doc1" type="file" value="Browse" required id="doc1"/></td>
			</tr>
		</tbody>
	</table>

	<div class="col-lg-20 col-lg-offset-5">
        <button onclick="javascript:window.history.back();" class="btn btn-default">Back</button>
        <button type="submit" class="btn btn-primary" id="proceed">Proceed</button>
	</div><br>
</form>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/')."/js/jquery.min.js"; ?> "></script>
<script type="text/javascript">
$('#proceed').on('click',function(e){
	e.preventDefault();
	var t=validate();
	console.log(t);
	if(t)
		$('#saveDocs').submit();
});
function validate(){
	var errorMsghead='<div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>';


		if($('#doc1').val() ==""){

				$('#flashes').html(errorMsghead+" Document "+i+" missing. Please Upload documents. It cant be empty");
				$('#doc1').focus();
				return false;
		}

	return true;

}
</script>
