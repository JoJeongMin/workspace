<?php
namespace Workspace\Flow;

use Workspace\Flow\FlowDataInterface;

interface FlowInterface
{
    /**
     * execute
     * flowの実行
     *
     * @return bool
     * @author jeong
     */
    public function execute(FlowDataInterface $data);
}
