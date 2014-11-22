<?php

	function is_json($string, $return_data = false) {

		$data = json_decode($string);

		return (json_last_error() == JSON_ERROR_NONE) ? ($return_data ? $data : TRUE) : FALSE;

	}

	$gpage = (isset($_GET['npage']) && !empty($_GET['npage']) && is_numeric($_GET['npage'])) ? htmlentities($_GET['npage']) : 1;

	$pgn = (defined('nmr_comm') && (is_numeric(nmr_comm)) && (nmr_comm > 0)) ? nmr_comm : 5;

	$comm_start = ($pgn*($gpage-1));
	$comm_end = (($pgn*$gpage)-1);

	$gbook = $gcont = '';

	if (file_exists(dirname(__FILE__)."/../lib/db_comm.txt")) {

		$db = dirname(__FILE__)."/../lib/db_comm.txt";

		$dim_file = sprintf("%u", filesize($db));

		if (!empty($dim_file)) {

			$jsn_data = file_get_contents($db);

			if (is_json($jsn_data)) {

				$gbk = json_decode($jsn_data);

				if (is_array($gbk) === false) {

					$name_ospite = $gbk->name_guest;
					$from_ospite = $gbk->place_guest;
					$date_ospite = $gbk->period_guest;

					$comm_ospite = $gbk->text_guest;

					if (file_exists(dirname(__FILE__)."/../tpl/row.php"))
						include(dirname(__FILE__)."/../tpl/row.php");

					$gcont = $tpl_row;

				} else {

					foreach ($gbk as $pvoice) {

						$name_ospite = $pvoice->name_guest;
						$from_ospite = $pvoice->place_guest;
						$date_ospite = $pvoice->period_guest;

						$comm_ospite = $pvoice->text_guest;

						if (file_exists(dirname(__FILE__)."/../tpl/row.php"))
							include(dirname(__FILE__)."/../tpl/row.php");

						$gcont .= $tpl_row;

					}

				}

				if (!empty($gcont)) {

					$bskin = (defined('skin')) ? skin : 'light';

					if (empty($bskin))
						$bskin = 'light';

					if (file_exists(dirname(__FILE__)."/../tpl/content.php"))
						include(dirname(__FILE__)."/../tpl/content.php");

					$gbook = $tpl_bxcontent;

				}

			}

		}

	}

	echo $gbook;