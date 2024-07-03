<?php

namespace App\Policies;

use App\Models\Mailbox;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MailboxPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('MailboxRead');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Mailbox $mailbox): bool
    {
        return $user->hasPermissionTo('MailboxRead');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('MailboxCreate');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Mailbox $mailbox): bool
    {
        return $user->hasPermissionTo('MailboxUpdate');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Mailbox $mailbox): bool
    {
        return $user->hasPermissionTo('MailboxDelete');
    }

}
