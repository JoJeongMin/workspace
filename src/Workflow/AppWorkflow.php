<?php
namespace Workspace\Workflow;

use Workspace\Factory\FlowFactory;
use Workspace\Flow\FlowDataInterface;

/**
 * AppWorkflow class.
 *
 * キャンペーンパターンごとのworflowを定義するclass
 */
class AppWorkflow implements WorkflowInterface
{
    /**
     * workflowを定義する
     * 例：[
     *     'flow' => [
     *         'entry' => [ // ただのaliasで見る人がわかる単語、処理にはなんの影響もない
     *             ['Entry'], // 今のflow class名の配列（EntryFlow）
     *             'Ex' // 次のflow class名（ExFlow）
     *         ]
     *         'send_receipt' => [
     *             ['Ex'], // 今のflow class名の配列（ExFlow）
     *             'Send' // 次のflow class名（SendFlow）
     *         ]
     *     ]
     */
    public $transitions = [];

    // 今のstatusを定義
    protected $flow = null;

    /**
     * nextFlow
     * 次のflowを実行させる
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
     * 次のflowをreturnする.
     *
     * @return string | false
     * @author jeong
     */
    public function getNextFlowName()
    {
        // $transitionsに定義している配列から今のflowの次のflow名を取得する
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
     * 次のflow objectをreturnする.
     *
     * @return App\Controller\Api\Flow\AppFlow
     * @author jeong
     */
    protected function getNextFlow()
    {
        // 次のflow名を取得する
        $flowName = $this->getNextFlowName();
        // flow objectを作成する
        return (new FlowFactory())->getflow($flowName);
    }
}
