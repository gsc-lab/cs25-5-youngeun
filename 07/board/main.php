        <div id="main_img_bar">
            <!-- 메인 이미지 영역 -->
            <img src="img/main_img.png">
        </div>
        <div id="main_content">
            <div id="latest">
                <h4>최근 게시글(15장)</h4>
                <ul>
                    <!-- 최근 게시 글 DB에서 불러오기 -->
                    <?php
                    // 데이터베이스 연결
                    $con = mysqli_connect("localhost", "user", "12345", "sample");

                    // board 테이블에서 num 내림차순으로 정렬 -> 최근 5개만 가져오기
                    $sql = "select * from board order by num desc limit 5";
                    $result = mysqli_query($con, $sql);

                    // 결과가 없으면 메시지 출력
                    if (!$result)
                        echo "게시판 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
                    else {
                        // 결과가 있으면 한 줄씩 꺼내오기
                        while ($row = mysqli_fetch_array($result)) {
                            $regist_day = substr($row["regist_day"], 0, 10);
                    ?>
                            <li>
                                <!-- 글 제목 -->
                                <span><?= $row["subject"] ?></span>
                                <!-- 작성자 -->
                                <span><?= $row["name"] ?></span>
                                <!-- 작성일 -->
                                <span><?= $regist_day ?></span>
                            </li>
                    <?php
                        }
                    }
                    ?>
            </div>

        </div>