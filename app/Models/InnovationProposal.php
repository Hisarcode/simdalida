<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InnovationProposal extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'name', 'innovation_step', 'innovation_initiator', 'innovation_type', 'innovation_formats', 'is_covid', 'innovation_concern', 'start_innovation_trial', 'end_innovation_trial', 'time_innovation_implement', 'innovation_design', 'innovation_goal', 'innovation_benefit', 'innovation_result', 'budget', 'budget_file', 'profil_bisnis', 'profil_bisnis_file'];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function setStepAttribute($value)
    {
        $this->attributes['innovation_step'] = json_encode($value);
    }

    public function getStepAttribute($value)
    {
        return $this->attributes['innovation_step'] = json_decode($value);
    }


    public function setInitiatorAttribute($valueb)
    {
        $this->attributes['innovation_initiator'] = json_encode($valueb);
    }

    public function getInitiatorAttribute($valueb)
    {
        return $this->attributes['innovation_initiator'] = json_decode($valueb);
    }
}
