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
    <style>
        .button-star {
  --button-label-x: 24px;
  --button-label-success-opacity: 0;
  --button-star-scale: 0.75;
  --button-star-greyscale: 85%;
  --button-star-hue: 170deg;
  --button-star-opacity: 0.45;
  --button-star-add-opacity: 0;
  --button-star-add-y: 16px;
  --button-star-current-opacity: 1;
  --button-star-current-y: 0px;
  --button-star-new-opacity: 0;
  --button-star-new-y: 16px;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  border: none;
  cursor: pointer;
  background-color: #1f2024;
  color: #fff;
  border-radius: 13px;
  outline: none;
  margin: 0;
  padding: 0;
  font-family: "Poppins";
  font-size: 14px;
  font-weight: 600;
  line-height: 20px;
  position: relative;
  text-align: center;
  display: flex;
  box-shadow: inset 0 0 0 1px #35373f, 0px 1px 3px rgba(52, 54, 63, 0.1), 0px 4px 10px rgba(52, 54, 63, 0.15);
  transition: transform 0.15s;
  transform: translateZ(0);
}
.button-star:active {
  transform: scale(0.985, 0.98) translateZ(0);
}
.button-star canvas {
  display: block;
  width: 400px;
  height: 200px;
  position: absolute;
  z-index: 1;
  left: -176px;
  top: -84px;
  pointer-events: none;
  filter: Grayscale(var(--button-star-greyscale)) hue-rotate(var(--button-star-hue));
  transform: scale(var(--button-star-scale));
  transform-origin: 50% 52%;
  opacity: var(--button-star-opacity);
}
.button-star .label {
  width: 90px;
  padding: 10px 0;
  transform: translateZ(0);
}
.button-star .label .default {
  display: block;
  transform: translateX(var(--button-label-x));
}
.button-star .label .default .success {
  opacity: var(--button-label-success-opacity);
}
.button-star .number {
  padding: 10px 0;
  width: 44px;
  position: relative;
  transform: translateZ(0);
}
.button-star .number:before {
  content: "";
  position: absolute;
  left: 0;
  top: 1px;
  bottom: 1px;
  width: 1px;
  background-color: #35373f;
}
.button-star .number .current {
  color: #8a8d9b;
  opacity: var(--button-star-current-opacity);
  transform: translateY(var(--button-star-current-y));
  transition: color 0.2s;
  display: block;
}
.button-star .number .new {
  opacity: var(--button-star-new-opacity);
  transform: translateY(var(--button-star-new-y));
  color: #fbfaaa;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  display: block;
}
.button-star .number .add {
  position: absolute;
  bottom: 100%;
  left: 0;
  right: 0;
  opacity: var(--button-star-add-opacity);
  transform: translateY(var(--button-star-add-y));
  pointer-events: none;
  color: #d0d0db;
  display: block;
}

html {
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
}

* {
  box-sizing: inherit;
}
*:before, *:after {
  box-sizing: inherit;
}



    </style>
    <!-- 주소
  ekfvoddl0321.dothome.co.kr/project/board/board.php
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
    <div class="board_section">
        <section class="board">
            <div class="title">
                <div class="title_box">
                    <h2>전기차 News</h2>
                    <p>전기차와 관련된 뉴스들은 제공합니다.</p>
                </div>
                <!-- 이미지 타입 -->
                    <!-- <div>
                        <img src="../assets/img/board_main.jpg" alt="이미지">
                    </div> -->
                </div>
            </div>
            <div class="board__inner">
                <div class="board__search">
                    <form action="newsSearch.php" name="newsSearch" method="get" class="board_form">
                        <fieldset>
                            <legend class="ir_so">뉴스 검색 영역</legend>
                            <div class="center inpyt_form">
                                <input type="search" name="searchKeyword" class="search-form" placeholder="검색어를 입력하세요." aria-label="search" required>
                                <button type="sumit" class="search_img"></button>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="news__cont">
<?php
    //b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView
    if(isset($_GET['page'])) {
        $page = (int) $_GET['page'];
    }else {
        $page = 1;
    }
    // 게시판 불러올 갯수
    $pageView = 5;
    $pageLimit = ($pageView * $page) - $pageView;
    $sql = "SELECT * FROM myNews ORDER BY newsID DESC LIMIT {$pageLimit}, {$pageView}";
    // $sql = "SELECT * FROM myNews WHERE newsDelete = 1 ORDER BY newsID DESC";
    $result = $connect -> query($sql);
    if($result){
        $count = $result -> num_rows;
        $news = $result -> fetch_array(MYSQLI_ASSOC);
    }
