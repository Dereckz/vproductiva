
<?php
 include "..\dev\conectar.php";

$idencuesta=$_GET["survey_id"];
$idrespuesta=$_GET["qid"];

foreach($qid as $k => $v){
  $data = " survey_id=$survey_id ";
				$data .= ", question_id='$qid[$k]' ";
				$data .= ", user_id='{$_SESSION['login_id']}' ";
				if($type[$k] == 'check_opt'){
					$data .= ", answer='[".implode("],[",$answer[$k])."]' ";
				}else{
					$data .= ", answer='$answer[$k]' ";
				}
			//	$save[] = $this->db->query("INSERT INTO answers set $data");
}
echo 'Survey Id='.$idencuesta;
echo 'Aswerd Id='.$idrespuesta;

?>
