<?php declare(strict_types=1);

namespace App\Utility {

    use Dotenv\Dotenv;

    const DEFAULT_PATH = __DIR__ . '/../../../';
    const DEFAULT_FILENAME = '.env';

    /**
     * Set the env based on the dotenv var and return a Dotenv instance
     *
     * @param string $path
     * @param string $fileName
     *
     * @return void
     */
    function setupEnv(
        string $path = DEFAULT_PATH,
        string $fileName = DEFAULT_FILENAME
    ) :void {
        $env = getenv('ENVIRONMENT') || 'dev';
        $realFilePath = sprintf('%s%s.%s', $path, $fileName, $env);

        if (
            $env !== false
            && file_exists($realFilePath) === true
        ) {
            $fileName = '.'.$env;
        }

        $dotenv = new Dotenv($path, $fileName);
        $dotenv->load();
    }
}
