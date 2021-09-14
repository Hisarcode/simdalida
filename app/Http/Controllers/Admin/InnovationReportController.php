<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InnovationReport;
use App\Models\InnovationProposal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class InnovationReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles == 'SUPERADMIN') {
            $report = InnovationReport::where('status', 'KIRIM')->orderBy('id', 'DESC')->get();
        } else if (Auth::user()->roles == 'ADMIN') {
            $report = InnovationReport::where('status', 'KIRIM')->orderBy('id', 'DESC')->get();
        } else if (Auth::user()->roles == 'OPERATOR') {
            $report = InnovationReport::where('users_id', Auth::user()->id)
                ->orderBy('innovation_proposals_id', 'DESC')
                ->orderBy('quartal', 'DESC')
                ->get();
        }

        return view('pages.admin.innovation-report.index', ['report' => $report]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create0()
    {
        $current_year =  \Carbon\Carbon::now('Asia/Jakarta')->year;
        $innovations = InnovationProposal::where('users_id', Auth::user()->id)->where('status', 'SUDAH')->where('innovation_step', '<>', '["Tahap Inisiatif"]')->get();

        foreach ($innovations as $innovation) {

            $max_quartal_report = InnovationReport::where([
                'innovation_proposals_id' => $innovation->id,
                'report_year' => $current_year,
            ])->max('quartal');
            if ($max_quartal_report == 4) {
                $innovation->completed_quartal = '1';
            } else {
                $innovation->completed_quartal = '0';
            }
        }

        return view('pages.admin.innovation-report.create0', [
            'innovation' => $innovations
        ]);
    }


    public function create()
    {
        $innovation = InnovationProposal::where('users_id', Auth::user()->id)->where('status', 'SUDAH')->where('innovation_step', '["Tahap Uji Coba"]')->orWhere('innovation_step', '["Tahap Penerapan"]')->get();
        return view('pages.admin.innovation-report.create0', [
            'innovation' => $innovation
        ]);
    }

    public function postCreate0(Request $request)
    {
        $innovation_proposals_id = $request->get('innovation_proposals_id');

        return Redirect::route('innovation-report.store0', $innovation_proposals_id);
    }

    public function store0($id)
    {
        $current_year =  \Carbon\Carbon::now('Asia/Jakarta')->year;
        $innovation_proposals_id = $id;

        $get_quartal = InnovationReport::where('innovation_proposals_id', $innovation_proposals_id)->where('status', 'KIRIM')->where('report_year', $current_year)->max('quartal');

        if (empty($get_quartal)) {
            if (empty($get_quartal)) {
                $quartal_next = 1;
            } else if ($get_quartal == 1) {
                $quartal_next = 2;
            } else if ($get_quartal == 2) {
                $quartal_next = 3;
            } else if ($get_quartal == 3) {
                $quartal_next = 4;
            } else if ($get_quartal == 4) {
                $quartal_next = '';
            }

            $innovation = InnovationProposal::find($innovation_proposals_id);

            $item = InnovationProposal::where('id', $innovation_proposals_id)->first();

            return view('pages.admin.innovation-report.create', [
                'innovation' => $innovation,
                'quartal_next' => $quartal_next,
                'item' => $item
            ]);
        } else {
            $cek_status =  InnovationReport::where('innovation_proposals_id', $innovation_proposals_id)->latest()->first()->status;

            if ($cek_status == 'DRAFT') {
                return redirect()
                    ->route('innovation-report.index')
                    ->with('alert', 'Anda Harus menyelesaikan laporan sebelumnya yang di draft!');
            } else if ($cek_status == 'KIRIM') {
                if (empty($get_quartal)) {
                    $quartal_next = 1;
                } else if ($get_quartal == 1) {
                    $quartal_next = 2;
                } else if ($get_quartal == 2) {
                    $quartal_next = 3;
                } else if ($get_quartal == 3) {
                    $quartal_next = 4;
                } else if ($get_quartal == 4) {
                    $quartal_next = '';
                }

                $innovation = InnovationProposal::find($innovation_proposals_id);

                $item = InnovationProposal::where('id', $innovation_proposals_id)->first();

                return view('pages.admin.innovation-report.create', [
                    'innovation' => $innovation,
                    'quartal_next' => $quartal_next,
                    'item' => $item
                ]);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->get('save_action') == 'KIRIM') {
            $validation = \Validator::make(
                $request->all(),
                [
                    "users_id" => "required",
                    "innovation_step" => "required",
                    "innovation_initiator" => "required",
                    "innovation_type" => "required",
                    "innovation_formats" => "required",
                    "time_innovation_implement" => "required",
                    "problem" => "required",
                    "solution" => "required",
                    "improvement" => "required",
                    "complain_innovation_total" => "required",
                    "complain_improvement_total" => "required",
                    "achievement_goal_level" => "required",
                    "achievement_goal_problem" => "required",
                    "benefit_level" => "required",
                    "achievement_result_level" => "required",
                    "achievement_result_problem" => "required",
                    "innovation_strategy" => "required",
                    "video_innovation" => "required",
                    "innovation_sk_file" => "mimes:pdf|max:5120",
                    "tahapan_sk_bupati" => "mimes:pdf|max:5120",
                    "complain_innovation_file" => "mimes:pdf|max:5120",
                    // "complain_innovation_file" => "required_if:complain_innovation_total,<>,0",
                    "complain_improvement_file" => "mimes:pdf|max:5120",
                    "achievement_goal_level_file" => "mimes:pdf|max:5120",
                    "benefit_level_file" => "mimes:pdf|max:5120",
                    "achievement_result_level_file" => "mimes:pdf|max:5120",
                    'quartal' => [
                        Rule::unique('innovation_reports')->where(function ($query) use ($request) {
                            return $query->where('report_year', $request->get('report_year'))
                                ->where('innovation_proposals_id', $request->get('innovation_proposals_id'))
                                ->where('quartal', $request->get('quartal'));
                        }),
                    ]
                ],
                [
                    "quartal.unique" => "Laporan inovasi pada triwulan ini telah ada, silahkan edit pada menu Laporan Inovasi Untuk merubahnya",
                    "problem.required" => "field kendala pelaksanaan inovasi daerah harus diisi!",
                    "time_innovation_implement.required" => "field waktu pelaksanaan inovasi daerah harus diisi!",
                    "solution.required" => "field solusi terhadap masalah harus diisi!",
                    "improvement.required" => "field tindaklanjut terhadap masalah harus diisi!",
                    "complain_innovation_total.required" => "field jumlah pengaduan inovasi daerah harus diisi!",
                    "complain_improvement_total.required" => "field jumlah pengaduan yang sudah di TL harus diisi!",
                    "achievement_goal_level.required" => "field tingkat capaian inovasi daerah harus diisi!",
                    "achievement_goal_problem.required" => "field kendala pencapaian tujuan harus diisi!",
                    "benefit_level.required" => "field tingkat kemanfaatan inovasi daerah harus diisi!",
                    "achievement_result_level.required" => "field Tingkat Capaian Hasil Inovasi Daerah harus diisi!",
                    "achievement_result_problem.required" => "field Kendala Pencapaian Hasil Inovasi Daerah harus diisi!",
                    "innovation_strategy.required" => "field strategi inovasi Daerah harus diisi!",
                    "video_innovation.required" => "field video inovasi Daerah harus diisi!",
                    "innovation_sk_file.mimes" => "format file SK Bupati harus pdf!",
                    "innovation_sk_file.max" => "ukuran file SK Bupati tidak boleh lebih dari 5MB!",
                    "tahapan_sk_bupati.mimes" => "format file SK Bupati harus pdf!",
                    "tahapan_sk_bupati.max" => "ukuran file SK Bupati tidak boleh lebih dari 5MB!",
                    "complain_innovation_file.mimes" => "format file rekapitulasi pengaduan harus pdf!",
                    "complain_innovation_file.max" => "ukuran file rekapitulasi pengaduan tidak boleh lebih dari 5MB!",
                    "complain_improvement_file.mimes" => "format file penyelesaian pengaduan harus pdf!",
                    "complain_improvement_file.max" => "ukuran file penyelesaian pengaduan tidak boleh lebih dari 5MB!",
                    "achievement_goal_level_file.mimes" => "format file pendukung harus pdf!",
                    "achievement_goal_level_file.max" => "ukuran file pendukung tidak boleh lebih dari 5MB!",
                    "benefit_level_file.mimes" => "format file pendukung harus pdf!",
                    "benefit_level_file.max" => "ukuran file pendukung tidak boleh lebih dari 5MB!",
                    "achievement_result_level_file.mimes" => "format file pendukung harus pdf!",
                    "achievement_result_level_file.max" => "ukuran file pendukung tidak boleh lebih dari 5MB!",
                ]
            )->validate();
        } elseif ($request->get('save_action') == 'DRAFT') {
            $validation = \Validator::make(
                $request->all(),
                [
                    "users_id" => "required",
                    "innovation_sk_file" => "mimes:pdf|max:5120",
                    "tahapan_sk_bupati" => "mimes:pdf|max:5120",
                    "complain_innovation_file" => "mimes:pdf|max:5120",
                    "complain_improvement_file" => "mimes:pdf|max:5120",
                    "achievement_goal_level_file" => "mimes:pdf|max:5120",
                    "benefit_level_file" => "mimes:pdf|max:5120",
                    "achievement_result_level_file" => "mimes:pdf|max:5120",

                    'quartal' => [
                        Rule::unique('innovation_reports')->where(function ($query) use ($request) {
                            return $query->where('report_year', $request->get('report_year'))
                                ->where('innovation_proposals_id', $request->get('innovation_proposals_id'))
                                ->where('quartal', $request->get('quartal'));
                        }),
                    ]
                ],
                [
                    "quartal.unique" => "Laporan inovasi pada triwulan ini telah ada, silahkan edit pada menu Laporan Inovasi Untuk merubahnya",
                    "innovation_sk_file.mimes" => "format file SK Bupati harus pdf!",
                    "innovation_sk_file.max" => "ukuran file SK Bupati tidak boleh lebih dari 5MB!",
                    "tahapan_sk_bupati.mimes" => "format file SK Bupati harus pdf!",
                    "tahapan_sk_bupati.max" => "ukuran file SK Bupati tidak boleh lebih dari 5MB!",
                    "complain_innovation_file.mimes" => "format file rekapitulasi pengaduan harus pdf!",
                    "complain_innovation_file.max" => "ukuran file rekapitulasi pengaduan tidak boleh lebih dari 5MB!",
                    "complain_improvement_file.mimes" => "format file penyelesaian pengaduan harus pdf!",
                    "complain_improvement_file.max" => "ukuran file penyelesaian pengaduan tidak boleh lebih dari 5MB!",
                    "achievement_goal_level_file.mimes" => "format file pendukung harus pdf!",
                    "achievement_goal_level_file.max" => "ukuran file pendukung tidak boleh lebih dari 5MB!",
                    "benefit_level_file.mimes" => "format file pendukung harus pdf!",
                    "benefit_level_file.max" => "ukuran file pendukung tidak boleh lebih dari 5MB!",
                    "achievement_result_level_file.mimes" => "format file pendukung harus pdf!",
                    "achievement_result_level_file.max" => "ukuran file pendukung tidak boleh lebih dari 5MB!",
                ]
            )->validate();
        }



        $report = new InnovationReport();
        $ambil = InnovationProposal::where('id', $request->get('innovation_proposals_id'))->first()->name;
        $report->users_id = $request->get('users_id');
        $report->name = $ambil;
        $report->innovation_proposals_id = $request->get('innovation_proposals_id');
        $report->innovation_step = json_encode($request->innovation_step);
        $report->innovation_initiator = json_encode($request->innovation_initiator);
        $report->innovation_type = $request->get('innovation_type');
        $report->innovation_formats = $request->get('innovation_formats');
        $report->time_innovation_implement = $request->get('time_innovation_implement');
        $report->problem = $request->get('problem');
        $report->solution = $request->get('solution');
        $report->improvement = $request->get('improvement');
        $report->complain_innovation_total = $request->get('complain_innovation_total');
        $report->complain_improvement_total = $request->get('complain_improvement_total');
        $report->achievement_goal_level = $request->get('achievement_goal_level');
        $report->achievement_goal_problem = $request->get('achievement_goal_problem');
        $report->benefit_level = $request->get('benefit_level');
        $report->achievement_result_level = $request->get('achievement_result_level');
        $report->achievement_result_problem = $request->get('achievement_result_problem');
        $report->innovation_strategy = $request->get('innovation_strategy');
        $report->video_innovation = $request->get('video_innovation');

        if ($request->file('innovation_sk_file')) {
            $sk = $request->file('innovation_sk_file')->store('laporan/SKinovasi', 'public');
            $report->innovation_sk_file = $sk;
        }

        if ($request->file('tahapan_sk_bupati')) {
            $sk2 = $request->file('tahapan_sk_bupati')->store('laporan/SKTahapaninovasi', 'public');
            $report->tahapan_sk_bupati = $sk2;
        }

        if ($request->file('complain_innovation_file')) {
            $complain = $request->file('complain_innovation_file')->store('laporan/pengaduanInovasi', 'public');
            $report->complain_innovation_file = $complain;
        }

        if ($request->file('complain_improvement_file')) {
            $improvement = $request->file('complain_improvement_file')->store('laporan/pengaduanTindaklanjuti', 'public');
            $report->complain_improvement_file = $improvement;
        }

        if ($request->file('achievement_goal_level_file')) {
            $achievement = $request->file('achievement_goal_level_file')->store('laporan/capaianTujuanInovasi', 'public');
            $report->achievement_goal_level_file = $achievement;
        }

        if ($request->file('benefit_level_file')) {
            $benefit = $request->file('benefit_level_file')->store('laporan/kemanfaatanInovasi', 'public');
            $report->benefit_level_file = $benefit;
        }

        if ($request->file('achievement_result_level_file')) {
            $arlf = $request->file('achievement_result_level_file')->store('laporan/capaianHasilInovasi', 'public');
            $report->achievement_result_level_file = $arlf;
        }

        $report->report_year = $request->get('report_year');
        $report->quartal = $request->get('quartal');
        $report->status = $request->get('save_action');

        $report->save();

        if ($request->get('save_action') == 'KIRIM') {
            return redirect()
                ->route('innovation-report.index')
                ->with('status', 'Laporan Berhasil Disimpan dan Dikirim!');
        } elseif ($request->get('save_action') == 'DRAFT') {
            return redirect()
                ->route('innovation-report.index')
                ->with('status', 'Laporan Berhasil Disimpan Sebagai Draft!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = InnovationReport::with('innovation_proposal')->find($id);
        return view('pages.admin.innovation-report.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = InnovationReport::findOrFail($id);
        if (Auth::user()->roles == 'SUPERADMIN' || Auth::user()->roles == 'ADMIN') {
            return view('pages.admin.innovation-report.edit', [
                'item' => $item
            ]);
        }

        if (Auth::user()->roles == 'OPERATOR') {
            if ($item->status == 'DRAFT') {
                return view('pages.admin.innovation-report.edit', [
                    'item' => $item
                ]);
            } elseif ($item->status == 'KIRIM') {
                return redirect()->route('innovation-report.index')->with('status', 'Tidak bisa mengedit data karena status sudah "Terkirim"');
            }
        }
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
        $report = InnovationReport::findOrFail($id);

        if ($request->get('save_action') == 'KIRIM') {
            $validation = \Validator::make(
                $request->all(),
                [
                    "innovation_step" => "required",
                    "innovation_initiator" => "required",
                    "innovation_type" => "required",
                    "innovation_formats" => "required",
                    "time_innovation_implement" => "required",
                    "problem" => "required",
                    "solution" => "required",
                    "improvement" => "required",
                    "complain_innovation_total" => "required",
                    "complain_improvement_total" => "required",
                    "achievement_goal_level" => "required",
                    "achievement_goal_problem" => "required",
                    "benefit_level" => "required",
                    "achievement_result_level" => "required",
                    "achievement_result_problem" => "required",
                    "innovation_strategy" => "required",
                    "video_innovation" => "required",
                    "innovation_sk_file" => "mimes:pdf|max:5120",
                    "tahapan_sk_bupati" => "mimes:pdf|max:5120",
                    "complain_innovation_file" => "mimes:pdf|max:5120",
                    "complain_improvement_file" => "mimes:pdf|max:5120",
                    "achievement_goal_level_file" => "mimes:pdf|max:5120",
                    "benefit_level_file" => "mimes:pdf|max:5120",
                    "achievement_result_level_file" => "mimes:pdf|max:5120",
                    'quartal' => [
                        Rule::unique('innovation_reports')->where(function ($query) use ($request) {
                            return $query->where('report_year', $request->get('report_year'))
                                ->where('innovation_proposals_id', $request->get('innovation_proposals_id'))
                                ->where('quartal', $request->get('quartal'));
                        }),
                    ]
                ],
                [
                    "quartal.unique" => "Laporan inovasi pada triwulan ini telah ada, silahkan edit pada menu Laporan Inovasi Untuk merubahnya",
                    "problem.required" => "field kendala pelaksanaan inovasi daerah harus diisi!",
                    "time_innovation_implement.required" => "field waktu pelaksanaan inovasi daerah harus diisi!",
                    "solution.required" => "field solusi terhadap masalah harus diisi!",
                    "improvement.required" => "field tindaklanjut terhadap masalah harus diisi!",
                    "complain_innovation_total.required" => "field jumlah pengaduan inovasi daerah harus diisi!",
                    "complain_improvement_total.required" => "field jumlah pengaduan yang sudah di TL harus diisi!",
                    "achievement_goal_level.required" => "field tingkat capaian inovasi daerah harus diisi!",
                    "achievement_goal_problem.required" => "field kendala pencapaian tujuan harus diisi!",
                    "benefit_level.required" => "field tingkat kemanfaatan inovasi daerah harus diisi!",
                    "achievement_result_level.required" => "field Tingkat Capaian Hasil Inovasi Daerah harus diisi!",
                    "achievement_result_problem.required" => "field Kendala Pencapaian Hasil Inovasi Daerah harus diisi!",
                    "innovation_strategy.required" => "field strategi inovasi Daerah harus diisi!",
                    "video_innovation.required" => "field video inovasi Daerah harus diisi!",
                    "innovation_sk_file.mimes" => "format file SK Bupati harus pdf!",
                    "innovation_sk_file.max" => "ukuran file SK Bupati tidak boleh lebih dari 5MB!",
                    "tahapan_sk_bupati.mimes" => "format file SK Bupati harus pdf!",
                    "tahapan_sk_bupati.max" => "ukuran file SK Bupati tidak boleh lebih dari 5MB!",
                    "complain_innovation_file.mimes" => "format file rekapitulasi pengaduan harus pdf!",
                    "complain_innovation_file.max" => "ukuran file rekapitulasi pengaduan tidak boleh lebih dari 5MB!",
                    "complain_improvement_file.mimes" => "format file penyelesaian pengaduan harus pdf!",
                    "complain_improvement_file.max" => "ukuran file penyelesaian pengaduan tidak boleh lebih dari 5MB!",
                    "achievement_goal_level_file.mimes" => "format file pendukung harus pdf!",
                    "achievement_goal_level_file.max" => "ukuran file pendukung tidak boleh lebih dari 5MB!",
                    "benefit_level_file.mimes" => "format file pendukung harus pdf!",
                    "benefit_level_file.max" => "ukuran file pendukung tidak boleh lebih dari 5MB!",
                    "achievement_result_level_file.mimes" => "format file pendukung harus pdf!",
                    "achievement_result_level_file.max" => "ukuran file pendukung tidak boleh lebih dari 5MB!",
                ]
            )->validate();
        } elseif ($request->get('save_action') == 'DRAFT') {
            $validation = \Validator::make(
                $request->all(),
                [
                    "innovation_sk_file" => "mimes:pdf|max:5120",
                    "tahapan_sk_bupati" => "mimes:pdf|max:5120",
                    "complain_innovation_file" => "mimes:pdf|max:5120",
                    "complain_improvement_file" => "mimes:pdf|max:5120",
                    "achievement_goal_level_file" => "mimes:pdf|max:5120",
                    "benefit_level_file" => "mimes:pdf|max:5120",
                    "achievement_result_level_file" => "mimes:pdf|max:5120",
                    'quartal' => [
                        Rule::unique('innovation_reports')->where(function ($query) use ($request) {
                            return $query->where('report_year', $request->get('report_year'))
                                ->where('innovation_proposals_id', $request->get('innovation_proposals_id'))
                                ->where('quartal', $request->get('quartal'));
                        }),
                    ]
                ],
                [
                    "quartal.unique" => "Laporan inovasi pada triwulan ini telah ada, silahkan edit pada menu Laporan Inovasi Untuk merubahnya",
                    "innovation_sk_file.mimes" => "format file SK Bupati harus pdf!",
                    "innovation_sk_file.max" => "ukuran file SK Bupati tidak boleh lebih dari 5MB!",
                    "tahapan_sk_bupati.mimes" => "format file SK Bupati harus pdf!",
                    "tahapan_sk_bupati.max" => "ukuran file SK Bupati tidak boleh lebih dari 5MB!",
                    "complain_innovation_file.mimes" => "format file rekapitulasi pengaduan harus pdf!",
                    "complain_innovation_file.max" => "ukuran file rekapitulasi pengaduan tidak boleh lebih dari 5MB!",
                    "complain_improvement_file.mimes" => "format file penyelesaian pengaduan harus pdf!",
                    "complain_improvement_file.max" => "ukuran file penyelesaian pengaduan tidak boleh lebih dari 5MB!",
                    "achievement_goal_level_file.mimes" => "format file pendukung harus pdf!",
                    "achievement_goal_level_file.max" => "ukuran file pendukung tidak boleh lebih dari 5MB!",
                    "benefit_level_file.mimes" => "format file pendukung harus pdf!",
                    "benefit_level_file.max" => "ukuran file pendukung tidak boleh lebih dari 5MB!",
                    "achievement_result_level_file.mimes" => "format file pendukung harus pdf!",
                    "achievement_result_level_file.max" => "ukuran file pendukung tidak boleh lebih dari 5MB!",
                ]
            )->validate();
        }

        $report->name = $request->get('name');
        $report->innovation_step = json_encode($request->innovation_step);
        $report->innovation_initiator = json_encode($request->innovation_initiator);
        $report->innovation_type = $request->get('innovation_type');
        $report->innovation_formats = $request->get('innovation_formats');
        $report->time_innovation_implement = $request->get('time_innovation_implement');
        $report->problem = $request->get('problem');
        $report->solution = $request->get('solution');
        $report->improvement = $request->get('improvement');
        $report->complain_innovation_total = $request->get('complain_innovation_total');
        $report->complain_improvement_total = $request->get('complain_improvement_total');
        $report->achievement_goal_level = $request->get('achievement_goal_level');
        $report->achievement_goal_problem = $request->get('achievement_goal_problem');
        $report->benefit_level = $request->get('benefit_level');
        $report->achievement_result_level = $request->get('achievement_result_level');
        $report->achievement_result_problem = $request->get('achievement_result_problem');
        $report->innovation_strategy = $request->get('innovation_strategy');
        $report->video_innovation = $request->get('video_innovation');

        if ($request->file('innovation_sk_file')) {
            if ($report->innovation_sk_file && file_exists(storage_path('app/public/' . $report->innovation_sk_file))) {
                \Storage::delete('public/' . $report->innovation_sk_file);
            }
            $sk = $request->file('innovation_sk_file')->store('laporan/SKinovasi', 'public');
            $report->innovation_sk_file = $sk;
        }

        if ($request->file('tahapan_sk_bupati')) {
            if ($report->tahapan_sk_bupati && file_exists(storage_path('app/public/' . $report->tahapan_sk_bupati))) {
                \Storage::delete('public/' . $report->tahapan_sk_bupati);
            }
            $sk2 = $request->file('tahapan_sk_bupati')->store('laporan/SKTahapaninovasi', 'public');
            $report->tahapan_sk_bupati = $sk2;
        }

        if ($request->file('complain_innovation_file')) {
            if ($report->complain_innovation_file && file_exists(storage_path('app/public/' . $report->complain_innovation_file))) {
                \Storage::delete('public/' . $report->complain_innovation_file);
            }
            $complain = $request->file('complain_innovation_file')->store('laporan/pengaduanInovasi', 'public');
            $report->complain_innovation_file = $complain;
        }

        if ($request->file('complain_improvement_file')) {
            if ($report->complain_improvement_file && file_exists(storage_path('app/public/' . $report->complain_improvement_file))) {
                \Storage::delete('public/' . $report->complain_improvement_file);
            }
            $improvement = $request->file('complain_improvement_file')->store('laporan/pengaduanTindaklanjuti', 'public');
            $report->complain_improvement_file = $improvement;
        }

        if ($request->file('achievement_goal_level_file')) {
            if ($report->achievement_goal_level_file && file_exists(storage_path('app/public/' . $report->achievement_goal_level_file))) {
                \Storage::delete('public/' . $report->achievement_goal_level_file);
            }
            $ach = $request->file('achievement_goal_level_file')->store('laporan/capaianTujuanInovasi', 'public');
            $report->achievement_goal_level_file = $ach;
        }

        if ($request->file('benefit_level_file')) {
            if ($report->benefit_level_file && file_exists(storage_path('app/public/' . $report->benefit_level_file))) {
                \Storage::delete('public/' . $report->benefit_level_file);
            }
            $benefit = $request->file('benefit_level_file')->store('laporan/kemanfaatanInovasi', 'public');
            $report->benefit_level_file = $benefit;
        }

        if ($request->file('achievement_result_level_file')) {
            if ($report->achievement_result_level_file && file_exists(storage_path('app/public/' . $report->achievement_result_level_file))) {
                \Storage::delete('public/' . $report->achievement_result_level_file);
            }
            $arlf = $request->file('achievement_result_level_file')->store('laporan/capaianHasilInovasi', 'public');
            $report->achievement_result_level_file = $arlf;
        }

        $report->report_year = $request->get('report_year');
        $report->quartal = $request->get('quartal');
        $report->status = $request->get('save_action');

        $report->save();

        if ($request->get('save_action') == 'KIRIM') {
            return redirect()
                ->route('innovation-report.index')
                ->with('status', 'Laporan Berhasil diUpdate dan Dikirim!');
        } elseif ($request->get('save_action') == 'DRAFT') {
            return redirect()
                ->route('innovation-report.index')
                ->with('status', 'Laporan Berhasil Disimpan Sebagai Draft!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = InnovationReport::findOrFail($id);
        \Storage::delete('public/' . $item->innovation_sk_file); //utk hapus file di storage agar tidk penuh
        \Storage::delete('public/' . $item->tahapan_sk_bupati);
        \Storage::delete('public/' . $item->complain_innovation_file);
        \Storage::delete('public/' . $item->complain_improvement_file);
        \Storage::delete('public/' . $item->achievement_goal_level_file);
        \Storage::delete('public/' . $item->benefit_level_file);
        \Storage::delete('public/' . $item->achievement_result_level_file);
        $item->delete();

        return redirect()->route('innovation-report.index')->with('status', 'Data Laporan Berhasil Dihapus!');
    }

    public function getlastquartal($id)
    {
        $report = InnovationReport::where('innovation_proposals_id', $id)->max('quartal');
        if (empty($report)) {
            $report = 0;
        }
        return response()->json($report);
    }
}
