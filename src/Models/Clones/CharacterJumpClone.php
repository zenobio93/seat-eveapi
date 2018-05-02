<?php

/*
 * This file is part of SeAT
 *
 * Copyright (C) 2015, 2016, 2017, 2018  Leon Jacobs
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

namespace Seat\Eveapi\Models\Clones;

use Illuminate\Database\Eloquent\Model;
use Seat\Eveapi\Models\Sde\StaStation;
use Seat\Eveapi\Traits\HasCompositePrimaryKey;

/**
 * Class CharacterJumpClone.
 * @package Seat\Eveapi\Models\Clones
 */
class CharacterJumpClone extends Model
{
    use HasCompositePrimaryKey;

    /**
     * @var bool
     */
    protected static $unguarded = true;

    /**
     * @var array
     */
    protected $casts = [
        'implants' => 'array',
    ];

    /**
     * @var array
     */
    protected $primaryKey = ['character_id', 'jump_clone_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {

        if ($this->location_type == 'station')
            return $this->belongsTo(StaStation::class, 'location_id', 'stationID');

        return $this->belongsTo(StaStation::class, 'location_id', 'stationID');
    }
}
