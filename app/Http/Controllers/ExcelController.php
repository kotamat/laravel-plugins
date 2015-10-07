<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = \Excel::load(storage_path('exports'). '/test.csv', function($reader) {
        })->all();
        return json_encode($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \Excel::create('test', function($excel) {
            $excel->setTitle('test excel');

            $excel->setCreator('kotamat')
                ->setCompany('A+');

            $excel->setDescription('test description');

            $excel->sheet('sheet1', function($sheet) {
                /*
                $sheet->row(1, ['attr1', 'attr2']);
                $sheet->row(2, ['test1', 'test2']);
                */
                $sheet->fromArray([
                    ['attr1', 'attr2'],
                    ['test1', 'test2'],
                    ['test1', 'test2'],
                    ['test1', 'test2'],
                    ['test1', 'test2'],
                ], null, 'A1', false, false
            );
            });
        })->store('csv');
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
