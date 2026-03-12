<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AgentApprovalController extends Controller
{
    public function update(User $user, string $status)
    {
        abort_unless(in_array($status, ['approved', 'rejected'], true), 422);

        $user->update([
            'agent_status' => $status,
            'approved_at' => $status === 'approved' ? now() : null,
        ]);

        return back()->with('status', "Agent {$status} successfully.");
    }
}
