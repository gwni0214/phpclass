<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 사이트</title>
    <style>
       
       
    </style>
    <?php
            include "../include/style.php";
        ?>
    <!--//style-->
</head>
<body>
<?php
        include "../include/header.php";
    ?>
    <!--//header-->
    <section id="banner">
        <h3 class="ir_so">배너 영역</h3>
            <div class="slider__wrap">
                <div class="slider__img">
                    <div class="slider__inner">
                        <div class="slider s1">
                            <div class="desc">
                                <span>DEVELOPER</span>
                                <h4>NEW PROJECT</h4>
                                <p>너무 무리하지 말아요!
                                    <br>이미 당신은 해내고 있고!
                                    <br>앞으로도 잘 할 수 있어요! 
                                </p>
                                <div class="btn">
                                    <a href="#" class="white">자세히 보기</a>
                                    <a href="#" class="black">사이트 보기</a>
                                </div>
                            </div>
                        </div>
                        <div class="slider s2">
                            <div class="desc">
                                <span>DEVELOPER</span>
                                <h4>NEW PROJECT</h4>
                                <p>너무 무리하지 말아요!
                                    <br>이미 당신은 해내고 있고!
                                    <br>앞으로도 잘 할 수 있어요! 
                                </p>
                                <div class="btn">
                                    <a href="#" class="white">자세히 보기</a>
                                    <a href="#" class="black">사이트 보기</a>
                                </div>
                            </div>
                        </div>
                        <div class="slider s3">
                            <div class="desc">
                                <span>DEVELOPER</span>
                                <h4>NEW PROJECT</h4>
                                <p>너무 무리하지 말아요!
                                    <br>이미 당신은 해내고 있고!
                                    <br>앞으로도 잘 할 수 있어요! 
                                </p>
                                <div class="btn">
                                    <a href="#" class="white">자세히 보기</a>
                                    <a href="#" class="black">사이트 보기</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider__btn">
                    <a href="#" class="prev"></a>
                    <a href="#" class="next"></a>
                </div>
                <div class="slider__dot"></div>
            </div>                                                                        
    </section>
    
    <!-- //banner -->
    
    <main id="contents">
    
    <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="blog-type" class="section center type">
            <div class="container">
                <h3 class="section__title">새로운 자연 경관</h3>
                <p class="section__desc">
                    자연 경관을 담은 블로그를 만나보세요!                   
                </p>
                <div class="blog__inner">
                    <div class="blog__cont">
<?php
 if(isset($_GET['page'])) {
    $page = (int) $_GET['page'];
}else {
    $page = 1;
}
    $pageView = 3;
    $pageLimit = ($pageView * $page) - $pageView;
    $sql ="SELECT blogID, blogTitle, blogCategory, blogContents, blogAuthor, blogRegTime, blogImgFile FROM myBlog WHERE blogDelete = 1 ORDER BY blogID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);
    $blog = $result -> fetch_array(MYSQLI_ASSOC);
