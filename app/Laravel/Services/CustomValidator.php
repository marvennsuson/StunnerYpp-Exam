<?php 

namespace App\Laravel\Services;

use Illuminate\Validation\Validator;
use App\Laravel\Models\User as Account;
use App\Laravel\Models\Partner;


use Auth, Hash,Str,Input;

class CustomValidator extends Validator {

    public function validateUniqueUsername($attribute,$value,$parameters){
        $account_id = (is_array($parameters) AND isset($parameters[0]) ) ? $parameters[0] : "";
        $account_type = (is_array($parameters) AND isset($parameters[1]) ) ? $parameters[1] : "user";

        $username = Str::lower($value);

        if($account_type =="partner"){
            $is_exist = Partner::whereRaw("LOWER(username) = '{$username}'")
                                ->where('id','<>',$account_id)
                                ->first();
        }else{
            $is_exist = Account::whereRaw("LOWER(username) = '{$username}'")
                                ->where('id','<>',$account_id)
                                ->first();
        }
        
        return $is_exist ? FALSE: TRUE;
    }

    public function validateUniqueEmail($attribute,$value,$parameters){
        $account_id = (is_array($parameters) AND isset($parameters[0]) ) ? $parameters[0] : "";
        $account_type = (is_array($parameters) AND isset($parameters[1]) ) ? $parameters[1] : "user";

        $email = Str::lower($value);

        if($account_type =="partner"){
            $is_exist = Partner::whereRaw("LOWER(email) = '{$email}'")
                                ->where('id','<>',$account_id)
                                ->first();
        }else{
            $is_exist = Account::whereRaw("LOWER(email) = '{$email}'")
                                ->where('id','<>',$account_id)
                                ->first();
        }
        
        return $is_exist ? FALSE: TRUE;
    }

    public function validateUniquePartnerCode($attribute,$value,$parameters){
        $account_id = (is_array($parameters) AND isset($parameters[0]) ) ? $parameters[0] : "";

        $code = Str::lower($value);

        $is_exist = Partner::whereRaw("LOWER(code) = '{$code}'")
                                ->where('id','<>',$account_id)
                                ->first();
        
        return $is_exist ? FALSE: TRUE;
    }

    public function validateValidAccount($attribute, $value, $parameters){
        $valid_accounts = ['mentor','mentee'];
        return in_array(Str::lower($value), $valid_accounts);
    }

    public function validateCurrentPassword($attribute, $value, $parameters){
        $account_id = (is_array($parameters) AND isset($parameters[0]) ) ? $parameters[0] : "";
        $account_type = (is_array($parameters) AND isset($parameters[1]) ) ? $parameters[1] : "user";


        if($account_type == "partner"){
            $user_id = $parameters[0];
            $user = Partner::find($user_id);
            return Hash::check($value,$user->password);
        }else{
            $user_id = $parameters[0];
            $user = Account::find($user_id);
            return Hash::check($value,$user->password);
        }

        return FALSE;
    }

    public function validateOldPassword($attribute, $value, $parameters){
        
        if($parameters){
            $user_id = $parameters[0];
            $user = User::find($user_id);
            return Hash::check($value,$user->password);
        }

        return FALSE;
    }

    public function validatePasswordFormat($attribute,$value,$parameters){
    	return preg_match(("/^(?=.*)[A-Za-z\d!@#$%^&*()_+.<>]{6,20}$/"), $value);
    }

    public function validateUsernameFormat($attribute,$value,$parameters){
    	return preg_match(("/^(?=.*)[A-Za-z\d][a-z\d._+]{6,20}$/"), $value);
    }

} 