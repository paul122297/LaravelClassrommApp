<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use App\Http\Requests\DocumentRequest;
use App\Http\Requests\GradeRequest;
use Auth;
use Response;

class DocumentController extends Controller
{
    public function store(DocumentRequest $request)
    {

        if($request->hasFile('document')){
            //Get filename with the extension
            //$filenameWithExt = $request->file('template')->getClientOriginalName();
            $filenameWithExt = $request->filename;
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('document')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('document')->storeAs('public/documents', $fileNameToStore);
            //$path = Storage::putFileAs('template', new File('storage/documents/templates/'), $fileNameToStore);
        } else {
            $fileNameToStore = null;
        }

        $doc = new Document;
        $doc->user_id = Auth::user()->id;
        $doc->filename = $request->filename;
        $doc->notes = $request->notes;
        $doc->document = $fileNameToStore;
        $doc->save();

        return redirect('home')->with('success', 'Your project has been successfully uploaded');
    }

    public function grade(GradeRequest $request, $id)
    {

        $doc = Document::find($id);
        $doc->grade = $request->grade;
        $doc->save();

        $name = $doc->user->name;

        return redirect('home')->with('success', $name."'s project has been successfully graded");
    }

    public function preview($filename)
    {
        //$filename = 'test.pdf';
        $path = storage_path('app/public/documents/'.$filename);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }
}
