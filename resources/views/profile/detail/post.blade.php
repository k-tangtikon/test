<div class="txt-pr text-center">{{ __('head_work') }}</div>
<br>
<div class="head1 text-center">
    {{ __('title_work') }}
</div>
<div class="text-con text-center">
    {{ __('work1') }} <a href="http://km.kkpho.go.th/slip" target="_blank">{{ __('link') }}</a>
</div>


<div class="row">
    <div class="column">
        <img src="img/11.png" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/12.png" style="width:100%" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/13.png" style="width:100%" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/14.png" style="width:100%" onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/15.png" style="width:100%" onclick="openModal();currentSlide(5)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/16.png" style="width:100%" onclick="openModal();currentSlide(6)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/17.png" style="width:100%" onclick="openModal();currentSlide(7)" class="hover-shadow cursor">
    </div>
</div>

<div id="myModal" class="modalpost">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content">
        <div class="mySlides">
            <div class="numbertext">1 / 7</div>
            <img src="img/11.png" class="demo cursor" style="width:100%" alt="Page Login for admin">
        </div>

        <div class="mySlides">
            <div class="numbertext">2 / 7</div>
            <img src="img/12.png" class="demo cursor" style="width:100%" alt="Page Manages for admin">
        </div>

        <div class="mySlides">
            <div class="numbertext">3 / 7</div>
            <img src="img/13.png" class="demo cursor" style="width:100%" alt="Menu Record data">
        </div>

        <div class="mySlides">
            <div class="numbertext">4 / 7</div>
            <img src="img/14.png" class="demo cursor" style="width:100%" alt="Page Login for user">
        </div>

        <div class="mySlides">
            <div class="numbertext">5 / 7</div>
            <img src="img/15.png" class="demo cursor" style="width:100%" alt="User interface">
        </div>

        <div class="mySlides">
            <div class="numbertext">6 / 7</div>
            <img src="img/16.png" class="demo cursor" style="width:100%" alt="User interface">
        </div>

        <div class="mySlides">
            <div class="numbertext">7 / 7</div>
            <img src="img/17.png" class="demo cursor" style="width:100%" alt="User interface">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>

        {{-- <div style="display:inline-block;">
            <div class="column">
                <img class="demo cursor" src="img/11.png" style="width:100%" onclick="currentSlide(1)"
                    alt="1">
            </div>
            <div class="column">
                <img class="demo cursor" src="img/12.png" style="width:100%" onclick="currentSlide(2)" alt="2">
            </div>
            <div class="column">
                <img class="demo cursor" src="img/13.png" style="width:100%" onclick="currentSlide(3)"
                    alt="3">
            </div>
            <div class="column">
                <img class="demo cursor" src="img/14.png" style="width:100%" onclick="currentSlide(4)"
                    alt="4">
            </div>
            <div class="column">
                <img class="demo cursor" src="img/15.png" style="width:100%" onclick="currentSlide(5)"
                    alt="5">
            </div>
            <div class="column">
                <img class="demo cursor" src="img/16.png" style="width:100%" onclick="currentSlide(6)"
                    alt="6">
            </div>
            <div class="column">
                <img class="demo cursor" src="img/17.png" style="width:100%" onclick="currentSlide(7)"
                    alt="7">
            </div>
        </div> --}}

    </div>
</div>

<script>
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>
