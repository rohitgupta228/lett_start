<?php

return [
    'client_id' => env('PAYPAL_CLIENT_ID', 'AfWVNI_DjitYGHh-OGnICF0Br-ajLD04A-czJH8HRG-EIp_sL0ykJr7g1JDfJDN3ey44go3WPxyKC2KD'),
    'secret' => env('PAYPAL_SECRET', 'EOQlYBEfNCn4PCVaxaB0VJkKZnCRDx78p46D7DG8xE05JMbv6LNAGwMWdFPkNBJnbcUHwIDO1gIvl_30'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE', 'sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];
