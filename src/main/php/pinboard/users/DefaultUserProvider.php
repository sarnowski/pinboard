<?php
require_once('TypeSafe/security/Subject.php');
require_once('UserProvider.php');


/**
 * 
 * @author Tobias Sarnowski
 */ 
class DefaultUserProvider implements UserProvider {

    /**
     * @var Subject
     */
    private $subject;

    /**
     * @var UserService
     */
    private $userService;

    /**
     * @param Subject $subject
     * @param UserService $userService
     * @return void
     */
    function __construct(Subject $subject, UserService $userService) {
        $this->subject = $subject;
        $this->userService = $userService;
    }

    /**
     * @return User
     * @requiresAuthentication
     */
    public function getCurrentUser() {
        return $this->userService->read($this->subject->getPrincipal());
    }
}
