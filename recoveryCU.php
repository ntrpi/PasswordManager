<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Recovery Create and update</title>
    <link rel="stylesheet" href="./css/recoveryCU.css">
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
        <!-- <nav id="accountNav" class="accountNav">
          <ul>
            <li><a href="#">Passwords</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Sharing</a></li>
            <li><a href="#">Import</a></li>
            <li><a href="#">Export</a></li>
          </ul>
        </nav> -->  
        <!-- YOUR STUFF GOES HERE-->
        <div class="content">
          <div>
            <h2 class="hidden">Recovery Information</h2>
            <div class="formDiv">
              <form action="" method="POST"> 
                <!-- <input type="radio" name="recoveryOptions" id="questions" value="questions"/> 
                <label for="questions">Recovery Questions</label> -->
                <h2 id="title">Recovery Questions</h2>
                <legend>Select first recovery question</legend>            
                 <select id="recoveryOne" name="recoveryOne">
                     <option value="0A">Choose one security question</option>
                     <option value="1A">What is your maternal grandmother's maiden name?</option>
                     <option value="2A">In what town or city was your first full time job?</option>
                     <option value="3A">What was the house number and street name you lived in as a child?</option>                     
                 </select>
                 <div class="inputDiv">
                 <input type="text" name="questionOne" id="questionTwo" />
                 </div>
                 <legend>Select second recovery question</legend>
                 <select id="recoveryTwo" name="recoveryOne">
                    <option value="0B">Choose a second security question</option>
                    <option value="1B">What primary school did you attend?</option>
                    <option value="2B">What was your childhood nickname?</option>
                    <option value="3B">What is the name of your favorite childhood teacher?</option>                     
                </select>
                <div class="inputDiv">
                  <input type="text" name="questionTwo"  id="questionTwo" />
                </div>
                <!-- <div>Or</div>
                <input type="radio" name="recoveryOptions" id="byEmail" value="byEmail"/> 
                <label for="byEmail">Recovery by Email</label>
                <div class="inputDiv">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" />
                </div>               -->
                <div class="inputDiv" id="UpdateRecovery">
                    <input type="submit" value="Update/Add" >
                </div> 
              </form>
            </div>
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