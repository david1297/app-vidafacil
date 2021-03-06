<?php
function paginate($reload, $page, $tpages, $adjacents) {
	$prevlabel = "&lsaquo; Anterior";
	$nextlabel = "Siguiente &rsaquo;";
	$out = '<ul class="pagination pagination-large">';
	
	// previous label

	if($page==1) {
		$out.= "";
	} else if($page==2) {
		$out.= "<li><a href='javascript:void(0);' onclick='LoadT(1)'>$prevlabel</a></li>";
	}else {
		$out.= "<li><a href='javascript:void(0);' onclick='LoadT(".($page-1).")'>$prevlabel</a></li>";

	}
	
	// first label
	if($page>($adjacents+1)) {
		$out.= "<li><a href='javascript:void(0);' onclick='LoadT(1)'>1</a></li>";
	}
	// interval
	if($page>($adjacents+2)) {
		$out.= "<li><a>...</a></li>";
	}


	// pages

	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<li class='active'><a>$i</a></li>";
		}else if($i==1) {
			$out.= "<li><a href='javascript:void(0);' onclick='LoadT(1)'>$i</a></li>";
		}else {
			$out.= "<li><a href='javascript:void(0);' onclick='LoadT(".$i.")'>$i</a></li>";
		}
	}

	// interval

	if($page<($tpages-$adjacents-1)) {
		$out.= "<li><a>...</a></li>";
	}

	// last

	if($page<($tpages-$adjacents)) {
		$out.= "<li><a href='javascript:void(0);' onclick='LoadT($tpages)'>$tpages</a></li>";
	}

	// next

	if($page<$tpages) {
		$out.= "<li><a href='javascript:void(0);' onclick='LoadT(".($page+1).")'>$nextlabel</a></li>";
	}else {
		$out.= "";
	}
	
	$out.= "</ul>";
	return $out;
}
?>