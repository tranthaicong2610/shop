<?php
class Session{
    public static function init(){
        if(version_compare(phpversion(),'5.4.0','<')){
            if(session_id()=='')
            {
                session_start();
            }
            else {
                if(session_status()==PHP_SESSION_NONE){
                    unset($_SESSION['adminID']);
                    unset($_SESSION['adminUser']);
                    unset($_SESSION['adminName']);
                }
            }
        }
    }
    //set key thanh gia tri
    public static function set($key,$val){
        $_SESSION[$key]=$val;
    }
    //lay session
    public static function get($key)
    {
        if(isset($_SESSION[$key]))
        {
            if(isset($_SESSION[$key])){
                return $_SESSION[$key];
            }
            else{
                return false;
            }
        }
    }
    //check session co ton tai ko 
    public static function checkSession(){
        self::init();
        if(self::get('adminlogin')==false)
        {
            self::destroy();
            header("Location:shop/admin/login.php");
        }
    }
    // kiem tra da login chua

    public static function checkLogin()
    {
        self::init();
        if(self::get('adminlogin')==true)
        {
            header("Location:login.php");
        }
    }
    //xoa or huy phien lam viec 
    public static function destroy()
    {
        self::init();
        session_destroy();
        (empty(self::get('adminlogin'))) ? header("Location:login.php") : header("Location:index.php");; 
        
    }

}

?>