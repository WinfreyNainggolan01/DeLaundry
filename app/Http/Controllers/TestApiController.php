<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Feedback;
use App\Models\Complaint;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestApiController extends Controller
{
    // Login
    public function loginApi(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        $admin = Admin::where('username', $credentials['username'])->first();
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            $token = $admin->createToken('AdminToken')->plainTextToken;
            return response()->json([
                'token' => $token,
                'role' => 'admin',
                'admin' => $admin,
            ]);
        }
        return response()->json(['message' => 'Username atau Password salah'], 401);
    }

    // Logout
    public function logoutApi(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout successfully',
        ]);
    }

    // Get All Feedbacks
    public function feedbacks()
    {
        $feedbacks = Feedback::all();
        return response()->json([
            'feedbacks'     => $feedbacks,
            'links'         => [
                'self' => route('api.feedbacks'),
            ]
        ]);
    }

    // Index Complaints
    public function complaints()
    {
        $complaints = Complaint::select('id', 'student_id', 'title', 'date_at', 'status', 'created_at')->get();
        return response()->json([
            'complaints'    => $complaints,
            'links'         => [
                'self' => route('api.complaints'),
            ]
        ]);
    }

    public function createFeedback(Request $request, $complaint_id)
    {
        $request->validate([
            'feedback_response' => 'required|string|max:255',
        ]);

        $complaint = Complaint::find($complaint_id);
        if (!$complaint) {
            return response()->json([
                'error' => 'Complaint not found',
                'links' => [
                    'self' => route('api.createFeedback', ['complaint_id' => $complaint_id]),
                    'complaints' => route('api.complaints'),
                ]
            ], 404);
        }
        $feedback = Feedback::create([
            'complaint_id'      => $complaint->id,
            'student_id'        => $complaint->student_id,
            'feedback_response' => $request->feedback_response,
            'status'            => 'resolved',
            'date_at'           => now()->format('Y-m-d'),
        ]);

        $complaint->update([
            'status' => 'responded',
        ]);

        return response()->json([
            'message'   => 'Feedback created successfully',
            'feedback'  => $feedback,
            'links' => [
                'update'    => route('api.updateFeedback', ['id' => $feedback->id]),
                'delete'    => route('api.deleteFeedback', ['id' => $feedback->id]),
                'student'   => route('api.student.show', ['id' => $complaint->student_id]),
                'complaint' => route('api.complaint.show', ['id' => $complaint->id]),
            ]
        ], 201);
    }

    // Update Feedback
    public function updateFeedback(Request $request, $id)
    {
        $request->validate([
            'feedback_response' => 'required|string|max:255',
        ]);

        $feedback = Feedback::find($id);
        if (!$feedback) {
            return response()->json([
                'error' => 'Feedback not found',
                'links' => [
                    'self' => route('api.updateFeedback', ['id' => $id]),
                    'feedbacks' => route('api.feedbacks'),
                ]
            ], 404);
        }

        $feedback->update([
            'feedback_response' => $request->feedback_response,
            'status'            => 'resolved',
            'date_at'           => now()->format('Y-m-d'),
        ]);

        return response()->json([
            'message'   => 'Feedback updated successfully',
            'feedback'  => $feedback,
            'links' => [
                'self'      => route('api.updateFeedback', ['id' => $id]),
                'feedbacks' => route('api.feedbacks'),
                'delete'    => route('api.deleteFeedback', ['id' => $feedback->id]),
            ]
        ], 200);
    }

    // Delete Feedback
    public function deleteFeedback($id)
    {
        $feedback = Feedback::find($id);
        if (!$feedback) {
            return response()->json([
                'error' => 'Feedback not found',
                'links' => [
                    'self' => route('api.deleteFeedback', ['id' => $id]),
                    'feedbacks' => route('api.feedbacks'),
                ]
            ], 404);
        }

        $feedback->delete();

        return response()->json([
            'message' => 'Feedback deleted successfully',
            'links' => [
                'self' => route('api.deleteFeedback', ['id' => $id]),
                'feedbacks' => route('api.feedbacks'),
            ]
        ], 200);
    }

    // Show Complaint
    public function showComplaint($id)
    {
        $complaint = Complaint::findOrFail($id);
        return response()->json([
            'complaint' => $complaint,
        ]);
    }

    // Show Student
    public function showStudent($id)
    {
        $student = Student::findOrFail($id);
        return response()->json([
            'student' => $student,
        ]);
    }
} 
