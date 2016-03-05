<?php
namespace Robo\Log;

use Robo\Result;
use Robo\TaskInfo;
use Robo\Contract\PrintedInterface;
use Robo\Contract\LogResultInterface;
use Consolidation\Log\ConsoleLogLevel;
use Consolidation\Log\Logger;

use Psr\Log\LogLevel;
use Psr\Log\AbstractLogger;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;

/**
 * Robo's default logger
 */
class RoboLogger extends Logger
{
    public function __construct(OutputInterface $output)
    {
        // In Robo, we use log level 'notice' for messages that appear all
        // the time, and 'info' for messages that appear only during verbose
        // output. We have no 'very verbose' (-vv) level. 'Debug' is -vvv, as usual.
        $roboVerbosityOverrides = [
            LogLevel::NOTICE => OutputInterface::VERBOSITY_NORMAL, // Default is "verbose"
            LogLevel::INFO => OutputInterface::VERBOSITY_VERBOSE, // Default is "very verbose"
        ];
        parent::__construct($output, $roboVerbosityOverrides);
    }
}
