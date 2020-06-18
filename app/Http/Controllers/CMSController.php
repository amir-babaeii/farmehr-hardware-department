<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use DateTime;
use App\User;
class CMSController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    } 
    public function showAdd(Request $r){
        $user = auth()->user()->fullname;
        if(Customer::latest()->first() !== null)
            $id =Customer::latest()->first()->id;
        else
            $id=0;
        return view("cms.add")->with(['username' => $user,'id' => $id+1,'route' => 'add']);
    }
    public function add(Request $r){
        $r->validate([
            'name' => 'required|string|max:30|',
            'phone' => 'required|max:30',
            'type' => 'max:30',
            'model' => 'max:30',
            'serie' => 'max:30',
            'amval_num' => 'max:10',
            // 'accessories' => 'string',
            'other_information' => 'max:100',
            'address' => 'max:100',
            'get_date' => 'max:50',
            'getter_id' => 'integer',
            'truble' => 'max:100',
            'repair_information' => 'max:100',
            'giver_id' => 'integer',
            'out_date' => 'max:50',
        ]);
        $date = new DateTime();
        $customer = new Customer;
        $customer->name = $r->name;
        $customer->phone = $r->phone;
        $customer->type = $r->type;
        $customer->model = $r->model;
        $customer->serie = $r->serie;
        $customer->amval_num = $r->amval_num;
        $customer->accessories = ($r->charger=='on' ? "شارژر," :"").
        ($r->bag=='on' ? "کیف," :"").
        ($r->dvd=='on' ? "دی وی دی," :"").
        ($r->monitor=='on' ? "مانیتور," :"").
        ($r->printer=='on' ? "پرینتر," :"");
        $customer->other_information = $r->other_information;
        $customer->address = $r->address;
        $customer->get_date = $date->format('Y-m-d H:i:s');
        $customer->getter_id = auth()->user()->id;
        $customer->truble = $r->truble;
        $customer->repair_information = $r->repair_information;
        $customer->giver_id = 0;
        // $customer->out_date = $r->out_date;
        $customer->save();
        return redirect('/manage');
    }
    public function edit($id,Request $r){
        $r->validate([
            'name' => 'required|string|max:30|',
            'phone' => 'required|max:30',
            'type' => 'max:30',
            'model' => 'max:30',
            'serie' => 'max:30',
            'amval_num' => 'max:10',
            // 'accessories' => 'string',
            'other_information' => 'max:100',
            'address' => 'max:100',
            'get_date' => 'max:50',
            'getter_id' => 'integer',
            'truble' => 'max:100',
            'repair_information' => 'max:100',
            'giver_id' => 'integer',
            'out_date' => 'max:50',
            'situation' => 'integer|nullable|max:4',
            'situayion_text' => 'string|nullable|max:255',

            
        ]);
        $date = new DateTime();
        $customer =  Customer::find($id);
        $customer->name = $r->name;
        $customer->phone = $r->phone;
        $customer->type = $r->type;
        $customer->model = $r->model;
        $customer->serie = $r->serie;
        $customer->amval_num = $r->amval_num;

        $customer->accessories = ($r->charger=='on' ? "charger," :"").
        ($r->bag=='on' ? "bag," :"").
        ($r->dvd=='on' ? "dvd," :"").
        ($r->monitor=='on' ? "monitor," :"").
        ($r->printer=='on' ? "printer," :"");
        $customer->other_information = $r->other_information;
        $customer->address = $r->address;
        $customer->truble = $r->truble;
        $customer->repair_information = $r->repair_information;
        $customer->situation = ($r->situation !=null )  ?$r->situation : 0;
        $customer->situation_text = $r->situation_text;
        // $customer->out_date = $r->out_date;
        $customer->save();
        return redirect('/edit/'.$id)->with('success','تغییرات با موفقیت اعمال شد.');
    }

    public function showManage(){

        $customers = Customer::select(['id','name','type','model','get_date','situation_text','situation','getter_id'])->where('giver_id','=','0')->paginate(10);
        foreach ($customers as $key => $customer) {
            # code...
            switch ($customer->situation) {
                case 0:
                    # code...
                    $customer->situation_name = "تحویل گرفته شده است";
                    break;
                case 1:
                    # code...
                    $customer->situation_name = "تعمیر شده است";
                    break;
                case 2:
                    # code...
                    $customer->situation_name = "تعمیر نشده است";
                    break;
                case 3:
                    # code...
                    $customer->situation_name = "در حال تعمیر";
                    break;

                            
                default:
                    # code...
                    $customer->situation_name = "تحویل گرفته شده";
                    break;
            }
            if(User::find($customer->getter_id) !==null){
                $customer->getter_name = User::find($customer->getter_id)->fullname;
            }
        }
        // dd($customers);

        return view('cms.manage')->with(['data'=>$customers->items(),'route' => 'manage']);
    }
    
    public function showArchive(){

        $customers = Customer::select(['id','name','type','model','get_date','situation_text','situation','getter_id'])->where('giver_id','>','0')->paginate(10);
        foreach ($customers as $key => $customer) {
            # code...
            switch ($customer->situation) {
                case 0:
                    # code...
                    $customer->situation_name = "تحویل گرفته شده است";
                    break;
                case 1:
                    # code...
                    $customer->situation_name = "تعمیر شده است";
                    break;
                case 2:
                    # code...
                    $customer->situation_name = "تعمیر نشده است";
                    break;
                case 3:
                    # code...
                    $customer->situation_name = "در حال تعمیر";
                    break;

                default:
                    # code...
                    $customer->situation_name = "تحویل گرفته شده";
                    break;
            }
            if(User::find($customer->getter_id) !==null){
                $customer->getter_name = User::find($customer->getter_id)->fullname;
            }
        }
        return view('cms.manage')->with(['data'=>$customers->items(),'route' => 'archive']);
    }



    public function showEdit($id,Request $r){
        $customer = Customer::find($id);
        // dd($customer->id);
        $editable = false;
        if($customer->giver_id===0 || auth()->user()->username === 'admin'){
            $editable = true;
        }
        $customer->giver_name= (User::find($customer->giver_id) !=null )? User::find($customer->giver_id)->fullname : "نامی ثبت نشده است.";
        $customer->getter_name = (User::find($customer->getter_id) !=null )? User::find($customer->getter_id)->fullname : "نامی ثبت نشده است.";
        if(strpos($customer->accessories,'charger') !==false){
            $customer->charger=1;
        }
        if(strpos($customer->accessories,'bag') !==false){
            $customer->bag=1;
        }
        if(strpos($customer->accessories,'dvd') !==false){
            $customer->dvd=1;
        }
        if(strpos($customer->accessories,'monitor') !==false){
            $customer->monitor=1;
        }
        if(strpos($customer->accessories,'printer') !==false){
            $customer->printer=1;
        }
        switch ($customer->situation) {
            case 0:
                # code...
                $customer->situation_name = "تحویل گرفته شده است";
                break;
            case 1:
                # code...
                $customer->situation_name = "تعمیر شده است";
                break;
            case 2:
                # code...
                $customer->situation_name = "تعمیر نشده است";
                break;
            case 3:
                # code...
                $customer->situation_name = "در حال تعمیر";
                break;

                        
            default:
                # code...
                $customer->situation_name = "تحویل گرفته شده";
                break;
        }
        return view('cms.edit')->with(['data'=>$customer,'route' => 'manage','editable' => $editable]);
    }

    public function showDashboard()
    {
        return "این صفحه فعلا در دسترس نمی باشد.";
    }

    public function search(Request $r)
    {
        $r->validate([
            'search' => 'max:100',
        ]);
        
        if(is_numeric($r->search)){
            if(($customer = Customer::find($r->search))->select(['id','name','type','model','get_date','situation_text','situation','getter_id','giver_id']) !== null)
                $customers = [$customer];
        
        }else{
            if(($customers = Customer::select(['id','name','type','model','get_date','situation_text','situation','getter_id','giver_id'])->where('name','like','%'. $r->search . '%')->paginate(10) ) !== null)
                $customers =$customers->items();

        }
        foreach ($customers as $key => $customer) {
            switch ($customer->situation) {
                case 0:
                    # code...
                    $customer->situation_name = "تحویل گرفته شده است";
                    break;
                case 1:
                    # code...
                    $customer->situation_name = "تعمیر شده است";
                    break;
                case 2:
                    # code...
                    $customer->situation_name = "تعمیر نشده است";
                    break;
                case 3:
                    # code...
                    $customer->situation_name = "در حال تعمیر";
                    break;
    
                            
                default:
                    # code...
                    $customer->situation_name = "تحویل گرفته شده";
                    break;
            }
            if(User::find($customer->getter_id) !==null){
                $customer->getter_name = User::find($customer->getter_id)->fullname;
            }
        }
        return view('cms.manage')->with(['data'=>$customers,'route' => 'manage']);
        
    }




    public function changeSituation(Request $r){
        $r->validate([
            'situation' => 'integer|nullable|max:4',
            'situayion_text' => 'string|nullable|max:255',


            
        ]);
        
        $customer = Customer::find($r->id);
        $customer->situation = $r->situation;
        $customer->situation_text = $r->situation_text;
        $customer->save();
        return redirect('/manage');
        // $customer->situation
    }

    public function exit(Request $r){
        $date = new DateTime();

        $customer = Customer::find($r->id);

        $customer->giver_id=auth()->user()->id;
        $customer->out_date = $date->format('Y-m-d H:i:s');

        $customer->save();


        return redirect('/manage');
        // $customer->situation
    }
}
