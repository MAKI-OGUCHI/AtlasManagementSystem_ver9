<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Hash;
use DB;

use App\Models\Users\Subjects;
use App\Models\Users\User;

class RegisteredUserController extends Controller
{
    public function create()
    {
        $subjects = Subjects::all();
        return view('auth.register.register', compact('subjects'));
    }

    public function store(PostRequest $request)
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {

            // 生年月日（PostRequestでcheckdate済み）
            $birth_day = sprintf(
                '%04d-%02d-%02d',
                $validated['old_year'],
                $validated['old_month'],
                $validated['old_day']
            );

            $user = User::create([
                'over_name'       => $validated['over_name'],
                'under_name'      => $validated['under_name'],
                'over_name_kana'  => $validated['over_name_kana'],
                'under_name_kana' => $validated['under_name_kana'],
                'mail_address'    => $validated['mail_address'],
                'sex'             => $validated['sex'],
                'birth_day'       => $birth_day,
                'role'            => $validated['role'],
                'password'        => Hash::make($validated['password']),
            ]);

            if ($validated['role'] == 4 && $request->filled('subject')) {
                $user->subjects()->attach($request->subject);
            }

            DB::commit();
            return view('auth.login.login');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => '登録に失敗しました。'])->withInput();
        }
    }
}
