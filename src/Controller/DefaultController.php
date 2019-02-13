<?php declare(strict_types=1);

namespace App\Controller;

use App\Storage\AwesomeStorage;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function index (AwesomeStorage $storage) : Response
    {
        dump($storage->get());
        exit;
    }
}
