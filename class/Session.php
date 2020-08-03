<?php

/**
 * Définie un message de notification
 */
class Session
{
    /**
     * Retourne un message d'erreur
     */
    public static function flashError()
    {
        if (isset($_SESSION['error'])) {
?>
            <div id="flash-msg">
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong><?php echo $_SESSION['error']; ?></strong>
                    <?php unset($_SESSION['error']); ?>
                </div>
            </div>
        <?php }
    }

    /**
     * Retourne un message de validation
     */
    public static function flashValidate()
    {
        if (isset($_SESSION['valide'])) {
        ?>
            <div id="flash-msg">
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong><?php echo $_SESSION['valide']; ?></strong>
                    <?php unset($_SESSION['valide']); ?>
                </div>
            </div>

<?php }
    }
}
