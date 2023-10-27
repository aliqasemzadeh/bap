<?php

namespace App\Livewire\App\Notification;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $notification;

    public function mount($notification)
    {
        $notification = Auth::user()->notifications()->findOrFail($notification);
        $notification->markAsRead();
        return redirect($notification->data['url']);
    }

}
