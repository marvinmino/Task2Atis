 <?php

$router->get('home', 'AlbumsController@home');
$router->get('logout', 'UsersController@logout');
$router->get('', 'AlbumsController@home');
$router->post('home', 'AlbumsController@save');
$router->post('delImg', 'ImagesController@delete');
$router->get('images', 'ImagesController@home');
$router->get('register', 'UsersController@home');
$router->post('register', 'UsersController@store');
$router->get('login', 'UsersController@indexLog');
$router->post('login', 'UsersController@log');
$router->get('logout', 'UsersController@logout');
$router->get('edit', 'AlbumsController@thumbnail');
$router->post('images', 'ImagesController@save');
$router->post('delete', 'AlbumsController@delete');