<?php

/**
 *
 *   Author: Anass BOUTAKAOUA
 *   URI: https://github.com/soyamore
 *   Email: anass@itcours.com
 *
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( ! auth()->user()->isAdmin())
        {
            return redirect()->route('quizzes.index');
        }

        $users = User::all();

        return view('users.index', compact('users'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'password' => bcrypt($request->get('password'))
        ]);

        $data = $request->all();

        if($request->hasFile('cv') && $request->file('cv')->isValid()){
            $file = Request::file('cv');
            $cv = time()."-".$file->getClientOriginalName();
            $file->move('uploads/resumes', $cv);

            $data['cv'] = 'uploads/resumes/'. $cv;
        }

        dd(); die;

        User::create($data);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     * @internal param int $id
     */
    public function edit(User $user)
    {

        return view('users.form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param User $user
     * @return Response
     * @internal param int $id
     */
    public function update(Request $request, User $user)
    {

        $data = $request->all();
        if($request->hasFile('cv')){
            $file = $request->file('cv');
            $cv = time()."-".$file->getClientOriginalName();
            $file->move('uploads/resumes', $cv);

            $data['cv'] = 'uploads/resumes/'. $cv;
        }


        if ($request->get('password', false))
        {
            $request->merge([
                'password' => bcrypt($request->get('password')),
            ]);

            $user->update($request->all());
        }
        else
        {
            $user->update($request->except(['password']));
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     * @internal param int $id
     */
    public function destroy($user)
    {

        $user->delete();

        return redirect()->route('users.index');
    }
}
