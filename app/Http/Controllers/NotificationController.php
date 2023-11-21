<?php

namespace App\Http\Controllers;

use App\Models\GeneralNotification;
use App\Models\GeneralNotificationPeople;
use App\Models\Parents;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('generalNotification.send');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $notification = GeneralNotification::all();
        return view('generalNotification.history', compact('notification'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        // dd($data['subject']);
        $notification = GeneralNotification::create([
            'subject' => $data['subject'],
            'message' => $data['message']
        ]);
        if ($data['checkbox']) {

            foreach ($data['checkbox'] as $key => $value) {
                GeneralNotificationPeople::create([
                    'general_notification_id' => $notification->id,
                    'name' => $data['name'][$key],
                    'type' => $data['type'][$key]
                ]);
                Mail::send('notification.enquiry', ['template' => $data['message']], function ($message) use ($data, $key) {
                    $message->to($data['email'][$key]);
                    $message->subject($data['subject']);
                });
            }
            return redirect()->back()->with('success', 'Notification Send Successfully.');
        } else {
            return redirect()->back()->with('error', 'Please Select At Least One Person To Notify.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getPeople($id)
    {
        $data = array();
        $string = '';
        if ($id == 1) {
            $staff = Staff::all();
            foreach ($staff as $key => $value) {
                $string .=  '<tr>
                <td><input type="checkbox"
                            name="checkbox[]"
                            value="' . $value->id . '"
                            id=""
                            class="checkbox">
                            <input type="hidden" name="email[]" value="' . $value->email . '">
                            <input type="hidden" name="name[]" value="' . $value->name . '">
                            <input type="hidden" name="type[]" value="Staff">
                            </td>
                <td>' . $value->name . '</td>
                <td>Staff</td>
                </tr>
            ';
            }
            $parent = Parents::all();
            foreach ($parent as $key => $value) {
                $string .=  '<tr>
                <td><input type="checkbox"
                            name="checkbox[]"
                            value="' . $value->id . '"
                            id=""
                            class="checkbox">
                            <input type="hidden" name="name[]" value="' . $value->name() . '">
                            <input type="hidden" name="type[]" value="Parent">
                            <input type="hidden" name="email[]" value="' . $value->email . '">
                            </td>
                            <td>' . $value->name() . '</td>
                            <td>Parent</td>
                            </tr>
                            ';
            }
        } else if ($id == 2) {
            $data = Staff::all();
            foreach ($data as $key => $value) {
                $string .=  '<tr>
                <td><input type="checkbox"
                name="checkbox[]"
                value="' . $value->id . '"
                id=""
                class="checkbox">
                <input type="hidden" name="name[]" value="' . $value->name . '">
                <input type="hidden" name="type[]" value="Staff">
                <input type="hidden" name="email[]" value="' . $value->email . '">
                </td>
                <td>' . $value->name . '</td>
                <td>Staff</td>
                </tr>
            ';
            }
        } else if ($id == 3) {
            $data = Parents::all();
            foreach ($data as $key => $value) {
                $string .=  '<tr>
                <td><input type="checkbox"
                            name="checkbox[]"
                            value="' . $value->id . '"
                            id=""
                            class="checkbox">
                            <input type="hidden" name="email[]" value="' . $value->email . '">
                            <input type="hidden" name="name[]" value="' . $value->name() . '">
                            <input type="hidden" name="type[]" value="Parent">
                            </td>
                <td>' . $value->name() . '</td>
                <td>Parent</td>
                </tr>
            ';
            }
        }
        return response()->json([
            'html' => $string
        ]);
    }
}
