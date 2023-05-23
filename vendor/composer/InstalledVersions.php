<?php











namespace Composer;

use Composer\Autoload\ClassLoader;
use Composer\Semver\VersionParser;








class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-master',
    'version' => 'dev-master',
    'aliases' => 
    array (
    ),
    'reference' => '9c92a09ce6903a7fb011d27b7c1375d305e137cd',
    'name' => 'laravel/laravel',
  ),
  'versions' => 
  array (
    'brick/math' => 
    array (
      'pretty_version' => '0.10.2',
      'version' => '0.10.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '459f2781e1a08d52ee56b0b1444086e038561e3f',
    ),
    'composer/semver' => 
    array (
      'pretty_version' => '3.3.2',
      'version' => '3.3.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '3953f23262f2bff1919fc82183ad9acb13ff62c9',
    ),
    'cordoval/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'davedevelopment/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'dflydev/dot-access-data' => 
    array (
      'pretty_version' => 'v3.0.2',
      'version' => '3.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f41715465d65213d644d3141a6a93081be5d3549',
    ),
    'doctrine/inflector' => 
    array (
      'pretty_version' => '2.0.6',
      'version' => '2.0.6.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd9d313a36c872fd6ee06d9a6cbcf713eaa40f024',
    ),
    'doctrine/instantiator' => 
    array (
      'pretty_version' => '2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c6222283fa3f4ac679f8b9ced9a4e23f163e80d0',
    ),
    'doctrine/lexer' => 
    array (
      'pretty_version' => '3.0.0',
      'version' => '3.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '84a527db05647743d50373e0ec53a152f2cde568',
    ),
    'dragonmantank/cron-expression' => 
    array (
      'pretty_version' => 'v3.3.2',
      'version' => '3.3.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '782ca5968ab8b954773518e9e49a6f892a34b2a8',
    ),
    'egulias/email-validator' => 
    array (
      'pretty_version' => '4.0.1',
      'version' => '4.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '3a85486b709bc384dae8eb78fb2eec649bdb64ff',
    ),
    'ezyang/htmlpurifier' => 
    array (
      'pretty_version' => 'v4.16.0',
      'version' => '4.16.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '523407fb06eb9e5f3d59889b3978d5bfe94299c8',
    ),
    'fakerphp/faker' => 
    array (
      'pretty_version' => 'v1.21.0',
      'version' => '1.21.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '92efad6a967f0b79c499705c69b662f738cc9e4d',
    ),
    'filp/whoops' => 
    array (
      'pretty_version' => '2.14.6',
      'version' => '2.14.6.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f7948baaa0330277c729714910336383286305da',
    ),
    'fruitcake/php-cors' => 
    array (
      'pretty_version' => 'v1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '58571acbaa5f9f462c9c77e911700ac66f446d4e',
    ),
    'graham-campbell/result-type' => 
    array (
      'pretty_version' => 'v1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a878d45c1914464426dc94da61c9e1d36ae262a8',
    ),
    'guzzlehttp/guzzle' => 
    array (
      'pretty_version' => '7.5.0',
      'version' => '7.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b50a2a1251152e43f6a37f0fa053e730a67d25ba',
    ),
    'guzzlehttp/promises' => 
    array (
      'pretty_version' => '1.5.2',
      'version' => '1.5.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b94b2807d85443f9719887892882d0329d1e2598',
    ),
    'guzzlehttp/psr7' => 
    array (
      'pretty_version' => '2.4.3',
      'version' => '2.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '67c26b443f348a51926030c83481b85718457d3d',
    ),
    'hamcrest/hamcrest-php' => 
    array (
      'pretty_version' => 'v2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8c3d0a3f6af734494ad8f6fbbee0ba92422859f3',
    ),
    'haruncpi/laravel-id-generator' => 
    array (
      'pretty_version' => 'v1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b227dc2391ea45e9d070f19d35dc0a5f7a8f4185',
    ),
    'illuminate/auth' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/broadcasting' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/bus' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/cache' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/collections' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/conditionable' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/config' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/console' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/container' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/cookie' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/database' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/encryption' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/events' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/filesystem' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/hashing' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/http' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/log' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/macroable' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/mail' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/notifications' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/pagination' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/pipeline' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/queue' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/redis' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/routing' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/session' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/support' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/testing' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/translation' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/validation' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'illuminate/view' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.48.0',
      ),
    ),
    'intervention/image' => 
    array (
      'pretty_version' => '2.7.2',
      'version' => '2.7.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '04be355f8d6734c826045d02a1079ad658322dad',
    ),
    'kodova/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'laravel/breeze' => 
    array (
      'pretty_version' => 'v1.18.0',
      'version' => '1.18.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '4280282cff1ed240d6494bbb3405635820a09931',
    ),
    'laravel/framework' => 
    array (
      'pretty_version' => 'v9.48.0',
      'version' => '9.48.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c78ae7aeb0cbcb1a205050d3592247ba07f5b711',
    ),
    'laravel/laravel' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
      ),
      'reference' => '9c92a09ce6903a7fb011d27b7c1375d305e137cd',
    ),
    'laravel/sail' => 
    array (
      'pretty_version' => 'v1.18.1',
      'version' => '1.18.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a64f78a4ab86c04a4c5de39bea20a8d36ad48a22',
    ),
    'laravel/sanctum' => 
    array (
      'pretty_version' => 'v2.15.1',
      'version' => '2.15.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '31fbe6f85aee080c4dc2f9b03dc6dd5d0ee72473',
    ),
    'laravel/serializable-closure' => 
    array (
      'pretty_version' => 'v1.2.2',
      'version' => '1.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '47afb7fae28ed29057fdca37e16a84f90cc62fae',
    ),
    'laravel/tinker' => 
    array (
      'pretty_version' => 'v2.8.0',
      'version' => '2.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '74d0b287cc4ae65d15c368dd697aae71d62a73ad',
    ),
    'league/commonmark' => 
    array (
      'pretty_version' => '2.3.8',
      'version' => '2.3.8.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c493585c130544c4e91d2e0e131e6d35cb0cbc47',
    ),
    'league/config' => 
    array (
      'pretty_version' => 'v1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '754b3604fb2984c71f4af4a9cbe7b57f346ec1f3',
    ),
    'league/flysystem' => 
    array (
      'pretty_version' => '3.12.2',
      'version' => '3.12.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f6377c709d2275ed6feaf63e44be7a7162b0e77f',
    ),
    'league/mime-type-detection' => 
    array (
      'pretty_version' => '1.11.0',
      'version' => '1.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ff6248ea87a9f116e78edd6002e39e5128a0d4dd',
    ),
    'maatwebsite/excel' => 
    array (
      'pretty_version' => '3.1.48',
      'version' => '3.1.48.0',
      'aliases' => 
      array (
      ),
      'reference' => '6d0fe2a1d195960c7af7bf0de760582da02a34b9',
    ),
    'maennchen/zipstream-php' => 
    array (
      'pretty_version' => 'v2.4.0',
      'version' => '2.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3fa72e4c71a43f9e9118752a5c90e476a8dc9eb3',
    ),
    'markbaker/complex' => 
    array (
      'pretty_version' => '3.0.2',
      'version' => '3.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '95c56caa1cf5c766ad6d65b6344b807c1e8405b9',
    ),
    'markbaker/matrix' => 
    array (
      'pretty_version' => '3.0.1',
      'version' => '3.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '728434227fe21be27ff6d86621a1b13107a2562c',
    ),
    'mockery/mockery' => 
    array (
      'pretty_version' => '1.5.1',
      'version' => '1.5.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e92dcc83d5a51851baf5f5591d32cb2b16e3684e',
    ),
    'monolog/monolog' => 
    array (
      'pretty_version' => '2.8.0',
      'version' => '2.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '720488632c590286b88b80e62aa3d3d551ad4a50',
    ),
    'mtdowling/cron-expression' => 
    array (
      'replaced' => 
      array (
        0 => '^1.0',
      ),
    ),
    'myclabs/deep-copy' => 
    array (
      'pretty_version' => '1.11.0',
      'version' => '1.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '14daed4296fae74d9e3201d2c4925d1acb7aa614',
    ),
    'myclabs/php-enum' => 
    array (
      'pretty_version' => '1.8.4',
      'version' => '1.8.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a867478eae49c9f59ece437ae7f9506bfaa27483',
    ),
    'nesbot/carbon' => 
    array (
      'pretty_version' => '2.65.0',
      'version' => '2.65.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '09acf64155c16dc6f580f36569ae89344e9734a3',
    ),
    'nette/schema' => 
    array (
      'pretty_version' => 'v1.2.3',
      'version' => '1.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'abbdbb70e0245d5f3bf77874cea1dfb0c930d06f',
    ),
    'nette/utils' => 
    array (
      'pretty_version' => 'v3.2.9',
      'version' => '3.2.9.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c91bac3470c34b2ecd5400f6e6fdf0b64a836a5c',
    ),
    'nikic/php-parser' => 
    array (
      'pretty_version' => 'v4.15.3',
      'version' => '4.15.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '570e980a201d8ed0236b0a62ddf2c9cbb2034039',
    ),
    'nunomaduro/collision' => 
    array (
      'pretty_version' => 'v6.4.0',
      'version' => '6.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f05978827b9343cba381ca05b8c7deee346b6015',
    ),
    'nunomaduro/termwind' => 
    array (
      'pretty_version' => 'v1.15.0',
      'version' => '1.15.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '594ab862396c16ead000de0c3c38f4a5cbe1938d',
    ),
    'phar-io/manifest' => 
    array (
      'pretty_version' => '2.0.3',
      'version' => '2.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '97803eca37d319dfa7826cc2437fc020857acb53',
    ),
    'phar-io/version' => 
    array (
      'pretty_version' => '3.2.1',
      'version' => '3.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4f7fd7836c6f332bb2933569e566a0d6c4cbed74',
    ),
    'phpoffice/phpspreadsheet' => 
    array (
      'pretty_version' => '1.28.0',
      'version' => '1.28.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6e81cf39bbd93ebc3a4e8150444c41e8aa9b769a',
    ),
    'phpoption/phpoption' => 
    array (
      'pretty_version' => '1.9.0',
      'version' => '1.9.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dc5ff11e274a90cc1c743f66c9ad700ce50db9ab',
    ),
    'phpunit/php-code-coverage' => 
    array (
      'pretty_version' => '9.2.24',
      'version' => '9.2.24.0',
      'aliases' => 
      array (
      ),
      'reference' => '2cf940ebc6355a9d430462811b5aaa308b174bed',
    ),
    'phpunit/php-file-iterator' => 
    array (
      'pretty_version' => '3.0.6',
      'version' => '3.0.6.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cf1c2e7c203ac650e352f4cc675a7021e7d1b3cf',
    ),
    'phpunit/php-invoker' => 
    array (
      'pretty_version' => '3.1.1',
      'version' => '3.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '5a10147d0aaf65b58940a0b72f71c9ac0423cc67',
    ),
    'phpunit/php-text-template' => 
    array (
      'pretty_version' => '2.0.4',
      'version' => '2.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '5da5f67fc95621df9ff4c4e5a84d6a8a2acf7c28',
    ),
    'phpunit/php-timer' => 
    array (
      'pretty_version' => '5.0.3',
      'version' => '5.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '5a63ce20ed1b5bf577850e2c4e87f4aa902afbd2',
    ),
    'phpunit/phpunit' => 
    array (
      'pretty_version' => '9.5.28',
      'version' => '9.5.28.0',
      'aliases' => 
      array (
      ),
      'reference' => '954ca3113a03bf780d22f07bf055d883ee04b65e',
    ),
    'psr/container' => 
    array (
      'pretty_version' => '2.0.2',
      'version' => '2.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c71ecc56dfe541dbd90c5360474fbc405f8d5963',
    ),
    'psr/container-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.1|2.0',
      ),
    ),
    'psr/event-dispatcher' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dbefd12671e8a14ec7f180cab83036ed26714bb0',
    ),
    'psr/event-dispatcher-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/http-client' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '2dfb5f6c5eff0e91e20e913f8c5452ed95b86621',
    ),
    'psr/http-client-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/http-factory' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '12ac7fcd07e5b077433f5f2bee95b3a771bf61be',
    ),
    'psr/http-factory-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/http-message' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f6561bf28d520154e4b0ec72be95418abe6d9363',
    ),
    'psr/http-message-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/log' => 
    array (
      'pretty_version' => '3.0.0',
      'version' => '3.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fe5ea303b0887d5caefd3d431c3e61ad47037001',
    ),
    'psr/log-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0.0 || 2.0.0 || 3.0.0',
        1 => '1.0|2.0|3.0',
      ),
    ),
    'psr/simple-cache' => 
    array (
      'pretty_version' => '3.0.0',
      'version' => '3.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '764e0b3939f5ca87cb904f570ef9be2d78a07865',
    ),
    'psr/simple-cache-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0|2.0|3.0',
      ),
    ),
    'psy/psysh' => 
    array (
      'pretty_version' => 'v0.11.11',
      'version' => '0.11.11.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ba67f2d26278ec9266a5cfe0acba33a8ca1277ae',
    ),
    'ralouphie/getallheaders' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '120b605dfeb996808c31b6477290a714d356e822',
    ),
    'ramsey/collection' => 
    array (
      'pretty_version' => '2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a4b48764bfbb8f3a6a4d1aeb1a35bb5e9ecac4a5',
    ),
    'ramsey/uuid' => 
    array (
      'pretty_version' => '4.7.3',
      'version' => '4.7.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '433b2014e3979047db08a17a205f410ba3869cf2',
    ),
    'rhumsaa/uuid' => 
    array (
      'replaced' => 
      array (
        0 => '4.7.3',
      ),
    ),
    'sebastian/cli-parser' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '442e7c7e687e42adc03470c7b668bc4b2402c0b2',
    ),
    'sebastian/code-unit' => 
    array (
      'pretty_version' => '1.0.8',
      'version' => '1.0.8.0',
      'aliases' => 
      array (
      ),
      'reference' => '1fc9f64c0927627ef78ba436c9b17d967e68e120',
    ),
    'sebastian/code-unit-reverse-lookup' => 
    array (
      'pretty_version' => '2.0.3',
      'version' => '2.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ac91f01ccec49fb77bdc6fd1e548bc70f7faa3e5',
    ),
    'sebastian/comparator' => 
    array (
      'pretty_version' => '4.0.8',
      'version' => '4.0.8.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fa0f136dd2334583309d32b62544682ee972b51a',
    ),
    'sebastian/complexity' => 
    array (
      'pretty_version' => '2.0.2',
      'version' => '2.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '739b35e53379900cc9ac327b2147867b8b6efd88',
    ),
    'sebastian/diff' => 
    array (
      'pretty_version' => '4.0.4',
      'version' => '4.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '3461e3fccc7cfdfc2720be910d3bd73c69be590d',
    ),
    'sebastian/environment' => 
    array (
      'pretty_version' => '5.1.4',
      'version' => '5.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '1b5dff7bb151a4db11d49d90e5408e4e938270f7',
    ),
    'sebastian/exporter' => 
    array (
      'pretty_version' => '4.0.5',
      'version' => '4.0.5.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ac230ed27f0f98f597c8a2b6eb7ac563af5e5b9d',
    ),
    'sebastian/global-state' => 
    array (
      'pretty_version' => '5.0.5',
      'version' => '5.0.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '0ca8db5a5fc9c8646244e629625ac486fa286bf2',
    ),
    'sebastian/lines-of-code' => 
    array (
      'pretty_version' => '1.0.3',
      'version' => '1.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c1c2e997aa3146983ed888ad08b15470a2e22ecc',
    ),
    'sebastian/object-enumerator' => 
    array (
      'pretty_version' => '4.0.4',
      'version' => '4.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '5c9eeac41b290a3712d88851518825ad78f45c71',
    ),
    'sebastian/object-reflector' => 
    array (
      'pretty_version' => '2.0.4',
      'version' => '2.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b4f479ebdbf63ac605d183ece17d8d7fe49c15c7',
    ),
    'sebastian/recursion-context' => 
    array (
      'pretty_version' => '4.0.4',
      'version' => '4.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cd9d8cf3c5804de4341c283ed787f099f5506172',
    ),
    'sebastian/resource-operations' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '0f4443cb3a1d92ce809899753bc0d5d5a8dd19a8',
    ),
    'sebastian/type' => 
    array (
      'pretty_version' => '3.2.0',
      'version' => '3.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fb3fe09c5f0bae6bc27ef3ce933a1e0ed9464b6e',
    ),
    'sebastian/version' => 
    array (
      'pretty_version' => '3.0.2',
      'version' => '3.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c6c1022351a901512170118436c764e473f6de8c',
    ),
    'spatie/backtrace' => 
    array (
      'pretty_version' => '1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4ee7d41aa5268107906ea8a4d9ceccde136dbd5b',
    ),
    'spatie/flare-client-php' => 
    array (
      'pretty_version' => '1.3.5',
      'version' => '1.3.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '3e5dd5ac4928f3d2d036bd02de5eb83fd0ef1f42',
    ),
    'spatie/ignition' => 
    array (
      'pretty_version' => '1.4.3',
      'version' => '1.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '2cf3833220cfe8fcf639544f8d7067b6469a00b0',
    ),
    'spatie/laravel-ignition' => 
    array (
      'pretty_version' => '1.6.4',
      'version' => '1.6.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '1a2b4bd3d48c72526c0ba417687e5c56b5cf49bc',
    ),
    'symfony/console' => 
    array (
      'pretty_version' => 'v6.2.5',
      'version' => '6.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '3e294254f2191762c1d137aed4b94e966965e985',
    ),
    'symfony/css-selector' => 
    array (
      'pretty_version' => 'v6.2.5',
      'version' => '6.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bf1b9d4ad8b1cf0dbde8b08e0135a2f6259b9ba1',
    ),
    'symfony/deprecation-contracts' => 
    array (
      'pretty_version' => 'v3.2.0',
      'version' => '3.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1ee04c65529dea5d8744774d474e7cbd2f1206d3',
    ),
    'symfony/error-handler' => 
    array (
      'pretty_version' => 'v6.2.5',
      'version' => '6.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '0092696af0be8e6124b042fbe2890ca1788d7b28',
    ),
    'symfony/event-dispatcher' => 
    array (
      'pretty_version' => 'v6.2.5',
      'version' => '6.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f02d108b5e9fd4a6245aa73a9d2df2ec060c3e68',
    ),
    'symfony/event-dispatcher-contracts' => 
    array (
      'pretty_version' => 'v3.2.0',
      'version' => '3.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '0782b0b52a737a05b4383d0df35a474303cabdae',
    ),
    'symfony/event-dispatcher-implementation' => 
    array (
      'provided' => 
      array (
        0 => '2.0|3.0',
      ),
    ),
    'symfony/finder' => 
    array (
      'pretty_version' => 'v6.2.5',
      'version' => '6.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c90dc446976a612e3312a97a6ec0069ab0c2099c',
    ),
    'symfony/http-foundation' => 
    array (
      'pretty_version' => 'v6.2.5',
      'version' => '6.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '9d081ead9d3432e2e8002178d14c4c9dd4b8ffbf',
    ),
    'symfony/http-kernel' => 
    array (
      'pretty_version' => 'v6.2.5',
      'version' => '6.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f68aaa11eee6b21c99bce0f3d98815924888fe62',
    ),
    'symfony/mailer' => 
    array (
      'pretty_version' => 'v6.2.5',
      'version' => '6.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '29729ac0b4e5113f24c39c46746bd6afb79e0aaa',
    ),
    'symfony/mime' => 
    array (
      'pretty_version' => 'v6.2.5',
      'version' => '6.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '4b7b349f67d15cd0639955c8179a76c89f6fd610',
    ),
    'symfony/polyfill-ctype' => 
    array (
      'pretty_version' => 'v1.27.0',
      'version' => '1.27.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '5bbc823adecdae860bb64756d639ecfec17b050a',
    ),
    'symfony/polyfill-intl-grapheme' => 
    array (
      'pretty_version' => 'v1.27.0',
      'version' => '1.27.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '511a08c03c1960e08a883f4cffcacd219b758354',
    ),
    'symfony/polyfill-intl-idn' => 
    array (
      'pretty_version' => 'v1.27.0',
      'version' => '1.27.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '639084e360537a19f9ee352433b84ce831f3d2da',
    ),
    'symfony/polyfill-intl-normalizer' => 
    array (
      'pretty_version' => 'v1.27.0',
      'version' => '1.27.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '19bd1e4fcd5b91116f14d8533c57831ed00571b6',
    ),
    'symfony/polyfill-mbstring' => 
    array (
      'pretty_version' => 'v1.27.0',
      'version' => '1.27.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8ad114f6b39e2c98a8b0e3bd907732c207c2b534',
    ),
    'symfony/polyfill-php72' => 
    array (
      'pretty_version' => 'v1.27.0',
      'version' => '1.27.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '869329b1e9894268a8a61dabb69153029b7a8c97',
    ),
    'symfony/polyfill-php80' => 
    array (
      'pretty_version' => 'v1.27.0',
      'version' => '1.27.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '7a6ff3f1959bb01aefccb463a0f2cd3d3d2fd936',
    ),
    'symfony/polyfill-uuid' => 
    array (
      'pretty_version' => 'v1.27.0',
      'version' => '1.27.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f3cf1a645c2734236ed1e2e671e273eeb3586166',
    ),
    'symfony/process' => 
    array (
      'pretty_version' => 'v6.2.5',
      'version' => '6.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '9ead139f63dfa38c4e4a9049cc64a8b2748c83b7',
    ),
    'symfony/routing' => 
    array (
      'pretty_version' => 'v6.2.5',
      'version' => '6.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '589bd742d5d03c192c8521911680fe88f61712fe',
    ),
    'symfony/service-contracts' => 
    array (
      'pretty_version' => 'v3.2.0',
      'version' => '3.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'aac98028c69df04ee77eb69b96b86ee51fbf4b75',
    ),
    'symfony/string' => 
    array (
      'pretty_version' => 'v6.2.5',
      'version' => '6.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b2dac0fa27b1ac0f9c0c0b23b43977f12308d0b0',
    ),
    'symfony/translation' => 
    array (
      'pretty_version' => 'v6.2.5',
      'version' => '6.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '60556925a703cfbc1581cde3b3f35b0bb0ea904c',
    ),
    'symfony/translation-contracts' => 
    array (
      'pretty_version' => 'v3.2.0',
      'version' => '3.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '68cce71402305a015f8c1589bfada1280dc64fe7',
    ),
    'symfony/translation-implementation' => 
    array (
      'provided' => 
      array (
        0 => '2.3|3.0',
      ),
    ),
    'symfony/uid' => 
    array (
      'pretty_version' => 'v6.2.5',
      'version' => '6.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '8ace895bded57d6496638c9b2d3b788e05b7395b',
    ),
    'symfony/var-dumper' => 
    array (
      'pretty_version' => 'v6.2.5',
      'version' => '6.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '44b7b81749fd20c1bdf4946c041050e22bc8da27',
    ),
    'theseer/tokenizer' => 
    array (
      'pretty_version' => '1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '34a41e998c2183e22995f158c581e7b5e755ab9e',
    ),
    'tijsverkoyen/css-to-inline-styles' => 
    array (
      'pretty_version' => '2.2.6',
      'version' => '2.2.6.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c42125b83a4fa63b187fdf29f9c93cb7733da30c',
    ),
    'vlucas/phpdotenv' => 
    array (
      'pretty_version' => 'v5.5.0',
      'version' => '5.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1a7ea2afc49c3ee6d87061f5a233e3a035d0eae7',
    ),
    'voku/portable-ascii' => 
    array (
      'pretty_version' => '2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b56450eed252f6801410d810c8e1727224ae0743',
    ),
    'webmozart/assert' => 
    array (
      'pretty_version' => '1.11.0',
      'version' => '1.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '11cb2199493b2f8a3b53e7f19068fc6aac760991',
    ),
  ),
);
private static $canGetVendors;
private static $installedByVendor = array();







