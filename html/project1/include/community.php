<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Charger Find</title>
    <!-- 주소
  ekfvoddl0321.dothome.co.kr/project/include/community.php
 -->
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

<main id="main">
    <div class="main_section">
        <section class="community" id="community">
            <div class="community_box">
                <h3>우리가 함께하는,<br>커뮤니티</h3>
                <div class="community_list">
                   <a href="../board/board.php"><div>
                        <h4>자유게시판</h4>
                        <p>더 나은 세상을 위해<br>모두가 소통하는 공간</p>
                    </div></a> 
                   <a href="../notice/notice.php"><div>
                        <h4>공지사항</h4>
                        <p>새로운 소식을<br>빠르게 만나보세요</p>
                    </div></a> 
                   <a href="../service/service.php"><div>
                        <h4>고객센터</h4>
                        <p>무엇을 도와드릴까요?<br>전화 상담 문의</p>
                    </div></a> 
                </div>
            </div>
        </section>
    </div>
</main>

<?php
        include "../include/footer.php";
    ?>

<script>
            $(window).scroll(()=>{
               if( $(window).scrollTop() >= $(".community_box").offset().top - $(window).height()/2){
                   $(".community_box h3").addClass("show");
                   $(".community_list a").addClass("show");
            }
        })
</script>
</body>
</html>