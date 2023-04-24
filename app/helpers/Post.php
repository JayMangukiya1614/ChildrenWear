<?php

use App\Models\Index;


function Post()
{

  $data = Index::all();
  return count($data);
}