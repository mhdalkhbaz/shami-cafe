<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catogry;
use App\Student;
use App\Address;

class Students extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = Address::get();
        // $students = Address::with('students')->get();
        $students = Student::has('address')->get();
        // $students = Address::with('students')->get();


         return $students;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $catogris=Catogry ::get();
       return view('form',compact('catogris'));
    }


    public function store_One()
    {
    $students = new Student(['name' => 'A new student.']);

        $catogry = Catogry::find(1);

        $catogry->students()->save($students);
    }

    public function store_Many()
    {
    $catogry = Catogry::find(1);

    $catogry->students()->saveMany([
        new Student (['name' => 'A new csssdsomment.']),
        new Student (['name' => 'Another comment.']),


    ]);
    }

    public function store_Manys()
    {
    $catogry = Catogry::find(1);
        $student=['name' => 'booo.'];
        $catogry->students()->save($student);

        $catogry->refresh();

        // All comments, including the newly saved comment...
        $catogry->students;


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
