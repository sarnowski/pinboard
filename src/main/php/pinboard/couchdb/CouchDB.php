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
interface CouchDB {

    /**
     * Fires a GET request to the mongo db.
     *
     * @abstract
     * @param  string $database
     * @param  string $url
     * @return mixed
     */
    public function get($database, $url);

    /**
     * Fires a PUT request to the mongo db.
     *
     * @abstract
     * @param  string $database
     * @param  string $url
     * @param  mixed $data
     * @return mixed
     */
    public function put($database, $url, $data);

    /**
     * Fires a DELETE request to the mongo db.
     *
     * @abstract
     * @param  string $database
     * @param  string $url
     * @return mixed
     */
    public function del($database, $url);

}
