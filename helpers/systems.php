<?php

function systems(): void
{
    $count = 0;
    $handle_source = fopen(\Yii::getAlias('@app') . '/json_sources/systemsPopulated.json', 'r');
    $handle_output = fopen(\Yii::getAlias('@app') . '/json_output/systems_pop.csv', 'w');

    if ($handle_source) {
        fputcsv($handle_output, [
            'id',
            'name',
            'x',
            'y',
            'x',
            'economy',
            'allegiance',
            'security',
            'population',
        ]);

        while (($line = fgets($handle_source)) !== false) {
            echo $count . "\n";
            $line = trim($line);

            if ($line === '') {
                continue;
            }

            $obj = json_decode($line, true);

            if ($obj !== null) {
                $row = [
                    $obj['id64'],
                    $obj['name'],
                    $obj['coords']['x'],
                    $obj['coords']['y'],
                    $obj['coords']['z'],
                    $obj['economy'],
                    $obj['allegiance'],
                    $obj['security'],
                    $obj['population'],
                ];

                fputcsv($handle_output, $row);
            }
            $count++;
        }

        fclose($handle_source);
        fclose($handle_output);
        echo "Processed $count rows.\n";
        echo "Finished.\n";
    }
}

function stars(): void
{
    $count = 0;
    $handle_source = fopen(\Yii::getAlias('@app') . '/json_sources/systemsPopulated.json', 'r');
    $handle_output = fopen(\Yii::getAlias('@app') . '/json_output/stars.csv', 'w');

    if ($handle_source) {
        fputcsv($handle_output, [
            'name',
            'type',
            'spectral_class',
            'luminosity',
            'absoluteMagnitude',
            'solar_masses',
            'solar_radius',
            'surface_temperature',
            'orbital_period',
            'semi_major_axis',
            'orbital_eccentricity',
            'orbital_inclination',
            'arg_of_periapsis',
            'rotational_period_tidally_locked',
            'axial_tilt',
            'system_id'
        ]);

        while (($line = fgets($handle_source)) !== false) {
            echo $count . "\n";
            $line = trim($line);

            if ($line === '') {
                continue;
            }

            $obj = json_decode($line, true);

            if ($obj !== null) {
                $row = [];

                foreach ($obj['bodies'] as $item) {
                    if ($item['type'] !== 'Star') {
                        continue;
                    }

                    $row = [
                        $item['name'],
                        $item['subType'],
                        $item['spectralClass'] ? $item['spectralClass'] : null,
                        $item['luminosity'] ? $item['luminosity'] : null,
                        $item['absoluteMagnitude'] ? $item['absoluteMagnitude'] : null,
                        $item['solarMasses'] ? $item['solarMasses'] : null,
                        $item['solarRadius'] ? $item['solarRadius'] : null,
                        $item['surfaceTemperature'] ? $item['surfaceTemperature'] : null,
                        $item['orbitalPeriod'] ? $item['orbitalPeriod'] : null,
                        $item['semiMajorAxis'] ? $item['semiMajorAxis'] : null,
                        $item['orbitalEccentricity'] ? $item['orbitalEccentricity'] : null,
                        $item['orbitalInclination'] ? $item['orbitalInclination'] : null,
                        $item['argOfPeriapsis'] ? $item['argOfPeriapsis'] : null,
                        $item['rotationalPeriodTidallyLocked'] ? $item['rotationalPeriodTidallyLocked'] : null,
                        $item['axialTilt'] ? $item['axialTilt'] : null,
                        $obj['id64']
                    ];

                    fputcsv($handle_output, $row);
                }
            }
            $count++;
        }
        fclose($handle_source);
        fclose($handle_output);
        echo "Processed $count rows.\n";
        echo "Finished.\n";
    }
}

function stations(): void
{
    $count = 0;
    $handle_source = fopen(\Yii::getAlias('@app') . '/json_sources/stations.json', 'r');
    $handle_output = fopen(\Yii::getAlias('@app') . '/json_output/stations.csv', 'w');

    if ($handle_source) {
        fputcsv($handle_output, [
            'name',
            'type',
            'distance_to_arrival',
            'economy',
            'economy_secondary',
            'market',
            'outfitting',
            'shipyard',
            'market_id',
            'system_id',
        ]);

        while (($line = fgets($handle_source)) !== false) {
            echo $count . "\n";
            $line = trim($line);

            if ($line === '') {
                continue;
            }

            $obj = json_decode($line, true);

            if ($obj !== null && isset($obj['systemId64'])) {
                if ($obj['type'] === 'Mega ship' || $obj['type'] === 'Fleet Carrier') {
                    continue;
                }

                if ($obj['haveMarket'] === true) {
                    $obj['haveMarket'] = 1;
                } else {
                    $obj['haveMarket'] = 0;
                }

                if ($obj['haveShipyard'] === true) {
                    $obj['haveShipyard'] = 1;
                } else {
                    $obj['haveShipyard'] = 0;
                }

                if ($obj['haveOutfitting'] === true) {
                    $obj['haveOutfitting'] = 1;
                } else {
                    $obj['haveOutfitting'] = 0;
                }

                $row = [
                    $obj['name'],
                    $obj['type'],
                    $obj['distanceToArrival'],
                    $obj['economy'],
                    $obj['secondEconomy'],
                    $obj['haveMarket'],
                    $obj['haveShipyard'],
                    $obj['haveOutfitting'],
                    $obj['marketId'],
                    $obj['systemId64']
                ];

                fputcsv($handle_output, $row);
            }
            $count++;
        }
        fclose($handle_source);
        fclose($handle_output);
        echo "Processed $count rows.\n";
        echo "Finished.\n";
    }
}
