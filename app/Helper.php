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
