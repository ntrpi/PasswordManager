<html>

<head>
  <!--global head.php-->
  <?php include "php/head.php" ?>
  <title>Pass**** Manager Import</title>
  <link rel="stylesheet" href="./css/login.css">
</head>

<body>
  <!--main nav-->
  <?php include 'php/header.php' ?>
  <main>
    <div class="mainDiv">
      <!--side nav-->
      <?php include 'php/sideNav.php' ?>
      <!-- YOUR STUFF GOES HERE-->
      <div class="content">
        <div>
          <h2>Import Passwords</h2>


          <table width="600">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">

              <tr>
                <td width="20%">Select file</td>
                <td width="80%"><input type="file" name="file" id="file" /></td>
              </tr>

              <tr>
                <td>Submit</td>
                <td><input type="submit" name="submit" /></td>
              </tr>

            </form>
          </table>


          <div class="formDiv">
            <form action="" method="POST">
              <div>
                <label for="fileInput" class="fileInputLabel">Choose a File</label>
                <div class="fileNameDiv"></div>
                <input class="hidden" id="fileInput" name="fileInput" type="file" />
              </div>
              <div class="inputDiv">
                <input type="submit" value="Upload">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--global footer-->
  <?php include "php/footer.php" ?>
</body>

</html>