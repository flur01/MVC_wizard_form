<?php


namespace Core;


class Session
{
    public static function check ($key) {
          if (isset($_SESSION[$key])) {
            
            if ($_SESSION[$key]) {
                return true;
                
            }
    
        }
    
        return false;
    }

    public static function unset ($key) {
        if (isset($_SESSION[$key])) {
            
            if ($_SESSION[$key]) {
                
                unset($_SESSION[$key]);
                
            }
    
        }
    }

}