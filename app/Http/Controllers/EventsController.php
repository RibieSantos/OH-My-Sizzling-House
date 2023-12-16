<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function show(){
        $events = Events::all();
        return view("admin.events",['event'=>$events]);
    }
    public function create(){
        return view("admin.events.addEvent");
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'event_image' => 'required|file',
            'event_title' => 'required|string',
            'event_description' => 'required|string',
            'discount' => 'required|decimal:2,4',
            'event_status' => 'required|string',
        ]);

        // Uploading event Image
        $filename = '';

        if ($request->hasFile('event_image')) {
            $filename = $request->getSchemeAndHttpHost() . '/assets/event/' . time() . '.' . $request->event_image->extension();
            $request->event_image->move(public_path('assets/event/'), $filename);
        }
       

        $newevent = Events::create([
            'event_img' => $filename,
            'event_title' => $request->event_title,
            'event_desc' => $request->event_description,
            'discount' => $request->discount,
            'event_status' => $request->event_status,
        ]);
        return redirect(route('admin.events'))->with('success', 'Event item is successfully added!');
    }
    public function edit(Events $id)
    {
        return view('admin.events.editEvent',['event'=>$id]);
    }
    public function update(Events $id, Request $request)
    {
        $data = $request->validate([
            'event_title' => 'required|string',
            'event_description' => 'required|string',
            'discount' => 'required|decimal:2,4',
            'event_status' => 'required|string',
        ]);

        // Check if a new event_image was uploaded
        if ($request->hasFile('event_image')) {
            // Delete the previous event image
            if ($id->event_img) {
                // Remove the scheme and host from the event image URL
                $previousImage = str_replace($request->getSchemeAndHttpHost(), '', $id->event_img);
                // Delete the previous image file
                if (file_exists(public_path($previousImage))) {
                    unlink(public_path($previousImage));
                }
            }

            // Upload the new event image
            $filename = $request->getSchemeAndHttpHost() . '/assets/foods/' . time() . '.' . $request->event_image->extension();
            $request->event_image->move(public_path('assets/foods/'), $filename);
            $data['event_img'] = $filename;
        }

        $id->update($data);
        return redirect(route('admin.events'))->with('success', 'Event item is successfully updated!');
    }
    public function destroy(Events $id)
    {
        $id->delete();
        return redirect(route('admin.events'))->with('success', 'Event item is successfully deleted!');
    }
}
