<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->roles == 'Dewa') {
            $users = User::with('roles')->get();
        }else
        {
            $users = User::whereDoesntHave('roles',function($query){$query->where('name',['Dewa','Admin']);})->get();
        }

        return view('users.index',['users' => $users]);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'profil_pic.*' => 'mimes:jpg,jpeg,png|max:5000'
        ]);
        
        if ($request->hasFile('profil')) 
        {
            $file = $request->file('profil');
            $fileName = $request->name .'.'.$file->getClientOriginalExtension();
            $path = $file->move('profil_pic',$fileName);

            $user = new User;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->email_verified_at = now();
            $user->profile_pic_path = $path;
            $user->password = Hash::make('JpGJaya2323sss');
            $saveUser = $user->save();

            $roling = $user->assignRole($request->roles);
                    
            if ($roling->exists == true) {
                return redirect()->route('users.index')->with('success','User'.$request->username.' Berhasil Ditambahkan');
            }
            else
            {
                return redirect()->route('users.index')->with('error','User Gagal Ditambahkan Ada Kesalahan Pada Sistem');
            }

        }
        else
        {
            $user = new User;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->email_verified_at = now();
            $user->profile_pic_path = null;
            $user->password = Hash::make('JpGJaya2323sss');
            $saveUser = $user->save();

            $roling = $user->assignRole($request->roles);

                    
            if ($roling->exists == true) {
                return redirect()->route('users.index')->with('success','User'.$request->username.' Berhasil Diupdate');
            }
            else
            {
                return redirect()->route('users.index')->with('error','User Gagal Diupdate Ada Kesalahan Pada Sistem');
            }
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->email = $request->email;

        if ($request->hasFile('profil')) 
        {
            if (File::exists($user->profile_pic_path) ==  true) {
                File::delete($user->profile_pic_path);

                $file = $request->file('profil');
                $fileName = $request->name .'.'.$file->getClientOriginalExtension();
                $path = $file->move('profil_pic',$fileName);
    
                $user->name = $request->name;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->profile_pic_path = $path;
                $saveUser = $user->save();
    
                $roling = $user->assignRole($request->roles);
                        
                if ($roling->exists == true) {
                    return redirect()->route('users.index')->with('success','User'.$request->username.' Berhasil Di Update');
                }
                else
                {
                    return redirect()->route('users.index')->with('error','User Gagal Diupdate Ada Kesalahan Pada Sistem');
                }
            }
            else
            {
                $file = $request->file('profil');
                $fileName = $request->name .'.'.$file->getClientOriginalExtension();
                $path = $file->move('profil_pic',$fileName);
    
                $user->name = $request->name;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->profile_pic_path = $path;
                $saveUser = $user->save();
    
                $roling = $user->assignRole($request->roles);
                        
                if ($roling->exists == true) {
                    return redirect()->route('users.index')->with('success','User'.$request->username.' Berhasil Diupdate');
                }
                else
                {
                    return redirect()->route('users.index')->with('error','User Gagal Diupdate Ada Kesalahan Pada Sistem');
                }
            }

        }
        else
        {
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->profile_pic_path = null;
            $saveUser = $user->save();

            $roling = $user->assignRole($request->roles);

                    
            if ($roling->exists == true) {
                return redirect()->route('users.index')->with('success','User'.$request->username.' Berhasil Diupdate');
            }
            else
            {
                return redirect()->route('users.index')->with('error','User Gagal Diupdate Ada Kesalahan Pada Sistem');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $destroy = $user->delete();

        if ($destroy == true) {
            return redirect()->route('users.index')->with('success','User '.$user->username.' Berhasil DiHapus');
        }
        else
        {
            return redirect()->route('users.index')->with('error','User Gagal Dihapus Ada Kesalahan Pada Sistem');
        }
    }
}
