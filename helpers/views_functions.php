<?php

/**
 * Returns associative array of economies with keys = values and empty key = Any
 */
function economies(): array
{
    return [
        'Agriculture' => 'Agriculture',
        'Colony' => 'Colony',
        'Extraction' => 'Extraction',
        'High Tech' => 'High Tech',
        'Industrial' => 'Industrial',
        'Military' => 'Military',
        'Refinery' => 'Refinery',
        'Repair' => 'Repair',
        'Service' => 'Service',
        'Terraforming' => 'Terraforming',
        'Tourism' => 'Tourism'
    ];
}

/**
 * Returns associative array of governments with keys = values and empty key = Any
 */
function governments(): array
{
    return [
        'Anarchy' => 'Anarchy',
        'Colony' => 'Colony',
        'Communism' => 'Communism',
        'Confederacy' => 'Confederacy',
        'Cooperative' => 'Cooperative',
        'Corporate' => 'Corporate',
        'Democracy' => 'Democracy',
        'Dictatorship' => 'Dictatorship',
        'Feudal' => 'Feudal',
        'Patronage' => 'Patronage',
        'Prison' => 'Anarchy',
        'Prison Colony' => 'Prison Colony',
        'Theocracy' => 'Theocracy',
        'Engineer' => 'Engineer',
        'Private Ownership' => 'Private Ownership',
    ];
}

/**
 * Returns associative array of allegiances with keys = values and empty key = Any
 */
function allegiances(): array
{
    return [
        'Alliance' => 'Alliance',
        'Empire' => 'Empire',
        'Federation' => 'Federation',
        'Independent' => 'Independent',
        'Pilots Federation' => 'Pilots Federation'
    ];
}

/**
 * Returns associative array of station types with keys = values
 */
function stationTypes(): array
{
    return [
        'Ocellus Starport' => 'Ocellus Starport',
        'Orbis Starport' => 'Orbis Starport',
        'Coriolis Starport' => 'Coriolis Starport',
        'Asteroid base' => 'Asteroid base',
        'Outpost' => 'Outpost',
        'Planetary Port' => 'Planetary Port',
        'Planetary Outpost' => 'Planetary Outpost',
    ];
}

/**
 * Returns associative array of systems's security levels with keys = values
 */
function sec_levels(): array
{
    return [
        'High' => 'High',
        'Medium' => 'Medium',
        'Low' => 'Low',
        'Anarchy' => 'Anarchy',
    ];
}
