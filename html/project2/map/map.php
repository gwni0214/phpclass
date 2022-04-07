<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>지도보기</title>
    <!-- style -->
    <?php
            include "../include/style.php";
    ?>
    <!-- //style -->
</head>
<body>
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <main id="main">
        <div class="board_section">
            <section class="board">
                <div class="title">
                    <div class="title_box">
                        <h2>지도 살펴보기</h2>
                        <p>전기차 충전소위치를 제공해 드립니다.</p>
                    </div>
                </div>
                <div class="container">
                    <div class="rC">
                        <div class="rSC">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3170.77220950822!2d126.95528431573746!3d37.37156647983489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357b6755947b14d3%3A0x4fa3b3ab2668672d!2z66CI64W467KE7JWI7JaR7IS87YSw!5e0!3m2!1sko!2skr!4v1565828000992!5m2!1sko!2skr" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <form action="mapSearch.php" name="map" method="get">
                        <h3>지역 선택하기</h3>
                        <p>선택한 위치의 전기차 충전소 위치를 제공해 드립니다.</p>
                        <fieldset>
                            <legend class="ir_so">위치 선택 영역</legend>
                            <div class="choice_btn">
                                <button>서울</button>
                                <button>인천</button>
                                <button>대전</button>
                                <button>대구</button>
                                <button>광주</button>
                                <button>울산</button>
                                <button>부산</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </section>
        </div>
    </main>

    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>