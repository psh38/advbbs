<?php
  require_once('db.php');
  /*
  // 글자수 파악
  
  echo strlen('123abc'); //6
  echo mb_strlen('123abc'); //6
  echo strlen('강낭콩'); //9 한글로 된 것은 strlen 쓰면 안됨 받침까지 포함
  echo mb_strlen('강낭콩'); //3 mb_strlen 서버에 따라 안먹을 수 있음
  echo mb_strlen('가나다'); //3
  echo iconv_strlen('가나다'); //3 가장 안전한 방법

  // 글자수 변경
  // str_replace(B,C,A) A에서 B를 C로 변경
  $txt = 'php web 개발'; // web->app
  $result = str_replace('web','app',$txt);
  echo $result;
 

  // 글자수 추리기
  $abc = 'abcdefg';
  // iconv_substr(대상,start,length,charset);
  $abc2 = iconv_substr('$abc',0,5,'utf-8');
  echo $abc2;
   */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>홈 - 게시판</title>
  <link rel="stylesheet" href="css/bbs.css">
</head>
<body>
  <div class="wrapper">
    <h1>자유게시판</h1>

    <table>
      <thead>
        <tr>
          <th>번호</th>
          <th>제목</th>
          <th>글쓴이</th>
          <th>작성일</th>
          <th>조회수</th>
          <th>추천수</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $sql = "SELECT * FROM board order by idx desc";
        $result = $mysqli->query($sql);
        while($row = mysqli_fetch_assoc($result)){
          $title = $row['title'];
          if(iconv_strlen($title)>10){
            $title = str_replace($title,iconv_substr($title,0,10,'utf-8').'...',$title);
          }
      ?>
        <tr>
          <td><?= $row['idx'] ?></td>
          <td><a href=""><?= $title ?></a></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['date'] ?></td>
          <td><?= $row['hit'] ?></td>
          <td><?= $row['thumbsup'] ?></td>
        </tr>
      <?php
        }
      ?>
        
      </tbody>
    </table>

    <div class="links">
      <a href="">글쓰기</a>
    </div>
    <?php
      $mysqli->close();
    ?>
  </div>
</body>
</html>