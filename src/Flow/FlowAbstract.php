<?php
namespace Workspace\Flow;

use Workspace\Flow\FlowDataInterface;

/**
 * FlowAbstract
 */
abstract class FlowAbstract implements FlowInterface
{

    /**
     * initialize
     *
     * @author jeong
     */
    abstract protected function initialize();

    /**
     * task
     *
     * @return Workspace\Flow\FlowDataInterface
     * @author jeong
     */
    abstract protected function task(FlowDataInterface $data);

    /**
     * execute
     *
     * @return Workspace\Flow\FlowDataInterface
     * @author jeong
     */
    public function execute(FlowDataInterface $data)
    {
        $this->initialize();
        return $this->task($data);
    }
}
