<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileHeader extends Component
{
    public \App\Models\User $user;
    public $posts;

    /**
     * Create a new component instance.
     */
    public function __construct(\App\Models\User $user, $posts)
    {
        $this->user = $user;
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profile-header');
    }
}
