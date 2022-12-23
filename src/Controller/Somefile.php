<?php
//cybersecurity
$policy = "default-src 'self'; object-src 'self'; font-src 'self' data: blob: 'self' https://fonts.gstatic.com https://cdn.jsdelivr.net https://ka-f.fontawesome.com https://fonts.googleapis.com; script-src http://localhost 'self' data: blob: 'unsafe-inline' https://www.google.com https://www.gstatic.com https://code.jquery.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://kit.fontawesome.com; connect-src  'self' data: blob: 'self' https://ka-f.fontawesome.com https://www.google.com https://www.gstatic.com https://code.jquery.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://kit.fontawesome.com https://fonts.googleapis.com https://www.gstatic.com; img-src  'self' data: blob: 'self' https://www.google.com https://fonts.googleapis.com; style-src  'self' data: blob: 'self' https://kit.fontawesome.com https://www.google.com https://fonts.gstatic.com https://fonts.googleapis.com https://cdnjs.cloudflare.com https://cdn.jsdelivr.net 'unsafe-inline'; frame-src  'self' data: blob: 'self' https://www.google.com/ https://www.youtube.com/;";

 $response->headers->set("Content-Security-Policy", $policy);
 $response->headers->set("X-Content-Security-Policy", $policy);
 $response->headers->set('Referrer-Policy', "strict-origin-when-cross-origin");
 $response->headers->set('cache-control', "private, no-cache, no-store, must-revalidate");
 $response->headers->set('x-frame-options', "SAMEORIGIN");
 $response->headers->set('x-content-type-options', "nosniff");
 $response->headers->set('document-policy', "force-load-at-top");
 $response->headers->set('x-powered-by', "Express");
 $response->headers->set('strict-transport-security', "max-age=15552000");
 $response->headers->set('sec-fetch-site', "none");
 // only Safari
 $response->headers->set('x-xss-protection', "0");

 //feature-policy
//  $policy_feature = '';
//  $response->headers->set('feature-policy', $policy_feature);

 $name_some_file = \App\Lib\PathWebsiteAndFile::pathwebsite(2);
 $response->headers->set('origin', $name_some_file);

// $response->setCache([
//     'no_cache'         => false,
//     'no_store'         => false,
//     'no_transform'     => false,
//     'public'           => false,
//     'private'          => true,
//     'max_age'          => 60000,
//     'must_revalidate'  => false,
//     's_maxage'         => 600,
//     'last_modified'    => new \DateTime(),
// ]);

//use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
//use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
// ini_set('session.cookie_secure', "1"); ini_set('session.cookie_httponly', "1"); ini_set('session.cookie_samesite','None'); 
//$session = new Session(new NativeSessionStorage(), new AttributeBag());

// $response->setCookie([
//     'expires' => 0,
//     'path' => '/',
//     'domain' => 'http://localhost:8000/',
//     'secure' => true,
//     'httponly' => true,
// ]);
$response->send();