<?php
require __DIR__."/../autoload.php";

\Rackem\Rack::use_middleware("\Rackem\Session\Cookie",array(
	"path"=>"/",
	"domain"=>"foo.com",
	"expire_after"=>2592000,
	"secret"=>"some_secret_crap"
));

$app = function($env) {
	//$env['rack.session']["name"] = "Mike";
	//throw new Exception('blam!');
	return array(200,array(),array("<pre>",print_r($env,true)));
};

\Rackem\Rack::use_middleware("\Rackem\ShowExceptions");
\Rackem\Rack::run($app);