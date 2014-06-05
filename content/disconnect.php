<?php 

if(isset($_SESSION["userId"])) {
	require_once('library/entity/User.class.php');
	require_once('library/manager/UserManager.class.php');
    $userManager = new UserManager();
    $userManager->disconnectUser();
    header("location:index.php?page=Home");
} 
else {
?>
    <div class="hero-unit">
        <div class="alert alert-red">Vous êtes déjà déconnecté.</div>
    </div>
<?php 
}
?>