?>
<?php foreach($result as $blog){ ?>
    <article class="blog">
        <figure class="blog__header" aria-hidden="true">
            <a href="../blog/blogView.php?blogID=<?=$blog['blogID']?>" style="background-image:url(../asset/img/blog/<?=$blog['blogImgFile']?>)"></a> 
        </figure> 
        <div class="blog__body"> 
            <span class="blog__cate"><?=$blog['blogCategory']?></span> 
            <div class="blog__title"><?=$blog['blogTitle']?></div> 
            <div class="blog__desc"><?=$blog['blogContents']?></div> 
                <div class="blog__info"> 
                    <span class="author"><a href="#"><?=$blog['blogAuthor']?></a></span> 
                    <span class="date"><?=date('Y-m-d',$blog['blogRegTime'])?></span>                              
                </div> 
        </div> 
    </article> 
<?php } ?>
                        
                        
                    </div>
                    <div class="blog__btn">
                        <a href="../blog/blog.php">더 보기</a>
                    </div>
                </div>
            </div>
        </section>

        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="blog-type" class="section center mb100 type gray">
            <div class="container">
                <h3 class="section__title">웹 퀴즈</h3>
                <p class="section__desc">
                    신비로운 자연의 문제를 풀어보세요.                   
                </p>
                <div class="quiz__inner">
                    <div class="quiz__header">                       
                        <div class="quiz__subject">
                            <label for="quizSubject">과목 선택</label>
                            <select name="quizSubject" id="quizSubject">
                                <option value="javascript">javascript</option>
                                <option value="jquery">jquery</option>
                                <option value="html">html</option>
                                <option value="css">css</option>
                            </select>
                        </div>
                    </div>
                    <div class="quiz__body">
                        <div class="title">
                            <span class="quiz__num"></span>.
                            <span class="quiz__ask"></span>
                            <div class="quiz__desc"></div>
                        </div>
                        <div class="contents">
                        <div class="quiz__selects">
                        <label for="select1">
                            <input class="select" type="radio" id="select1" name="select" value="1">
                            <span class="choice"></span>
                        </label>
                        <label for="select2">
                            <input class="select" type="radio" id="select2" name="select" value="2">
                            <span class="choice"></span>
                        </label>
                        <label for="select3">
                            <input class="select" type="radio" id="select3" name="select" value="3">
                            <span class="choice"></span>
                        </label>
                        <label for="select4">
                            <input class="select" type="radio" id="select4" name="select" value="4">
                            <span class="choice"></span>
                        </label>                       
                    </div>
                        </div>
                    </div>
                    <div class="quiz__footer">
                        <div class="quiz__btn">
                            <button class="comment green none">해설 보기</button>
                            <button class="next orange right ml10 none">다음 문제</button>
                            <button class="confirm green right">정답 확인</button>
                        </div>                        
                    </div>
                </div>
            </div>
            <!-- layer -->
            <div class="layer_bg"></div>
            <div class="layer">
                <h2>해설보기</h2>
                <p id="quizComment"></p>
                <a href="#javascript;;" class="close">닫기</a>
            </div>
            <!-- layer -->
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>

             //레이어 팝업
                $(".comment").click(function(){                   
                    $(".layer").show();
                    $(".layer_bg").show();
                });
                $(".layer .close").click(function(){
                    $(".layer").slideUp(300);
                    $(".layer_bg").hide(0);
                });
        let quizAnswer = "";

        function quizView(view){
            $(".quiz__num").text(view.quizID);
            $(".quiz__ask").text(view.quizAsk);
            $("#select1 + span").text(view.quizChoice1);
            $("#select2 + span").text(view.quizChoice2);
            $("#select3 + span").text(view.quizChoice3);
            $("#select4 + span").text(view.quizChoice4);
            $("#quizComment").text(view.quizComment);
            quizAnswer = view.quizAnswer;                                       
        }
        //다음 문제 넘어가기
        function quizNext(){

        }

        //정답 체크 : 했는지 안했는지
        function quizCheck(){
            let selectCheck = $(".quiz__selects input:checked").val();
            
            //정답을 체크 안했으면
            if(selectCheck == null || selectCheck == ''){
                alert("정답을 체크해주세요!!!");
                
            } else {
                $(".quiz__btn .next").fadeIn();
                $(".quiz__btn .comment").fadeIn();
                    
                //정답을 체크 했으면
                if(selectCheck == quizAnswer){
                    //정답
                    $(".quiz__selects #select"+quizAnswer).addClass("correct");
                    $(".quiz__selects input").attr("disabled", true);                    
                } else {
                    //오답
                    $(".quiz__selects #select"+selectCheck).addClass("incorrect");
                    $(".quiz__selects #select"+quizAnswer).addClass("correct"); 
                    $(".quiz__selects input").attr("disabled", true);                     
                }
            }
            
        }

        //문제 데이터 가져오기
        function quizData(){
            let quizSubject = $("#quizSubject").val();
          
            $.ajax({
                url: "../quiz/quizInfo.php",
                method: "POST",
                data: {"quizSubject": quizSubject},
                dataType: "json",
                success : function(data){
                    // console.log(data.quiz);
                    quizView(data.quiz);
                    
                },
                error: function(request, status, error){
                    console.log('request' + request);
                    console.log('status' + status);
                    console.log('error' + error);
                }
            })
        }
        quizData();
        //과목 선택하면 체인지
        $("#quizSubject").change(function(){
            quizData();
        });

        //정답 확인
        $(".quiz__btn .confirm").click(function(){
            //정답을 클릭 했는지 안했는지 판단하기
            quizCheck();
            //누르면 나타나게 하기           
            
            
            
            // $(".quiz__btn .next").show() / hide/ toggle;
            // $(".quiz__btn .next").fadeIn / Out/ toggle();
            // $(".quiz__btn .next").slideDown / Up/ Toggle();           
        });

        //다음 문제 버튼을 클릭했을 때
        $(".quiz__btn .next").click(function(){
            quizData();
            $(".quiz__selects input").attr("disabled", false);
            $(".quiz__selects input").prop("checked", false);   //checked 해제
            $(".quiz__selects input").removeClass("correct");
            $(".quiz__selects input").removeClass("incorrect");
            $(".quiz__btn .next").fadeOut();
            $(".quiz__btn .comment").fadeOut();
        });
    </script>
    <div class="container">
     <div class="card__inner mb100">
                <article class="card">
                    <figure class="card__header">
                        <img class="card__img" src="../comment/img/card1.jpg" alt="이미지1">
                    </figure>
                    <div class="card__body">
                        <h3 class="card__title">푸른 초원의 목장</h3>
                        <p class="card__desc">대관령 같기도 하고 알프스의 목장 같기도하죠? 자연과 함께하고 싶네요~ 날씨가 좋은 날에 공원이라도 가서 잠시 누워보는건 어떨까요?</p>
                        <a class="card__btn" href="../blog/blog.php">
                            더 자세히 보기
                            <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                            </svg>
                        </a>
                    </div>
                </article>
                <article class="card">
                    <figure class="card__header">
                        <img class="card__img" src="../comment/img/card2.jpg" alt="이미지2">
                    </figure>
                    <div class="card__body">
                        <h3 class="card__title">시원한 바람이 부는 계곡</h3>
                        <p class="card__desc">어디론가 훌쩍 떠나버리고 싶은 날 이렇게 시원한 바람이 부는 계곡 사진이라도 보면 마음이 뻥 뚫리는듯 하죠? 창문을 열고 바람을 느껴보며 기분전환을 하는건 어떨까요?</p>
                        <a class="card__btn" href="../blog/blog.php">
                            더 자세히 보기
                            <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                            </svg>
                        </a>
                    </div>
                </article>
                <article class="card">
                    <figure class="card__header">
                        <img class="card__img" src="../comment/img/card3.jpg" alt="이미지3">
                    </figure>
                    <div class="card__body">
                        <h3 class="card__title">노을이 아름다운 해변</h3>
                        <p class="card__desc">노을이 지는 아름다운 해변이에요! 바다에 가서 물에 발도 담그며 물놀이를 하고싶네요~ 집에만 있지말고 가까운 바다에 나들이를 가는건 어떤가요? 상상만해도 좋네요.</p>
                        <a class="card__btn" href="../blog/blog.php">
                            더 자세히 보기
                            <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                            </svg>
                        </a>
                    </div>
                </article>
            </div>
            </div>
    <!--blog__type-->
    <section id="notice-type" class="section center mb100 gray">
        <div class="container">
            <h3 class="section__title">새로운 자연 경관</h3>
            <p class="section__desc">
                자연 경관을 담은 블로그를 만나보세요!                   
            </p>
            <div class="notice__inner">
                <article class="notice">
                    <h4>공지사항</h4>
                    <ul>
