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
interface CouchDBView {

    /**
     * Returns the unique name of the view within the design document.
     *
     * @abstract
     * @return string
     */
    public function getName();

    /**
     * Returns the javascript map function.
     *
     * <b>Example:</b><br/>
     * <pre>function(doc) { emit(null,doc) }</pre>
     *
     * @abstract
     * @return string
     */
    public function getMapFunction();

    /**
     * Returns the javascript reduce function or null if no reduce function should be used.
     *
     * <b>Example:</b><br/>
     * <pre>function(keys, values) { return sum(values) }</pre>
     *
     * @abstract
     * @return string
     */
    public function getReduceFunction();

}
