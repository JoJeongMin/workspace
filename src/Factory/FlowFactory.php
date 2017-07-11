<?php
namespace Workspace\Factory;

use ReflectionClass;

/**
 * FlowFactory
 */
class FlowFactory
{
    /**
     * getflow method
     *
     * @return Workspace\Flow
     */
    public function getflow(string $flowName, string $flowNamespace = null)
    {
        if (empty($flowNamespace)) {
            $flowNamespace = 'Workspace\Flow\\';
        }

        // workflowを作成する
        $ref = new ReflectionClass($flowNamespace . $flowName . 'Flow');
        $flow = $ref->newInstanceArgs();

        return $flow;
    }
}