<?php
    $pageView = 4;
    $pageLimit = ($pageView * $page) - $pageView;
    $sql ="SELECT boardID, boardTitle, boardContents, regTime FROM myBoard ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);
    $board = $result -> fetch_array(MYSQLI_ASSOC);
    
?>

<?php foreach($result as $board){ ?>
                        <li><a href="../board/boardView.php?boardID=<?=$board['boardID']?>"><?=$board['boardTitle']?></a><span class="time"><?=date('Y-m-d',$board['regTime'])?></span></li>
                       
<?php } ?>
                    </ul>
                    <a href="../board/board.php" class="more">더보기</a>
                </article>
                <article class="notice">
                    <h4>댓글</h4>
                    <ul>
<?php
    $pageView = 4;
    $pageLimit = ($pageView * $page) - $pageView;
    $sql ="SELECT youText, regTime FROM myComment ORDER BY commentID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);
    $comment = $result -> fetch_array(MYSQLI_ASSOC);
?>

<?php foreach($result as $comment){ ?>
                        <li><a href="../comment/comment.php"><?=$comment['youText']?></a><span class="time"><?=date('Y-m-d',$comment['regTime'])?></span></li>
                       
<?php } ?>
                    </ul>
                    <a href="../comment/comment.php" class="more">더보기</a>
                </article>
            </div>
        </div>        
    </section>


    </main>
    <!--//main-->

    <?php
    include "../include/footer.php";
    ?>


