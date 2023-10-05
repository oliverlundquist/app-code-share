<?php declare(strict_types=1);

namespace App;

use Exception;

class Proxy
{
    /* ********************************************************************************************************************************* *
    * Read more about "php -r" in the docs at the link below and you'll find out why I'm dumping the command into a tmpfile and          *
    * executing it with "php -f" instead of "php -r". Running anything but trivial php code will most definitely give you syntax errors. *
    * https://www.php.net/manual/en/features.commandline.options.php                                                                     *
    * "It is [...] easy to run into trouble when trying to use variables (shell or PHP) in command-line code,                            *
    * or using backslashes for escaping, so take great care when doing so. You have been warned!"                                        *
    * ********************************************************************************************************************************* */
    public function toPhp7App(string $phpCommand) // : string
    {
        $output     = '';
        $returnCode = 0;
        $php7dir    = getenv('PHP7APP');
        $php7bin    = getenv('PHP7BIN');
        $phpCommand = $this->buildPhpCommand($phpCommand);
        $tempfile   = tmpfile();
        fwrite($tempfile, $phpCommand);
        $filepath   = stream_get_meta_data($tempfile)['uri'];
        $command    =  <<<COMMAND
            cd {$php7dir};
            {$php7bin} -f {$filepath}
COMMAND;

        $result = exec($command, $output, $returnCode);
        if ($result === false || $returnCode > 0) {
            throw new Exception('Failed to execute command in PHP7: ' . $command . ' code: ' . $returnCode);
        }
        return $result;
    }

    protected function buildPhpCommand(string $command): string
    {
        return '<?php require \'' . getenv('PHP7APP') . '/bootstrap.php\';' . $command . '?>';
    }
}
