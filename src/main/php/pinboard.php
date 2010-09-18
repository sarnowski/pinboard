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

// set include path
$includePath = get_include_path();
$includePath .= PATH_SEPARATOR.dirname(__FILE__);
if (!set_include_path($includePath)) {
    die('Cannot set include path!');
}


// throw php errors as exceptions
function exceptions_error_handler($severity, $message, $filename, $lineno) {
    throw new ErrorException($message, 0, $severity, $filename, $lineno);
}

set_error_handler('exceptions_error_handler');

// helper to print nice errors
function print_exception(Exception $e) {
    $debug = ini_get('display_errors');

    if ($e instanceof HttpException) {
        if (!$debug) {
            header('HTTP/1.0 '.$e->getStatusCode().' '.$e->getTitle());
        }
        echo '<h1>'.$e->getTitle().'</h1>';
    } else {
        header('HTTP/1.0 500 Internal Server Error');
        echo '<h1>Internal Server Error</h1>';
    }
    if ($debug) {
        echo '<h2>'.get_class($e).': '.$e->getMessage().'</h2>';
        echo '<pre>'.$e->getTraceAsString().'</pre>';
    }
}


// main boot
try {

    // load dependencies
    require_once('TypeSafe/http/HttpException.php');
    require_once('TypeSafe/BootLoader.php');
    require_once('pinboard/ApplicationModule.php');

    // start the php session
    session_start();

    // initialize
    $framework = BootLoader::boot(new ApplicationModule());

    // execute
    $framework->request($_GET['uri']);

} catch (Exception $e) {
    print_exception($e);
}

die();