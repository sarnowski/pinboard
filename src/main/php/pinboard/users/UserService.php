<?php
require_once('User.php');
require_once('UserNotFoundException.php');


/**
 * 
 * @author Tobias Sarnowski
 */
interface UserService {

    /**
     * Creates a new user.
     *
     * @abstract
     * @param  string $email
     * @param  string $password
     * @return User
     */
    public function create($email, $password);

    /**
     * Returns the corresponding user.
     *
     * @abstract
     * @param  string $userId
     * @return User
     * @throws UserNotFoundException
     */
    public function read($userId);

    /**
     * Returns the corresponding user.
     *
     * @abstract
     * @param  string $email
     * @return User
     * @throws UserNotFoundException
     */
    public function readByEmail($email);

    /**
     * Updates a user entity.
     *
     * @abstract
     * @param  User $user
     * @return void
     */
    public function update($user);

}
