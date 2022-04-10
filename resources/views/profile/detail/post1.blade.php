
<div class="head1 text-center">
    {{ __('title_work') }}
</div>
<div class="text-con text-center">
    {{ __('work2') }} <a href="http://km.kkpho.go.th/journal" target="_blank">{{ __('link') }}</a>
</div>
<div class="row">
    <div class="column">
        <img src="img/21.png" style="width:100%" onclick="openModal1();currentSlide1(1)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/22.png" style="width:100%" onclick="openModal1();currentSlide1(2)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/23.png" style="width:100%" onclick="openModal1();currentSlide1(3)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/24.png" style="width:100%" onclick="openModal1();currentSlide1(4)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/25.png" style="width:100%" onclick="openModal1();currentSlide1(5)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/26.png" style="width:100%" onclick="openModal1();currentSlide1(6)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/27.png" style="width:100%" onclick="openModal1();currentSlide1(7)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/28.png" style="width:100%" onclick="openModal1();currentSlide1(8)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/29.png" style="width:100%" onclick="openModal1();currentSlide1(9)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/30.png" style="width:100%" onclick="openModal1();currentSlide1(10)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/31.png" style="width:100%" onclick="openModal1();currentSlide1(11)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/32.png" style="width:100%" onclick="openModal1();currentSlide1(12)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="img/33.png" style="width:100%" onclick="openModal1();currentSlide1(13)" class="hover-shadow cursor">
    </div>
</div>

<div id="myModal1" class="modalpost">
    <span class="close cursor" onclick="closeModal1()">&times;</span>
    <div class="modal-content">
        <div class="mySlides1">
            <div class="numbertext">1 / 13</div>
            <img src="img/21.png" class="demo1 cursor" style="width:100%" alt="Page Login for admin">
        </div>

        <div class="mySlides1">
            <div class="numbertext">2 / 13</div>
            <img src="img/22.png" class="demo1 cursor" style="width:100%" alt="Page Manages for admin">
        </div>

        <div class="mySlides1">
            <div class="numbertext">3 / 13</div>
            <img src="img/23.png" class="demo1 cursor" style="width:100%" alt="Page Manages for admin">
        </div>

        <div class="mySlides1">
            <div class="numbertext">4 / 13</div>
            <img src="img/24.png" class="demo1 cursor" style="width:100%" alt="Menu Record data">
        </div>

        <div class="mySlides1">
            <div class="numbertext">5 / 13</div>
            <img src="img/25.png" class="demo1 cursor" style="width:100%" alt="Page Manages for admin">
        </div>

        <div class="mySlides1">
            <div class="numbertext">6 / 13</div>
            <img src="img/26.png" class="demo1 cursor" style="width:100%" alt="Page Manages for admin">
        </div>

        <div class="mySlides1">
            <div class="numbertext">7 / 13</div>
            <img src="img/27.png" class="demo1 cursor" style="width:100%" alt="User Interface">
        </div>

        <div class="mySlides1">
            <div class="numbertext">8 / 713</div>
            <img src="img/28.png" class="demo1 cursor" style="width:100%" alt="User Interface ">
        </div>

        <div class="mySlides1">
            <div class="numbertext">9 / 13</div>
            <img src="img/29.png" class="demo1 cursor" style="width:100%" alt="User Interface ">
        </div>

        <div class="mySlides1">
            <div class="numbertext">10 / 13</div>
            <img src="img/30.png" class="demo1 cursor" style="width:100%" alt="User Interface ">
        </div>

        <div class="mySlides1">
            <div class="numbertext">11 / 13</div>
            <img src="img/31.png" class="demo1 cursor" style="width:100%" alt="User Interface ">
        </div>

        <div class="mySlides1">
            <div class="numbertext">12 / 13</div>
            <img src="img/32.png" class="demo1 cursor" style="width:100%" alt="User Interface ">
        </div>

        <div class="mySlides1">
            <div class="numbertext">13 / 13</div>
            <img src="img/33.png" class="demo1 cursor" style="width:100%" alt="User Interface ">
        </div>

        <a class="prev" onclick="plusSlides1(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides1(1)">&#10095;</a>

        <div class="caption-container">
            <p id="caption1"></p>
        </div>


    </div>
</div>

<script>
    function openModal1() {
        document.getElementById("myModal1").style.display = "block";
    }

    function closeModal1() {
        document.getElementById("myModal1").style.display = "none";
    }

    var slideIndex = 1;
    showSlides1(slideIndex);

    function plusSlides1(n) {
        showSlides1(slideIndex += n);
    }

    function currentSlide1(n) {
        showSlides1(slideIndex = n);
    }

    function showSlides1(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides1");
        var dots = document.getElementsByClassName("demo1");
        var caption1Text = document.getElementById("caption1");
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
        caption1Text.innerHTML = dots[slideIndex - 1].alt;
    }
</script>
