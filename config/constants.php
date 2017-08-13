<?php

return [
  'car_names' => [
    1 => 'HPD ARX-01c',
    2 => 'Ferrari 488 GTE',
    3 => 'Ford GT 2017',
    4 => 'Audi R8 LMS',
  ],
  'curent_season' => env('SCO_SEASON', '1'),
  'classes' => [
    1 => [
      'Prototyp' => [1],
      'GT' => [2,3],
      'GTC' => [4]
    ]
  ],
  'status_names' => [
    0 => 'pending',
    1 => 'in waiting list',
    2 => 'confirmed'
  ]
];
