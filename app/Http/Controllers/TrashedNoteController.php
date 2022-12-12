<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashedNoteController extends Controller
{
    //
    public function index( )
    {
        # code...
        $notes = Note::whereBelongsTo(Auth::user())->onlyTrashed()->latest()->paginate('5');
        return view('notes.index')->with('notes',$notes);
        
    }

    public function show(Note $note)
    {
      
        if(!$note->user->is(Auth::user()))
            return abort(403);
        
        return view('notes.show')->with('note', $note);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
      #  if($note->user_id != Auth::id())
      if(!$note->user->is(Auth::user()))
            return abort(403);

            
 
        // Note::update([  
        //     'title'=>$request->title,
        //     'text'=>$request->text
        // ]);

        $note->restore();
        return to_route('notes.show',$note)->with('success',"Note restored successfully.");
    }


        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    #    if($note->user_id != Auth::id())
        if(!$note->user->is(Auth::user()))
        return abort(403);

        $note->forceDelete();

        return to_route('notes.index')->with('success','Note deleted Forever.');

    }
}
