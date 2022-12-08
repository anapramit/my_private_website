<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();
$session->start();

class Kernel extends BaseKernel
{
    use MicroKernelTrait;
}
