<?php

namespace base\console;

use base\AbstractApplication;
use base\Logger;
use base\exceptions\UserException;
use Throwable;

class Application extends AbstractApplication
{
    public string $appName = 'Console app';

    public function run(): void
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
            (new Logger())->log($e->getMessage());

            echo 'Something went wrong' . PHP_EOL;
        } finally {
            exit(1);
        }
    }
}