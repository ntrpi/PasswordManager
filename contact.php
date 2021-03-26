<!DOCTYPE html>
<html>
    <head>
        <!--global head.php-->
        <?php include "php/head.php" ?>
        <title>Pass**** Manager Contact Us</title>
        <link rel="stylesheet" href="./css/contact.css">
        <script src="./js/script.js" async defer></script>
    </head>
    <body>

        <header>
        <div class="banner">
            <div class="logo">
            <img src="./img/padlock-white-locked-th.png" alt="White padlock, locked.">
            </div>
            <h1 class="siteName">Pass**** Manager</h1>
        </div>
        <div class="borderDiv"></div>
        <nav>
            <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="login.html">Log In</a></li>
            <li><a href="createAccount.html">Sign Up</a></li>
            <li><a href="subscribe.html">Subscribe</a></li>
            </ul>
        </nav>
        <div class="borderDiv"></div>
        </header>
        <main>
        <div class="mainDiv">
  
        <!-- YOUR STUFF GOES HERE-->
        <div class="content">
            <h2>Contact Us</h2>
            <p>If you have any questions about the Password Manager, feel free to contact us!</p>
            <div class="formDiv" id="contactForm">
              <form action="" method="POST">
                <div class="inputDiv" id="contactInputDiv">
                  <label for="name">Name </label>
                  <input type="text" id="name" name="name" value="" >
                  <span></span>
                </div>
                <div class="inputDiv" id="contactInputDiv1">
                  <label for="email">Email</label>
                  <input type="text"  id="email" name="email" value="" >
                  <span></span>
                </div>
                  <div class="inputDiv" id="contactInputDiv2">
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="70" rows="10"></textarea>
                <span></span>
                  </div>
                <div class="inputDiv" id="contactInputDiv3">
                <button type="submit" name="submit" id="submitBtn">Submit</button>
              </div>
              </form>
            </div>
        </div>
      </div>
    </main>
    <footer>
      <div class="borderDiv"></div>
      <nav class="footerNav">
        <ul>
          <li><a href="aboutUs.html">About Us</a></li>
          <li><a href="FAQ.html">FAQ</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </nav>
    </footer>
  
  </body>
</html>


