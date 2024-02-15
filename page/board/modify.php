<?php
  include $_SERVER['DOCUMENT_ROOT']."/advbbs/inc/db.php";
  //idx번호희 글 조회
  $bno = $_GET['idx']; #변수명 $bno에 넘어온 숫자를 저장
  $sql = "SELECT * FROM board WHERE idx = {$bno}"; //변수명 $sql에 board테이블에서 idx번호가 $bno와 일치하는 행 조회
  $result = $mysqli->query($sql);//$sql쿼리를 실행하고 그 결과를 변수명 $result에 할당
  $resultArr = mysqli_fetch_assoc($result);//$result에 할당된 값을 연관배열로 출력하고 그 값을 변수명 $resultArr에 할당
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>글수정</title>
  <link rel="stylesheet" href="../../css/bbs.css">
  <!-- ctrl + f5 강제로 -->
</head>
<body>
  <div class="wrapper">
    <h1>글수정</h1>
    <form action="modify_ok.php" method="POST" class="form">
      <input type="hidden" name="idx" value="<?= $bno; ?>">
      <div class="field">
        <label for="name">이름:</label>
        <input type="text" id="name" name="name" required value="<?= $resultArr['name'];?>">
      </div>
      <div class="field">
        <label for="title">제목:</label>
        <input type="text" id="title" name="title" max-length="50" required value="<?= $resultArr['title'];?>">
      </div>
      <div class="field">
        <label for="content">내용:</label>
        <textarea id="content" name="content" cols="30"><?=($resultArr['content'])?></textarea>
      </div>
      <div class="field">
        <label for="pw">비번:</label>
        <input type="password" id="pw" name="pw" required>
      </div>
      <button>수정</button>
    </form>
  </div>
</body>
</html>