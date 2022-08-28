<?php

/**
 * 
 */
class Database extends PDO
{
	
	function __construct()
	{
		parent::__construct(dbase_TYPE.':host='.dbase_HOST.';dbname='.dbase_NAME,dbase_USER,dbase_PASS);
	}
}