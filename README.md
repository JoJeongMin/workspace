# Simple work-space workflow plugin

## Installation

The recommended way to install composer packages is:

```
composer require JoJeongMin/work-space
```

## Usage

### Main Class

```php
namespace App;

use Workspace\Factory\WorkflowFactory;

class Example
{
    /**
     * main worflow
     * 1. create
     * 2. modify
     * 3. syns
     * 4. delete
     */
    public function main()
    {
        // create -> modify -> syns -> delete
        $mainWorkflow = (new WorkflowFactory())->getWorkflow('main', 'create');

        $mainFlowData = new MainFlowData();
        $mainFlowData = $mainWorkflow->nextFlow($mainFlowData);
    }
}
```

### Main Workflow

```php
namespace App\Workflow;

use Workspace\Workflow\AppWorkflow;

class MainWorkflow extends AppWorkflow
{
    public $transitions = [
        'flow' => [
            'create' => [
                ['Nothing'],
                'Create'
            ],
            'modify' => [
                ['Create'],
                'Modify'
            ],
            'syns' => [
                ['Modify'],
                'Syns'
            ],
            'delete' => [
                ['Syns'],
                'Delete'
            ],
        ]
    ];

    /**
     * __construct.
     *
     */
    public function __construct(string $flow)
    {
        $this->flow = $flow;
    }
}
```

### Main FlowData

```php
namespace App\Flow;

use Workspace\Flow\FlowDataInterface;

class MainFlowData implements FlowDataInterface
{
    // set data
    // get data
}
```

### Create Flow

```php
namespace App\Flow;

use Workspace\Flow\FlowAbstract;
use App\Flow\MainFlowData;

class CreateFlow extends FlowAbstract
{
    /**
     * initialize
     */
    public function initialize()
    {
    }

    /**
     * task
     */
    public function task(MainFlowData $data)
    {
        // create task
        return $data;
    }
}
```

### Modify Flow

```php
namespace App\Flow;

use Workspace\Flow\FlowAbstract;
use App\Flow\MainFlowData;

class ModifyFlow extends FlowAbstract
{
    /**
     * initialize
     */
    public function initialize()
    {
    }

    /**
     * task
     */
    public function task(MainFlowData $data)
    {
        // modify task
        return $data;
    }
}
```
