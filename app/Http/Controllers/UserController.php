<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::select('*');

        if(!empty($request->search)){
            $searchFields = ['email','geo', 'votes'];
            $users->where(function($query) use($request, $searchFields){
                $searchWildcard = '%' . $request->search . '%';
                foreach($searchFields as $field){
                    $query->orWhere($field, 'LIKE', $searchWildcard);
                }
            });
        }

        $fields = ['active', 'banned', 'notifable_email', 'email', 'email_verified_at', 'avatar', 'votes', 'steam_id', 'facebook_id', 'google_id', 'geo', 'lang', 'votes', 'ref_status'];
        foreach($fields as $field){
            if(!empty($request->$field)){
                $users->where($field, '=', $request->$field);
            }
        }

        if (!empty($request->sort_by)) {
            if (!empty($request->order) && $request->order=='desc') {
                $users->orderBy($request->sort_by, 'desc');
            } else {
                $users->orderBy($request->sort_by);
            }
        }
        return $users->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User($request->all());
        return $user->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
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
        return $user->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return $user->delete();
    }
}
