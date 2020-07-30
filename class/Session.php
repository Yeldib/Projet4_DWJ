<?php

class Session
{
    public static function flashError()
    {
        if (isset($_SESSION['error'])) {
?>
            <div class="alert alert-danger">
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
            <div class="alert alert-success">
                <a class="close">x</a>
                <?php echo $_SESSION['valide'];
                unset($_SESSION['valide']) ?>
            </div>
<?php }
    }
}
