<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TablesController extends Controller
{
    function index()
    {
        return view("tables");
    }

    /**
     * Gets example table data
     * 
     * @return \Illuminate\Http\Response data
     */
    function getTableData()
    {
        $data = [
            ["id"=>1,"name"=>"John Doe", "age"=>"27"],
            ["id"=>2,"name"=>"Jane Doe", "age"=>"20"],
            ["id"=>3,"name"=>"Charlie Green", "age"=>"24"],
            ["id"=>4,"name"=>"Tyler Joseph", "age"=>"30"],
            ["id"=>5,"name"=>"Nathan Sharp", "age"=>"27"],
        ];

        return response()->json($data, 200);
    }
}
