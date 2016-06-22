Expose we have following data

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
        
Calling `Get::byKey($threeDimData, $countryKey)` with the [key](/base/Key.md) `$countryKey = [[], ['location'], ['country']];` returns

    [
        ['location' => ['country' => 'USA']],
        ['location' => ['country' => 'Germany']],
        ['location' => ['country' => 'France']]
    ]

The keys in result are preserved.