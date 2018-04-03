<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/


/**
 * Circularly shifts an array
 *
 * Shifts to right for $steps > 0. Shifts to left for $steps < 0. Keys are
 * preserved.
 *
 * @param  array $array Array to shift
 * @param  int   $steps Steps to shift array by
 * @return array Resulting array
 */
function array_shift_circular(array $array, $steps = 1)
{
    if (!is_int($steps)) {
        throw new InvalidArgumentException(
            'steps has to be an (int)');
    }

    if ($steps === 0) {
        return $array;
    }

    $l = count($array);

    if ($l === 0) {
        return $array;
    }

    $steps = $steps % $l;
    $steps *= -1;

    return array_merge(array_slice($array, $steps),
        array_slice($array, 0, $steps));
}

/**
 * Multibyte string split
 *
 * @param $str
 * @param int $l
 * @return array
 */
function mb_str_split($str, $l = 0) {
    if ($l > 0) {
        $ret = array();
        $len = mb_strlen($str, "UTF-8");
        for ($i = 0; $i < $len; $i += $l) {
            $ret[] = mb_substr($str, $i, $l, "UTF-8");
        }
        return $ret;
    }
    return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
}

return $app;
