<?php

namespace App\Http\Controllers;


use App\Models\Groupement;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //dd( Gate::allows('create-person'));
       $this->authorize('create-person');

       // $person = Person::find(20);

      
       // foreach ($person->simblings() as $key => $value) {
       //     # code...
       //   dump($value->first_name .' ' . $value->nombre_enfant_dirrect);
       // }

       // dump($person->findPersonWithMinChild()->toArray());
       // dump($person->simblings()->map->first_name);
       // dump($person->parentDirect()->first_name ?? "");

        return view('people.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('people.create');
    }

    public function memberListe()
    {
        return view('people.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }
}
