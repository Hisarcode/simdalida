<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InnovationProfile;
use App\Models\InnovationProposal;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class InnovationProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles == 'SUPERADMIN') {
            $profile = InnovationProfile::with(['innovation_proposal'])->orderBy('users_id', 'ASC')->get();
        } else if (Auth::user()->roles == 'ADMIN') {
            $profile = InnovationProfile::with(['innovation_proposal'])->orderBy('users_id', 'ASC')->get();
        } else if (Auth::user()->roles == 'OPERATOR') {
            $profile = InnovationProfile::with(['innovation_proposal'])->where('users_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        }
        return view('pages.admin.innovation-profile.index')
            ->with('profile', $profile);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $innovation_proposals = InnovationProposal::where('users_id', Auth::user()->id)->where('status', 'SUDAH')->get();
        return view('pages.admin.innovation-profile.create', [
            'innovation_proposals' => $innovation_proposals
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make(
            $request->all(),
            [
                "kualitas_inovasi" => "required",
                "monitoring_evaluasi" => "required",
                "kemanfaatan_inovasi" => "required",
                "kecepatan_inovasi" => "required",
                "ketersediaan_sdm" => "required",
                "regulasi_inovasi" => "required",
                "users_id" => "required",
                "innovation_proposals_id" => [
                    "required",
                    "unique:innovation_profiles,innovation_proposals_id"
                ],
            ],
            [
                "innovation_proposals_id.unique" => "Profil Inovasi tersebut sudah dibuat!"
            ]
        )->validate();

        $profile = new InnovationProfile;

        $profile->users_id = $request->get('users_id');
        $profile->innovation_proposals_id = $request->get('innovation_proposals_id');
        $profile->regulasi_inovasi = $request->get('regulasi_inovasi');
        $profile->ketersediaan_sdm = $request->get('ketersediaan_sdm');
        $profile->dukungan_anggaran = $request->get('dukungan_anggaran');
        $profile->penggunaan_it = $request->get('penggunaan_it');
        $profile->bimtek_inovasi = $request->get('bimtek_inovasi');
        $profile->program_rkpd = $request->get('program_rkpd');
        $profile->keterlibatan_aktor = $request->get('keterlibatan_aktor');
        $profile->pelaksana_inovasi = $request->get('pelaksana_inovasi');
        $profile->jejaring_inovasi = $request->get('jejaring_inovasi');
        $profile->sosialisasi_inovasi = $request->get('sosialisasi_inovasi');
        $profile->pedoman_teknis = $request->get('pedoman_teknis');
        $profile->kemudahan_informasi = $request->get('kemudahan_informasi');
        $profile->kemudahan_proses = $request->get('kemudahan_proses');
        $profile->penyelesaian_pengaduan = $request->get('penyelesaian_pengaduan');
        $profile->online_sistem = $request->get('online_sistem');
        $profile->replikasi = $request->get('replikasi');
        $profile->kecepatan_inovasi = $request->get('kecepatan_inovasi');
        $profile->kemanfaatan_inovasi = $request->get('kemanfaatan_inovasi');
        $profile->monitoring_evaluasi = $request->get('monitoring_evaluasi');

        if ($request->file('regulasi_inovasi_file')) {
            $regulasi_inovasi_file = $request->file('regulasi_inovasi_file')->store('profile/regulasi_inovasi_file', 'public');
            $profile->regulasi_inovasi_file = $regulasi_inovasi_file;
        };

        if ($request->file('ketersediaan_sdm_file')) {
            $ketersediaan_sdm_file = $request->file('ketersediaan_sdm_file')->store('profile/ketersediaan_sdm_file', 'public');
            $profile->ketersediaan_sdm_file = $ketersediaan_sdm_file;
        };

        if ($request->file('dukungan_anggaran_file')) {
            $dukungan_anggaran_file = $request->file('dukungan_anggaran_file')->store('profile/dukungan_anggaran_file', 'public');
            $profile->dukungan_anggaran_file = $dukungan_anggaran_file;
        };

        if ($request->file('penggunaan_it_file')) {
            $penggunaan_it_file = $request->file('penggunaan_it_file')->store('profile/penggunaan_it_file', 'public');
            $profile->penggunaan_it_file = $penggunaan_it_file;
        };

        if ($request->file('bimtek_inovasi_file')) {
            $bimtek_inovasi_file = $request->file('bimtek_inovasi_file')->store('profile/bimtek_inovasi_file', 'public');
            $profile->bimtek_inovasi_file = $bimtek_inovasi_file;
        };

        if ($request->file('program_rkpd_file')) {
            $program_rkpd_file = $request->file('program_rkpd_file')->store('profile/program_rkpd_file', 'public');
            $profile->program_rkpd_file = $program_rkpd_file;
        };

        if ($request->file('keterlibatan_aktor_file')) {
            $keterlibatan_aktor_file = $request->file('keterlibatan_aktor_file')->store('profile/keterlibatan_aktor_file', 'public');
            $profile->keterlibatan_aktor_file = $keterlibatan_aktor_file;
        };

        if ($request->file('pelaksana_inovasi_file')) {
            $pelaksana_inovasi_file = $request->file('pelaksana_inovasi_file')->store('profile/pelaksana_inovasi_file', 'public');
            $profile->pelaksana_inovasi_file = $pelaksana_inovasi_file;
        };

        if ($request->file('jejaring_inovasi_file')) {
            $jejaring_inovasi_file = $request->file('jejaring_inovasi_file')->store('profile/jejaring_inovasi_file', 'public');
            $profile->jejaring_inovasi_file = $jejaring_inovasi_file;
        };

        if ($request->file('sosialisasi_inovasi_file')) {
            $sosialisasi_inovasi_file = $request->file('sosialisasi_inovasi_file')->store('profile/sosialisasi_inovasi_file', 'public');
            $profile->sosialisasi_inovasi_file = $sosialisasi_inovasi_file;
        };

        if ($request->file('_file')) {
            $pedoman_teknis_file = $request->file('pedoman_teknis_file')->store('profile/pedoman_teknis_file', 'public');
            $profile->pedoman_teknis_file = $pedoman_teknis_file;
        };

        if ($request->file('_file')) {
            $kemudahan_informasi_file = $request->file('kemudahan_informasi_file')->store('profile/kemudahan_informasi_file', 'public');
            $profile->kemudahan_informasi_file = $kemudahan_informasi_file;
        };

        if ($request->file('kemudahan_proses_file')) {
            $kemudahan_proses_file = $request->file('kemudahan_proses_file')->store('profile/kemudahan_proses_file', 'public');
            $profile->kemudahan_proses_file = $kemudahan_proses_file;
        };

        if ($request->file('penyelesaian_pengaduan_file')) {
            $penyelesaian_pengaduan_file = $request->file('penyelesaian_pengaduan_file')->store('profile/penyelesaian_pengaduan_file', 'public');
            $profile->penyelesaian_pengaduan_file = $penyelesaian_pengaduan_file;
        };

        if ($request->file('online_sistem_file')) {
            $online_sistem_file = $request->file('online_sistem_file')->store('profile/online_sistem_file', 'public');
            $profile->online_sistem_file = $online_sistem_file;
        };

        if ($request->file('replikasi_file')) {
            $replikasi_file = $request->file('replikasi_file')->store('profile/replikasi_file', 'public');
            $profile->replikasi_file = $replikasi_file;
        };

        if ($request->file('kecepatan_inovasi_file')) {
            $kecepatan_inovasi_file = $request->file('kecepatan_inovasi_file')->store('profile/kecepatan_inovasi_file', 'public');
            $profile->kecepatan_inovasi_file = $kecepatan_inovasi_file;
        };

        if ($request->file('kemanfaatan_inovasi_file')) {
            $kemanfaatan_inovasi_file = $request->file('kemanfaatan_inovasi_file')->store('profile/kemanfaatan_inovasi_file', 'public');
            $profile->kemanfaatan_inovasi_file = $kemanfaatan_inovasi_file;
        };

        if ($request->file('monitoring_inovasi_file')) {
            $monitoring_inovasi_file = $request->file('monitoring_inovasi_file')->store('profile/monitoring_inovasi_file', 'public');
            $profile->monitoring_inovasi_file = $monitoring_inovasi_file;
        };

        if ($request->file('kualitas_inovasi')) {
            $kualitas_inovasi = $request->file('kualitas_inovasi')->store('profile/kualitas_inovasi', 'public');
            $profile->kualitas_inovasi = $kualitas_inovasi;
        };

        if ($request->file('kualitas_inovasi_file')) {
            $kualitas_inovasi_file = $request->file('kualitas_inovasi_file')->store('profile/kualitas_inovasi_file', 'public');
            $profile->kualitas_inovasi_file = $kualitas_inovasi_file;
        };

        $profile->save();

        return redirect()->route('innovation-profile.index')->with('status', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = InnovationProfile::find($id);
        return view('pages.admin.innovation-profile.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = InnovationProfile::findOrFail($id);
        $innovation_proposals = InnovationProposal::where('users_id', Auth::user()->id)->where('status', 'SUDAH')->get();

        return view('pages.admin.innovation-profile.edit', [
            'item' => $item,
            'innovation_proposals' => $innovation_proposals
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profile = InnovationProfile::findOrFail($id);

        \Validator::make($request->all(), [
            "monitoring_evaluasi" => "required",
            "kemanfaatan_inovasi" => "required",
            "kecepatan_inovasi" => "required",
            "ketersediaan_sdm" => "required",
            "regulasi_inovasi" => "required",

        ])->validate();

        $profile->regulasi_inovasi = $request->get('regulasi_inovasi');
        $profile->ketersediaan_sdm = $request->get('ketersediaan_sdm');
        $profile->dukungan_anggaran = $request->get('dukungan_anggaran');
        $profile->penggunaan_it = $request->get('penggunaan_it');
        $profile->bimtek_inovasi = $request->get('bimtek_inovasi');
        $profile->program_rkpd = $request->get('program_rkpd');
        $profile->keterlibatan_aktor = $request->get('keterlibatan_aktor');
        $profile->pelaksana_inovasi = $request->get('pelaksana_inovasi');
        $profile->jejaring_inovasi = $request->get('jejaring_inovasi');
        $profile->sosialisasi_inovasi = $request->get('sosialisasi_inovasi');
        $profile->pedoman_teknis = $request->get('pedoman_teknis');
        $profile->kemudahan_informasi = $request->get('kemudahan_informasi');
        $profile->kemudahan_proses = $request->get('kemudahan_proses');
        $profile->penyelesaian_pengaduan = $request->get('penyelesaian_pengaduan');
        $profile->online_sistem = $request->get('online_sistem');
        $profile->replikasi = $request->get('replikasi');
        $profile->kecepatan_inovasi = $request->get('kecepatan_inovasi');
        $profile->kemanfaatan_inovasi = $request->get('kemanfaatan_inovasi');
        $profile->monitoring_evaluasi = $request->get('monitoring_evaluasi');

        if ($request->file('regulasi_inovasi_file')) {
            if ($profile->regulasi_inovasi_file && file_exists(storage_path('app/public/' . $profile->regulasi_inovasi_file))) {
                \Storage::delete('public/' . $profile->regulasi_inovasi_file);
            }
            $sk = $request->file('regulasi_inovasi_file')->store('profile/regulasi_inovasi_file', 'public');
            $profile->regulasi_inovasi_file = $sk;
        }

        if ($request->file('ketersediaan_sdm_file')) {
            if ($profile->ketersediaan_sdm_file && file_exists(storage_path('app/public/' . $profile->ketersediaan_sdm_file))) {
                \Storage::delete('public/' . $profile->ketersediaan_sdm_file);
            }
            $sk = $request->file('ketersediaan_sdm_file')->store('profile/ketersediaan_sdm_file', 'public');
            $profile->ketersediaan_sdm_file = $sk;
        }

        if ($request->file('dukungan_anggaran_file')) {
            if ($profile->dukungan_anggaran_file && file_exists(storage_path('app/public/' . $profile->dukungan_anggaran_file))) {
                \Storage::delete('public/' . $profile->dukungan_anggaran_file);
            }
            $sk = $request->file('dukungan_anggaran_file')->store('profile/dukungan_anggaran_file', 'public');
            $profile->dukungan_anggaran_file = $sk;
        }

        if ($request->file('penggunaan_it_file')) {
            if ($profile->penggunaan_it_file && file_exists(storage_path('app/public/' . $profile->penggunaan_it_file))) {
                \Storage::delete('public/' . $profile->penggunaan_it_file);
            }
            $sk = $request->file('penggunaan_it_file')->store('profile/penggunaan_it_file', 'public');
            $profile->penggunaan_it_file = $sk;
        }

        if ($request->file('bimtek_inovasi_file')) {
            if ($profile->bimtek_inovasi_file && file_exists(storage_path('app/public/' . $profile->bimtek_inovasi_file))) {
                \Storage::delete('public/' . $profile->bimtek_inovasi_file);
            }
            $sk = $request->file('bimtek_inovasi_file')->store('profile/bimtek_inovasi_file', 'public');
            $profile->bimtek_inovasi_file = $sk;
        }

        if ($request->file('program_rkpd_file')) {
            if ($profile->program_rkpd_file && file_exists(storage_path('app/public/' . $profile->program_rkpd_file))) {
                \Storage::delete('public/' . $profile->program_rkpd_file);
            }
            $sk = $request->file('program_rkpd_file')->store('profile/program_rkpd_file', 'public');
            $profile->program_rkpd_file = $sk;
        }

        if ($request->file('keterlibatan_aktor_file')) {
            if ($profile->keterlibatan_aktor_file && file_exists(storage_path('app/public/' . $profile->keterlibatan_aktor_file))) {
                \Storage::delete('public/' . $profile->keterlibatan_aktor_file);
            }
            $sk = $request->file('keterlibatan_aktor_file')->store('profile/keterlibatan_aktor_file', 'public');
            $profile->keterlibatan_aktor_file = $sk;
        }

        if ($request->file('pelaksana_inovasi_file')) {
            if ($profile->pelaksana_inovasi_file && file_exists(storage_path('app/public/' . $profile->pelaksana_inovasi_file))) {
                \Storage::delete('public/' . $profile->pelaksana_inovasi_file);
            }
            $sk = $request->file('pelaksana_inovasi_file')->store('profile/pelaksana_inovasi_file', 'public');
            $profile->pelaksana_inovasi_file = $sk;
        }

        if ($request->file('jejaring_inovasi_file')) {
            if ($profile->jejaring_inovasi_file && file_exists(storage_path('app/public/' . $profile->jejaring_inovasi_file))) {
                \Storage::delete('public/' . $profile->jejaring_inovasi_file);
            }
            $sk = $request->file('jejaring_inovasi_file')->store('profile/jejaring_inovasi_file', 'public');
            $profile->jejaring_inovasi_file = $sk;
        }

        if ($request->file('sosialisasi_inovasi_file')) {
            if ($profile->sosialisasi_inovasi_file && file_exists(storage_path('app/public/' . $profile->sosialisasi_inovasi_file))) {
                \Storage::delete('public/' . $profile->sosialisasi_inovasi_file);
            }
            $sk = $request->file('sosialisasi_inovasi_file')->store('profile/sosialisasi_inovasi_file', 'public');
            $profile->sosialisasi_inovasi_file = $sk;
        }

        if ($request->file('pedoman_teknis_file')) {
            if ($profile->pedoman_teknis_file && file_exists(storage_path('app/public/' . $profile->pedoman_teknis_file))) {
                \Storage::delete('public/' . $profile->pedoman_teknis_file);
            }
            $sk = $request->file('pedoman_teknis_file')->store('profile/pedoman_teknis_file', 'public');
            $profile->pedoman_teknis_file = $sk;
        }

        if ($request->file('kemudahan_informasi_file')) {
            if ($profile->kemudahan_informasi_file && file_exists(storage_path('app/public/' . $profile->kemudahan_informasi_file))) {
                \Storage::delete('public/' . $profile->kemudahan_informasi_file);
            }
            $sk = $request->file('kemudahan_informasi_file')->store('profile/kemudahan_informasi_file', 'public');
            $profile->kemudahan_informasi_file = $sk;
        }

        if ($request->file('kemudahan_proses_file')) {
            if ($profile->kemudahan_proses_file && file_exists(storage_path('app/public/' . $profile->kemudahan_proses_file))) {
                \Storage::delete('public/' . $profile->kemudahan_proses_file);
            }
            $sk = $request->file('kemudahan_proses_file')->store('profile/kemudahan_proses_file', 'public');
            $profile->kemudahan_proses_file = $sk;
        }

        if ($request->file('penyelesaian_pengaduan_file')) {
            if ($profile->penyelesaian_pengaduan_file && file_exists(storage_path('app/public/' . $profile->penyelesaian_pengaduan_file))) {
                \Storage::delete('public/' . $profile->penyelesaian_pengaduan_file);
            }
            $sk = $request->file('penyelesaian_pengaduan_file')->store('profile/penyelesaian_pengaduan_file', 'public');
            $profile->penyelesaian_pengaduan_file = $sk;
        }

        if ($request->file('online_sistem_file')) {
            if ($profile->online_sistem_file && file_exists(storage_path('app/public/' . $profile->online_sistem_file))) {
                \Storage::delete('public/' . $profile->online_sistem_file);
            }
            $sk = $request->file('online_sistem_file')->store('profile/online_sistem_file', 'public');
            $profile->online_sistem_file = $sk;
        }

        if ($request->file('replikasi_file')) {
            if ($profile->replikasi_file && file_exists(storage_path('app/public/' . $profile->replikasi_file))) {
                \Storage::delete('public/' . $profile->replikasi_file);
            }
            $sk = $request->file('replikasi_file')->store('profile/replikasi_file', 'public');
            $profile->replikasi_file = $sk;
        }

        if ($request->file('kecepatan_inovasi_file')) {
            if ($profile->kecepatan_inovasi_file && file_exists(storage_path('app/public/' . $profile->kecepatan_inovasi_file))) {
                \Storage::delete('public/' . $profile->kecepatan_inovasi_file);
            }
            $sk = $request->file('kecepatan_inovasi_file')->store('profile/kecepatan_inovasi_file', 'public');
            $profile->kecepatan_inovasi_file = $sk;
        }

        if ($request->file('kemanfaatan_inovasi_file')) {
            if ($profile->kemanfaatan_inovasi_file && file_exists(storage_path('app/public/' . $profile->kemanfaatan_inovasi_file))) {
                \Storage::delete('public/' . $profile->kemanfaatan_inovasi_file);
            }
            $sk = $request->file('kemanfaatan_inovasi_file')->store('profile/kemanfaatan_inovasi_file', 'public');
            $profile->kemanfaatan_inovasi_file = $sk;
        }

        if ($request->file('monitoring_evaluasi_file')) {
            if ($profile->monitoring_evaluasi_file && file_exists(storage_path('app/public/' . $profile->monitoring_evaluasi_file))) {
                \Storage::delete('public/' . $profile->monitoring_evaluasi_file);
            }
            $sk = $request->file('monitoring_evaluasi_file')->store('profile/monitoring_evaluasi_file', 'public');
            $profile->monitoring_evaluasi_file = $sk;
        }

        if ($request->file('kualitas_inovasi')) {
            if ($profile->kualitas_inovasi && file_exists(storage_path('app/public/' . $profile->kualitas_inovasi))) {
                \Storage::delete('public/' . $profile->kualitas_inovasi);
            }
            $sk = $request->file('kualitas_inovasi')->store('profile/kualitas_inovasi', 'public');
            $profile->kualitas_inovasi = $sk;
        }

        if ($request->file('kualitas_inovasi_file')) {
            if ($profile->kualitas_inovasi_file && file_exists(storage_path('app/public/' . $profile->kualitas_inovasi_file))) {
                \Storage::delete('public/' . $profile->kualitas_inovasi_file);
            }
            $sk = $request->file('kualitas_inovasi_file')->store('profile/kualitas_inovasi_file', 'public');
            $profile->kualitas_inovasi_file = $sk;
        }
        $profile->save();

        return redirect()->route('innovation-profile.index')->with('status', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = InnovationProfile::findOrFail($id);
        \Storage::delete('public/' . $item->regulasi_inovasi_file);
        \Storage::delete('public/' . $item->ketersediaan_sdm_file);
        \Storage::delete('public/' . $item->dukungan_anggaran_file);
        \Storage::delete('public/' . $item->penggunaan_it_file);
        \Storage::delete('public/' . $item->bimtek_inovasi_file);
        \Storage::delete('public/' . $item->program_rkpd_file);
        \Storage::delete('public/' . $item->keterlibatan_aktor_file);
        \Storage::delete('public/' . $item->pelaksana_inovasi_file);
        \Storage::delete('public/' . $item->jejaring_inovasi_file);
        \Storage::delete('public/' . $item->sosialisasi_inovasi_file);
        \Storage::delete('public/' . $item->pedoman_teknis_file);
        \Storage::delete('public/' . $item->kemudahan_informasi_file);
        \Storage::delete('public/' . $item->kemudahan_proses_file);
        \Storage::delete('public/' . $item->penyelesaian_pengaduan_file);
        \Storage::delete('public/' . $item->online_sistem_file);
        \Storage::delete('public/' . $item->replikasi_file);
        \Storage::delete('public/' . $item->kecepatan_inovasi_file);
        \Storage::delete('public/' . $item->kemanfaatan_inovasi_file);
        \Storage::delete('public/' . $item->monitoring_evaluasi_file);
        \Storage::delete('public/' . $item->kualitas_inovasi);
        \Storage::delete('public/' . $item->kualitas_inovasi_file);


        $item->delete();

        return redirect()->route('innovation-profile.index')->with('status', 'Deleted successfully!');
    }
}
