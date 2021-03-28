<?php

use Codesses\php\Models\{FormProcessor, FAQ};

require_once "./Models/FAQ.php";
require_once "./Models/FormProcessor.php";

$FAQObject = new FAQ;

if (FormProcessor::isPost($FAQObject->getSubmitAdd())) {

    $params = FormProcessor::getValuesObject(FAQ::$columnNames);
    $numUsers = $FAQObject->getNumFAQ();
    $FAQObject->createFAQ($params);

    if ($numUsers != $FAQObject->getNumFAQ()) {
        // Success!
        header("Location: index.php");
    } else {
        echo "Unable to add user.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager FAQ</title>
    <link rel="stylesheet" href="css/FAQ.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="./js/script.js" async defer></script>
</head>

<body>
<!--main nav-->
<?php include 'php/header.php' ?>
    <main>
        <div class="mainDiv">
            <!-- YOUR STUFF GOES HERE-->
            <div class="content">
                <h2 id="faqh2">FAQ</h2>
                <ul id="faqlist">
                    <div class="questionanswersection">
                        <div class="cBox">
                            <li class="faqquestions">What if I forget my login information?</li>
                        </div>
                            <li class="faqanswers">You can reset your account by click on "Forgot my username/password" and filling out the security questions form you had set up when you created your account.
                        </li>
                    </div>
                    <div class="questionanswersection">
                        <div class="cBox">
                            <li class="faqquestions">What if I forget my security answers?</li>
                        </div>
                        <li class="faqanswers">You can click on "I forgot my security answers" and have a recovery code sent to the email or phone number you entered on your account.</li>
                    </div>
                    <div class="questionanswersection">
                        <div class="cBox">
                            <li class="faqquestions">Can I import and/or export my passwords?</li>
                        </div>
                        <li class="faqanswers">Yes you can. After signing in you will see import and export pages on the left sidebar depending on which you'd like to perform.</li>
                    </div>
                    <div class="questionanswersection">
                        <div class="cBox">
                            <li class="faqquestions">What do I get in the subscription letter?</li>
                        </div>
                        <li class="faqanswers">Any recommendations or updates we make towards the application will be send to your email directly. You won't have to worry about being uninformed on changes being made!</li>
                    </div>
                    <div class="questionanswersection">
                        <div class="cBox">
                            <li class="faqquestions">Can I delete my password history?</li>
                        </div>
                        <li class="faqanswers">Yes you can. When you are viewing your current password library, you will have the ability to choose part of your password history and delete it.</li>
                    </div>
                </ul>
            </div>
        </div>
    </main>
 <!--global footer-->
 <?php include "php/footer.php"?>
</body>
</html>