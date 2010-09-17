<?php
require_once('UserService.php');


/**
 * 
 * @author Tobias Sarnowski
 */
interface UserProvider {

    /**
     * Returns the current logged in user.
     *
     * @abstract
     * @return User
     */
    public function getCurrentUser();

}
