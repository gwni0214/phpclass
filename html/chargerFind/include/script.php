<script>
        let hidden = document.querySelector(".BP")
            hidden.addEventListener("mouseover", () => {
                document.querySelector(".hidden").classList.add("active")
            })
            hidden.addEventListener("mouseout", () => {
                document.querySelector(".hidden").classList.remove("active")
            })
            let hidden2 = document.querySelector(".BP2")
            hidden2.addEventListener("mouseover", () => {
                document.querySelector(".hidden2").classList.add("active")
            })
            hidden2.addEventListener("mouseout", () => {
                document.querySelector(".hidden2").classList.remove("active")
            })
        </script>