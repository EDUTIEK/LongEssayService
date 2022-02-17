<?php

namespace Edutiek\LongEssayService\Writer;

use Edutiek\LongEssayService\Base;
use Edutiek\LongEssayService\Base\BaseContext;
use Edutiek\LongEssayService\Internal\Dependencies;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\StatusCode;

class Rest extends Base\BaseRest
{
    /** @var Context  */
    protected $context;


    /**
     * Init server / add handlers
     * @param Context $context
     * @param Dependencies $dependencies
     */
    public function init(BaseContext $context, Dependencies $dependencies)
    {
        parent::init($context, $dependencies);
        $this->get('/data', [$this,'getData']);
    }


    /**
     * GET the settings
     * @param Request  $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getData(Request $request, Response $response, array $args): Response
    {
        // common checks and initializations
        if (!$this->prepare($request, $response, $args)) {
            return $this->response;
        }

        $task = $this->context->getWritingTask();

        $json = [
            'task' => [
                'instructions' => $task->getInstructions(),
                'writing_end' => $task->getWritingEnd()
            ]
        ];

        $this->refreshToken();
        return $this->setResponse(StatusCode::HTTP_OK, $json);
    }
}