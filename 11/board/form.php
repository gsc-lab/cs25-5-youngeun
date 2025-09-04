<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 폼</title>
    <script>
        function check_input(){
            if(!document.board.subject.vlaue) {
                alert("제목을 입력하세요.");
                return;
            }
            if(!document.form.content.vlaue) {
                alert("내용을 입력하세요.");
                document.form.content.focus();
                return;
            }
            document.form.submit();
        }
    </script>
    <section>
        <div id="main_img_bar">
            <img src="./img/main_img.png">
        </div>
        <div id="board_box">
            <h3 id="board_title">게시판> 글쓰기</h3>
            <form name="board_form" method="post" action="board_insert.php" enctype="multipart/form-data">
                <ul id="board_form">
                    <li>
                        <span class="col1">이름: </span>
                        <span class="col2"><?=$username?></span>
                    </li>
                    <li>
                        <span class="col1">제목: </span>
                        <span class="col2"><input name="subject" type="text"></span>
                    </li>
                    <li id="text_area">
                        <span class="col1">내용: </span>
                        <span class="col2"><textarea name="content"></span>
                    </li>
                    <li>
                        <span class="col1">첨부 파일</span>
                        <span class="col2"><input type="file" name="upfile"></span>
                    </li>
                </ul>
                <ul class="buttons">
                    <li><button type="button" onclick="check_input">완료</li>
                    <li><button type="button" onclick="localtion.href='board_list.php'">목록</button></li>
                </ul>
            </form>
        </div>
    </section>
</head>
<body>
    
</body>
</html>