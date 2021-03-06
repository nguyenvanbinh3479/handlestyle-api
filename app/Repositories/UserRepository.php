<?php

namespace App\Repositories;

use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\DataResource;

class UserRepository
{
    /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function collection($entries, $sort)
    {
        // Return collection of objects as a resource
        return UserResource::collection(User::orderBy('id', $sort)->paginate($entries));
    }

    /**
     * Get search of the objects for a given model.
     *
     * @return Collection
     */
    public function collectionSearch($entries, $searchText, $sort)
    {
        $query = User::where('id', $searchText)
                     ->orWhere('username', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('email', 'LIKE', '%'.$searchText.'%');
        // Return collection of objects as a resource
        return UserResource::collection($query->orderBy('id', $sort)->paginate($entries));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Return object
        return new UserResource(User::findOrFail($id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        // Return object
        return new UserResource(User::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $request | $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['username','email','password','active', 'role_id']));
        // Return object
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->delete();
      return response()->json(null, 204);
    }
}
