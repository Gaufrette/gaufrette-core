<?php

namespace Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\File;
use Gaufrette\Core\Operator\AbstractOperator;
use Gaufrette\Core\Operator\CanLoad;
use Gaufrette\Core\Operator\CanSave;

final class FileOperator extends AbstractOperator implements CanLoad, CanSave
{
    /**
     * {@inheritdoc}
     */
    public function supports(File $file, Adapter $adapter)
    {
        return $this->adapterHasBehavior($adapter, 'Gaufrette\Core\Adapter\CanUseFile');
    }

    /**
     * {@inheritdoc}
     */
    public function load(File $file, Adapter $adapter)
    {
        $adapter->get($file);
    }

    /**
     * {@inheritdoc}
     */
    public function save(File $file, Adapter $adapter)
    {
        $adapter->save($file);
    }
}
