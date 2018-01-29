<?php

return [
  'car_names' => [
    1 => 'HPD ARX-01c',
    2 => 'Ferrari 488 GTE',
    3 => 'Ford GT 2017',
    4 => 'Audi R8 LMS',
    5 => 'Mercedes-AMG GT3',
    6 => 'Ferrari 488 GT3',
    7 => 'Aston Martin',
    8 => 'Corvette C7.R',
    9 => 'BMW Z4 GT3'
  ],
  'curent_season' => '1',
  'classes' => [
    1 => [
      'Prototype' => [1],
      'GT' => [2,3],
      'GTC' => [4,5,6]
    ],
    3 => [
      'GT1' => [7,8],
      'GT3' => [4,5,6,9]
    ]
  ],
  'cars_to_classes' => [
    1 => [
      1 => 'Prototype',
      2 => 'GT',
      3 => 'GT',
      4 => 'GTC',
      5 => 'GTC',
      6 => 'GTC'
    ],
    3 => [
      4 => 'GT3',
      5 => 'GT3',
      6 => 'GT3',
      9 => 'GT3',
      7 => 'GT1',
      8 => 'GT1'
    ]
  ],
  'classNumbers' => [
    1 => [
      'Prototype' => [
        'min' => 1,
        'max' => 50
      ],
      'GT' => [
        'min' => 51,
        'max' => 99
      ],
      'GTC' => [
        'min' => 100,
        'max' => 150
      ],
    ],
    3 => [
      'GT1' => [
        'min' => 1,
        'max' => 99
      ],
      'GT3' => [
        'min' => 100,
        'max' => 199
      ]
    ]
  ],
  'status_names' => [
    0 => 'pending',
    1 => 'reserve',
    2 => 'confirmed',
    3 => 'reviewed'
  ],
  'points' => [
    1 => 25,
    2 => 18,
    3 => 15,
    4 => 12,
    5 => 10,
    6 => 8,
    7 => 6,
    8 => 4,
    9 => 2,
    10=> 1,
    11 => 0,
    12 => 0,
    13 => 0,
    14 => 0,
    15 => 0,
    16 => 0,
    17 => 0,
    18 => 0,
    19 => 0,
    20 => 0,
    21 => 0,
    22 => 0,
    23 => 0,
    24 => 0
  ],
  'ircars_to_car' => [
    39 => 1,
    93 => 2,
    92 => 3,
    73 => 4,
    72 => 5,
    94 => 6,
    64 => 7,
    26 => 8,
    55 => 9
  ],
  'out_status' => [
    0 => 'running',
    29 => 'dq',
    32 => 'discon.'
  ]
];
