<?php

namespace app\database\models;

use app\traits\Connection;
use app\traits\{Create, Read, Update, Delete};
use app\traits\Template;

abstract class Base
{
    use Template, Connection;
    use  Create, Read, Update, Delete;

}