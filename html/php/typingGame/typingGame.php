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
    <title>Document</title>
    <?php
            include "../include/style.php";
        ?>

<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins';
        }
        .gameCont {
            background: #17a2b8 !important;
        }
        .typing__wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .typing__inner {
            min-width: 900px;
            width: 60vw;
            min-height: 40vh;
            background: #fff;
            border-radius: 20px;
            padding: 40px; 

        }
        .input__field {
            position: absolute;
            left: 10px;
            top: 10px;
            padding: 10px;
        }
        .typing__text {
            border: 1px solid #c3c3c3;
            border-radius: 10px;
            padding: 30px;
            min-height: 300px;
            font-size: 22px;
            font-weight: 300;
            text-align: justify;
            word-break: break-all;
        }
        .typing__info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }
        .typing__info ul {
            display: flex;
            justify-content: space-around;
            width: 100%;
        }
        .typing__info ul li {
            width: 20%;
            list-style: none;
            display: flex;
            font-size: 20px;
            border-left: 1px solid #c3c3c3;
            padding-left: 10px;
        }
        .typing__info ul li:first-child {
            padding-left: 0;
            border-left: 0;
        }
        .typing__info ul li p {
           white-space: nowrap;
        }
        .typing__info ul li span {
            padding: 0 10px;
        }        
        .typing__info button {
            width: 210px;
            background: #17a2b8;
            font-family: 'Poppins';
            border: 0;          
            color: #fff;
            border-radius: 5px;
            padding: 10px;
            font-size: 22px;
            margin-left: 20px;
            cursor: pointer;
        }
        .typing__text p span {
            position: relative;
        }
        .typing__text p span.correct {
            color: rgb(33, 236, 33)
        } 
        .typing__text p span.incorrect {
            color: rgb(253, 221, 227);
            background: rgb(248, 114, 137);
            outline: 1px solid #fff;
            border-radius: 4px;
        } 
        .typing__text p span.active {
            color: #17a2b8;
        }        
        .typing__text p span.active::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: skyblue;
            animation: blink 1s ease-in-out infinite;
            opacity: 0;
        }
        @keyframes blink {         
            50% {opacity: 1;};          
        }
    </style>
    <!--//style-->
</head>
<body>
<?php
        include "../include/header.php";
    ?>
    <!--//header-->

    <main id="contents">
    <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="blog-type" class="section center mb100 type gray">
            <div class="container gameCont">

                <div class="typing__wrap">
                    <input type="text" class="input__field">
                    <div class="typing__inner">
                        <div class="typing__text">
                            <p></p>
                        </div>
                        <div class="typing__info">
                            <ul>
                                <li class="time">
                                    <p>Time Left</p>
                                    <span><b>60</b>s</span>
                                </li>
                                <li class="mistake">
                                    <p>Mistakes :</p>
                                    <span>0</span>
                                </li>
                                <li class="wpm">
                                    <p>WPM :</p>
                                    <span>0</span>
                                </li>
                                <li class="cpm">
                                    <p>CPM :</p>
                                    <span>0</span>
                                </li>
                            </ul>
                            <button class="again">Try Again</button>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
    
    <?php
    include "../include/footer.php";
    ?>


