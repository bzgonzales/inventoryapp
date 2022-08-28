<?php
ob_start();
/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 */
// AUTOLOADER
require 'application/library/systemapp.php';
require 'application/library/controller.php';
require 'application/library/model.php';
require 'application/library/view.php';

// LIBRARY
require 'application/library/database.php';
require 'application/library/session.php';
require 'application/library/functions.php';

require 'application/config/config.php';

$app = new Systemapp();




?>
