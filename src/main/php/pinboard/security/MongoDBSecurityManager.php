<?php
require_once('TypeSafe/security/SecurityManager.php');
require_once('TypeSafe/security/IncorrectCredentialsException.php');
require_once('pinboard/users/UserService.php');


/**
 * 
 * @author Tobias Sarnowski
 */ 
class MongoDBSecurityManager implements SecurityManager {

    /**
     * @var UserService
     */
    private $userService;

    /**
     * @param UserService $userService
     * @return void
     */
    function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function getPermissions(Subject $subject) {
        // currently not used
        return array();
    }

    public function getRoles(Subject $subject) {
        // currently not used
        return array();
    }

    public function isAuthenticated(Subject $subject) {
        return $subject->getPrincipal() != null;
    }

    public function login(Subject $subject, $credentials) {
        if (!isset($credentials['email'])) {
            throw new IncorrectCredentialsException('Credential "email" not set.');
        }
        if (!isset($credentials['password'])) {
            throw new IncorrectCredentialsException('Credential "password" not set.');
        }
        $user = $this->userService->read($credentials['email']);
        if ($user->isPassword($credentials['password'])) {
            throw new IncorrectCredentialsException('Password incorrect for "'.$user->getEmail().'"');
        }
        return $user->getId();
    }

    public function logout(Subject $subject, $principal = null) {
        return null;
    }
}
