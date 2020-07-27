<?php

class Session
{
    /**
     * Définie un message de notification et un type avec bootstrap (success, danger etc..)
     *
     * @param [type] $message
     * @param string $type
     */
    public function setFlash($message, $type = 'danger')
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    /**
     * Affiche le message de notification
     */
    public function flash()
    {
        if (isset($_SESSION['flash'])) {
?>
            <div class="alert alert-<?php echo $_SESSION['flash']['type'] ?>">
                <a class="close">x</a>
                <?php echo $_SESSION['flash']['message'] ?>
            </div>
<?php
            unset($_SESSION['flash']);
        }
    }
}
