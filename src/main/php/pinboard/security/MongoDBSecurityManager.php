<?php
/*
 * Copyright 2010 Tobias Sarnowski
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

require_once('TypeSafe/logging/Logger.php');
require_once('TypeSafe/security/IncorrectCredentialsException.php');
require_once('TypeSafe/security/SecurityManager.php');
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
     * @var Logger
     */
    private $log;

    /**
     * @param UserService $userService
     * @param Logger $log
     * @return void
     */
    function __construct(UserService $userService, Logger $log) {
        $this->userService = $userService;
        $this->log = $log;
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
        $this->log->info('Logged in user '.$user->getEmail().' ['.$user->getId().']');
        return $user->getId();
    }

    public function logout(Subject $subject, $principal = null) {
        $this->log->info('Logged out user ['.$subject->getPrincipal().']');
        return null;
    }
}
