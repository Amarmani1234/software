<?php  include('header.php'); ?>    
  
<br><br><br>

  
<footer id="footer">
    <div class="footer-newsletter">  
    <img src="assets/img/support.jpg" style="width:100%; height:400px;">       
    </div>
</footer>


<footer id="footer" class="footer">
    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Need help ?</h4>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Ask a Human"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div>
</footer>

<section id="contact" class="contact section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>1st FLOOR, B-33,</p>
                  <p>SECTOR-63, NOIDA, (U.P.)-201301</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+91 8360994063</p>
                  <p>+91 8360994063</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@kaddora.com</p>
                  <p>contact@kaddora.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="500">
                  <i class="bi bi-clock"></i>
                  <h3>Open Hours</h3>
                  <p>Every Day</p>
                  <p> 24x7 available</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>
                <div class="col-md-6">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>
                <div class="col-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>
                <div class="col-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>
                <div class="col-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                  <button type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <?php include('footer.php'); ?>