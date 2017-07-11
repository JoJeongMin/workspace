<?php
namespace Workspace\Workflow;

use Workspace\Flow\FlowDataInterface;

interface WorkflowInterface
{
    public function nextFlow(FlowDataInterface $data);
}
