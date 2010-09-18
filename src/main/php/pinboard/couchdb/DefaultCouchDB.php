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
require_once('TypeSafe/config/Configuration.php');
require_once('CouchDB.php');


/**
 * 
 * @author Tobias Sarnowski
 */ 
class DefaultCouchDB implements CouchDB {

    /**
     * @var Configuration
     */
    private $config;

    /**
     * @var Logger
     */
    private $log;

    /**
     * @param Configuration $config
     * @param Logger $log
     * @return void
     */
    function __construct(Configuration $config, Logger $log) {
        $this->config = $config;
        $this->log = $log;
    }

    public function get($database, $url) {
        return null;
    }

    public function put($database, $url, $data) {
        return null;
    }

    public function del($database, $url) {
        return null;
    }

}
