'Datasources' => [
    /*
     * These configurations should contain permanent settings used
     * by all environments.
     *
     * The values in app_local.php will override any values set here
     * and should be used for local and per-environment configurations.
     *
     * Environment variable-based configurations can be loaded here or
     * in app_local.php depending on the application's needs.
     */
    'default' => [
        'className' => Connection::class,
        'driver' => Mysql::class,
        'persistent' => false,
        'timezone' => 'UTC',

        /*
         * Configuración para Railway usando variables de entorno.
         * En local, app_local.php puede sobrescribir estos valores.
         */
        'host' => env('MYSQLHOST', 'localhost'),
        'port' => env('MYSQLPORT', '3306'),
        'username' => env('MYSQLUSER', 'root'),
        'password' => env('MYSQLPASSWORD', ''),
        'database' => env('MYSQLDATABASE', 'enrique_app'),

        /*
         * No usamos DATABASE_URL para evitar errores de formato.
         */
        'url' => null,

        /*
         * For MariaDB/MySQL the internal default changed from utf8 to utf8mb4, aka full utf-8 support
         */
        'encoding' => 'utf8mb4',

        /*
         * If your MySQL server is configured with `skip-character-set-client-handshake`
         * then you MUST use the `flags` config to set your charset encoding.
         * For e.g. `'flags' => [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4']`
         */
        'flags' => [],
        'cacheMetadata' => true,
        'log' => false,

        /*
         * Set identifier quoting to true if you are using reserved words or
         * special characters in your table or column names.
         */
        'quoteIdentifiers' => false,

        //'init' => ['SET GLOBAL innodb_stats_on_metadata = 0'],
    ],

    /*
     * The test connection is used during the test suite.
     */
    'test' => [
        'className' => Connection::class,
        'driver' => Mysql::class,
        'persistent' => false,
        'timezone' => 'UTC',
        'host' => env('MYSQLHOST', 'localhost'),
        'port' => env('MYSQLPORT', '3306'),
        'username' => env('MYSQLUSER', 'root'),
        'password' => env('MYSQLPASSWORD', ''),
        'database' => env('MYSQLDATABASE', 'test_enrique_app'),
        'encoding' => 'utf8mb4',
        'flags' => [],
        'cacheMetadata' => true,
        'quoteIdentifiers' => false,
        'log' => false,
        'url' => null,
        //'init' => ['SET GLOBAL innodb_stats_on_metadata = 0'],
    ],
],