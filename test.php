function monday_start($array){
	$monday_end = strtotime('monday 23:59');
	$monday_start = strtotime('monday 04:00');
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 5 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $monday_end && $monday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			// switch ($cDate) {
			// 	case 1:
			// 			$nStamp = strtotime('+1 day', $v['start_stamp']);
			// 			break;
			// }
			// $v['newStamp'] = $nStamp;
			$res[] = $v;
			// $res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}

function tuesday_start($array){
	$tuesday_end = strtotime('tuesday 23:59');
	$tuesday_start = strtotime('tuesday 04:00');
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 5 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $tuesday_end && $tuesday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}

function wednesday_start($array){
	$wednesday_end = strtotime('wednesday 23:59');
	$wednesday_start = strtotime('wednesday 04:00');
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 5 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $wednesday_end && $wednesday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}

function thursday_start($array){
	$thursday_end = strtotime('thursday 23:59');
	$thursday_start = strtotime('thursday 04:00');
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 5 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $thursday_end && $thursday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}

function friday_start($array){

	$friday_end = strtotime('friday 23:59');
	$friday_start = strtotime('friday 04:00');
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 5 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $friday_end && $friday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){
		$res = null;
	}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		// echo '<pre>';
		// print_r($sorted);
		// echo '</pre>';
		return $sorted;
	}
	return $res;
}

function saturday_start($array){

	$saturday_end = strtotime('saturday 23:59');
	$saturday_start = strtotime('saturday 04:00');
	$c = 0;
	$n = 0; 
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 6 ){
			$res[] = $v;
			$c = 1;
		}
		elseif($v['start_stamp'] <= $saturday_end && $saturday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}
	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		// echo '<pre>';
		// print_r($sorted);
		// echo '</pre>';
		return $sorted;
	}
	return $res;
}

function sunday_start($array){

	$sunday_end = strtotime('sunday 23:59');
	$sunday_start = strtotime('sunday 04:00');
	$c = 0;
	$n = 0;
	foreach ($array as $k => $v){
		if(date('N', $v['start_stamp']) == 7 ){
			$res[] = $v;
			$c = 1;
		}	
		elseif($v['start_stamp'] <= $sunday_end && $sunday_start <= $v['end_stamp']  ){
			$cDate = date('N', $v['start_stamp']);
			switch ($cDate) {
				case 1:
						$nStamp = strtotime('+6 day', $v['start_stamp']);
						break;
				case 2:
						$nStamp = strtotime('+5 day', $v['start_stamp']);
						break;
				case 3:
						$nStamp = strtotime('+4 day', $v['start_stamp']);
						break;
				case 4:
						$nStamp = strtotime('+3 day', $v['start_stamp']);
						break;
				case 5:
						$nStamp = strtotime('+2 day', $v['start_stamp']);
						break;
				case 6:
						$nStamp = strtotime('+1 day', $v['start_stamp']);
						break;
			}
			$v['newStamp'] = $nStamp;
			$res[] = $v;
			$res[0]['start_stamp'] = $nStamp;
			$c = 1;
			$n = 1;
		}

	}
	if($c == 0){$res = null;}
	if($n == 1){
		foreach ($res as $k => $v){
			if(isset($v['newStamp'])){
				$res[$k]['start_stamp'] = $v['newStamp'];
			}
		}
		$sorted = val_sort($res, 'start_stamp');
		return $sorted;
	}
	return $res;
}