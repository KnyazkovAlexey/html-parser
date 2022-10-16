<?php

namespace base;

use exceptions\UserException;
use Throwable;

class Application
{
    public function run()
    {
        try {
            $request = new Request();

            $action = (new Router())->getAction($request);

            if (empty($action)) {
                throw new UserException('Action not found');
            }

            $response = $action->run($request);

            $response->send();

            exit(0);
        } catch (UserException $e) {
            echo $e->getMessage() . PHP_EOL;
        } catch (Throwable $e) {
            (new Logger)->log($e->getMessage());

            echo 'Something went wrong' . PHP_EOL;
        } finally {
            exit(1);
        }
    }
}