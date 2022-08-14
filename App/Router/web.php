<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 12/8/22
 * Time: 13:06
 */

use App\Controller\Home;

use App\Controller\HttpErrorsController;
use Framework\Request;
use Framework\Response;
use Framework\Router;

Router::get(
	'/',
	[
		Home::class,
		'indexAction',
	]
);
Router::get(
	'/about',
	[
		Home::class,
		'aboutUsAction',
	]
);

Router::get('/post/([0-9]*)', function(Request $req, Response $res) {
	$res->toJSON([
		'post' => ['id' => $req->params[0]],
		'status' => 'ok',
	]);
});

/*Router::get('/404', function(Request $req, Response $res) {
	$res->status(404)
		->toHTML("<h1>404 Page Not Found !</h1>");
});*/

Router::get(
	'/404',
	[
		HttpErrorsController::class,
		'error404Action',
	]
);

