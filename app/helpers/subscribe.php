<?php

use App\Models\Subscribe;


function Subscribe()
{

  $data = Subscribe::all();
  return count($data);
}