<section id="search-box">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 reset-box-sizing">
						<script>
							function gcseCallback() {
								if (document.readyState != 'complete'){
									google.search.cse.element.render({gname:'gsearch', div:'results', tag:'search'});
									var element = google.search.cse.element.getElement('gsearch');
									element.execute('<?php echo $searchField;?>');}
								};
								window.__gcse = {
									parsetags: 'explicit',
									callback: gcseCallback
								};
								(function() {
									var cx = '<insert code here>';
									var gcse = document.createElement('script');
									gcse.type = 'text/javascript';
									gcse.async = true;
									gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
									'//www.google.com/cse/cse.js?cx=' + cx;
									var s = document.getElementsByTagName('script')[0];
									s.parentNode.insertBefore(gcse, s);
								})();

							</script>
							<gcse:search gname="gsearch"></gcse:search>
							<div id="results"></div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</script>
