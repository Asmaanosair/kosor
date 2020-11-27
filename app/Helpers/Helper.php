<?php
if(!function_exists('AdminAssets')){
    function AdminAssets($url=null){
        return url('Admin/assets/'.$url);
    }
}
if(!function_exists('AdminUrl')){
    function AdminUrl($url=null){
        return url('Admin_CP/'.$url);
    }
}
if(!function_exists('AdminGuard')){
    function AdminGuard(){
        return auth()->guard('admin');
    }
}


