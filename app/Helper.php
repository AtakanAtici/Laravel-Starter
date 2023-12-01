<?php

if(!function_exists('roleExist')){
    function roleExist($roleName)
    {
        if (\Spatie\Permission\Models\Role::where('name', $roleName)->count()  > 0){
            return true;
        }
        return false;
    }
}

if (!function_exists('isActive')) {
    function isActive($route, $output = 'active')
    {
        if (is_array($route)) {
            foreach ($route as $r) {
                if (Route::currentRouteName() == $r) {
                    return $output;
                }
            }
        } else {
            if (Route::currentRouteName() == $route) {
                return $output;
            }
        }
    }
}
