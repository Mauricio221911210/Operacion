<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{
    use AuthorizesRequests;

    public $course, $current;

    public function mount(Course $course){
        $this->course = $course;

        foreach ($course->lessons as $lesson){
            if(!$lesson->completed){
                $this->current = $lesson;

                break;                           
            }

        }

        if(!$this->current) {
          $this->current = $course->lessons->last();
        }

        $this->authorize('enrolled', $course);

    }

    public function render()
    {
        return view('livewire.course-status');
    }

    //Metodos

    public function changeLesson(Lesson $lesson){
        $this->current = $lesson;
       /* $this->index = $this->course->lessons->search($lesson); */
    }

    public function completed(){
        if($this->current->completed){
            //Eliminar Registro
            $this->current->user()->detach(auth()->user()->id);
        }else{
            //Agregar Registro
            $this->current->user()->attach(auth()->user()->id);
        }

        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    //Propiedades Computadas 

    public function getIndexProperty(){
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty(){
        if($this->index ==0){
            return null;
    
           }else{
            return $this->course->lessons[$this->index - 1 ];
           }
    }

    public function getNextProperty(){
        if($this->index == $this->course->lessons->count() - 1 ){
            return  null;
           }else {
            return $this->course->lessons[$this->index + 1 ];
           }
    }

    public function getAdvanceProperty(){
        $i = 0; 

        foreach ($this->course->lessons as $lesson) {
           if ($lesson->completed) {
                $i++;
           }
        }

        $advance = ($i * 100)/($this->course->lessons->count());

        return round($advance, 2) ;
    }
}