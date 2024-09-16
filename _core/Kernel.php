<?php

require_once '_config/config.php';
require_once '_config/db.php';
require_once '_core/Helper.php';
require_once '_core/Variables.php';


require_once '_core/Guard.php';


require_once 'Database.php';
require_once 'QueryBuilder.php';

require_once '_core/View.php';
require_once '_core/Controller.php';
require_once '_core/Model.php';

// require_once 'Model/Etudiant.php';
// require_once 'Model/Parcour.php';
requireAllIn('Model');
requireAllIn('Service');
requireAllIn('Controller');

// require_once 'Controller/Page.php';


require_once 'Route.php';

require_once 'WebRoute.php';
require_once 'ApiRoute.php';


?>