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
require_once('pinboard/couchdb/CouchDB.php');
require_once('DefaultUser.php');
require_once('UserService.php');


/**
 * 
 * @author Tobias Sarnowski
 */ 
class DefaultUserService implements UserService {

    /**
     * Database were the users are stored.
     */
    const USER_DB = "users";

    /**
     * Database were the users are stored.
     */
    const USER_VIEWS = "views";

    /**
     * @var CouchDB
     */
    private $couchDb;

    /**
     * @param CouchDB $couchDb
     * @return void
     */
    function __construct(CouchDB $couchDb) {
        $this->couchDb = $couchDb;
    }

    public function create($email, $password) {
        $user = DefaultUser::create($email, $password);
        $this->couchDb->update(self::USER_DB, $user);
    }

    public function read($userId) {
        return $this->couchDb->read(self::USER_DB, 'DefaultUser', $userId);
    }

    public function readByEmail($email) {
        // TODO: Implement readByEmail() method.
    }

    public function update($user) {
        $this->couchDb->update(self::USER_DB, $user);
    }
}