<script>
        const paragraphs = [
            "One in four American adults is unvaccinated or only partially vaccinated, and that number isn't budging much these days. Fewer than 80,000 adults are getting their first shot every day-a 96% drop from the more than 2 million a day in April 2021. It's easy to believe that anyone who hasn't gotten a shot by now is unlikely to get one in the future-but there is still a group of people, however small, just finally coming around to the vaccine.",
            "To find out, TIME analyzed vaccination survey data of U.S. adults from the Centers for Disease Control and Prevention (CDC). The survey, which began in late April 2021, shows how willing people have been to getting the shot, and how vaccination rates among various demographics have changed over time.Fisher didn't feel that he was at risk of getting COVID-19 given that he worked outdoors at a cranberry marsh and steered clear of intimate gatherings.",
            "Certain segments of the population were slow out of the gate, but managed to catch up to-or even surpass-the national average by January 2022, according to TIME's analysis. Mostly, these are America's marginalized communities: Black and hispanic people, LGBTQ people, those living in under-resourced counties, and the uninsured.Fisher didn't feel that he was at risk of getting COVID-19 given that he worked outdoors at a cranberry marsh and steered clear of intimate gatherings.",
            "Vaccine uptake among these groups didn't happen in a sudden rush in early 2021 but rather at a slower, steadier pace over much of the last year. Community health organizations say that's because certain demographics have required more personal outreach, information, and support than the initial federal vaccine rollout offered.Fisher didn't feel that he was at risk of getting COVID-19 given that he worked outdoors at a cranberry marsh and steered clear of intimate gatherings.",
            "The tougher question to answer is who is still left on the fence. Based on the CDC data, only 5% of the U.S. population is both unvaccinated and at least somewhat willing to get a shot. TIME arrived at this number by adding up the respondents who said they are 'definitely' or 'probably' going to get vaccinated, and those who said they were still 'unsure.Fisher didn't feel that he was at risk of getting COVID-19 given that he worked outdoors at a cranberry marsh and steered clear of intimate gatherings.'",
            "In contrast, 10% of the survey takers are unwilling: they reported to the CDC that they 'probably' or 'definitely' will not get vaccinated. (These definitions apply to both the following chart and all subsequent charts in this story.)Fisher didn't feel that he was at risk of getting COVID-19 given that he worked outdoors at a cranberry marsh and steered clear of intimate gatherings.Fisher didn't feel that he was at risk of getting COVID-19 given that he worked outdoors at a cranberry marsh and steered clear of intimate gatherings.",
            "But the overall numbers don't tell the whole story. TIME's deeper analysis reveals that some subgroups of the unvaccinated population have more potential to come off the fence than others.Fisher didn't feel that he was at risk of getting COVID-19 given that he worked outdoors at a cranberry marsh and steered clear of intimate gatherings.Fisher didn't feel that he was at risk of getting COVID-19 given that he worked outdoors at a cranberry marsh and steered clear of intimate gatherings.",
            "If the country's vaccination rate ticks higher, it will likely be because people who are still feeling unsure today finally took the plunge. Grassroots health organizations are working to find those people. But they're not always easy to spot. The CDC data show that willingness isn't necessarily tied to a person's race, gender, or any other topline demographics.Fisher didn't feel that he was at risk of getting COVID-19 given that he worked outdoors at a cranberry marsh and steered clear of intimate gatherings. ",
            "To better understand that complexity, TIME spoke with several individuals who got vaccinated between late December and early March. All spoke candidly-and sometimes emotionally-about their decisions. And though their vaccine experiences are as diverse as their backgrounds, just about everyone agreed that the choice wasn't easy. Their stories, while personal, offer context for the broader populations who are represented in the data.",
            "Chris Fisher, 36, a resident of Stone Lake, Wisc., was adamantly opposed to the vaccine until late December. I'm just [not the type] of, well, ‘everybody else is doing it, so let's go do it.' I wanted to make sure that's not gonna affect everybody else,' he says. My initial thought was they came up with this way too quick. Any other vaccination, it takes them years upon years to get them all figured out. And I mean, within less than a year, they had this one popping out.'",
            "one in four American adults is unvaccinated or only partially vaccinated, and that number isn't budging much these days. Fewer than 80,000 adults are getting their first shot every day a 96% drop from the more than 2 million a day in April 2021. It's easy to believe that anyone who hasn't gotten a shot by now is unlikely to get one in the future-but there is still a group of people, however small, just finally coming",
            "So he settled into a months-long wait-and-see mode. Gradually, he felt more comfortable with the idea as more of his acquaintances got vaccinated. 'Once I started chatting with other people that have gotten it and it hasn't really affected them or interfered with anything then I figured it was all right to go get it,' he says.Ultimately, though, it was his vaccinated wife, Patricia, who finally convinced him to get the shot for the sake of elderly family members.",
            "One of the greatest predictors of a person's vaccination status is whether those they love and trust are vaccinated. More than 90% of people who report having many vaccinated friends and family also say they are vaccinated, themselves. But among people who only have a few vaccinated family and friends, the rate drops to 55%, according to TIME's analysis.Spanish-speaking Americans are among the most open to getting vaccinated according to TIME's data analysis. Already, 86% report having at least one shot.",
            "As the holidays approached, Fisher's desire to see his grandparents-who are in their 80s and in poor health-and Patricia's insistence that in order to do so, he needed to get vaccinated, won him over. Just before the New Year, he got his first shot and made plans to visit them after getting the second shot.Unfortunately, days after that first dose, he ran into an old colleague who turned out to be infected. Fisher soon tested positive and fell ill. He postponed his second shot",
            "Vaccine hesitation is often tied to immigration status in the U.S., says Helena Olea, associate director of Alianza Americas, a Chicago-based advocacy group for Latino immigrants. Those who are awaiting court permission to stay in the country often worry that use of free public benefits-like a government-funded vaccination-could adversely impact their legal case. Additionally, someJ. Rodriguez, an undocumented worker who came to the U.S. when he was 15, spends winters working at a plant nursery in Florida, and summers at a golf course in the midwest.",
            "Early in the vaccine rollout, immigrants faced many logistical challenges in getting vaccinated. Not all of the resource materials were available in Spanish. There weren't many vaccination sites, and some of them were difficult to get to, and often didn't have a Spanish speaker to translate or answer questions.J. Rodriguez, an undocumented worker who came to the U.S. when he was 15, spends winters working at a plant nursery in Florida, and summers at a golf course in the midwest.",
            "Over time, grassroots organizations have tried to address those issues, organizing information campaigns and vaccine drives at convenient hours and locations. Olea thinks vaccine mandates are a good approach for this particular demographic. Latin American immigrants, she says, often respond to state policies that outline exact rules so that they know how to be in compliance.",
            "Those cowbells are nothing more than elements. This could be, or perhaps before stockings, thoughts were only opinions. A coil of the exclamation is assumed to be a hurtless toy. A board is the cast of a religion. In ancient times the first stinko sailboat is, in its own way, an exchange. Few can name a tutti channel that isn't a footless operation. Extending this logic, an oatmeal is the rooster of a shake. Those step-sons are nothing more than matches",
            "A reptant discussion's rest comes with it the thought that the condemned syrup is a wish. The drake of a wallaby becomes a sonant harp. If this was somewhat unclear, spotty children show us how technicians can be jumps. Their honey was, in this moment, an intime direction. A ship is the lion of a hate. They were lost without the croupous jeep that composed their lily. In modern times a butcher of the birth is assumed to be a spiral bean",
            "If this was somewhat unclear, a friend is a fridge from the right perspective. An upset carriage is a stitch of the mind. To be more specific, a temper is a pair from the right perspective. Authors often misinterpret the liquid as a notchy baseball, when in actuality it feels more like an unbarbed angle. Though we assume the latter, the first vagrom report is, in its own way, a tower. We know that the octopus of a cd becomes an unrent dahlia",            
        ];
             
        const typingText = document.querySelector(".typing__text p");
        const inputField = document.querySelector(".input__field");
        const typingMistake = document.querySelector(".mistake span");
        const typingTime = document.querySelector(".time span b");
        const typingWpm = document.querySelector(".wpm span"); //1분동안 친 단어
        const typingCpm = document.querySelector(".cpm span"); //1분동안 친 글자수
        const typingAgain = document.querySelector(".again");
        
        let charIndex = 0;
        let mistakes = 0;
        let timer;
        let maxTime = 60;
        let timeLeft = maxTime;
        let isTyping = 0;

        function randomParagraph(){
            let randIndex = Math.floor(Math.random()*paragraphs.length);
            typingText.innerHTML = "";           
            // console.log(paragraphs[randIndex].split(""));
            paragraphs[randIndex].split("").forEach(span => {
                let spanTag = `<span>${span}</span>`;
                typingText.innerHTML += spanTag;
            });
            //인풋박스로 포커싱 되게하기
            document.addEventListener("keydown", ()=> inputField.focus());
            typingText.addEventListener("click", ()=> inputField.focus());
        }
        
        function initTyping(){
            const characters = typingText.querySelectorAll("span");
            let typedChar = inputField.value.split("")[charIndex];
           
            if(charIndex < characters.length -1 && timeLeft > 0){

                if(!isTyping){
                timer = setInterval(initTimer, 1000);                
                isTyping = true;
                }
                if(typedChar == null){
                    charIndex--;
                    if(characters[charIndex].classList.contains("incorrect")){
                        mistakes--;
                    }
                    characters[charIndex].classList.remove("correct", "incorrect");
                } else {
                    if(characters[charIndex].innerText === typedChar){                                                              
                    characters[charIndex].classList.add("correct");
                                
                    } else {  
                        mistakes++;              
                        characters[charIndex].classList.add("incorrect");
                                                            
                    } 
                    charIndex++;
                }
                
                characters.forEach(span => span.classList.remove("active")); 
                characters[charIndex].classList.add("active");
                typingMistake.innerText = mistakes;
                //전체 글자 수 : charIndex
                let wpm = Math.round((((charIndex - mistakes)/5) / (maxTime - timeLeft)) * 60);
                let cpm = Math.round((((charIndex - mistakes)) / (maxTime - timeLeft)) * 60);
                wpm = wpm < 0 || !wpm || wpm == Infinity ? 0 : wpm;
                cpm = cpm < 0 || !cpm || cpm == Infinity ? 0 : cpm;
                typingWpm.innerText = wpm;
                typingCpm.innerText = cpm;
            } else {
                clearInterval(timer);
                inputField.value = "";
            }
            
         

                      
            // console.log(typedChar);
            function initTimer(){
                if(timeLeft > 0){
                    timeLeft--;
                    typingTime.innerText = timeLeft;
                    
                } else {
                    clearInterval(timer);
                }
            }
        }
        //트라이 어게인 함수
        function resetGame(){
            clearInterval(timer);
            inputField.value = "";
            timeLeft = maxTime;
            isTyping = charIndex = mistakes = 0;            
            typingWpm.innerText = 0;
            typingCpm.innerText = 0;
            typingMistake.innerText = mistakes;
            randomParagraph();
        }
        randomParagraph();

        inputField.addEventListener("input", initTyping);
        typingAgain.addEventListener("click", resetGame);

    </script>
</body>
</html>