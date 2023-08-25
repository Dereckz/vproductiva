<?php
 include "..\dev\conectar.php";
 $qry = $conn->query("UPDATE `survey_set` SET 
`title`=".$_GET['title'].",'
`description`=".$_GET['description'].",'
`start_date`=".$_GET['start_date'].",'
`end_date`=".$_GET['end_date'].",'
WHERE ID=".$_GET['id']

 )->fetch_array();
  
 include 'listsurvey.php';
?>