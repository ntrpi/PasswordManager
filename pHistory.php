<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Password History</title>
    <link rel="stylesheet" href="./css/pHistory.css">
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
                <nav id="accountNav" class="accountNav">
                <ul>
                  <li><a href="passwords.html">Passwords</a></li>
                  <li><a href="profile.html">Profile</a></li>
                  <li><a href="sharing.html">Sharing</a></li>
                  <li><a href="import.html">Import</a></li>
                  <li><a href="export.html">Export</a></li>
                </ul>
              </nav>       
              <!-- YOUR STUFF GOES HERE-->
              <div class="content">
                <div>
                  <h2 class="hidden">Password History</h2>                   
                  <div class="formDiv">            
                    <table>
                      <thead>
                        <th>URL</th>
                        <th>Action</th>
                        <th>Old Pass**</th>
                        <th>New Pass**</th>
                        <th>Old Hint</th>
                        <th>New Hint</th>
                        <th>TimeStamp</th>
                      </thead>
                     <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>

                          <td>
                            <form action="" method="post">
                              <input type="hidden" name="id" value=""/>
                              <input type="submit" class="phDelete" name="deleteHistory" value="delete"/>
                            </form>
                         </td>
                        </tr>
                      </tbody>
                    </table>
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