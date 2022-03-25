<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        include "../include/style.php";
    ?>
</head>
<body>
<?php
        include "../include/header.php";
    ?>
    <!--//header-->
    

    <main id="main">
    <div class="main_section">
        <div class="main_img"></div>
        <section class="section_info">
            <h2>Grow Sustainably<br> Charger Find</h2>
            <p>친환경 혁신으로 지속 가능한 성장을 추구합니다</p>
            <div class="info_img">
                <h3>에너지에 대한 <br>새로운 접근</h3>
                <img src="../asset/img/windmill.jpg" alt="img1">
            </div>
        </section>
        <section class="section_info2">
            <h3>전기 충전소의 새로운 가치를 창출하고<br>청정 연료를 통해 친환경 산업을 지지합니다.</h3>
            <span>#친환경</span>
            <span>#충전소</span>
            <p>환경부는 2011년부터 온실가스와 대기오염물질을 줄여 대기질을 개성하고자
                전기자동차 보급사업을 추진하고 있습니다. 
                그에따라, 전기자동차 구매보조금을 지원하고 전기자동차 구매 시 세제 감경 등 운행 인센티브와 구매 보조금 지원 절차에 대해 알려드립니다.
                또한, 실시간 정보를 고객분들과 공유하고, 안전하고 올바른 정보를 주고자 노력합니다.</p>
        </section>
        <section class="section_news">
            <div class="news_img">
                <div class="news_img1"></div>
                <div class="news_img2"></div>
                <div class="news_img3"></div>
            </div>
            <div class="news_text">
                <h3>새로운 소식<br>놓치지 마세요!</h3>
                <p class="news_text_1">실시간으로 바뀌는 전기차 시장
                    우리는 여러분께 정보를 제공합니다.</p>
                <span>#전기차</span><span>#지원금</span>
                <p class="news_text_2">차저찾어는 다양한 정보를 통해 고객여러분과 소통하며, 함께 발전해 갑니다.
                    실시간으로 바뀌는 가격정보와 위치정보를 업데이트하여,  새로운 뉴스정보를
                    모두 바로바로 만나보세요!</p>
            </div>
        </section>
        <section class="community">
            <div class="community_box">
                <h3>우리가 함께하는,<br>커뮤니티</h3>
                <div class="community_list">
                    <div>
                        <h4>자유게시판</h4>
                        <p>더 나은 세상을 위해<br>모두가 소통하는 공간</p>
                    </div>
                    <div>
                        <h4>공지사항</h4>
                        <p>새로운 소식을<br>빠르게 만나보세요</p>
                    </div>
                    <div>
                        <h4>고객센터</h4>
                        <p>무엇을 도와드릴까요?<br>전화 상담 문의</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
    include "../include/footer.php";
?>
</body>
</html>