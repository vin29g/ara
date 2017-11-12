<?php $this->load->view('errors/flashdata');?>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h1>Step 2</h1>
			<h3>ARA Information Procurement : Select Services</h3>
		</div>
		<div class="col-md-8">
			<form class="form-horizontal"  action="<?=base_url()?>index.php/index/costDescription" method="post" id="selectScripts">
				<div >
					<table class="table table-bordered table-hover">
						<tbody>
						<tr>
							<td>
								<div>
									<input name="transcripts" type="checkbox" id="transcripts" >
									Transcripts<br> &ensp;
									<!-- <input type="radio" name="transcripts" id="transcripts_five" value="5">5 sets &ensp; -->
									<input type="radio" name="transcripts" id="transcripts_ten" value="10">10 sets<br>
								</div>
							</td>
						</tr>

						<tr>
								<td>
									<?php $session_data=$this->session->userdata('step1_data');?>
									<?php if((int)$session_data['batch']>=2003):?>
									<div>
										<input name="degree_certi" type="checkbox" id="degree_certi" >
										Degree Certificates<br> &ensp;
										<input type="radio" name="degree_certi" id="degree_original" value='0'>Original &ensp;
										<input type="radio" name="degree_certi" id="degree_duplicate" value='1'>Duplicate<br>
									</div>
								<?php else:?>
									<p class="text-info">Degree Certificates</p>
									<p class="text-warning">Since you have graduated before 2003, your degree certificate needs to be procured from Kakatiya University.
									Kindly contact associate exam dean by mailing <a href="mailto:ad_exam@nitw.ac.in">ad_exam@nitw.ac.in</a></p>
								<?php endif;?>
								</td>
						</tr>

						<tr>
								<td>
									<div>
										<input name="con_grade_sheet" type="checkbox" id="con_grade_sheet" >
										Consolidated Grade Sheet<br> &ensp;
										<input type="radio" name="con_grade_sheet" id="con_sheet_original" value='0'>Original &ensp;
										<input type="radio" name="con_grade_sheet" id="con_sheet_duplicate" value='1'>Duplicate<br>
									</div>
								</td>
						</tr>
						<!-- <tr>
								<td>
									<div>
										<input name="sem_grade_sheet" type="checkbox" id="sem_grade_sheet" >
										Semester Grade Sheet<br> &ensp;
										<input type="radio" name="sem_grade_sheet" id="sem_sheet_original" value='0'>Original &ensp;
										<input type="radio" name="sem_grade_sheet" id="sem_sheet_duplicate" value='1'>Duplicate<br><br>&ensp;
									</div>
								</td>
							</td>
						</tr> -->

				
<!-- 						<tr>
							<td>
								<input name="bonafide_certi" type="checkbox" id="bonafide_certi" value="on"> Bona-fide certificate &ensp; &ensp; &ensp;
							</td>
						</tr> -->
						<tr>
							<td>
							<p class="text-info">Medium of instruction</p>
							<a href="http://www.nitw.ac.in/nitw/announcements/NIT_REC English.pdf">Click here</a><span><p> to download medium of instruction</p></span>
							</td>
						</tr>
						<!-- <tr>
							<td>
								<input name="conversion" type="checkbox" id="conversion" value="on"> CGPA to Percentage conversion &ensp;&ensp; &ensp;
							</td>
						</tr> -->
						<tr>
							<td>
								<input name="tcmigration" type="checkbox" id="tcmigration" value="0" checked="0"> TC &amp; Migration &ensp; &ensp;&ensp;
							</td>
						</tr>

				</tbody>
			</table>
			<br>

			<?php $this->load->view('infoProcurement/footer-buttons');?>
		</form>	

	</div>
</div>
</div>
<br>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		jQuery(':radio').attr('disabled',true);
	});
	$('#transcripts').on('change',function(e){
		e.preventDefault();
		statusHandler($('#transcripts'),null,$('#transcripts_ten'));
	});
	$('#degree_certi').on('change',function(e){
		e.preventDefault();
		statusHandler($('#degree_certi'),$('#degree_original'),$('#degree_duplicate'));
	});

	$('#con_grade_sheet').on('change',function(e){
		e.preventDefault();
		statusHandler($('#con_grade_sheet'),$('#con_sheet_original'),$('#con_sheet_duplicate'));
	});

	$('#sem_grade_sheet').on('change',function(e){
		e.preventDefault();
		statusHandler($('#sem_grade_sheet'),$('#sem_sheet_original'),$('#sem_sheet_duplicate'));
	});

	function statusHandler(parent,child1,child2){

		var status=$(parent).prop('checked');

		if(status===false){
			$(child1).prop('disabled',true);
			$(child2).prop('disabled',true);
			$(child1).prop('checked',false);
			$(child2).prop('checked',false);
		}
		else if(status===true){
			$(child1).prop('disabled',false);
			$(child2).prop('disabled',false);	
			$(child1).prop('checked',false);
			$(child2).prop('checked',false);
		}		
	}
</script>