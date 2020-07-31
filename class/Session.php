<?php

class Session
{
    public static function flashError()
    {
        if (isset($_SESSION['error'])) {
?>
            <div id="flash-msg">
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong><?php echo $_SESSION['error'];
                            unset($_SESSION['error']) ?></strong>
                </div>
            </div>
        <?php }
    }

    public static function flashValidate()
    {
        if (isset($_SESSION['valide'])) {
        ?>
            <div id="flash-msg">
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong><?php echo $_SESSION['valide'];
                            unset($_SESSION['valide']) ?></strong>
                </div>
            </div>
<?php }
    }
}