public static function getInstalledPackages()
{
$packages = array();
foreach (self::getInstalled() as $installed) {
$packages[] = array_keys($installed['versions']);
}

if (1 === \count($packages)) {
return $packages[0];
}

return array_keys(array_flip(\call_user_func_array('array_merge', $packages)));
}









public static function isInstalled($packageName)
{
foreach (self::getInstalled() as $installed) {
if (isset($installed['versions'][$packageName])) {
return true;
}
}

return false;
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

$ranges = array();
if (isset($installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = $installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['version'])) {
return null;
}

return $installed['versions'][$packageName]['version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getPrettyVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return $installed['versions'][$packageName]['pretty_version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getReference($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['reference'])) {
return null;
}

return $installed['versions'][$packageName]['reference'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getRootPackage()
{
$installed = self::getInstalled();

return $installed[0]['root'];
}








public static function getRawData()
{
@trigger_error('getRawData only returns the first dataset loaded, which may not be what you expect. Use getAllRawData() instead which returns all datasets for all autoloaders present in the process.', E_USER_DEPRECATED);

return self::$installed;
}







public static function getAllRawData()
{
return self::getInstalled();
}



















public static function reload($data)
{
self::$installed = $data;
self::$installedByVendor = array();
}





private static function getInstalled()
{
if (null === self::$canGetVendors) {
self::$canGetVendors = method_exists('Composer\Autoload\ClassLoader', 'getRegisteredLoaders');
}

$installed = array();

if (self::$canGetVendors) {
foreach (ClassLoader::getRegisteredLoaders() as $vendorDir => $loader) {
if (isset(self::$installedByVendor[$vendorDir])) {
$installed[] = self::$installedByVendor[$vendorDir];
} elseif (is_file($vendorDir.'/composer/installed.php')) {
$installed[] = self::$installedByVendor[$vendorDir] = require $vendorDir.'/composer/installed.php';
}
}
}

$installed[] = self::$installed;

return $installed;
}
}
