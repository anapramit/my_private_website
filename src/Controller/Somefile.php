<?php
//use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
//use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
// ini_set('session.cookie_secure', "1"); ini_set('session.cookie_httponly', "1"); ini_set('session.cookie_samesite','None'); 
//$session = new Session(new NativeSessionStorage(), new AttributeBag());

//cybersecurity
$policy = "";

$response->headers->set("Content-Security-Policy", $policy);
$response->headers->set("X-Content-Security-Policy", $policy);
$response->setCache([
    'must_revalidate'  => false,
    'no_cache'         => false,
    'no_store'         => false,
    'no_transform'     => false,
    'public'           => true,
    'private'          => false,
    'proxy_revalidate' => false,
    'max_age'          => 600,
    's_maxage'         => 600,
    'stale_if_error'   => 86400,
   // 'stale_while_revalidate' => 60,
    'immutable'        => true,
    'last_modified'    => new \DateTime(),
   // 'etag'             => 'abcdef',
]);
$response->send();