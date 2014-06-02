<?php
namespace Clemherreman\Docopt\Symfony2\Test;

use Clemherreman\Docopt\Symfony2\Bridge;
use Docopt\Handler;
use Symfony\Component\Console\Command\Command;

class BridgeTest extends \PHPUnit_Framework_TestCase
{
    /** @var Bridge */
    private $bridge;

    /** @var Command */
    private $command;

    public function setUp()
    {
        $params = array(
            'argv'=>'foo tagada epo sdhpog ',
            'help'=>false,
            'version'=>null,
            'optionsFirst'=>false,
        );

        $this->command = new Command('Foo');
        $this->bridge = new Bridge(new Handler());
    }

    public function test_it_works()
    {
        $doc = <<<DOC
Example of program which uses [options] shortcut in pattern.

Usage:
  any_options_example.py [options] <port>

Options:
  -h --help                show this help message and exit
  --version                show version and exit
  -n, --number N           use N as a number
  -t, --timeout TIMEOUT    set timeout TIMEOUT seconds
  --apply                  apply changes to database
  -q                       operate in quiet mode

DOC;

        ini_set('error_display', 1);
        error_reporting(E_ALL);

        $this->bridge->configure($doc, $this->command);

    }
}
