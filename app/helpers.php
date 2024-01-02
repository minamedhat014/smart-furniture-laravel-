<?php

use App\Models\Admin;
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

/////////////////////////////////////////////

if (!function_exists('FactorySalesRecipients')) {
  function FactorySalesRecipients()
  {
      return Admin::role(['sales factory','super sales factory'])->where('company_id', 1)->get();
  }
}

?>