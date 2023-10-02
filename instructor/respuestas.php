
<?php
 require("../dev/conectar.php");

session_start();
$survey_id=$_GET["survey_id"];
$qid=$_GET["qid"];
$type=$_GET["type"];
$answer=$_GET["answer"];

 foreach($qid as $k => $v){
  $data = " survey_id=$survey_id ";
				$data .= ", question_id='$qid[$k]' ";
				$data .= ", user_id='{$_SESSION['id']}' ";
				if($type[$k] == 'check_opt'){
					$data .= ", answer='[".implode("],[",$answer[$k])."]' ";
				}else{
					$data .= ", answer='$answer[$k]' ";
				}
				$save[] = $conn->query("INSERT INTO answers set $data");
				
}

if(isset($save)){
  header("Location:instructor.php");
}else
{
  header("Location: survey.php");
  
}


 

?>
