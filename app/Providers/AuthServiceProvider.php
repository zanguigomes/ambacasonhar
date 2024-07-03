<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Document;
use App\Models\FilamentException;
use App\Models\Gallery;
use App\Models\Mailbox;
use App\Models\Page;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use App\Policies\DocumentPolicy;
use App\Policies\FilamentExceptionPolicy;
use App\Policies\GalleryPolicy;
use App\Policies\MailboxPolicy;
use App\Policies\PagePolicy;
use App\Policies\PermissionPolicy;
use App\Policies\PostPolicy;
use App\Policies\ProjectPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Permission::class => PermissionPolicy::class,
        Post::class => PostPolicy::class,
        Page::class => PagePolicy::class,
        Project::class => ProjectPolicy::class,
        Document::class => DocumentPolicy::class,
        Gallery::class => GalleryPolicy::class,
        FilamentException::class => FilamentExceptionPolicy::class,
        Mailbox::class => MailboxPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
