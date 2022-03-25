<?php
    
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>댓글</title>
    <?php
        include "../include/style.php";
    ?>
    <!--//style-->
</head>
<body>
<?php
            include "../include/skip.php";
        ?>
    <!--skip--> 
    <?php
         include "../include/header.php";
    ?>
<!--header-->

<main id="contents">
    <h2 class="ir_so">컨텐츠 영역</h2>        
    <section id="card-type" class="section center">
        <div class="container">
            <h3 class="section__title">아름다운 자연 경관</h3>
            <p class="section__desc">
                아름다운 자연 경관을 보고 댓글을 남겨보세요!
                
            </p>
            <div class="card__inner">
                <article class="card">
                    <figure class="card__header">
                        <img class="card__img" src="img/card1.jpg" alt="이미지1">
                    </figure>
                    <div class="card__body">
                        <h3 class="card__title">푸른 초원의 목장</h3>
                        <p class="card__desc">대관령 같기도 하고 알프스의 목장 같기도하죠? 자연과 함께하고 싶네요~ 날씨가 좋은 날에 공원이라도 가서 잠시 누워보는건 어떨까요?</p>
                        <a class="card__btn" href="#">
                            더 자세히 보기
                            <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                            </svg>
                        </a>
                    </div>
                </article>
                <article class="card">
                    <figure class="card__header">
                        <img class="card__img" src="img/card2.jpg" alt="이미지2">
                    </figure>
                    <div class="card__body">
                        <h3 class="card__title">시원한 바람이 부는 계곡</h3>
                        <p class="card__desc">어디론가 훌쩍 떠나버리고 싶은 날 이렇게 시원한 바람이 부는 계곡 사진이라도 보면 마음이 뻥 뚫리는듯 하죠? 창문을 열고 바람을 느껴보며 기분전환을 하는건 어떨까요?</p>
                        <a class="card__btn" href="#">
                            더 자세히 보기
                            <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                            </svg>
                        </a>
                    </div>
                </article>
                <article class="card">
                    <figure class="card__header">
                        <img class="card__img" src="img/card3.jpg" alt="이미지3">
                    </figure>
                    <div class="card__body">
                        <h3 class="card__title">노을이 아름다운 해변</h3>
                        <p class="card__desc">노을이 지는 아름다운 해변이에요! 바다에 가서 물에 발도 담그며 물놀이를 하고싶네요~ 집에만 있지말고 가까운 바다에 나들이를 가는건 어떤가요? 상상만해도 좋네요.</p>
                        <a class="card__btn" href="#">
                            더 자세히 보기
                            <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                            </svg>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section id="comment-type" class="section center purple">
        <h3 class="section__title">강의 신청하기</h3>
        <p class="section__desc">강의 신청하기는 누구나 댓글을 달 수 있습니다. 회원가입 하지 않아도 신청 가능합니다. 100글자 이내로 작성해주세요.</p>
        <div class="comment__inner">
            <div class="comment__form">
                <form action="commentSave.php" method="post" name="comment">
                    <fieldset>
                        <legend class="ir_so">댓글쓰기</legend>
                        <div class="comment__wrap">
                            <div>
                                <label for="youName" class="ir_so">이름</label>
                                <input type="text" name="youName" id="youName" class="input__style" placeholder="이름" autocomplete="off" required>
                            </div>
                            <div>
                                <label for="youText" class="ir_so">댓글 쓰기</label>
                                <input type="text" name="youText" id="youName" class="input__style width" placeholder="보고싶은 자연 경관을 적어주세요!" autocomplete="off" required>
                            </div>
                            
                            <button class="comment__btn" type="submit" value="댓글 작성하기">작성하기</button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="comment__list">
                <!-- <div class="list">
                    <p class="comment__desc">저 신청할께요! 남극의 풍경이 보고싶어요.남극의 풍경이 보고싶어요.</p>
                    <div class="icon">
                        <div class="comment__icon">
                            <span class="face"><img src="img/face.png" alt="아이콘"></span>
                            <span class="name">쓴 사람</span>
                            <span class="date">2022-03-17</span>
                        </div>
                    </div>
                </div> -->
                <?php
                    include "../connect/connect.php";

                    $sql = "SELECT * FROM myComment";
                    $result = $connect -> query($sql);

                    // $commentInfo = mysqli_fetch_array($result);
                    
                    // echo "<pre>";
                    // var_dump($commentInfo);
                    // echo "</pre>";
                    if($result){
                        $count = $result -> num_rows;
                        if($result > 0){
                            for($i=1; $i<=$count; $i++){
                                $commentInfo = $result -> fetch_array(MYSQLI_ASSOC);

                                echo "<div class='list'>";
                                echo "<p class='comment__desc'>".$commentInfo['youText']."</p>";
                                echo "<div class='icon'>";
                                echo "<div class='comment__icon'>";
                                echo "<span class='face'><img src='img/face.png' alt='아이콘'></span>";
                                echo "<span class='name'>".$commentInfo['youName']."</span>";
                                echo "<span class='date'>".date('Y-m-d', $commentInfo['regTime'])."</span>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                    }
                ?>
                    
               
              
            </div>
        </div>
    </section>        
</main>

    <?php
        include "../include/footer.php";
    ?>
</body>
</html>