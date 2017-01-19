<?php
echo time()."\n";
$MNTTZ = new DateTimeZone('Asia/Kolkata');
$ESTTZ = new DateTimeZone('-0500');
$date = new DateTime(strtotime(time()), $MNTTZ);
$timestamp = $date->format('U');
echo "$timestamp";
?>