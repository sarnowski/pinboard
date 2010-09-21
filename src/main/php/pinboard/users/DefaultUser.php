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
require_once('pinboard/couchdb/AbstractCouchDBObject.php');
require_once('User.php');


/**
 * 
 * @author Tobias Sarnowski
 */ 
class DefaultUser extends AbstractCouchDBObject implements User {

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @static
     * @param  string $email
     * @param  string $password
     * @return DefaultUser
     */
    public static function create($email, $password) {
        $user = new DefaultUser();
        $user->setEmail($email);
        $user->setPassword($password);
        return $user;
    }

    public function getUserId() {
        return $this->getId();
    }

    public function getEmail() {
        return $this->password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function isPassword($password) {
        return $password != null && $password == $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    function createDataSet() {
        return array(
            'email' => $this->email,
            'password' => $this->password
        );
    }

    static function createObjectFromDataSet($data) {
        $user = new DefaultUser();
        $user->setEmail($data['email']);
        $user->setPassword($data['password']);
        return $user;
    }
}
