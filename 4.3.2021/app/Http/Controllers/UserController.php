<?php

namespace App\Http\Controllers;

use App\User;
use App\Jawatan;
use App\Organisasi;
use App\Org_type;
use App\Negeri;
use Auth;
use Illuminate\Http\Request;
use Str;
use Mail;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::with('organisasi','jawatan')->whereHas('jawatan', function($query){
        //     $query->where('name','=','Eksekutif');
        // })->paginate(20);
        $users = User::with('organisasi','jawatan')->paginate(20);

        $role_opts = Role::pluck('name','id');

        return view('users.index',compact('users','role_opts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role_opts = Role::pluck('name','id');
        $titleOpts = Jawatan::pluck('name','id');
        // $orgOpts = Organisasi::pluck('name','id');
        $orgTypeOpts = Org_type::pluck('name','id');
        $stateOpts = Negeri::pluck('name','id');
        $stateOpts[0] = 'Sila pilih negeri';
        return view('users.create',compact('titleOpts','orgTypeOpts','stateOpts','role_opts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'          => 'required',
            'ic'            => 'required|max:12|unique:users',
            'phoneNum'      => 'required',
            'email'         => 'required|email|unique:users',
            'jawatan_id'    => 'required',
            'organisasi_id' => 'required',
        ]);

        $password = Str::random(8);
        $user = new User();
        $user->name = $request->name;
        $user->ic = $request->ic;
        $user->phoneNum = $request->phoneNum;
        $user->email = $request->email;
        $user->jawatan_id = $request->jawatan_id;
        $user->organisasi_id = $request->organisasi_id;
        $user->password = bcrypt($password);
        $user->save();

        $user->assignRole($request->role);

        Mail::send('users.mail', compact('user','password'), function ($message) {
            $message->from('john@johndoe.com', 'John Doe');
            $message->to('john@johndoe.com', 'John Doe');
            $message->subject('Pendaftaran sistem DashboardAd');
            $message->priority(3);
        });

        return redirect('/user');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role_opts = Role::pluck('name','id');
        $titleOpts = Jawatan::pluck('name','id');
        // $orgOpts = Organisasi::pluck('name','id');

        $orgTypeOpts = Organisasi::whereNull('negeri_id')->pluck('name','id');
        $orgTypeOpts[0]='Sila pilih jenis organisasi';
        if($user->organisasi->org_type_id==''){
            $selectedorganisasi = $user->organisasi->org_type_id;
            $selectednegeri = '';
            $stateOpts=[];
        }else{
            $selectedorganisasi = $user->organisasi->org_type_id;
            $selectednegeri = $user->organisasi->negeri_id;
            $stateOpts=$user->organisasi->org_type_id->negeri->pluck('name','id');
        }


        $stateOpts[0] = 'Sila pilih negeri';
        return view('users.edit',compact('user','titleOpts','orgTypeOpts','stateOpts','role_opts','selectedorganisasi','selectednegeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->name = $request->name;
        $user->ic = $request->ic;
        $user->phoneNum = $request->phoneNum;
        $user->email = $request->email;
        $user->jawatan_id = $request->jawatan_id;
        $user->org_type_id = $request->org_type_id;

        if(isset($request->organisasi)){
            $user->negeri_id = $request->negeri;
        }else{
            $user->org_type_id = $request->org_type_id;
        }

        $user->assignRole($request->input('roles'));
        $user->save();



        flash('Kemaskini maklumat Laporan Audit telah berjaya.')->success()->important();
        return redirect()->route('users.index',['User'=>$user->id]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function editprofile()
    {
        $role_opts = Role::pluck('name','id');
        $titleOpts = Jawatan::pluck('name','id');
        // $orgOpts = Organisasi::pluck('name','id');
        $orgTypeOpts = Org_type::pluck('name','id');
        $orgTypeOpts[0]='Sila pilih jenis organisasi';

        $stateOpts = Negeri::pluck('name','id');
        $stateOpts[0] = 'Sila pilih negeri';
        return view('profile.index')->with('user','titleOpts','orgTypeOpts','stateOpts','role_opts', auth()->user());
    }

    public function updateprofile(Request $request, User $user )
    {
        $request->validate([
            'name'          => 'required',
            'ic'            => 'required|max:12',
            'phoneNum'      => 'required',
            'email'         => 'required',


        ]);

        $user->update($request->all());


        flash('Profile Pengguna telah berjaya dikemaskini')->success()->important();
        return redirect()->back();

    }

    public function profile(User $user)
    {
       $user = User::find(Auth::user()->id);
       if ($user){
        return view('profile.index')->withUser($user);
       }else{
        return redirect()->back();
       }
    }

    public function editPassword(User $user)
    {
       if (Auth::user()){
            return view('profile.katalaluan')->withUser($user);
       }else{
        return redirect()->back();
       }
    }
    public function Updatepassword(Request $request, User $user)
    {

       $request->validate([
            'password'  => 'required|min:8',

        ]);
        $user->update($request->all());


        flash('Kata Laluan anda telah berjaya dikemaskini')->success()->important();
        return redirect()->back();

    }

    public function getOrg($id)
    {
        $organizations = Organisasi::where('org_type_id',$id)->get();
        return $organizations;
    }

    public function getOrgNegeri($id, $negeri)
    {
        $organizations = Organisasi::where('org_type_id',$id)->where('negeri_id',$negeri)->get();
        return $organizations;
    }

    public function revokeuserrole($role, User $user)
    {
        $user->removeRole($role);
        flash('Role pengguna berjaya di keluarkan')->success()->important();

        return back();
    }


}
