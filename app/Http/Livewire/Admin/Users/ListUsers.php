<?php

namespace App\Http\Livewire\Admin\Users;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class ListUsers extends AdminComponent
{
    public $state = [];
    public $editForm = false;
    public $user;
    public $deleteConfiremd;
  

   

    public function addnew()
    {
        $this->dispatchBrowserEvent('show-form');
        $this->editForm = false;
    }

    public function createUser()
    {
       $validatedDate = Validator::make($this->state, [
            'name' => "required",
            'email' => "required|email|unique:users",
            "password" => "required|confirmed",
        ])->validate();
        

        $validatedDate['password'] = bcrypt($validatedDate['password']);
        User::create($validatedDate);
        $this->dispatchBrowserEvent('hide-form', ['message' => 'User Adedd Successfully !']);
        return redirect()->back();

    }
    public function edit(User $user)
    {
        $this->dispatchBrowserEvent('show-form');
        $this->editForm = true;
        
        $this->state = $user->toArray();
        $this->user = $user;

    }
    public function updateUser()
    {
        $validatedDate = Validator::make($this->state, [
            'name' => "required",
            'email' => "required|email|unique:users,email,".$this->user->id,
            "password" => "sometimes|confirmed",
        ])->validate();
        
        if(!empty($validatedDate['password'])){

            $validatedDate['password'] = bcrypt($validatedDate['password']);
        }

        $this->user->update($validatedDate);
        $this->dispatchBrowserEvent('hide-form', ['message' => 'User Updated Successfully !']);
        

    }

// ///////// Delete Users from table .

    public function deleteUser($userId){
        $this->dispatchBrowserEvent('show-delete-confrmation');
        $this->deleteConfiremd = $userId;

    }

    public function confirmDelete(){
        $user = User::findOrFail($this->deleteConfiremd);
        $user->delete();

        $this->dispatchBrowserEvent('hide-delete-confrmation', ['message' => 'User Deleted Successfully !']);

    }



    public function render()
    {
        $users = User::latest()->paginate(2);
        return view('livewire.admin.users.list-users', [
            'users' => $users,
        ]);
    }
}
