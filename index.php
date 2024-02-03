<?php 
// displays main information displayed on each page
$data = [
    'pageTitle' => 'AWP Bank | Home',
    'header' => 'Home',
    'displayName' => 'Welcome <?php echo $_POST["username"]; ?><br>',
    'displayEmail' => 'Your email address is: <?php echo $_POST["email"]; ?>',
    'maincontent' => [

    ]

];




?>

<!-- checks if the form has been submitted, and if so displays the homepage with nav bar -->
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    echo "<main> Hello, " . htmlspecialchars($name) . " Welcome to your banking homepage!"; ?>
    <p> I want to be able to see this paragraph<p></main>
    <?php include_once('src/views/nav.view.php') ?>
    
    
    
    <?php
}

else {
?>
<!-- form to be displayed until all information is filled out, loads first on the main web-page -->
<h1>Welcome to AWP Bank!</h1>
    <form method="post" action="" autocomplete="off">
        <div id="formtitle"><h2>Log in!</h2></div>
        Name: <input type="text" name="name" required><br>
        Password: <input type="password" name="password" required><br>

        <input type="submit" value="Sign In">
    </form>
<?php
}
?>








<?php include_once('src/views/head.view.php') ?>






<!-- <form action="index.php" method="post">
Userame: <input type="text" name="username"><br>
Password: <input type="text" name="password"><br>
<input type="submit">
</form> -->


<?php include_once('src/views/footer.view.php') ?>