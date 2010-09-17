<?php
require_once('UserService.php');


/**
 * 
 * @author Tobias Sarnowski
 */ 
class DefaultUserService implements UserService {

    /**
     * @var MongoDB
     */
    private $mongoDb;

    /**
     * @param MongoDB $mongoDb
     * @return void
     */
    function __construct(MongoDB $mongoDb) {
        $this->mongoDb = $mongoDb;
    }

    public function create($email, $password) {
        // TODO: Implement create() method.
    }

    public function read($userId) {
        // TODO: Implement read() method.
    }

    public function readByEmail($email) {
        // TODO: Implement readByEmail() method.
    }

    public function update($user) {
        // TODO: Implement update() method.
    }
}
