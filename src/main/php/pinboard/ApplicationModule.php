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

require_once('TypeSafe/ServletModule.php');
require_once('TypeSafe/config/PhpConfigurationModule.php');
require_once('TypeSafe/logging/RequestLoggerModule.php');
require_once('TypeSafe/session/PhpSessionModule.php');
require_once('TypeSafe/security/SecurityModule.php');
require_once('TypeSafe/couchdb/DefaultCouchDBModule.php');

require_once('security/DefaultSecurityManagerModule.php');

require_once('users/DefaultUserModule.php');

require_once('servlets/Pinboard.php');
require_once('servlets/PinboardAction.php');
require_once('servlets/Installation.php');
require_once('servlets/Welcome.php');


/**
 * 
 * @author Tobias Sarnowski
 */ 
class ApplicationModule extends ServletModule {

    public function configuration() {
        $this->install(new PhpConfigurationModule(dirname(__FILE__).'/../config.pinboard.php'));
        $this->install(new RequestLoggerModule());
        $this->install(new SecurityModule());

        session_start();
        $this->install(new PhpSessionModule());

        $this->install(new DefaultCouchDBModule());
        $this->install(new DefaultSecurityManagerModule());
        $this->install(new DefaultUserModule());

        // servlets
        $this->bind('Welcome')->inRequestScope();
        $this->handle('/welcome\.html/')->with('Welcome');

        $this->bind('Installation')->inRequestScope();
        $this->handle('/install\.html/')->with('Installation');

        $this->bind('Pinboard')->inRequestScope();
        $this->handle('/^$/')->with('Pinboard');

        $this->bind('PinboardAction')->inRequestScope();
        $this->handle('/^ajax\.service$/')->with('PinboardAction');
    }
}
