<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
// use DB - only use this if you want to code like sql

Class UserController extends Controller {
    use ApiResponser;

private $request;
public function __construct(Request $request){
$this->request = $request;
}
    public function getUsers(){
        $users = User::all();
        // return response()->json($users, 200);
        return $this->successResponse($users);
    }
    public function show($id)
    { 
        $user = User::findOrFail($id);
        // $user = User::where('id', $id)->first();
        // return User::where('id','like','%'.$id.'%')->get();
        // if($user){
            return $this->successResponse($user);
            /*}
            else{
                return $this->errorResponse('User ID Does Not Exists', 
                Response::HTTP_NOT_FOUND);
            }*/
    }
    public function add(Request $request ){
        $rules = [
        'firstName' => 'required|max:20',
        'lastName' => 'required|max:20',
        ];
        $this->validate($request,$rules);
        $user = User::create($request->all());
        return $this->successResponse($user, Response::HTTP_CREATED);
        
}
    public function update(Request $request,$id)
    {
    $rules = [
    'firstName' => 'max:20',
    'lastName' => 'max:20',
    ];
    $this->validate($request, $rules);
    $user = User::findOrFail($id);
    $user->fill($request->all());

    // if no changes happen
    if ($user->isClean()) {
    return $this->errorResponse('At least one value must change', 
    Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    $user->save();
    return $this->successResponse($user);
}
    public function delete($id)
    {
    $user = User::findOrFail($id);
    $user->delete();
    return $this->successResponse($user);
 
    // old code
    /*
    $user = User::where('userid', $id)->first();
    if($user){
    $user->delete();
    return $this->successResponse($user);
    }
    {
    return $this->errorResponse('User ID Does Not Exists',
    Response::HTTP_NOT_FOUND);
    }
    */
    }
}

//website
//https://dev.to/tanzimibthesam/making-api-crud-create-read-update-delete-with-laravel-8-n-api-authentication-with-sanctum-19oh