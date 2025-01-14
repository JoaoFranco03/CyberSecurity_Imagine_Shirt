<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->user_type == 'A';
    }

    public function markAsPaid(User $user, Order $order): bool
    {
        return ($user->user_type == 'A' || $user->user_type == 'E') && $order->status == "pending" && $order->status != "canceled" ;
    }

    public function markAsClosed(User $user, Order $order): bool
    {
        return (($user->user_type == 'A' || $user->user_type == 'E') && $order->status == "paid") && $order->status != "canceled";
    }

    public function cancel(User $user, Order $order): bool
    {
        return $user->user_type == 'A' && $order->status != "closed" && $order->status != "canceled";
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Order $order): bool
    {
        dd($user->user_type == 'C' && $user->id == $order->customer_id);
        return ($user->user_type == 'C' && $user->id == $order->customer_id) || $user->user_type == 'A' || ($user->user_type == 'E' && ($order->status == "paid" || $order->status == "pending"));
    }

    public function viewInvoice(User $user, Order $order): bool
    {
        return ($user->user_type == 'C' && $user->id == $order->customer_id) || $user->user_type == 'A';
    }


    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
       return $user->user_type == 'C';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Order $order): bool
    {
        return $user->user_type == 'A' || ($user->user_type == 'E' && ($order->status == "paid" || $order->status == "pending"));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Order $order): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Order $order): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Order $order): bool
    {
        return false;
    }
}
