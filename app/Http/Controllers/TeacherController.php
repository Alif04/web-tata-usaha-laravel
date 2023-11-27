<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function registerPage()
    {
        return view('Teacher.createTeacher');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function registerAuth(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            Rule::unique('teachers', 'nip')->ignore($request->nip),
            'jenis_kelamin' => 'required',
            'nomor_handphone' => 'required|string',
        ],
            [
                'nip.unique' => 'NIP sudah digunakan.',
            ]);
        // $name = explode(' ', $request->name);
        $user = Users::create([
            'username' => Str::lower($request->name), // Ubah bagian ini
            'password' => Hash::make($request->nip),
            'role' => 'teacher',
        ]);

        $teacher = $user->teacher()->create([
            'name' => $request->name,
            'nip' => $request->nip,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_handphone' => $request->nomor_handphone,
        ]);

        return redirect('/login-page')->with('success', 'Successfully Register, please login with your first name and password with your nip!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        $teachers = Teacher::paginate(10); // Ubah angka 10 sesuai dengan jumlah item per halaman yang Anda inginkan

        return view('Admin.index', ['teachers' => $teachers]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update($id)
    {
        $teacher = Teacher::where('id', $id)->first();

        return view('Teacher.editTeacher', compact('teacher'));
    }

    public function updateStore(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            Rule::unique('teachers', 'nip')->ignore($id),
            'jenis_kelamin' => 'required',
            'nomor_handphone' => 'required|string',
        ], [
            'nip.unique' => 'NIP sudah digunakan.',
        ]);

        // Jika ID teacher disertakan, berarti ini adalah mode penyuntingan
        $teacher = Teacher::findOrFail($id);

        // Update data guru
        $teacher->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_handphone' => $request->nomor_handphone,
            'updated_at' => Date::now(),
            // Tambahkan atribut lain yang perlu diupdate
        ]);

        // Jika user terkait ada, update data user
        if ($teacher->user) {
            $teacher->user->update([
                'username' => Str::slug(Str::lower($request->name), '_'),
                'password' => Hash::make($request->nip),
                'role' => 'teacher',
                // Tambahkan atribut lain yang perlu diupdate pada user
            ]);
        }

        return redirect()->back()->withSuccess('Successfully Update!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function editPage()
    {
        $showTeacher = Teacher::where('id', $id)->first();

        return view('Admin.editTeacherPage', compact('showTeacher'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $product->delete();

        return redirect()->route('Admin.getAllTeacher')->with('success', 'Product deleted successfully');
    }
}
