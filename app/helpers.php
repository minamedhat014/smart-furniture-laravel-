<?php

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\offer;
use Illuminate\Support\Facades\Auth;



if (! function_exists('dateFormat')) {
function dateFormat($date,$format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($format);    
}}

////////////////////////////////////////////

if (! function_exists('trimString')) {
function trimString($string, $repl, $limit) 
{
  if(strlen($string) > $limit) 
  {
    return substr($string, 0, $limit) . $repl; 
  }
  else 
  {
    return $string;
  }
}}

////////////////////////////////////////////////////

if(! function_exists('userFactory')){
  function userFactory(){
  if(Auth::user()->company_id ===1){
    return true;
  }else{
    return false;
  }
}
}

if(! function_exists('authedCompany')){
  function authedCompany(){
    return
  Auth::user()->company_id ;
}
}

/////////////////////////////////////////////

if (!function_exists('FactorySalesRecipients')) {
  function FactorySalesRecipients()
  {
      return Admin::all();
    }
}


if (!function_exists('mailSalesRecipients')) {
  function mailSalesRecipients()
  {
      return [
        'mina.medhat014@gmail.com',
        
      ];
    }
}




if (!function_exists('authName')) {
  function authName()
  {
      return Auth::user()->name." ". Auth::user()->id;
  }
}


if (!function_exists('authedCan')) {
  function authedCan($permission)
  {
      return Auth::user()->can($permission);
  }
}


if (!function_exists('errorMessage')) {
  function errorMessage($e)
  {
      return  session()->flash('error', $e); 
  }
}

if (!function_exists('successMessage')) {
  function successMessage($message = 'done successfully ')
  {
      return  session()->flash('success',$message);
  }
}




if (!function_exists('displayCreatedBy')) {
  function displayCreatedBy($name)
  {
      return 
      preg_replace('/\d+/', ' ', $name);
  }
}



?>