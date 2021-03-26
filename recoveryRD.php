<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager recovery read and delete</title>
    <link rel="stylesheet" href="./css/recoveryRD.css">
    <script src="./js/script.js" async defer></script>
  </head>
  <body>
    <!--main nav-->
    <?php include 'php/header.php' ?>
        <main>
            <div class="mainDiv">        
              <!-- YOUR STUFF GOES HERE-->
              <div class="content">
                <div>
                  <h2 class="hidden">Recovery Questions</h2>                   
                  <div class="tableDiv">            
                    <table>
                      <thead>
                        <th>Question ID</th>
                        <th>Answer ID</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>User ID</th>                       
                      </thead>
                     <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>                          
                          <td>
                            <form action="" method="post">
                              <input type="hidden" name="id" value=""/>
                              <input type="submit" class="sqa" name="sqaDelete" value="Delete"/>
                            </form>
                         </td>
                         <td>
                          <form action="" method="post">
                            <input type="hidden" name="id" value=""/>
                            <input type="submit" class="sqa" name="sqaUpdate" value="Update/Add"/>
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
          <!--global footer-->
    <?php include "php/footer.php"?>
        </body>
      </html>