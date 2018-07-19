<?php

return [
  'car_names' => [
    1 => 'HPD ARX-01c',
    2 => 'Ferrari 488 GTE',
    3 => 'Ford GT 2017',
    4 => 'Audi R8 LMS',
    5 => 'Mercedes-AMG GT3',
    6 => 'Ferrari 488 GT3',
    7 => 'Aston Martin DBR9',
    8 => 'Chevrolet Corvette C6.R',
    9 => 'BMW Z4 GT3',
    10=> 'Porsche 911 GT3 Cup',
    11=> 'Chevrolet Corvette C7 Daytona Prototype',
    12=> 'Audi R18',
    13=> 'Porsche 919 Hybrid',
    14=> 'Porsche 911 RSR',
  ],
  'current_season' => '5',
  'driver_limits' => [
    'min' => 2,
    'max' => 6,
  ],
  'ir_limits' => [
    'P' => 2500,
    'PC' => 2250,
    'GT' => 2000
  ],
  'sr_limits' => [
    'P' => ['p', 'a'],
    'PC' => ['p', 'a', 'b'],
    'GT' => ['p', 'a', 'b', 'c']
  ],
  'classes' => [
    1 => [
      'Prototype' => [1],
      'GT' => [2,3],
      'GTC' => [4,5,6]
    ],
    3 => [
      'GT1' => [7,8],
      'GT3' => [4,5,6,9]
    ],
    4 => [
      'DP' => [11],
      'GT' => [4,9,6,5],
      'CC' => [10]
    ],
    5 => [
      'P' => [12,13],
      'PC' => [1],
      'GT' => [2,3,14]
    ]
  ],
  'class_limits' => [
    1 => [
      'Prototype' => 24,
      'GT' => 24,
      'GTC' => 24
    ],
    3 => [
      'GT1' => 35,
      'GT3' => 35
    ],
    4 => [
      'DP' => 24,
      'GT' => 24,
      'CC' => 24
    ],
    5 => [
      'P' => 16,
      'PC' => 14,
      'GT' => 24
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
    ],
    4 => [
      11 => 'DP',
      4 => 'GT',
      9 => 'GT',
      6 => 'GT',
      5 => 'GT',
      10 => 'CC'
    ],
    5 => [
      12 => 'P',
      13 => 'P',
      1 => 'PC',
      2 => 'GT',
      3 => 'GT',
      14 => 'GT'
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
    ],
    4 => [
      'DP' => [
        'min' => 1,
        'max' => 99
      ],
      'GT' => [
        'min' => 100,
        'max' => 199
      ],
      'CC' => [
        'min' => 200,
        'max' => 299
      ],
    ],
    5 => [
      'P' => [
        'min' => 1,
        'max' => 30
      ],
      'PC' => [
        'min' => 31,
        'max' => 60
      ],
      'GT' => [
        'min' => 61,
        'max' => 149
      ],
    ]
  ],
  'status_names' => [
    0 => 'pending',
    1 => 'reviewed',
    2 => 'waitinglist',
    3 => 'qualified',
    4 => 'confirmed'
  ],
  'status_colors' => [
    0 => 'danger',
    1 => 'primary',
    2 => 'warning',
    3 => 'info',
    4 => 'success'
  ],
  'points' => [
    1 => 0,
    2 => 0,
    3 => 0,
    4 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
    8 => 0,
    9 => 0,
    10=> 0,
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
    55 => 9,
    88 => 10,
    70 => 11
  ],
  'out_status' => [
    0 => 'running',
    29 => 'dq',
    32 => 'discon.'
  ]
];
