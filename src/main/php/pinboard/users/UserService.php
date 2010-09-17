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
