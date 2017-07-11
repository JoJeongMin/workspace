<?php
namespace Workspace\Factory;

use ReflectionClass;

/**
 * WorkflowFactory
 */
class WorkflowFactory
{
    /**
     * getWorkflow method
     *
     * @return Workspace\Workflow
     * @author jeong
     */
    public function getWorkflow(string $workFlowName, string $flow, string $workflowNamespace = null)
    {
        if (empty($workflowNamespace)) {
            $workflowNamespace = 'Workspace\Workflow\\';
        }

        // create workflow
        $ref = new ReflectionClass($workflowNamespace .  $workFlowName . 'Workflow');
        $workflow = $ref->newInstanceArgs([$flow]);

        return $workflow;
    }
}
