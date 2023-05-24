<?php

namespace env;

use Castor\Attribute\AsContext;
use Castor\Attribute\AsTask;
use Castor\Context;

use function Castor\exec;

#[AsContext(name: 'context_env')]
function context_env(): Context
{
    return new Context(environment: [
        'FOO' => 'toto',
    ]);
}

#[AsTask(description: 'A simple task that uses environment variables')]
function env(Context $context)
{
    exec('echo foo: \"$FOO\", bar: \"$BAR\"', context: $context->withEnvironment([
        'BAR' => 'tata',
    ]));
}
