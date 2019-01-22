<?php

function toRupiah($value)
{
   return 'Rp. '. number_format($value);  
}

function numberPagination($pagination){
   $number = 1;

   if (request()->has('page') && request()->get('page') > 1) {
      $number += (request()->get('page') - 1) * $pagination;
   }
   
   return $number;
   
}