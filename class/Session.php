<?php

class Session
{
    public static function flashError()
    {
        if (isset($_SESSION['error'])) {
?>
            <div id="flash-msg" class="alert alert-danger mb-0">
                <a class="close">x</a>
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']) ?>
            </div>
        <?php }
    }

    public static function flashValidate()
    {
        if (isset($_SESSION['valide'])) {
        ?>
            <div id="flash-msg" class="alert alert-success mb-0">
                <a class="close">x</a>
                <?php echo $_SESSION['valide'];
                unset($_SESSION['valide']) ?>
            </div>
<?php }
    }
}
