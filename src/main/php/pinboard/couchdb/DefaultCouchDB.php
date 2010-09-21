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
require_once('CouchDBException.php');


/**
 *
 * @author Tobias Sarnowski
 */
class DefaultCouchDB implements CouchDB {

    /**
     * @var Logger
     */
    private $log;

    /**
     * @var string
     */
    private $host;

    /**
     * @var int
     */
    private $port;

    /**
     * @var string
     */
    private $prefix;

    /**
     * @param Configuration $config
     * @param Logger $log
     * @return void
     */
    function __construct(Configuration $config, Logger $log) {
        $this->log = $log;

        $this->host = $config->get('db.host', 'localhost');
        $this->port = $config->get('db.port', 5984);
        $this->prefix = $config->get('db.prefix', '');
    }

    public function get($database, $url) {
        return $this->send('GET', $this->buildUrl($database, $url));
    }

    public function put($database, $url, $data) {
        return $this->send('PUT', $this->buildUrl($database, $url), $data);
    }

    public function del($database, $url) {
        return $this->send('DELETE', $this->buildUrl($database, $url));
    }

    /**
     * @private
     * @param  string $database
     * @param  string $url
     * @return string
     */
    function buildUrl($database, $url) {
        if (substr($url, 0, 1) != '/') {
            $url = "/$url";
        }
        return '/'.$this->prefix.$database.$url;
    }

    /**
     * Based on the example:
     * http://wiki.apache.org/couchdb/Getting_started_with_PHP
     *
     * @private
     * @throws CouchDBException
     * @param  string $method
     * @param  string $url
     * @param  string $post_data
     * @return string
     */
    function send($method, $url, $post_data = NULL) {
        $s = fsockopen($this->host, $this->port, $errno, $errstr);
        if (!$s) {
            throw new CouchDBException('Connection refused ($errno): $errstr');
        }

        $request = "$method $url HTTP/1.0\r\nHost: ".$this->host."\r\n";

        if ($post_data) {
            $request .= "Content-Length: ".strlen($post_data)."\r\n\r\n";
            $request .= "$post_data\r\n";
        } else {
            $request .= "\r\n";
        }

        fwrite($s, $request);
        $response = "";

        while(!feof($s)) {
            $response .= fgets($s);
        }

        list($header, $body) = explode("\r\n\r\n", $response);
        return $body;
    }

    public function delete($database, JsonObject $object) {
        // TODO: Implement delete() method.
    }

    public function read($database, $class, $id) {
        // TODO: Implement read() method.
    }

    public function update($database, JsonObject $object) {
        // TODO: Implement update() method.
    }
}
