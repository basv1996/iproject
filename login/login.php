<?php
if(isset($_SESSION["id"])){
    $user = $_SESSION["id"];
    echo "<div class='container'>";
    echo "Je bent al ingelogd $user, klik <a href='?action=logout'>hier</a> om uit te loggen.";
    echo "</div>";
}

else {

    echo "<div class='container'>";

    echo "<h2>Not Logged in yet</h2>";
    echo "<form action='?page=login_submit' method='post'>";
    echo "<fieldset>";
    echo "<p>";
    echo "<input required type='text' placeholder ='username' id='name' name='name' value='' maxlength='20' />
        </p>
        <p>
            <input required type='password' placeholder ='password' id='password' name='password' value='' maxlength='20' />
        </p>
        <p>
          <input type='submit' value='Login' />
        </p>
    </fieldset>
</form>
</div>";


}
?>
