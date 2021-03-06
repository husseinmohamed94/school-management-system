<?php

namespace App\Http\Controllers\Section;
use  App\Http\Controllers\Controller;

use App\Http\Requests\storeSection;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $grades = Grade::with(['Section'])->get();
      $List_grades = Grade::all();
      $teachers = Teacher::all();
      return view('pages.Section.index',compact('grades','List_grades','teachers'));



  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(storeSection $request)
  {
      try {
          $validated = $request->validated();
          $sections = new Section();
          $sections->Name_section = ['ar' => $request->Name_section_ar, 'en' => $request->Name_section_en];
          $sections->Grade_id = $request->Grade_id;
          $sections->class_id = $request->Class_id;
          $sections->Status = 1;
          $sections->save();
          $sections->Teachers()->attach($request->teacher_id);

          toastr()->success(trans('messages.success'));
          return redirect()->route('Section.index');
      } catch (\Exception $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);

      }
  }

  public function show($id)
  {

  }


  public function edit($id)
  {

  }


  public function update(storeSection $request)
  {
      try {


          $validated = $request->validated();
          $Sections = Section::findOrFail($request->id);

          $Sections->Name_section = ['ar' => $request->Name_section_ar, 'en' => $request->Name_section_en];
          $Sections->Grade_id = $request->Grade_id;
          $Sections->class_id = $request->Class_id;

          if(isset($request->Status)) {
              $Sections->Status = 1;
          } else {
              $Sections->Status = 2;
          }


       // update pivot tABLE
          if (isset($request->teacher_id)) {
              $Sections->teachers()->sync($request->teacher_id);
          } else {
              $Sections->teachers()->sync(array());
          }


         $Sections->save();
          toastr()->success(trans('messages.Update'));

          return redirect()->route('Section.index');
      }
      catch
      (\Exception $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
      Section::findOrFail($request->id)->delete();
      toastr()->error(trans('messages.Delete'));
      return redirect()->route('Section.index');

  }

  public  function getclasses($id){
            $list_classes= Classroom::where("Grade_id",$id)->pluck("Name_class","id");

            return $list_classes;
  }
}

?>
