<?
$check=date("G");
if ( $check<=5 || $check>23 ) { $status="n"; // ����
} elseif ( $check<=10 || $check>5 ) { $status="u"; // ����
} elseif ( $check<=18 || $check>10 ) { $status="d"; // ����
} elseif ( $check<=23 || $check>18 ) { $status="v"; //  �����
}
?>