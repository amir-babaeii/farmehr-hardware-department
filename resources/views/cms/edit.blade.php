@extends('layouts.cms')

@section('body')
    
                <div  class="card-header bg-success">فرم ویرایش کالای خراب</div>

                <div class="card-body">
                    

                <form id="myForm" style="text-align:left;" method="POST" dir="rtl" action="/edit/{{$data->id}}">
                        @csrf
                        <div class="row py-3" >
                            <div  class="form-group row col-lg-12 ">
                                <label for="p_id" class="col-lg-2 col-form-label text-md-right">شماره دستگاه:</label>

                                <div class="col-lg-10">
                                    <label id="id"> {{$data->id}} </label>
                                </div>
                            </div>
                            <div id="fullname" class="form-group row col-lg-6 ">
                                <label for="name" class="col-lg-3 col-form-label text-md-right">نام مشتری</label>

                                <div class="col-lg-9">
                                    <input id="name" {{($editable === false) ? "disabled" : ""}}  type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}" required autocomplete="name" autofocus>
                                </div>
                            </div>
                            <div class="form-group row col-lg-6 ">
                                <label for="phone" class="col-lg-3 col-form-label text-md-right">شماره تماس</label>

                                <div class="col-lg-9">
                                    <input id="phone" {{($editable === false) ? "disabled" : ""}} type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $data->phone }}" required autocomplete="phone" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="form-group row col-lg-4 ">
                                <label for="type" class="col-lg-6 col-form-label text-md-right  ">نوع دستگاه</label>

                                <select {{($editable === false) ? "disabled" : ""}}  name="type" value="{{ $data->type }}" class="col-lg-6 form-control " id="type">
                                <option>کامپیوتر</option>
                                <option>لپ تاپ</option>
                                <option>مانیتور</option>
                                <option>گوشی</option>
                                <option>افزودن گزینه جدید</option>
                                </select>
                        
                            </div>
                            <div class="form-group row col-lg-4 ">
                                <label for="model" class="col-lg-3 col-form-label text-md-right ">مدل</label>

                                <div class="col-lg-9">
                                    <input {{($editable === false) ? "disabled" : ""}} id="model"class="form-control @error('model') is-invalid @enderror" name="model" value="{{ $data->model }}"  autocomplete="model"  autofocus>
                                </div>
                            </div>
                            <div class="form-group row col-lg-4 ">
                                <label for="serie" class="col-lg-5 col-form-label text-md-right">شماره سریال</label>

                                <div class="col-lg-7">
                                    <input {{($editable === false) ? "disabled" : ""}} id="serie" type="number" class="form-control @error('serie') is-invalid @enderror" name="serie" value="{{ $data->serie }}"  autocomplete="serie" autofocus>
                                </div>
                            </div>
                        </div>  
                        <div class="row py-3">

                            <div class="form-group row col-lg-4 ">
                                <label for="amval" class="col-lg-4 col-form-label text-md-right ">شماره اموال</label>

                                <div class="col-lg-8">
                                    <input {{($editable === false) ? "disabled" : ""}} id="amval" type="number" class="form-control @error('amval') is-invalid @enderror" name="amval" value="{{ $data->amval }}"  autocomplete="amval" autofocus>
                                </div>
                            </div>
                            <div class="form-group row col-lg-8 ">
                                <label for="address" class="col-lg-2 col-form-label text-md-right">آدرس</label>

                                <div class="col-lg-10">
                                    <input {{($editable === false) ? "disabled" : ""}} id="address"  class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $data->address }}"  autocomplete="address" autofocus>                                </div>
                            </div>
                        </div>  
                        <div class="row py-3">

                            <div class="form-group row col-lg-6 ">
                                <label for="truble" class="col-lg-4 col-form-label text-md-right ">اشکال ذکر شده توسط صاحب دستگاه</label>

                                <div class="col-lg-8">
                                    <textarea {{($editable === false) ? "disabled" : ""}} id="truble" style="min-height: 100px" class="form-control @error('truble') is-invalid @enderror" name="truble" value="{{ $data->truble }}"  autocomplete="truble" autofocus></textarea>
                                </div>
                            </div>
                            <div class="form-group row col-lg-6 ">
                                <label for="accessories" class="col-lg-3 col-form-label text-md-right">تجهیزات جانبی</label>

                                <div class="col-lg-9 row">
                                    <div class="input-group mb-3 col-6">
                                        <input {{($editable === false) ? "disabled" : ""}} type="checkbox" {{$data->charger == 1 ? "checked" : ""}}  name="charger" aria-label="Checkbox for following text input">
                                        <i class="mr-2">شارژر</i>
                                    </div>
                                    <div class="input-group mb-3 col-6">
                                        <input {{($editable === false) ? "disabled" : ""}} type="checkbox" {{$data->bag == 1 ? "checked" : ""}} name="bag" aria-label="Checkbox for following text input">
                                        <i class="mr-2">کیف</i>
                                    </div>
                                    <div class="input-group mb-3 col-6">
                                        <input {{($editable === false) ? "disabled" : ""}} type="checkbox" {{$data->dvd == 1 ? "checked" : ""}} name="dvd" aria-label="Checkbox for following text input">
                                        <i class="mr-2">دی وی دی</i>
                                    </div>
                                    <div class="input-group mb-3 col-6">
                                        <input {{($editable === false) ? "disabled" : ""}} type="checkbox" {{$data->monitor == 1 ? "checked" : ""}} name="monitor" aria-label="Checkbox for following text input">
                                        <i class="mr-2">مانیتور</i>
                                    </div>
                                    <div class="input-group mb-3 col-6">
                                        <input {{($editable === false) ? "disabled" : ""}} type="checkbox" {{$data->printer == 1 ? "checked" : ""}} name="printer" aria-label="Checkbox for following text input">
                                        <i class="mr-2">پرینتر</i>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="row pb-3">

                            <div class="form-group row col-lg-12">
                                <label for="other_information" class="col-lg-2 col-form-label text-md-right ">اطلاعات تکمیلی</label>

                                <div class="col-lg-10">
                                    <textarea {{($editable === false) ? "disabled" : ""}} id="other_information" class="form-control @error('other_information') is-invalid @enderror" name="other_information" value="{{ $data->other_information }}"  autocomplete="other_information" autofocus></textarea>
                                </div>
                            </div>
                         </div>  
                         <div class="row py-3">
                            <div class="form-group row col-lg-6 ">
                                <label for="get_date" class="col-lg-3 col-form-label text-md-right ">زمان دریافت</label>

                                <div class="col-lg-9">
                                    <input {{($editable === false) ? "disabled" : ""}} id="get_date" type="datetime"  step="1" class="form-control @error('get_date') is-invalid @enderror" name="get_date" value="{{ $data->get_date }}"  autocomplete="get_date" autofocus disabled></textarea>
                                </div>
                            </div>
                            <div class="form-group row col-lg-6">
                                <label for="out_date" class="col-lg-3 col-form-label text-md-right ">زمان تحویل</label>

                                <div class="col-lg-9">
                                    <input {{($editable === false) ? "disabled" : ""}} id="out_date" type="datetime"  step="1" class="form-control @error('out_date') is-invalid @enderror" name="out_date" value="{{ $data->out_date }}"  autocomplete="out_date" autofocus disabled></textarea>
                                </div>
                            </div>
                         </div>
                         <div class="form-group row col-lg-12 ">
                            <label for="p_id" class="col-lg-2 col-form-label text-md-right">تحویل گیرنده:</label>

                            <div class="col-lg-0 pt-2">
                                <label > {{$data->getter_name}} </label>
                            </div>
                        </div>
                        <div class="form-group row col-lg-12 ">
                            <label for="p_id" class="col-lg-2 col-form-label text-md-right">تحویل دهنده:</label>

                            <div class="col-lg-0 pt-2">
                                <label >  {{$data->giver_name}} </label>
                            </div>
                        </div>
                        <div class="form-group row col-lg-12 ">
                                <p class="row col-3">
                                    تعیین وضعیت دستگاه :
                                </p>
                                <div class="form-check row col-3">
                                    <input {{($editable === false) ? "disabled" : ""}} type="radio" class="form-check-input " {{($data->situation==1 ? "checked" : "")}} id="materialUnchecked" name="situation" value="1">
                                    <label class="form-check-label  mr-3" for="materialUnchecked">تعمیر انجام شد</label>
                                    {{-- {{ ($item->situation == 1) ? 'active' : ''}} --}}
                                </div>
                                <div class="form-check row col-3">
                                    <input {{($editable === false) ? "disabled" : ""}} type="radio" class="form-check-input"   {{($data->situation==2 ? "checked" : "")}} id="materialUnchecked" name="situation"  value="2">
                                    <label class="form-check-label mr-3" for="materialUnchecked">تعمیر انجام نشد</label>
                                </div>
                                <div class="form-check row col-3">
                                    <input {{($editable === false) ? "disabled" : ""}} type="radio" class="form-check-input"   {{($data->situation==3 ? "checked" : "")}} id="materialUnchecked" name="situation"  value="3">
                                    <label class="form-check-label mr-3" for="materialUnchecked">در حال تعمیر</label>
                                </div>
                                
                        </div>
                        <div class="form-group row col-lg-12 ">
                            <label for="p_id" class="col-lg-2 col-form-label text-md-right">شرح کار انجام شده:</label>

                            <div class="col-lg-10 pt-2">
                                <textarea {{($editable === false) ? "disabled" : ""}} name="situation_text" class="form-control @error('situation_text') is-invalid @enderror" > {{$data->situation_text}} </textarea>
                            </div>
                        </div>
                         <div class="row py-4 " dir="ltr" >
                            <button style="{{($editable === false) ? 'display: none;' : ''}}" type="submit"  name="submit" class="btn btn-success  col-lg-2">ویرایش</button>
                            <button type="button" onclick="printDiv()" name="submit" class="btn btn-dark {{($editable === false) ? 'col-lg-2' : 'offset-8 col-lg-2'}} ">چاپ</button>
                         </div>
    
                    </form>

                  

                </div>
<script> 


    function ImagetoPrint(source)
    {
        return "<html><head><scr"+"ipt>function step1(){\n" +
                "setTimeout('step2()', 10);}\n" +
                "function step2(){window.print();window.close()}\n" +
                "</scr"+"ipt></head><body onload='step1()'>\n" +
                "<img src='" + source + "' /></body></html>";
    }

    function PrintImage(source)
    {
        var Pagelink = "about:blank";
        var pwa = window.open(Pagelink, "_new");
        pwa.document.open();
        pwa.document.write(ImagetoPrint(source));
        pwa.document.close();
    }
    function printDiv() { 

        var node = document.getElementById('myForm');

        domtoimage.toPng(node)
            .then(function (dataUrl) {
                // var img = new Image();
                // img.src = dataUrl;
                PrintImage(dataUrl);
                //document.body.appendChild(img);
                // console.log(img)
            })
            .catch(function (error) {
                console.error('oops, something went wrong!', error);
            });   
        

    } 
                </script> 
@endsection
