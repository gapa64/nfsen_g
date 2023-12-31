<?php
/**
 * config file for nfsen-ng
 *
 * remarks:
 * * database name = datasource class name (case-sensitive)
 * * log priority should be one of the predefined core constants prefixed with LOG_
 */

$nfsen_config = array(
    'general' => array(
        'ports' => array(
            80, 22, 53, 443
        ),
        'sources' => array(
            'router',  // DO NOT ALTER THIS LINE, it will be modified by entrypoint.sh
        ),
        'db' => 'RRD',
        'processor' => 'NfDump',
    ),
    'frontend' => array(
        'reload_interval' => 60,
        'defaults' => array(
            'view' => 'graphs', // graphs, flows, statistics
            'graphs' => array(
                'display' => 'sources', // sources, protocols, ports
                'datatype' => 'flows', // flows, packets, bytes
                'protocols' => array('any'), // any, tcp, udp, icmp, others (multiple possible if display=protocols)
            ),
            'flows' => array(
                'limit' => 200,
            ),
            'statistics' => array(
                'order_by' => 'bytes',
            ),
        ),
    ),
    'nfdump' => array(
        'binary' => '/usr/bin/nfdump',
        'profiles-data' => '/var/nfdump/profiles-data',
        'profile' => 'live',
        'max-processes' => 1, // maximum number of concurrently running nfdump processes
    ),
    'db' => array(
        // 'Akumuli' => array(
        //     //'host' => 'localhost',
        //     //'port' => 8282,
        // ),
        'RRD' => array()
    ),
    'log' => array(
        'priority' => LOG_DEBUG, // LOG_DEBUG is very talkative!
    )
);
