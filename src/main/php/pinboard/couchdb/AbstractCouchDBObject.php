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

require_once('CouchDBObject.php');


/**
 *
 * @author Tobias Sarnowski
 */ 
abstract class AbstractCouchDBObject implements CouchDBObject {

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $rev;

    function __construct() {
        $this->id = uniqid();
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getRev() {
        return $this->id;
    }

    public function setRev($rev) {
        $this->rev = $rev;
    }

    /**
     * Return an array of your data to store.
     *
     * @abstract
     * @return array
     */
    abstract function createDataSet();

    public function toJson() {
        $data = $this->createDataSet();
        $data['_id'] = $this->getId();
        $data['_rev'] = $this->getRev();
        return json_encode($data);
    }

    /**
     * Return an object build of the given data.
     *
     * @static
     * @abstract
     * @param  array $data
     * @return mixed
     */
    static function createObjectFromDataSet($data) {
        throw new Exception("Not implemented!");
    }

    public static function fromJson($json) {
        $data = json_decode($json, true);
        $object = self::createObjectFromDataSet($data);
        $object->setId($data['_id']);
        $object->setRev($data['_rev']);
        return $object;
    }
}
