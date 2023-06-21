<script src="{{asset("assets/js/jquery.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.hoverIntent.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.waypoints.min.js")}}"></script>
    <script src="{{asset("assets/js/superfish.min.js")}}"></script>
    <script src="{{asset("assets/js/owl.carousel.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap-input-spinner.js")}}"></script>
    <script src="{{asset("assets/js/jquery.plugin.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.magnific-popup.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.countdown.min.js")}}"></script>
    <!-- Main JS File -->
    <script src="{{asset("assets/js/main.js")}}"></script>
    <script src="{{asset("assets/js/demos/demo-4.js")}}"></script>
    <script>
        //khai báo biến slideIndex đại diện cho slide hiện tại
        var slideIndex;
        // KHai bào hàm hiển thị slide
        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
               slides[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
  
            slides[slideIndex].style.display = "block";  
            dots[slideIndex].className += " active";
            //chuyển đến slide tiếp theo
            slideIndex++;
            //nếu đang ở slide cuối cùng thì chuyển về slide đầu
            if (slideIndex > slides.length - 1) {
              slideIndex = 0
            }    
            //tự động chuyển đổi slide sau 5s
            setTimeout(showSlides, 5000);
        }
        //mặc định hiển thị slide đầu tiên 
        showSlides(slideIndex = 0);
  
  
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }
      </script>