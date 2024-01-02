<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class showRoomTeam extends Model
{
    use HasFactory;
    protected $table='show_room_teams';
    protected $guarded =[];

    public function branch () :BelongsTo {
     return $this->belongsTo(showroom::class,'showRoom_id');
    }
}
