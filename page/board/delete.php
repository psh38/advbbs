<?php
//삭제 성공 메시지후 index.php로 이동
  include $_SERVER['DOCUMENT_ROOT']."/advbbs/inc/db.php";
  $bno = $_GET['idx'];

  $sql = "DELETE FROM board WHERE idx = {$bno}";

  $result = $mysqli->query($sql);

  if(!$result){
    echo "<script>alert('삭제 실패');history.back();</script>";
    error_log(mysql_error($mysqli));
  }else{
    echo "<script>alert('삭제 성공');location.href='../../index.php';</script>";
    echo '<a href="index.php">홈</a>';
  }

?>