<?php require base_path('./Views/Partials/head.php'); ?>
<?php require base_path('./Views/Partials/header.php'); ?>


<main>
  <!-- breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <ul class="breadcrumb-list">
        <li class="breadcrumb-list__item"><a href="/">Home</a></li>
        <li class="breadcrumb-list__item">Our Offices</li>
      </ul>
    </div>
  </div>

  <!-- 'section top' -->
  <div class="section-top">
    <div class="container">
      <div class="section-top__heading-container">
        <h1>Our Offices</h1>
      </div>
    </div>
  </div>

  <!-- office location cards -->
  <div class="office-cards">
    <div class="container">
      <div>
        <!-- cards -->

        <div class="location-card">
          <div class="location-card__container">
            <div class="location-card__image-container">
              <a href="#"><img src="assets/offices/cambridge.jpg" alt="Cambridge Officefront"></a>
            </div>
            <div class="location-card__info-container">
              <p class="location-card__heading"><a href="#">Cambridge Office</a></p>
              <p class="location-card__address">
                Unit 131,<br>St John's Innovation Centre,<br>Cowley Road, Milton,<br>Cambridge,<br>CB4 0WS
              </p>
              <div class="location-card__contact-number">
                <a href="#">01223 37 57 72</a>
              </div>
              <div class="location-card__link-container">
                <a href="#">View More</a>
              </div>
            </div>
          </div>
        </div>

        <div class="location-card">
          <div class="location-card__container">
            <div class="location-card__image-container">
              <a href="#"><img src="assets/offices/wymondham.jpg" alt="wymondham Officefront"></a>
            </div>
            <div class="location-card__info-container">
              <p class="location-card__heading"><a href="#">Wymondham Office</a></p>
              <p class="location-card__address">
                Unit 15,<br>Penfold Drive,<br>Gateway 11 Business Park,<br>Wymonham, Norfolk,<br>NR18 0WZ
              </p>
              <div class="location-card__contact-number">
                <a href="#">01603 70 40 20</a>
              </div>
              <div class="location-card__link-container">
                <a href="#">View More</a>
              </div>
            </div>
          </div>
        </div>

        <div class="location-card">
          <div class="location-card__container">
            <div class="location-card__image-container">
              <a href="#"><img src="assets/offices/yarmouth-2.jpg" alt="yarmouth Officefront"></a>
            </div>
            <div class="location-card__info-container">
              <p class="location-card__heading"><a href="#">Great Yarmouth Office</a></p>
              <p class="location-card__address">
                Suite F23,<br>Beacon Innovation Centre,<br>Beacon Park, Gorleston,<br>Great Yarmouth, Norfolk<br>NR31 7RA
              </p>
              <div class="location-card__contact-number">
                <a href="#">01493 60 32 04</a>
              </div>
              <div class="location-card__link-container">
                <a href="#">View More</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="contact">
    <div class="container">
      <!-- contact form -->
        <div class="contact-container">

        <div class="contact-form" id="contact-form">
          <form action="/contact" method="POST">
            <div class="contact-form__validation-message" <?php echo !$isSuccess ? 'style="display: none;"' : ''; ?>>
              <div>
                <p>Your message has been sent</p>
                <span>X</span>
              </div>
            </div>
            <div class="contact-form__details-container">
              <div class="contact__element">
                <label for="name">Your Name<span class="required"> *</span></label>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($formData['name'] ?? ''); ?>" <?php echo isset($errors['name']) ? 'style="border-color: red;"' : ''; ?>>
              </div>
              <div class="contact__element">
                <label for="company">Company Name</label>
                <input type="text" name="company" id="company" value="<?php echo htmlspecialchars($formData['company_name'] ?? ''); ?>">
              </div>
              <div class="contact__element">
                <label for="email">Your Email<span class="required"> *</span></label>
                <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($formData['email'] ?? ''); ?>" <?php echo isset($errors['email']) ? 'style="border-color: red;"' : ''; ?>>
              </div>
              <div class="contact__element">
                <label for="telephone">Your Telephone Number<span class="required"> *</span></label>
                <input type="text" name="telephone" id="telephone" value="<?php echo htmlspecialchars($formData['telephone_number'] ?? ''); ?>" <?php echo isset($errors['telephone']) ? 'style="border-color: red;"' : ''; ?>>
              </div>
            </div>

            <div class="contact-form__message-container">
              <label for="message">Message<span class="required"> *</span></label>
              <textarea name="message" id="message" rows="10" <?php echo isset($errors['message']) ? 'style="border-color: red;"' : ''; ?>><?php echo htmlspecialchars($formData['message'] ?? ''); ?></textarea>
            </div>

            <div class="contact-form__marketing-container">
              <div>
                <input type="checkbox" name="marketing_option" value="1" <?php echo ($formData['marketing_option'] ?? 0) ? 'checked' : ''; ?>>
                <div>
                  <p>Please tick this box if you wish to recieve marketing information from us. Please see out <a href="#">Privacy Policy</a> for more information on how we keep your data safe.</p>
                </div>
              </div>
            </div>
            
            <div class="contact-form__submission-container">
              <button type="submit">Send Enquiry</button>
              <div>
                <span>*</span>
                <small> Fields Required</small>
              </div>
            </div>
          </form>
        </div>

        <!-- contact info -->

        <div class="contact-info">

          <div class="contact-info__details">
            <p><strong>Email us on:</strong></p>
            <p><a href="#">Sales@netmatters.com</a></p>
            <p><strong>Speak to Sales on:</strong></p>
            <p><a href="#">01603515007</a></p>
            <p><strong>Business hours:</strong></p>
            <p><strong>Monday - Friday 07:00 - 18:00</strong></p>
          </div>

          <div class="contact-accordian">
            <div class="contact-accordian__container">
              <h4 class="contact-accordian__header">
                <p>Out of Hours IT Support<em>^</em></p>
              </h4>
              
              <div class="contact-accordian__details">
                <p>Netmatters IT are offering an Out of Hours service for Emergency and Critical tasks.</p>
                <p>
                  <strong>Monday - Friday 18:00 - 22:00 Saturday</strong>
                  <strong>08:00 - 16:00</strong><br>
                  <strong>Sunday 10:00 - 18:00</strong>
                </p>
                <p>To log a citical task, you will need to call out main line number and select Option 2 to leave an Out of Hours voicemail. A technician will contact you on the number provided within 45 minutes of your call.</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</main>
<script>
  let accordian = document.querySelector('.contact-accordian__container');
  let accordianBtn = document.querySelector('.contact-accordian__header');
  accordianBtn.addEventListener('click', () => {
    accordian.getBoundingClientRect().height < 31 ?
     accordian.style.height = '420px' :
     accordian.style.height = '30px'
  })
</script>

<?php require base_path('Views/Partials/footer.php') ?>
<?php require base_path('Views/Partials/foot.php') ?>