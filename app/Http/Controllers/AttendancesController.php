<?php

namespace App\Http\Controllers;

use App\Models\Attendances;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class AttendancesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createPage()
    {
        return view('Attendances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createStore(Request $request)
    {
        $nip = $request->nip;
        $teacher = Teacher::where('nip', $nip)->first();
        // dd($teacher);
        if (!$teacher) {
            dd('ERROR');

            return redirect('/')->withError('Teacher not found.');
        }
        $img = $request->bukti_kehadiran;
        $folderPath = 'uploads/';

        $image_parts = explode(';base64,', $img);
        $image_type_aux = explode('image/', $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid().'.png';
        // $img->move(public_path('uploads\img'), $fileName);

        $file = $folderPath.$fileName;
        Storage::disk('public')->put($folderPath.$fileName, $image_base64);

        // dd($now->date);
        $attendance = $teacher->attendance()->create([
            'bukti_kehadiran' => $fileName,
            'status' => 'hadir',
        ]);

        return redirect('/dashboard')->with('successAttendances', 'Successfully Attendance!');
    }

    /**
     * Display the specified resource.
     */
    public function showStatus()
    {
        // Mencari status berdasarkan parameter
        $attendances = Attendances::where('status', 'hadir')->get();

        // Mengambil guru terkait dengan status
        $teachersWithStatus = $attendances->map(function ($attendance) {
            return [
                'teacher' => $attendance->teacher,
                'status' => $attendance->status,
                'jam_kehadiran' => $attendance->jam_kehadiran,
                'bukti_kehadiran' => $attendance->bukti_kehadiran,
            ];
        });

        return view('Admin.attendances', compact('teachersWithStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function showPage(Attendances $attendances)
    {
        dd($attendances);
        // return
    }
}
