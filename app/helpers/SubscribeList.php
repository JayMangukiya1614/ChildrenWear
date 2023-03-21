<?php

use App\Models\Subscribe;


function SubscribeList()
{

  $data = Subscribe::all();
  
  return $data;
}