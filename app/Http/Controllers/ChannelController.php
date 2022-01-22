<?php

namespace App\Http\Controllers;

use App\Http\Requests\Channels\UpdateChannelRequest;
use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only('update');
    }

    public function show(Channel $channel)
    {
        return view('channels.show', compact('channel'));
    }

    public function update(UpdateChannelRequest $request, Channel $channel)
    {
        if ($request->hasFile('image')) {
            $channel->clearMediaCollection('images');
            $channel->addMediaFromRequest('image')->toMediaCollection('images');
        }
        $channel->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->back();
    }
}
