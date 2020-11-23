<?php

use App\Core\App;
use App\Core\Database\{QueryBuilder, Connection,UserQuery,AlbumQuery,ImageQuery};

App::bind('config', require 'config.php');

App::bind('albumQuery', new AlbumQuery(
    Connection::make(App::get('config')['database'])
));
App::bind('userQuery', new UserQuery(
    Connection::make(App::get('config')['database'])
));
App::bind('imageQuery', new ImageQuery(
    Connection::make(App::get('config')['database'])
));
