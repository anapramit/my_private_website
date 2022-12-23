<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\HttpFoundation\Session\Session;


$session = new Session();
$session->start();
if(!isset($_SESSION['lang'])){
    $is_good = \App\Lib\LanguageManager::getLanguage();
    unset($is_good);
}
class Kernel extends BaseKernel
{
    use MicroKernelTrait;
  
}
