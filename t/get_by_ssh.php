<?php
require('test-more.php');
require('../scripts/ss_get_by_ssh.php');
$debug = true;

is(
   to_float('74900191315.1170664159 dollars per hour'),
   '74900191315.1170664159',
   'to_float 74900191315.1170664159'
);

is_deeply(
   proc_stat_parse(null, file_get_contents('samples/proc_stat-001.txt')),
   array(
      'STAT_interrupts'       => '339490',
      'STAT_context_switches' => '697948',
      'STAT_forks'            => '11558',
      'STAT_CPU_user'         => '24198',
      'STAT_CPU_nice'         => '0',
      'STAT_CPU_system'       => '69614',
      'STAT_CPU_idle'         => '2630536',
      'STAT_CPU_iowait'       => '558',
      'STAT_CPU_irq'          => '5872',
      'STAT_CPU_softirq'      => '1572',
      'STAT_CPU_steal'        => '0',
      'STAT_CPU_guest'        => '0'
   ),
   'samples/proc_stat-001.txt'
);

is_deeply(
   proc_stat_parse(null, file_get_contents('samples/proc_stat-002.txt')),
   array(
      'STAT_interrupts'       => '87480486',
      'STAT_context_switches' => '125521467',
      'STAT_forks'            => '239810',
      'STAT_CPU_user'         => '2261920',
      'STAT_CPU_nice'         => '38824',
      'STAT_CPU_system'       => '986335',
      'STAT_CPU_idle'         => '39683698',
      'STAT_CPU_iowait'       => '62368',
      'STAT_CPU_irq'          => '19193',
      'STAT_CPU_softirq'      => '8499',
      'STAT_CPU_steal'        => '0',
      'STAT_CPU_guest'        => '0'
   ),
   'samples/proc_stat-002.txt'
);

is_deeply(
   free_parse( null, file_get_contents('samples/free-001.txt') ),
   array(
      'STAT_memcached' => '22106112',
      'STAT_membuffer' => '1531904',
      'STAT_memshared' => '0',
      'STAT_memfree'   => '17928192',
      'STAT_memused'   => '21389312'
   ),
   'samples/free-001.txt'
);

is_deeply(
   free_parse( null, file_get_contents('samples/free-002.txt') ),
   array(
      'STAT_memcached' => '1088184320',
      'STAT_membuffer' => '131469312',
      'STAT_memshared' => '0',
      'STAT_memfree'   => '189325312',
      'STAT_memused'   => '7568291328'
   ),
   'samples/free-002.txt (issue 102)'
);

is_deeply(
   w_parse( null, file_get_contents('samples/w-001.txt') ),
   array(
      'STAT_loadavg' => '1.43',
      'STAT_numusers' => '2',
   ),
   'samples/w-001.txt'
);

is_deeply(
   w_parse( null, file_get_contents('samples/w-002.txt') ),
   array(
      'STAT_loadavg' => '0.35',
      'STAT_numusers' => '6',
   ),
   'samples/w-002.txt'
);

is_deeply(
   memcached_parse( null, file_get_contents('samples/memcached-001.txt') ),
   array(
      'MEMC_pid'                   => '2120',
      'MEMC_uptime'                => '32314',
      'MEMC_time'                  => '1261775864',
      'MEMC_version'               => '1.2.2',
      'MEMC_pointer_size'          => '32',
      'MEMC_rusage_user'           => '396024',
      'MEMC_rusage_system'         => '1956122',
      'MEMC_curr_items'            => '0',
      'MEMC_total_items'           => '0',
      'MEMC_bytes'                 => '0',
      'MEMC_curr_connections'      => '1',
      'MEMC_total_connections'     => '5',
      'MEMC_connection_structures' => '2',
      'MEMC_cmd_get'               => '0',
      'MEMC_cmd_set'               => '0',
      'MEMC_get_hits'              => '0',
      'MEMC_get_misses'            => '0',
      'MEMC_evictions'             => '0',
      'MEMC_bytes_read'            => '45',
      'MEMC_bytes_written'         => '942',
      'MEMC_limit_maxbytes'        => '67108864',
      'MEMC_threads'               => '1',
   ),
   'samples/memcached-001.txt'
);

is_deeply(
   nginx_parse( null, file_get_contents('samples/nginx-001.txt') ),
   array(
      'NGINX_active_connections' => '251',
      'NGINX_server_accepts'     => '255601634',
      'NGINX_server_handled'     => '255601634',
      'NGINX_server_requests'    => '671013148',
      'NGINX_reading'            => '5',
      'NGINX_writing'            => '27',
      'NGINX_waiting'            => '219',
   ),
   'samples/nginx-001.txt'
);

is_deeply(
   apache_parse( null, file_get_contents('samples/apache-001.txt') ),
   array(
      'Requests'               => '3452389',
      'Bytes_sent'             => '23852769280',
      'Idle_workers'           => '8',
      'Busy_workers'           => '1',
      'CPU_Load'               => '.023871',
      'Waiting_for_connection' => '8',
      'Starting_up'            => 0,
      'Reading_request'        => 0,
      'Sending_reply'          => '1',
      'Keepalive'              => 0,
      'DNS_lookup'             => 0,
      'Closing_connection'     => 0,
      'Logging'                => 0,
      'Gracefully_finishing'   => 0,
      'Idle_cleanup'           => 0,
      'Open_slot'              => '247',
   ),
   'samples/apache-001.txt'
);

?>
