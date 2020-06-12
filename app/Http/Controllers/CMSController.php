<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CMSController extends Controller
{
    //
    public function add(Request $r){
        // $r->validate([
        //     $r->name => 'required|string|max:30|',
        //     $r->phone => 'required|string|max:30|',
        //     $r->type => 'string|max:30',
        //     $r->model => 'string|max:30',
        //     $r->serie => 'string|max:30',
        //     $r->amval_num => 'string|max:10',
        //     $r->acessories => 'string',
        //     $r->other_information => 'string|max:100',
        //     $r->address => 'string|max:100',
        //     $r->get_date => 'string|max:50',
        //     $r->getter_id => 'integer|...',
        //     $r->truble => 'string|max:100',
        //     $r->repair_information => 'string|max:100',
        //     $r->giver_id => ['integer']
        //     ,
        //     $r->out_date => 'string|max:50',

            
            


        //     'password' => 'required|string',
        // ]);
        // $customer = new Customer();
        // $customer->name = $r->name;
        // $customer->phone = $r->phone;
        // $customer->type = $r->type;
        // $customer->model = $r->model;
        // $customer->serie = $r->serie;
        // $customer->amval_num = $r->amval_num;
        // $customer->acessories = $r->acessories;
        // $customer->other_information = $r->other_information;
        // $customer->address = $r->address;
        // $customer->get_date = $r->get_date;
        // $customer->getter_id = $r->getter_id;
        // $customer->truble = $r->truble;
        // $customer->repair_information = $r->repair_information;
        // $customer->givver_id = $r->givver_id;
        // $customer->out_date = $r->out_date;

        // return "0sacsadcadsc";
        return view("cms.add");
    }
}
