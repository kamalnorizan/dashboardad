<?php

namespace App\Http\Controllers;

use App\User;
use App\Jawatan;
use App\Organisasi;
use App\Org_type;
use App\Negeri;
use Illuminate\Http\Request;
use Str;
use Mail;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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

        // $password = Str::random(8);
        $password = 'Peladang1$';

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
        $emailTo =  $request->email;
        $name =   $request->name;
        Mail::send('users.mail', compact('user','password'), function ($message) use ($emailTo, $name) {
            $message->from('dashboardaudit0@gmail.com', 'Admin');
            $message->to($emailTo, $name);
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
        //
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
        //
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
