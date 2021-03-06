<?php

/*
 * Copyright (C) 2010
 * Licensed to CiviCRM under the Academic Free License version 3.0.
 *
 * Written and contributed by Parvez Husain (http://www.parvez.me)
 *
 */

/**
 *
 * @package CRM
 * @author Marshal Newrock <marshal@idealso.com>
 * $Id: AuthorizeNet.php 26018 2010-01-25 09:00:59Z deepak $
 **/

require_once 'IntuitQuickbooks.php';

class CRM_Contribute_Payment_IntuitQuickbooks extends Intuit_Payment_IntuitQuickbooks {
    /** 
     * We only need one instance of this object. So we use the singleton 
     * pattern and cache the instance in this variable 
     *
     * @var object 
     * @static 
     */
    static private $_singleton = null;
    
    /**
     * Constructor
     *
     * @param string $mode the mode of operation: live or test
     *
     * @return void
     */
    function __construct( $mode, &$paymentProcessor ) {
        parent::__construct( $mode, $paymentProcessor );
    }

    /**
     * singleton function used to manage this object
     *
     * @param string $mode the mode of operation: live or test
     *
     * @return object
     * @static
     */
    static function &singleton( $mode, &$paymentProcessor ) {
        $processorName = $paymentProcessor['name'];
        if (self::$_singleton[$processorName] === null ) {
            self::$_singleton[$processorName] = new CRM_Contribute_Payment_IntuitQuickbooks( $mode, $paymentProcessor );
        }
        return self::$_singleton[$processorName];
    }

}

