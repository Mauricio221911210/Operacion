<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedArchive;
use App\Mail\RejectArchive;


class CourseController extends Controller
{
    public function index(){

        $courses = Course::where('status', 2)->paginate();

        return view('admin.courses.index', compact('courses'));
    }

    public function show(Course $course){
    
        $this->authorize('revision', $course);
    
        return view('admin.courses.show', compact('course'));
    }

    public function approved(Course $course){

        $this->authorize('revision', $course);

        if(!$course->lessons || !$course->goals || !$course->requirements){
            return back()->with('info', 'No se puede publicar el Archivo INCOMPLETO');
        }

        $course->status = 3;
        $course->save();

        //Envio de Correo Electronico 
        $mail = new ApprovedArchive($course);

        Mail::to($course->teacher->email)->send($mail);
        
        //Poner los email en cola 
       // Mail::to($course->teacher->email)->queue($mail);


        return redirect()->route('admin.courses.index')->with('info', 'El archivo se publico con éxito');
    }

    public function observation(Course $course){
        return view('admin.courses.observation', compact('course'));
    }

    public function reject(Request $request, Course $course){
        
        $request->validate([
            'body' => 'required',
        ]);
        
        $course->observation()->create($request->all());
        
        $course->status = 1;
        $course->save();


        //Envio de correo Rechazo
        $mail = new RejectArchive($course);

        Mail::to($course->teacher->email)->send($mail);
   
        return redirect()->route('admin.courses.index')->with('info', 'El archivo se rechazo con éxito');

    }
}
