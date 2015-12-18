<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Task;

use Mage\Task\BuiltIn\Symfony2\SymfonyAbstractTask;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 8/24/15 9:58 PM
 */
class AcceleratorCacheClear extends SymfonyAbstractTask
{

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Accelerator Cache Clear - clear OpCache and ApcCache';
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $env = $this->getParameter('env', 'dev');

        $command = $this->getAppPath() . ' cache:accelerator:clear '  . ' --env=' . $env . ' --no-debug';
        $result = $this->runCommand($command);

        return $result;
    }
}
