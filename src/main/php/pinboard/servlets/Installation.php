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

require_once('TypeSafe/Servlet.php');
require_once('TypeSafe/config/Configuration.php');
require_once('TypeSafe/http/ForbiddenException.php');
require_once('pinboard/couchdb/CouchDB.php');
require_once('pinboard/users/DefaultUserService.php');
require_once('pinboard/users/ViewUserByEmail.php');


/**
 * 
 * @author Tobias Sarnowski
 */ 
class Installation implements Servlet {

    const CONFIG_INSTALL = "installation";

    /**
     * @var CouchDB
     */
    private $couchDb;

    /**
     * @var Configuration
     */
    private $config;

    /**
     * @param Configuration $config
     * @param CouchDB $couchDb
     * @return void
     */
    function __construct(Configuration $config, CouchDB $couchDb) {
        $this->couchDb = $couchDb;
        $this->config = $config;
    }

    public function handleRequest($matches) {
        if (!$this->config->get(self::CONFIG_INSTALL, true)) {
            throw new ForbiddenException("Installation is forbidden by configuration.");
        }

        if (isset($_POST['install'])) {
            // do the installation magic
            $views = array(
                new ViewUserByEmail()
            );

            $this->couchDb->storeDesignDocument(
                DefaultUserService::USER_DB,
                DefaultUserService::USER_VIEWS,
                $views
            );
        }

        include('Installation.xhtml');
    }
}