<script>                 
        //배너
        const sliderWrap = document.querySelector(".slider__wrap");
        const sliderImg = document.querySelector(".slider__img");       //이미지 보이는 영역
        const sliderInner = document.querySelector(".slider__inner");   //이미지 움직이는 영역
        const slider = document.querySelectorAll(".slider");            //5개의 이미지 저장
        const sliderBtn = document.querySelector(".slider__btn");
        const sliderBtnPrev = sliderBtn.querySelector(".prev");
        const sliderBtnNext = sliderBtn.querySelector(".next");
        const sliderDot = document.querySelector(".slider__dot");

        let currentIndex = 0;
        let sliderWidth = sliderImg.offsetWidth;    //이미지 가로 값
        let sliderLength = slider.length;   //이미지 갯수
        let sliderFirst = slider[0];    //첫 번째 이미지
        let sliderLast = slider[sliderLength - 1];    //마지막 이미지
        let cloneFirst = sliderFirst.cloneNode(true);   //첫 번째 이미지 복사
        let cloneLast = sliderLast.cloneNode(true);   //첫 번째 이미지 복사
        let posInitial = "";
        let dotIndex = "";
        let sliderTimer = "";
        let interval = 3000;

        //이미지 복사 appendTo/prependTo : append/prepend
        sliderInner.appendChild(cloneFirst);
        sliderInner.insertBefore(cloneLast, sliderFirst);

        function gotoSlider(index){
            sliderInner.classList.add("transition");
            sliderInner.style.left = -100 * (index+1)+"vw";

            currentIndex = index;
            dotAct();   
            console.log(currentIndex);     
        };
        

        sliderBtnPrev.addEventListener("click", () => {
            let prevIndex = currentIndex - 1;
            gotoSlider(prevIndex);
        });
        
        sliderBtnNext.addEventListener("click", () => {
            let nextIndex = currentIndex + 1;
            gotoSlider(nextIndex);
        });

        function dotInit(){
            for(let i=0; i<sliderLength; i++){
                dotIndex += "<a href='#' class='dot'></a>";
            }
            dotIndex += "<a href='#' class='play'>play</a>";
            dotIndex += "<a href='#' class='stop show'>stop</a>";
            sliderDot.innerHTML = dotIndex;
            sliderDot.firstElementChild.classList.add("active");
        }
        dotInit();
        
        //닷 버튼 액티브 활성화 
        function dotAct(){           
        dotActive = document.querySelectorAll(".slider__dot .dot"); 
            dotActive.forEach((el)=>{
                el.classList.remove("active");                  
            });
            if(currentIndex == sliderLength){   //마지막 이미지 왔을 때
                dotActive[0].classList.add("active");
            } else if(currentIndex == -1){
                dotActive[sliderLength-1].classList.add("active");
            } else {
                dotActive[currentIndex].classList.add("active");   //현재 보고있는 닷 활성화
            }       
           
            
        }
       
        function autoPlay(){
            sliderTimer = setInterval(() => { 
                gotoSlider(currentIndex + 1);
            }, interval)
        }   
        autoPlay();

        function stopPlay(){
            clearInterval(sliderTimer);
        }

        sliderInner.addEventListener("transitionend", () => {
            sliderInner.classList.remove("transition");
            
            if(currentIndex == -1){
                sliderInner.style.left = -(sliderLength * 100) + "vw";
                currentIndex = sliderLength -1;
            }
            if(currentIndex == sliderLength){
                sliderInner.style.left = -(1 * 100) + "vw";
                currentIndex = 0;
            }
        });
        //마우스엔터 이벤트
        sliderInner.addEventListener("mouseenter", () => {
            stopPlay();
        });
        sliderInner.addEventListener("mouseleave", () => {
            let stopClass = document.querySelector(".stop").classList.contains("show");
            if(stopClass){
                autoPlay();
            }
        });
        sliderBtnPrev.addEventListener("mouseenter", () => {
            stopPlay();
        });
        sliderBtnNext.addEventListener("mouseenter", () => {
            stopPlay();
        });
        document.querySelector(".play").addEventListener("mouseenter", () => {
            stopPlay();
        });
        document.querySelector(".stop").addEventListener("mouseenter", () => {
            stopPlay();
        });

    

       //플레이, 정지 이벤트
       document.querySelector(".play").addEventListener("click",()=>{
            document.querySelector(".play").classList.remove("show");
            document.querySelector(".stop").classList.add("show");
            autoPlay();
        });
        document.querySelector(".stop").addEventListener("click",()=>{
            document.querySelector(".stop").classList.remove("show");
            document.querySelector(".play").classList.add("show");                                  
            stopPlay();
        });


        document.querySelectorAll(".slider__dot .dot").forEach((el,i)=>{
            el.addEventListener("mouseenter", () => {
            stopPlay();
            });
            el.addEventListener("click",()=>{
                gotoSlider(i);
            })
        });
             
    </script> 


    
</body>
</html>