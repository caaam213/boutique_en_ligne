<?php
    if(isset($error))
    {
        echo $error;
    }

?>

<form action="index.php?action=login" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="name" required>

    <br/>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>

    <br/>
    <input type="submit" name="submit" value="Se connecter">

</form>

</body>
</html>