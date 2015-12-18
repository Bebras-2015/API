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

use Mage\Task\AbstractTask;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 7/25/15 2:14 PM
 */
class CachePermissions extends AbstractTask
{

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Set prod cache permission 777';
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $command = 'chmod 777 -R app/cache/prod';
        $result = $this->runCommandRemote($command);

        return $result;
    }
}
