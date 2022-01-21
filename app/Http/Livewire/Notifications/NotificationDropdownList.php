<?php

namespace App\Http\Livewire\Notifications;

use Livewire\Component;

class NotificationDropdownList extends Component
{
    protected $listeners = [
        '$refresh'
    ];

    public function notifications()
    {
        return auth()->user()->notifications()->take(10)->get();
    }

    public function render()
    {
        return view('livewire.notifications.notification-dropdown-list');
    }
}