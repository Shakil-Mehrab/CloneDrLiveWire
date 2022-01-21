<?php

namespace App\Http\Livewire\Notifications;

use Livewire\Component;

class NotificationDropdownItem extends Component
{
    public $notification;

    public function markAsRead()
    {
        $this->notification->markAsRead();

        $this->emitTo('notifications.notification-dropdown-list', '$refresh');
    }

    public function mount($notification)
    {
        $this->notification = $notification;
    }

    public function render()
    {
        return view('livewire.notifications.notification-dropdown-item');
    }
}