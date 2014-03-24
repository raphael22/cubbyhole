<?php 

if(isset($_SESSION["userEmail"])) {
    $userManager = new UserManager();
    $userManager->disconnectUser();
    header("location:index.php");
} 
else {
?>
    <div class="hero-unit">
        <div class="alert alert-red">Vous êtes déjà déconnecté.</div>
    </div>
<?php 
}
?>