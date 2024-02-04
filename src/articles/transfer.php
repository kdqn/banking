<?php 
session_start();
$config = parse_ini_file('config.ini', true);
$environment = $config['ENVIRONMENT'];
$URL_BASE = $config[$environment]['URL_BASE'];
define('URL_ROOT', "$URL_BASE");
define('APP_ROOT', dirname(__FILE__,2));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form using the function, passing both $_POST and the selected ID
    $result = processForm($_POST);
    echo "<script type='text/javascript'>alert('$result');</script>";
}

function processFORM($postDATA)
{
    if (isset($postDATA['accounts']))
    {
        if ($postDATA['accounts'] == 'checkings')
        {
            if ($_SESSION['savings'] - intval($postDATA['amount']) >= 0)
            {
                $_SESSION['checkings'] = $_SESSION['checkings'] + intval($postDATA['amount']);
                $_SESSION['savings'] = $_SESSION['savings'] - intval($postDATA['amount']);
            }
            else
            {
                return "CANNOT GO NEGATIVE";
            }
        }
        else
        {
            if ($_SESSION['checkings'] - intval($postDATA['amount']) >= 0)
            {
                $_SESSION['checkings'] = $_SESSION['checkings'] - intval($postDATA['amount']);
                $_SESSION['savings'] = $_SESSION['savings'] + intval($postDATA['amount']);
            }
            else
            {
                return "CANNOT GO NEGATIVE";
            }
        }
    }
    else
    {
        return "NO ACCOUNTS";
    }
}

$username1 = (isset($_SESSION['username'])) ? $_SESSION['username'] : '';
$password1 = (isset($_SESSION['password'])) ? $_SESSION['password'] : '';
$checking = (isset($_SESSION['checkings'])) ? $_SESSION['checkings'] : '';
$savings = (isset($_SESSION['savings'])) ? $_SESSION['savings'] : '';

$data = 
    [
        'pageTitle' => 'AWP Bank | Transfer',
        'header' => 'AWP Bank',
    ];

include_once(APP_ROOT . '/views/head.view.php');
include_once(APP_ROOT . '/views/header.view.php');
include_once(APP_ROOT . '/views/nav.view.php');
?>

<main>
    <?php echo "Welcome <b>$username1 </b><br>
    Checkings = $$checking<br>
    Savings = $$savings<br><br>"
    ?>

    <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
        <label for="accounts">Select an account:</label>
        <select id="accounts" name="accounts" required>
            <option value="checkings">Checkings</option>
            <option value="savings">Savings</option>
        </select>
        <br>    
        <b>Enter Amount For Transfer:</b> <input type = "text" name = "amount" id = "amount" required>

        <input type="submit" value="Submit">
    </form>

</main>

<?php include_once(APP_ROOT . '/views/footer.view.php') ?>