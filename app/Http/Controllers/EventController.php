<?php

namespace App\Http\Controllers;

use Toastr;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Events;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Events::sortable()->get();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        //
        $validated = $request->validated();
        $events = Events::create($validated);
        Toastr::success('Event Created Successfully', 'Sucess');
        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Events $event)
    {
        //
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Events $event)
    {
        //
        $validated = $request->validated();
        $events = Events::where('id', '=', $event->id)->first();
        $events->title = $request->title;
        $events->description = $request->description;
        $events->start_date = $request->start_date;
        $events->end_date = $request->end_date;
        $input = $request->all();
        $event->update($input);
        Toastr::success('Event Edited Successfully', 'Sucess');
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroye($id)
    {
        //
        $event =  Events::find($id);
        $event->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}
