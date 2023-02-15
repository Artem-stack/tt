<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\PostFormRequest;
use Validator;
use App\Http\Requests;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $position = Position::all();
        $users = User::orderBy("created_at", "DESC")->paginate(10);
     
        return view("admin.users.users", [
            "position" => $position,
            "users" => $users,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $query = $request->get('query');
        $position = Position::all();
        $users = User::all(); 
   
       return view("admin.users.create",[
        "users" => $users,
        "position" => $position
       ]);
    }
        public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = User::where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|regex:/^(\+38)([0-9\s\-\+\(\)]*)$/|min:10',
            'head' => 'required|max:255|exists:users,name',
            'position_id' => 'required',
            'admin_updated_id' => 'required',
            'admin_created_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5mb|dimensions:min_width=300,min_height=300',
            'salary' => 'required|numeric|min:0|max:500000',
            'created_at' => 'required',
    ]);
       $data = $request->validated();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }
        User::create($data);

        return redirect(route("admin.users.users"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $position = Position::all();
       $user = User::findOrFail($id);

        return view("admin.users.create", [
            'user' => $user,
            'position' => $position,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->validated());

        return redirect(route("admin.users.users"));
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function destroy($id)
    {
        User::destroy($id);

        return redirect(route("admin.users.users"));
    }
}
