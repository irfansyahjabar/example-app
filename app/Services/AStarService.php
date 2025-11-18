<?php

namespace App\Services;

class AStarService
{
    public function __construct($pbfPath)
    {
        // path file majene.pbf nanti bakal dipakai di sini
    }

    public function findPath($start, $goal)
    {
        // dummy route (garis lurus aja dulu)
        return [$start, $goal];
    }
}
