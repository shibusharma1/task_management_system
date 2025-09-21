<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $logs = AuditLog::with('user')
            ->when($search, function ($query) use ($search) {
                $query->where('action', 'like', "%$search%")
                      ->orWhere('auditable_type', 'like', "%$search%")
                      ->orWhere('ip_address', 'like', "%$search%")
                      ->orWhereHas('user', function ($q) use ($search) {
                          $q->where('name', 'like', "%$search%");
                      });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.audit_logs.index', compact('logs', 'search'));
    }
}
