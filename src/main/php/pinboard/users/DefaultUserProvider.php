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
