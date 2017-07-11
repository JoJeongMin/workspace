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
     * @author jeong
     */
    public function getflow(string $flowName, string $flowNamespace = null)
    {
        if (empty($flowNamespace)) {
            $flowNamespace = 'Workspace\Flow\\';
        }

        // create flow
        $ref = new ReflectionClass($flowNamespace . $flowName . 'Flow');
        $flow = $ref->newInstanceArgs();

        return $flow;
    }
}
