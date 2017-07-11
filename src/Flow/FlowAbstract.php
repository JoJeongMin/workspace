<?php
namespace Workspace\Flow;

use Workspace\Flow\FlowDataInterface;

/**
 * FlowAbstract class.
 *
 * flowの抽象クラス
 * この抽象クラスを継承するflowは必ずtaskを実行するようにする
 */
abstract class FlowAbstract implements FlowInterface
{

    /**
     * initialize
     * 初期化
     *
     * @return bool
     * @author jeong
     */
    abstract protected function initialize();

    /**
     * task
     * flowの実行タスク
     *
     * @author jeong
     */
    abstract protected function task(FlowDataInterface $data);

    /**
     * execute
     * flowの実行
     *
     * @return bool
     * @author jeong
     */
    public function execute(FlowDataInterface $data)
    {
        $this->initialize();
        return $this->task($data);
    }
}