?>
<?php foreach($result as $news){ ?>
    <article class="news">
            <figure class="news__header">
                <a href="newsView.php?newsID=<?=$news['newsID']?>"><img src="../assets/img/news/<?=$news['newsImgFile']?>" alt="뉴스 이미지"></a>
            </figure>
            <div class="news__body">
                <div class="news__title"><a href="newsView.php?newsID=<?=$news['newsID']?>"><?=$news['newsTitle']?></a></div>
                <div class="news__desc"><a href="newsView.php?newsID=<?=$news['newsID']?>"><?=$news['newsContents']?></a></div>
                <div class="news__info">
                    <span class="author"><?=$news['newsAuthor']?></span>
                    <span class="date"><?=date('Y-m-d', $news['newsRegTime'])?></a></span>
                    <span class="view"><?=$news['newsView']?></a></span>
                    <!--좋아요 버튼-->
               
                        
                    <button class="button-star" onclick="like()">
                    <canvas></canvas>
                    <div class="label">
                        <span class="default">Star<span class="success">red</span></span>
                    </div>
                    <div class="number">
                        <span class="current"><?=$news['newsLike']?></span>
                        <span class="new">
                        
                        </span>
                        <div class="add">+1</div>
                    </div>
                    </button>

                   
                </div>
            </div>
    </article>
<?php } ?>
                </div>
                <div class="right">
                    <a href="newsWrite.php" class="search-btn">글쓰기</a>
                </div>
                <div class="board__pages">
                    <ul>
<?php
   include "newsPage.php";
?>
                    </ul>
                </div>
        </section>
    </div>
</main>
<?php
        include "../include/footer.php";
    ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
<script src="https://unpkg.com/gsap@3/dist/MotionPathPlugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/110/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/mrdoob/three.js@r110/examples/js/loaders/DRACOLoader.js"></script>
<script src="https://cdn.jsdelivr.net/gh/mrdoob/three.js@r110/examples/js/loaders/GLTFLoader.js"></script>

<script>
    let emailCheck = false;
        let nickCheck = false;

        function emailChecking(){
            let youEmail = $("#youEmail").val();

            if(youEmail == null || youEmail == ''){
                $("#youEmailComment").text("이메일을 입력해주세요!");
            } else {
                        $.ajax({
                            type : "POST",
                            url : "joinCheck.php",
                            data : {"youEmail": youEmail, "type": "emailCheck"},
                            dataType : "json",

                            success : function(data){
                                if(data.result == "good"){
                                    $("#youEmailComment").text("사용 가능한 이메일입니다.");
                                    emailCheck = true;
                                } else {
                                    $("#youEmailComment").text("이미 존재하는 이메일입니다. 로그인을 해주세요!");
                                    emailCheck = false;
                                }
                            },
                            error : function(request, status, error){
                                console.log("request" + request);
                                console.log("status" + status);
                                console.log("error" + error);
                            }
                        });
                    }
        }
</script>

<script>
    const addLight = (x, y, z, i, s) => {
  const light = new THREE.PointLight(0xffffff, i);
  light.position.set(x, y, z);
  s.add(light);
};

