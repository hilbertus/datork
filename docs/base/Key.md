# Keys

## Multidimensional Keys

Keys are generally multidimensional. Lets look few sample data records
   

    $threeDimData = [
        [
            'name' => 'Alex Smith',
            'location' => [
                'address'  => 'Sip Ave', 
                'country' => 'USA'
            ]
        ],
        [
            'name' => 'Klaus Bosch',
            'location' => [
                'address'  => 'Konrad Str', 
                'country' => 'Germany'
            ]
        ],
        [
            'name' => 'Rene Jonquet',
            'location' => [
                'address'  => 'Rue Robineau', 
                'country' => 'France'
            ]
        ]
    ];


If you want to get the address of Alex Smith, you can do it the php array way `$threeDimData[0]['location']['country']`.
But if you want to get countries of all people you have to use our multidimensionale key.  

    $countryKey = [[], ['location'], ['country']];

Each inner array represents the corresponding dimension or depth of the main array `$threeDimData`. 
Here we go through each element and lookup for the key `'location'` than we go in the location array and look up for 
`'country'`.


Lets look at a matrix


    $twoDimData = [
        [1, 0, 3],
        [2, 4, 6],
        [9, 8, 5]
    ];

the key 

    $cornerKey = [[0,2], [0,2]]

refers to the cornered values `[[1,3], [9,5]]`.

## Key List

When you have an array and want to refer multiple values at once you can use above multidimensional key or use a shortcut.
Example

    $fruitsByColor = [
        'red' => ['apple', 'cherry'],
        'yellow' => ['banana', 'lemon'],
        'green' => ['grape', 'kiwi']
    ];

The Keys of red and yellow fruits would look
 
    $redAndYellowFruitsKeys = ['red', 'yellow'];

This shortcut will be transformed in `[['red', 'yellow']]`. 


## Simple Key

When you want to refer to a single array value, you can use the simple key too.

    $greenFruitsKey = 'green';
    
will be transformed in `[['green']]`