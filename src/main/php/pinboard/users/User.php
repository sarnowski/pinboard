<?php


/**
 * 
 * @author Tobias Sarnowski
 */ 
interface User {

    /**
     * A unique identifier of an user.
     *
     * @abstract
     * @return string
     */
    public function getId();

    /**
     * The user's E-Mail address.
     *
     * @abstract
     * @return string
     */
    public function getEmail();

    /**
     * Checks, if the given password is the user one's.
     *
     * @abstract
     * @param  string $password
     * @return boolean
     */
    public function isPassword($password);

    /**
     * Sets a new password for the user.
     *
     * @abstract
     * @param  string $password
     * @return void
     */
    public function setPassword($password);

}
