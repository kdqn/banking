<?php 
session_start();
$config = parse_ini_file('config.ini', true);
$environment = $config['ENVIRONMENT'];
$URL_BASE = $config[$environment]['URL_BASE'];
define('URL_ROOT', "$URL_BASE");
define('APP_ROOT', dirname(__FILE__,2));

$username1 = (isset($_SESSION['username'])) ? $_SESSION['username'] : '';
$password1 = (isset($_SESSION['password'])) ? $_SESSION['password'] : '';
$checking = (isset($_SESSION['checkings'])) ? $_SESSION['checkings'] : '';
$savings = (isset($_SESSION['savings'])) ? $_SESSION['savings'] : '';

$data = 
    [
        'pageTitle' => 'AWP Bank | Accounts',
        'header' => 'AWP Bank',
    ];

include_once(APP_ROOT . '/views/head.view.php');
include_once(APP_ROOT . '/views/header.view.php');
include_once(APP_ROOT . '/views/nav.view.php');
?>

<main class="profiledisplay">
        <?php echo "Welcome <b>$username1 </b><br>
        Checkings = $$checking<br>
        Savings = $$savings"
        ?>

</main>

<?php include_once(APP_ROOT . '/views/footer.view.php') ?>