document.querySelectorAll(".button-star").forEach((button) => {
  const width = 400;
  const height = 200;

  const canvas = button.querySelector("canvas");

  const renderer = new THREE.WebGLRenderer({
    canvas: canvas,
    context: canvas.getContext("webgl2"),
    antialias: true,
    alpha: true,
  });

  renderer.setSize(width, height);
  renderer.setPixelRatio(4);

  const scene = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(45, width / height, 4, 100);

  camera.position.set(0, 0, 30);

  addLight(0, 1, 5, 0.2, scene);
  addLight(0, 2, 0, 0.3, scene);
  addLight(5, 0, 1, 0.2, scene);
  addLight(-5, 0, 1, 0.2, scene);
  addLight(3, 0, 5, 0.6, scene);

  scene.add(new THREE.AmbientLight(0xffffff));

  const loader = new THREE.GLTFLoader();

  loader.setCrossOrigin("anonymous");
  loader.setDRACOLoader(new THREE.DRACOLoader());

  loader.load(
    "https://assets.codepen.io/165585/star-default.glb",
    function (data) {
      const object = data.scene;
      object.position.set(0, -0.5, 0);
      scene.add(object);

      let scaleTween, rotateTweenXZ, rotateTweenY, rotateTweenZ;

      button.addEventListener("pointerenter", () => {
        if (button.classList.contains("active")) {
          return;
        }

        scaleTween = gsap.to(button, {
          "--button-star-scale": 1,
          ease: "elastic.out(1, .75)",
          duration: 0.5,
        });
        gsap.to(button, {
          "--button-star-greyscale": "0%",
          "--button-star-hue": "0deg",
          "--button-star-opacity": 1,
          duration: 0.15,
        });

        rotateTweenXZ = gsap.to(object.rotation, {
          duration: 0.25,
          x: THREE.Math.degToRad(4),
          z: THREE.Math.degToRad(12),
          ease: "none",
        });

        rotateTweenY = gsap.to(object.rotation, {
          duration: 1.5,
          y: THREE.Math.degToRad(360),
          ease: "none",
          repeat: -1,
        });

        rotateTweenZ = gsap.to(object.rotation, {
          duration: 4.5,
          keyframes: [
            {
              ease: "none",
              z: THREE.Math.degToRad(5),
            },
            {
              ease: "none",
              z: THREE.Math.degToRad(12),
            },
          ],
          repeat: -1,
        });
      });

      button.addEventListener("pointerleave", () => {
        if (button.classList.contains("active")) {
          return;
        }

        scaleTween.kill();
        rotateTweenXZ.kill();
        rotateTweenY.kill();
        rotateTweenZ.kill();
        gsap.to(button, {
          "--button-star-scale": 0.75,
          "--button-star-greyscale": "85%",
          "--button-star-hue": "170deg",
          "--button-star-opacity": 0.45,
          duration: 0.2,
        });
        gsap.to(object.rotation, {
          duration: 0.3,
          x: THREE.Math.degToRad(0),
          y: THREE.Math.degToRad(0),
          z: THREE.Math.degToRad(0),
        });
      });

      button.addEventListener("click", () => {
        if (button.classList.contains("active")) {
          gsap.to(button, {
            "--button-label-x": "24px",
            "--button-label-success-opacity": 0,
            "--button-star-opacity": 0.45,
            "--button-star-current-opacity": 1,
            "--button-star-current-y": "0px",
            "--button-star-new-opacity": 0,
            "--button-star-new-y": "16px",
            duration: 0.25,
            clearProps: true,
            onComplete() {
              button.classList.remove("active");
            },
          });
          return;
        }
        scaleTween.kill();
        rotateTweenY.kill();

        button.classList.add("active");

        gsap.to(button, {
          "--button-star-current-opacity": 0,
          "--button-star-current-y": "-16px",
          "--button-star-new-opacity": 1,
          "--button-star-new-y": "0px",
          "--button-star-add-opacity": 1,
          duration: 0.25,
          delay: 0.5,
        });

        gsap.to(button, {
          "--button-label-x": "0px",
          "--button-label-success-opacity": 1,
          duration: 0.25,
          delay: 0.2,
        });

        gsap.to(button, {
          "--button-star-add-opacity": 0,
          duration: 0.2,
          delay: 0.75,
        });

        gsap.to(button, {
          "--button-star-add-y": "-8px",
          duration: 0.5,
          delay: 0.5,
        });

        gsap.to(button, {
          "--button-star-scale": 1,
          "--button-star-greyscale": "0%",
          "--button-star-hue": "0deg",
          "--button-star-opacity": 1,
          duration: 0.15,
        });

        gsap.to(object.rotation, {
          duration: 0.4,
          y: THREE.Math.degToRad(0),
        });

        gsap.to(object.position, {
          duration: 0.7,
          motionPath: {
            path: [
              {
                x: 0,
                y: -0.5,
              },
              {
                x: 5.45,
                y: -5,
              },
              {
                x: 10.9,
                y: -0.5,
              },
              {
                x: 7,
                y: 7,
              },
            ],
            curviness: 1.2,
          },
          ease: "sine.in",
        });

        gsap.to(button, {
          "--button-star-opacity": 0,
          duration: 0.1,
          delay: 0.6,
          onComplete() {
            object.rotation.x = THREE.Math.degToRad(0);
            object.rotation.y = THREE.Math.degToRad(0);
            object.rotation.z = THREE.Math.degToRad(0);
            object.position.set(0, -0.5, 0);
            gsap.set(button, {
              "--button-star-scale": 0.75,
              "--button-star-greyscale": "85%",
              "--button-star-hue": "170deg",
              "--button-star-opacity": 0,
            });
          },
        });
      });
    }
  );

  const render = () => {
    requestAnimationFrame(render);

    renderer.render(scene, camera);
  };

  render();
});

</script>
</body>
</html>