<?php

namespace App\Http\Controllers;

use App\UserPermission;
use Illuminate\Http\Request;

class UserPermissionController extends Controller
{	

	private function validator(Request $request)
	{
	  // validation rules.
	  $rules = array(
		 'desc_permission' => 'required|string|max:255',
	  );
 
	  // custom validation error messages.
	  $messages = array(
			'desc_permission.required' => 'Por favor informe o tipo de permissão do usuário.'
	  );
 
	  $labels = array(
		 "desc_permission" => "desc_permission",
	  );
 
	  // validate the request.
	  $request->validate($rules, $messages, $labels);
	}

	public function users()
	{
	  return $this->hasMany('App\User', 'user_id');
	}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = UserPermission::get();
    	return view('userPermission.index', array('items' => $items));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		//return view('userPermission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserPermission  $userPermission
     * @return \Illuminate\Http\Response
     */
    public function show(UserPermission $userPermission)
    {
		//return view('userPermission.show', ['userPermission' => $userPermission]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserPermission  $userPermission
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPermission $userPermission)
    {
      //return view('userPermission.edit', ['userPermission' => $userPermission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserPermission  $userPermission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPermission $userPermission)
    {
		/*$this->validator($request);

		$userPermission->desc_permission = $request->desc_permission;
		$userPermission->save();
  
		return redirect()
		  ->route('userPermission.index')
		  ->with('success', 'Permissão alterada com sucesso!');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserPermission  $userPermission
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPermission $userPermission)
    {
		/*$userPermission->delete();

		return redirect()
		  ->route('userPermission.index')
		  ->with('success', 'Permissão deletada com sucesso!');*/
    }
}
