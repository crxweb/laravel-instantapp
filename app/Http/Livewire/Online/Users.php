<?php

namespace App\Http\Livewire\Online;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Users extends Component
{
    public $identifier;
    public $render;

    public $users = [];
    
    protected function getListeners()
    {
        return [
            "echo-presence:online.{$this->identifier},here" => 'here',
            "echo-presence:online.{$this->identifier},joining" => 'joining',
            "echo-presence:online.{$this->identifier},leaving" => 'leaving',
        ];
    }

    public function mount($id, $render)
    {
        $this->identifier = $id;
        $this->render = $render;

    }

    public function here($users)
    {
       $this->users = $users;

    }

    public function joining($user)
    {
        if(! in_array($this->users, $user)){
            $current_route = Route::currentRouteName();
            $this->users[] = $user;
        }
    }

    public function leaving($user)
    {
        $this->users = collect($this->users)->whereNotIn('id', $user['id'])->toArray();
    }

    public function render()
    {
        return view('livewire.online.users');
    }
}
