<footer id="footer" >
    <div class="footer-top">
        <div class="container">
            <div class="row d-flex justify-content-center" >

                <div class=" footer-info text-center">
                    <h3>Distinguished School</h3>
                    <p>
                    <strong>Phone:</strong> +1 5589 55488 55<br>
                    <strong>Email: </strong>DistinguishedSchool@gmail.com<br>
                    </p>
                    <div class=" footer-links ">
                        <ul class="d-flex justify-content-center ">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Students</a></li>
                            <li><a href="#">Teachers</a></li>
                        </ul>
                    </div>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="copyright">
            &copy; Copyright <strong><span>Distinguished School</span></strong>. All Rights Reserved
        </div>
        <div class="credits ">
            Designed by <a href="#">Mohammed Kashmar && Yaser Kamel</a>
        </div>
    </div>
</footer>
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/all.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
    },
    pagination: {
        el: ".swiper-pagination",
    },
    });
</script>

</body>
</html>