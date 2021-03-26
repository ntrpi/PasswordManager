<!DOCTYPE html>
<html>

<head>
  <!--global head.php-->
  <?php include "php/head.php" ?>
  <title>Pass**** Manager Home</title>
  <link rel="stylesheet" href="./css/passwords.css">
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
          <h2>Passwords</h2>
          <form action="#" method="GET" class="searchForm">
            <div class="inputDiv">
              <input type="text" class="searchBar" name="searchBar">
              <input type="submit" class="linkAsButton" name="searchButton" value="Search" />
            </div>
          </form>

          <table class="pwTable">
            <thead class="tablehead">
              <tr>
                <th class="tablehead">URL</th>
                <th class="tablehead">Password</th>
              </tr>
            </thead>
            <tbody>
              <tr class="pwTableRow">
                <td>www.instagram.com</td>
                <td>ikf6&5hV!</td>
                <td class="pwButtonsTd">
                  <div class="inputDiv">
                    <input type="submit" class="updatebutton" name="updatebutton" value="Edit" />
                  </div>
                  <div class="inputDiv">
                    <input type="submit" class="deletebutton" name="deletebutton" value="Delete" />
                  </div>
                  <div class="inputDiv">
                    <input type="submit" class="sharebutton" name="sharebutton" value="Share" />
                  </div>
                </td>
              </tr>
              <tr class="pwButtonsRow">
                <td class="pwButtonsTd">
                  <div class="inputDiv">
                    <input type="submit" class="updatebutton" name="updatebutton" value="Edit" />
                  </div>
                </td>
                <td class="pwButtonsTd">
                  <div class="inputDiv">
                    <input type="submit" class="deletebutton" name="deletebutton" value="Delete" />
                  </div>
                </td>
                <td class="pwButtonsTd">
                  <div class="inputDiv">
                    <input type="submit" class="sharebutton" name="sharebutton" value="Share" />
                  </div>
                </td>
              </tr>
              <tr class="pwTableRow">
                <td>www.facebook.com</td>
                <td>Jio98&!2</td>
                <td class="pwButtonsTd">
                  <div class="inputDiv">
                    <input type="submit" class="updatebutton" name="updatebutton" value="Edit" />
                  </div>
                  <div class="inputDiv">
                    <input type="submit" class="deletebutton" name="deletebutton" value="Delete" />
                  </div>
                  <div class="inputDiv">
                    <input type="submit" class="sharebutton" name="sharebutton" value="Share" />
                  </div>
                </td>
              </tr>
              <tr class="pwButtonsRow">
                <td class="pwButtonsTd">
                  <div class="inputDiv">
                    <input type="submit" class="updatebutton" name="updatebutton" value="Edit" />
                  </div>
                </td>
                <td class="pwButtonsTd">
                  <div class="inputDiv">
                    <input type="submit" class="deletebutton" name="deletebutton" value="Delete" />
                  </div>
                </td>
                <td class="pwButtonsTd">
                  <div class="inputDiv">
                    <input type="submit" class="sharebutton" name="sharebutton" value="Share" />
                  </div>
                </td>
              </tr>
              <tr class="pwTableRow">
                <td>www.urbanoutfitters.com</td>
                <td>K!34$2HSD</td>
                <td class="pwButtonsTd">
                  <div class="inputDiv">
                    <input type="submit" class="updatebutton" name="updatebutton" value="Edit" />
                  </div>
                  <div class="inputDiv">
                    <input type="submit" class="deletebutton" name="deletebutton" value="Delete" />
                  </div>
                  <div class="inputDiv">
                    <input type="submit" class="sharebutton" name="sharebutton" value="Share" />
                  </div>
                </td>
              </tr>
              <tr class="pwButtonsRow">
                <td class="pwButtonsTd">
                  <div class="inputDiv">
                    <input type="submit" class="updatebutton" name="updatebutton" value="Edit" />
                  </div>
                </td>
                <td class="pwButtonsTd">
                  <div class="inputDiv">
                    <input type="submit" class="deletebutton" name="deletebutton" value="Delete" />
                  </div>
                </td>
                <td class="pwButtonsTd">
                  <div class="inputDiv">
                    <input type="submit" class="sharebutton" name="sharebutton" value="Share" />
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="inputDiv">
          <input type="submit" class="createbutton" name="createbutton" value="Create New" />
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