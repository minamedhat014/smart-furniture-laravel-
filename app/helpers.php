<?php

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\offer;
use Twilio\Rest\Client; 
use Illuminate\Support\Facades\Auth;



if (! function_exists('dateFormat')) {
function dateFormat($date,$format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($format);    
}}



if (! function_exists('onlyDate')) {
  function onlyDate($date,$format = 'd-m-Y'){
    return \Carbon\Carbon::parse($date)->format($format);   
  }}
  



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


if (!function_exists('authedRoles')) {
  function authedRoles()
  {
    return Auth::user()->roles->pluck('name')->toArray();
  }
}




if (!function_exists('errorMessage')) {
  function errorMessage($e)
  {

      return  session()->flash('error', $e->getMessage()); 
  }
}

if (!function_exists('successMessage')) {
  function successMessage($message = 'done successfully ')
  {
      return  session()->flash('success',$message);
  }
}

if (!function_exists('sendSms')) { 
  function sendSms($message ,$receiverNumber)
  {
    try {
      $basic  = new \Vonage\Client\Credentials\Basic("a42de8be", "kMLbNQn3pW8PXN9N");
       $client = new \Vonage\Client($basic);

       $response = $client->sms()->send(
        new \Vonage\SMS\Message\SMS($receiverNumber, 'Smart Funiture',$message)
    );
    
    $message = $response->current();
    
    if ($message->getStatus() == 0) {
      session()->flash('success','message sent successfully'); 
    } else {
      session()->flash('error',"The message failed with status: " . $message->getStatus() . "\n"); 
    }
        } catch (Exception $e) {     
          session()->flash('error', $e->getMessage()); 
        }
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