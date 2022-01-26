<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");
require_once(dirname(__FILE__, 3) . "/src/user/User.php");

class Login {
    public User $loggedUser;

    function set_logged_user($loggedUser) {
        $this->loggedUser = $loggedUser;
    }

    function get_logged_user() {
        return $this->loggedUser;
    }

    
}

?>