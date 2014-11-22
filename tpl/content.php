<?php

	$tpl_bxcontent = "
	<link href=\"./css/".$bskin."/gcomm.css\" rel=\"stylesheet\" type=\"text/css\">
	<script src=\"./js/gcomm.js\"></script>
	<div class='gcomm-guest'>
".$gcont."
		<div class='gcomm-nav'>
			<div id='gcomm-prev'>
				<a href='javascript:;' title='Previous'>&laquo;</a>
			</div>
			<div id='gcomm-npage'>
				&nbsp;
			</div>
			<div id='gcomm-next'>
				<a href='javascript:;' title='Next'>&raquo;</a>
			</div>
		</div>
		<br class='clear' />
	</div>";