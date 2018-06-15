<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use Validator;
use Illuminate\Support\Facades\Input;
use Hash;
use Redirect;
use Session;
use App\Model\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function student_index()
    {
        $student = Student::all();
        return View::make('student_index',array('student' => $student));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function student_create()
    {
        return View::make ('student_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function user_create_process()
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:student',///mksd dia email x kn sma dri table student
            'phone' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',//dy akn sma dgn password ats
            );

        $validator = Validator::make(Input::all(),$rules);

        if($validator -> fails()){

            $messages = $validator->messages();
            
            return Redirect::to('student_create')///nama dlm roteu
            -> withErrors($validator)
            ->withInput (Input::except('password','c_password'));
        }
        else
        {
            $add = new Student;
            $add->name = Input::get('name');
            $add->email = Input::get('email');
            $add->phone = Input::get('phone');
            $add->password = Hash::make(Input::get('password'));

            $add->save();

            Session::flash('message','Successfully created user');
            return Redirect::to('student_create');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function student_show($id)
    {
        $student = Student::find($id);
        return View::make('student_show',array('student'=>$student));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function student_edit($id)
    {
        $student = Student::find($id);
        return View::make('student_edit',array('student'=>$student));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function student_edit_process($id)
    {
        $rules_edit = array(
            'name' => 'required',
            'email' => 'required',///mksd dia email x kn sma dri table student
            'password' => 'required',
            'c_password' => 'required|same:password',//dy akn sma dgn password ats
            );

         $validator = Validator::make(Input::all(),$rules_edit);

        if($validator -> fails()){

            $messages = $validator->messages();
            
            return Redirect::to('student_edit/'.$id)///nama dlm roteu
            -> withErrors($validator)
            ->withInput (Input::except('password','c_password'));
        }
        else
        {
            $edit =Student::find($id);
            $edit->name = Input::get('name');
            $edit->email = Input::get('email');
            $edit->password = Hash::make(Input::get('password'));

            $edit->save();

            Session::flash('message','Successfully Update student!');
            return Redirect::to('student_edit/'.$id);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function student_delete($id)
    {
        $student = Student::where('id',$id)->delete();

        Session::flash('message','Successfully Delete student!');
        return Redirect::to('student_index');
    }
}
