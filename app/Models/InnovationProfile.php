<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InnovationProfile extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'innovation_proposals_id', 'regulasi_inovasi', 'ketersediaan_sdm', 'dukungan_anggaran', 'penggunaan_it', 'bimtek_inovasi', 'program_rkpd', 'keterlibatan_aktor', 'pelaksana_inovasi', 'jejaring_inovasi', 'sosialisasi_inovasi', 'pedoman_teknis', 'kemudahan_informasi', 'kemudahan_proses', 'penyelesaian_pengaduan', 'online_sistem', 'replikasi', 'kecepatan_inovasi', 'kemanfaatan_inovasi', 'monitoring_evaluasi', 'kualitas_inovasi'];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function innovation_proposal()
    {
        return $this->belongsTo(InnovationProposal::class, 'innovation_proposals_id', 'id');
    }

    public function innovation_report()
    {
        return $this->hasMany(InnovationReport::class, 'innovation_profiles_id', 'id');
    }
}
