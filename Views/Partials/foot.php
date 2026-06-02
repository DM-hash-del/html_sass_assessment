  <script>
    let modal = document.querySelector("#cookies-dialog");
    let cookiesAcceptBtn = document.querySelector('.cookies__accept');
    let showCookies = localStorage.getItem("CookiesConsent");
    let cookieSettingsBtn = document.querySelector(".cookies > button");

    cookiesAcceptBtn.addEventListener("click", () => {
      localStorage.setItem("CookiesConsent", "accepted");
      cookieSettingsBtn.style.display = "none";
      modal.close();
    });

    if (!showCookies) {
      modal.showModal();
      cookieSettingsBtn.style.display = "block";
    }
  </script>
  <!-- <script src="JS/jquery-4.0.0.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="JS/jquery.sidr.min.js"></script>
  <script src="JS/jquery.sticky.js"></script>
  <script src="JS/slick.min.js"></script>
  <script src="JS/main.js"></script>
</body>
</html>