<html>
    <body>
<?php session_start();?>
<? if(isset("iduser")){ ?>
        <?session_destroy();?>
        <script>
            alert("Logged out successfully.");
            window.location.href = "login.html"; // Redirect to login.html
        </script>
    <?}?>
    <body>
</html>