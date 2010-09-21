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
require_once('pinboard/couchdb/JsonObject.php');


/**
 * 
 * @author Tobias Sarnowski
 */ 
interface User extends JsonObject {

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
