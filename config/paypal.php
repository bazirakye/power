<?php 
return [ 
    'client_id' => 'AaI-YOMWmZD7sK2CtDX-V-0-I4JSdIQgJWc4kYzq32Hl4mOn_zHS94vck0LHpbNeLpucrqVfxE1GqvBB',
	'secret' => 'EI2jro8NGz5C_zg-RzHKAU_gnFVIBeOrMFKrgfdXm-tyMJIGRYVNqhaoFdFKGH0eBcKFwO1JAxFbw2Et',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];