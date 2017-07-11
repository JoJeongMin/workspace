<?php
namespace Workspace\Flow;

use Workspace\Flow\FlowDataInterface;

interface FlowInterface
{
    /**
     * execute
     * flow execute
     *
     * @return Workspace\Flow\FlowDataInterface
     * @author jeong
     */
    public function execute(FlowDataInterface $data);
}
