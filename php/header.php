<?php
use Codesses\php\Models;

$loginMenuHref = "login.php";
$loginMenuText = "Log In";
$accountMenuHref = "account.php?a=a1";
$accountMenuText = "Sign Up";
if( isUserLoggedIn() ) {
    $loginMenuHref = "logout.php";
    $loginMenuText = "Log Out";
    $accountMenuHref = "listFAQ.php";
    $accountMenuText = "FAQ";
}
?>

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
            <li><a href="<?= 'index.php'; ?>">Home</a></li>
            <li><a href="<?= $loginMenuHref; ?>"><?= $loginMenuText ?></a></li>
            <li><a href="<?= $accountMenuHref; ?>"><?= $accountMenuText ?></a></li>
            <li><a href="<?= 'subscribe.php'; ?>">Subscribe</a></li>
        </ul>
    </nav>
    <div class="borderDiv"></div>
</header>