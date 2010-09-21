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



/**
 * 
 * @author Tobias Sarnowski
 */
interface CouchDBObject {

    /**
     * A unique identifier for the object.
     *
     * @abstract
     * @return string
     */
    public function getId();

    /**
     * Sets the object's ID.
     *
     * @abstract
     * @param  string $id
     * @return void
     */
    public function setId($id);

    /**
     * Returns the revision of the object.
     *
     * @abstract
     * @return string
     */
    public function getRev();

    /**
     * Sets the object's revision.
     *
     * @abstract
     * @param  string $rev
     * @return void
     */
    public function setRev($rev);

    /**
     * Dehydrates an object to its json representation.
     *
     * @abstract
     * @return string
     */
    public function toJson();

    /**
     * Hydrates an object with its json representation.
     *
     * @static
     * @abstract
     * @param  string $json
     * @return mixed
     */
    public static function fromJson($json);

}
