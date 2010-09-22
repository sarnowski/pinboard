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
require_once('CouchDBException.php');
require_once('CouchDBObject.php');


/**
 * 
 * @author Tobias Sarnowski
 */
interface CouchDB {

    /**
     * Fires a GET request to the mongo db.
     *
     * @abstract
     * @param  string $database
     * @param  string $url
     * @return mixed
     * @throws CouchDBException
     */
    public function get($database, $url);

    /**
     * Gets an object from the database and hydrates it.
     *
     * @abstract
     * @param  string $database
     * @param  string $class a classname of type JsonObject
     * @param  string $id
     * @return mixed
     */
    public function read($database, $class, $id);

    /**
     * Fires a PUT request to the mongo db.
     *
     * @abstract
     * @param  string $database
     * @param  string $url
     * @param  mixed $data
     * @return mixed
     * @throws CouchDBException
     */
    public function put($database, $url, $data);

    /**
     * Stores an object in the database and returns the updated object.
     *
     * @abstract
     * @param  string $database
     * @param  CouchDBObject $object
     * @return mixed
     */
    public function update($database, CouchDBObject $object);

    /**
     * Fires a DELETE request to the mongo db.
     *
     * @abstract
     * @param  string $database
     * @param  string $url
     * @return mixed
     * @throws CouchDBException
     */
    public function del($database, $url);

    /**
     * Deletes a JsonObject from the database.
     *
     * @abstract
     * @param  string $database
     * @param  CouchDBObject $object
     * @return string
     */
    public function delete($database, CouchDBObject $object);

    /**
     * Returns a list of all results given by the view. If
     * the class param is set, the results will be hydrated.
     * Parameters are a list of key/value pairs for the
     * GET URL.
     *
     * @abstract
     * @param  string $database
     * @param  string $designDocument
     * @param  string $viewName
     * @param  string $parameters
     * @param  string $class
     * @return array
     */
    public function view($database, $designDocument, $viewName, $parameters = null, $class = null);

    /**
     * Stores a design document under the name with the given list of CouchDBViews.
     *
     * @abstract
     * @param  string $database
     * @param  string $name
     * @param  array $views
     * @return string
     */
    public function storeDesignDocument($database, $name, $views);
}
