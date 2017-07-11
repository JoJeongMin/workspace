<?php
namespace Workspace\Workflow;

use Workspace\Factory\FlowFactory;
use Workspace\Flow\FlowDataInterface;

/**
 * AppWorkflow
 */
class AppWorkflow implements WorkflowInterface
{
    /**
     * workflow
     * ex：[
     *     'flow' => [
     *         'entry' => [
     *             ['Entry'],
     *             'Ex'
     *         ]
     *         'send_receipt' => [
     *             ['Ex'],
     *             'Send'
     *         ]
     *     ]
     */
    public $transitions = [];

    protected $flow = null;

    /**
     * nextFlow
     *
     * @param array
     * @return bool
     * @author jeong
     */
    public function nextFlow(FlowDataInterface $data)
    {
        $flow = $this->getNextFlow();
        $data = $flow->execute($data);

        return $data;
    }

    /**
     * getNextFlowName method
     *
     * @return string | false
     * @author jeong
     */
    public function getNextFlowName()
    {
        foreach ($this->transitions['flow'] as $transition) {
            if (array_key_exists('prev', $transition)) {
                $from = $transition['prev'];
                $to = $transition['next'];
            } elseif (array_key_exists(0, $transition)) {
                $from = $transition[0];
                $to = $transition[1];
            } else {
                // exception throw
            }

            if (in_array($this->flow, (array)$from)) {
                return $to;
            }
        }
        return false;
    }

    /**
     * getNextFlow method
     *
     * @return Workspace\Flow
     * @author jeong
     */
    protected function getNextFlow()
    {
        $flowName = $this->getNextFlowName();
        return (new FlowFactory())->getflow($flowName);
    }
}
