<?php
namespace Clemherreman\Docopt\Symfony2;

use Docopt\Handler;
use Symfony\Component\Console\Command\Command;

/**
 * Bridge between docopt and Symfony2 command.
 *
 * Allows to configure a Symfony2 command using docopt.
 *
 * @author Clément Herreman <clement.herreman@gmail.com>
 */
class Bridge
{
    /** @var Handler */
    private $docopt;

    public function __construct(Handler $docopt)
    {
        $this->docopt = $docopt;
    }

    public function configure($doc, Command $command)
    {
        echo $doc.PHP_EOL.PHP_EOL;

        $result = $this->docopt->handle($doc, array('version'=>'1.0.0rc2'));

        foreach ($result as $k=>$v)
            echo $k.': '.json_encode($v).PHP_EOL;
    }
}
