
  <!-- ======= Footer ======= -->
  <footer id="footer">
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
                <li><a href="{{ url('/student') }}">Home</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="{{ route('student.contactUs') }}">Contact Us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Students</a></li>
               
              </ul>
            </div>
            <div class="social-links mt-3">
              <a href="https://twitter.com/" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="https://www.facebook.com/" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="https://www.linkedin.com/" class="linkedin"><i class="bi bi-linkedin"></i></a>
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

  <!-- pure counter js -->
  <script src="{{ asset('assets/js/purecounter_vanilla.js') }}"></script>
  <script>
    new PureCounter();
</script>
</body>

</html>