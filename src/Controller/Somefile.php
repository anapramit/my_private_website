<?php

//cybersecurity
$policy = "default-src 'self'; object-src 'self'; font-src 'self' data: blob: 'self' https://fonts.gstatic.com https://cdn.jsdelivr.net https://ka-f.fontawesome.com https://fonts.googleapis.com; script-src http://localhost 'self' data: blob: 'unsafe-inline' https://www.google.com https://www.gstatic.com https://code.jquery.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://kit.fontawesome.com; connect-src  'self' data: blob: 'self' https://ka-f.fontawesome.com https://www.google.com https://www.gstatic.com https://code.jquery.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://kit.fontawesome.com https://fonts.googleapis.com https://www.gstatic.com; img-src  'self' data: blob: 'self' https://www.google.com https://fonts.googleapis.com; style-src  'self' data: blob: 'self' https://kit.fontawesome.com https://www.google.com https://fonts.gstatic.com https://fonts.googleapis.com https://cdnjs.cloudflare.com https://cdn.jsdelivr.net 'unsafe-inline'; frame-src  'self' data: blob: 'self' https://www.google.com/ https://www.youtube.com/;";

 $response->headers->set("Content-Security-Policy", $policy);
 $response->headers->set("X-Content-Security-Policy", $policy);
 $response->headers->set('Referrer-Policy', "strict-origin-when-cross-origin");
 $response->headers->set('cache-control', "private, no-cache, no-store, must-revalidate");
 $response->headers->set('x-frame-options', "SAMEORIGIN");
 $response->headers->set('x-content-type-options', "nosniff");
//  $response->headers->set('document-policy', "force-load-at-top");
 $response->headers->set('x-powered-by', "Express");
 $response->headers->set('strict-transport-security', "max-age=15552000");
 $response->headers->set('sec-fetch-site', "none");
 // only Safari
 $response->headers->set('x-xss-protection', "0");

 $name_some_file = \App\Lib\PathWebsiteAndFile::pathwebsite(2);
 $response->headers->set('origin', $name_some_file);

$response->send();