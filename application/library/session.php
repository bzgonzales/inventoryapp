<?php

/**
 * 
 */
class Session 
{
	
	public static function initialize()
	{
		if(@$_SESSION['loggedin']){
			
		}else{
			@session_start();
		}
	}
	public static function set($key,$value)
	{
		$_SESSION[$key] = $value;
	}
	public static function get($key)
	{
		if(isset($_SESSION[$key]))
		return $_SESSION[$key];
	}
	public static function destroy()
	{
		session_destroy();
	}
	
}