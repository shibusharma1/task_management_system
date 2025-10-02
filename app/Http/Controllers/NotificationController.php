<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    /**
     * Show notifications page.
     */
    public function index(Request $request)
    {
        // eager load related to avoid n+1 when morphTo resolves
        $notifications = $request->user()
            ->customNotifications()
            ->with('related') // load related model if exists
            ->paginate(20);

        return view('admin.notifications', compact('notifications'));
    }

    /**
     * Show single notification (JSON) — used for modal pop-up.
     */
    public function show(Request $request, $id): JsonResponse
    {
        $user = $request->user();

        $notification = Notification::where('id', $id)
            ->where('user_id', $user->id)
            ->with('related')
            ->first();

        if (! $notification) {
            return response()->json(['message' => 'Notification not found.'], 404);
        }

        // return structured data to frontend
        return response()->json([
            'id' => $notification->id,
            'title' => $notification->title,
            'message' => $notification->message,
            'extra_data' => $notification->extra_data ?? [],
            'is_read' => (bool) $notification->is_read,
            'created_at' => $notification->created_at->toDateTimeString(),
            'created_at_human' => $notification->created_at->diffForHumans(),
            'related_type' => $notification->related_type ? class_basename($notification->related_type) : null,
            'related_id' => $notification->related?->id ?? null,
            // optionally include a route for the related model if possible
            'related_route' => $this->resolveRelatedRoute($notification),
        ]);
    }

    /**
     * Mark a notification as read (POST).
     */
    public function markRead(Request $request, $id): JsonResponse
    {
        $user = $request->user();

        $notification = Notification::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        if (! $notification) {
            return response()->json(['message' => 'Notification not found.'], 404);
        }

        if (! $notification->is_read) {
            $notification->update([
                'is_read' => true,
                'read_at' => now(),
            ]);
        }

        return response()->json([
            'message' => 'Marked as read.',
            'id' => $notification->id,
        ]);
    }

    /**
     * Resolve related route (optional). Returns URL or null.
     */
    protected function resolveRelatedRoute(Notification $n): ?string
    {
        if (! $n->related) return null;

        $type = class_basename($n->related_type);

        try {
            switch ($type) {
                case 'Task':
                    return route('tasks.show', $n->related->id);
                case 'Project':
                    return route('projects.show', $n->related->id);
                case 'Comment':
                    // if you have comments.show
                    return route('comments.show', $n->related->id);
                default:
                    return null;
            }
        } catch (\Throwable $e) {
            Log::warning('Unable to build related route for notification id '.$n->id.': '.$e->getMessage());
            return null;
        }
    }
}
