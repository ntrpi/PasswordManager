<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Login History</title>
    <link rel="stylesheet" href="./css/loginHistory.css">
    <script src="./js/script.js" async defer></script>
  </head>
  <body>
    <!--main nav-->
    <?php include 'php/header.php' ?>
        <main>
            <div class="mainDiv">      
              <nav id="accountNav" class="accountNav">
                <ul>
                  <li><a href="passwords.html">Passwords</a></li>
                  <li><a href="profile.html">Profile</a></li>
                  <li><a href="sharing.html">Sharing</a></li>
                  <li><a href="import.html">Import</a></li>
                  <li><a href="sharePass.html">Export</a></li>
                </ul>
              </nav>        
              <!-- YOUR STUFF GOES HERE-->
              <div class="content">
                <div>
                  <h2 class="title">Login History</h2>                   
                  <div class="formDiv" id="history">            
                    <table>
                      <thead>
                        <tr>
                            <th class="tableHead">Action</th>
                            <th class="tableHead">Date and Time</th>
                            <th class="tableHead">Duration</th>
                        </tr>
                      </thead>
                     <tbody>
                        <tr>
                            <td>Login</td>
                            <td>2020-04-02 11:00:00</td>
                        </tr>
                        <tr>
                            <td>Logout</td>
                            <td>2020-04-02 13:20:47</td>
                            <td>02:20:47</td>
                        </tr>
                        <tr>
                            <td>Login</td>
                            <td>2020-02-11 03:20:47</td>
                        </tr>
                        <tr>
                            <td>Logout</td>
                            <td>2020-02-11 03:21:55</td>
                            <td>00:01:08</td>
                        </tr>
                        <tr>
                            <td>Login</td>
                            <td>2020-09-20 06:00:47</td>
                        </tr>
                        <tr>
                            <td>Logout</td>
                            <td>2020-09-20 06:18:55</td>
                            <td>00:18:08</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>                
                </div>
              </div>
            </div>
          </main>
          <!--global footer-->
          <?php include "php/footer.php"?>
        </body>
      </html>