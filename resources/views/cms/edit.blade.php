@extends('layouts.cms')

@section('body')
<script defer>
    function addOption(value){
        if(value == "add")
        {
            $('#addO').modal('show');
        }
    }
    var i=0;
    function addNewOption() {
        i++;
        var a = document.getElementById("selectOpt").innerHTML;
        var name = document.getElementById("newOptionName").value;
        a += '<option selected >'+name+'</option>';
        document.getElementById("selectOpt").innerHTML = a;
    }
</script>
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

                                <select name="type" class="col-lg-6 form-control "     onchange="addOption(value)" id="selectOpt">
                                <option >{{$data->type}}</option>
                                <option >کامپیوتر</option>
                                <option >لپ تاپ</option>
                                <option >مانیتور</option>
                                <option >گوشی</option>
                                <option value="add">افزودن گزینه جدید</option>
                                </select>
                        
                            </div>
                            <div class="modal fade " id="addO" tabindex="-1" role="dialog" dir="rtl">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"> افزودن گزینه جدید</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group mt-3 row">
                                                <label class="col-4"> نوع دستگاه جدید</label>
                                                <input id="newOptionName" class="form-control col-8" >
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" onclick="addNewOption()" class="btn btn-primary"  data-dismiss="modal">افزودن</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                        </div>
                                    </div>
                                
                                </div>
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
                                    <textarea {{($editable === false) ? "disabled" : ""}} id="truble" style="min-height: 100px" class="form-control @error('truble') is-invalid @enderror" name="truble"  autocomplete="truble" autofocus>{{ $data->truble }}</textarea>
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
                                    <textarea {{($editable === false) ? "disabled" : ""}} id="other_information" class="form-control @error('other_information') is-invalid @enderror" name="other_information"   autocomplete="other_information" autofocus>{{ $data->other_information }}</textarea>
                                </div>
                            </div>
                         </div>  
                         <div class="row py-3">
                            <div class="form-group row col-lg-6 ">
                                
                                <label for="get_date" class="col-lg-3 col-form-label text-md-right ">زمان دریافت</label>

                                <div class="input-group">
                                   
                                    <input  {{($editable === false) ? "disabled" : ""}} type="text" id="inputDate1" class="form-control " placeholder="Persian Calendar Text" value="{{ $data->get_date_shamsi }}"
                                        aria-label="date1" aria-describedby="date1">
                                    <input type="hidden" name="get_date" value="{{ $data->get_date }}" id="inputDate11">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text cursor-pointer" id="date1">انتخاب</span>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-9">
                                    <input {{($editable === false) ? "disabled" : ""}} id="get_date" type="datetime"  step="1" class="form-control @error('get_date') is-invalid @enderror" name="get_date" value="{{ $data->get_date }}"  autocomplete="get_date" autofocus disabled>
                                </div> --}}
                            </div>
                            <div class="form-group row col-lg-6">
                                <label for="out_date" class="col-lg-3 col-form-label text-md-right ">زمان تحویل</label>

                                <div class="input-group">
                                   
                                    <input  {{($editable === false) ? "disabled" : ""}} type="text" id="inputDate2" class="form-control " placeholder="Persian Calendar Text" value="{{ $data->out_date_shamsi }}"
                                        aria-label="date2" aria-describedby="date2">
                                    <input type="hidden" name="out_date" value="{{ $data->out_date }}" id="inputDate22">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text cursor-pointer" id="date2">انتخاب</span>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-9">
                                    <input {{($editable === false) ? "disabled" : ""}} id="out_date" type="datetime"  step="1" class="form-control @error('out_date') is-invalid @enderror" name="out_date" value="{{ $data->out_date }}"  autocomplete="out_date" autofocus disabled>
                                </div> --}}
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
                                <textarea {{($editable === false) ? "disabled" : ""}} name="situation_text" id="whatwedone" class="form-control @error('situation_text') is-invalid @enderror" > {{$data->situation_text}} </textarea>
                            </div>
                        </div>
                         <div class="row py-4 " dir="ltr" >
                            <button id="btn1" style="{{($editable === false) ? 'display: none;' : ''}}" type="submit" onclick="changeDate()"  name="submit" class="btn btn-success  col-lg-2">ویرایش</button>
                            <button id="btn2" type="button" onclick="printDiv()" name="submit" class="btn btn-dark {{($editable === false) ? 'col-lg-2' : 'offset-5 col-lg-2 mr-5'}} ">چاپ رسید</button>
                            <button id="btn3" type="button" onclick="printDivShenase()" name="submit" class="btn btn-dark {{($editable === false) ? 'col-lg-2' : 'col-lg-2'}} ">چاپ شناسه</button>
                            <i id="signn" style="display: none" class="offset-10 col-2">امضاء مشتری</i>
                         </div>
    
                    </form>

                  

                </div>
<script> 
//EnableMdDateTimePickers();
@if($editable)
        function changeDate(){
            var date1 =$('#date1').MdPersianDateTimePicker('getDate')
            // alert(dateToStr(date1));
            $('#inputDate11').val(dateToStr(date1));
            var date2 =$('#date2').MdPersianDateTimePicker('getDate')
            // alert(dateToStr(date2));
            $('#inputDate22').val(dateToStr(date2));
        }
        function dateToStr(date) {
            return date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate() + " " +date.getHours() + ":" +date.getMinutes() + ":" + date.getSeconds()	;
        }
        $('#date1').MdPersianDateTimePicker({
            targetTextSelector: '#inputDate1',
            targetDateSelector: '#inputDate11',
            dateFormat	: 'yyyy-MM-dd HH:mm:ss',
            isGregorian: false,
            enableTimePicker: true,
            disabledDays: [ 6],
        });
        $('#date2').MdPersianDateTimePicker({
            targetTextSelector: '#inputDate2',
            targetDateSelector: '#inputDate22',
            isGregorian: false,
            enableTimePicker: true,
            disabledDays: [ 6]
        });
@endif
        function printDivShenase() { 

            var divContents1 = document.getElementById("id").outerHTML; 
            var divContents2 = document.getElementById("name").value; 
            var a = window.open('', '', 'height=4, width=2'); 
            a.document.write('<html dir="rtl" style="text-align:right">'); 
            a.document.write('<body > <h1 >فرمهر رایانه<br>'); 
            a.document.write('<lable>شناسه دستگاه : ' + divContents1 + '</lable><br>'); 
            a.document.write('<lable>نام مشتری : ' + divContents2 + '</lable>'); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 

        } 
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
        // var node = document.getElementById('myForm');

        // document.getElementById("btn1").style.display = 'none';
        //     document.getElementById("btn2").style.display = 'none';
        //     document.getElementById("btn3").style.display = 'none';
        //     document.getElementById("signn").style.display = 'block';

       
        //     domtoimage.toPng(node)
        //         .then(function (dataUrl) {
        //             // var img = new Image();
        //             // img.src = dataUrl;
        //             PrintImage(dataUrl);
        //             //document.body.appendChild(img);
        //             // console.log(img)
                    
        //             document.getElementById("btn1").style.display = 'block';
        //             document.getElementById("btn2").style.display = 'block';
        //             document.getElementById("btn3").style.display = 'block';
        //             document.getElementById("signn").style.display = 'none';
        //         })
        //         .catch(function (error) {
        //             console.error('oops, something went wrong!', error);
        //         });   
            var divContents1 = document.getElementById("id").outerHTML; 
            var divContents2 = document.getElementById("name").value;
            // var whatwedone = document.getElementById("whatwedone").innerHTML;
            var a = window.open('', '', 'height=4, width=2'); 
            a.document.write('<html dir="rtl" style="text-align:right; font-family: \'Vazir\';font-size:40px">');
            a.document.write('<head ><link href="{{ asset('css/app.css') }}" rel="stylesheet">'
            +
            '<link href="{{ asset('font/font.css') }}" rel="stylesheet"> </head>');
             
            a.document.write('<body > <h3 class="">فرمهر رایانه</h3><br>'); 
            a.document.write('<div class="row col-12 py-2"><lable class="col-4 offset-2 col-form-label text-right" >شناسه دستگاه : ' + divContents1 + '</lable>'); 
           
            a.document.write('<lable class=" col-6 text-right" style="margin-left:-60px;">نام مشتری : ' + divContents2 + '</lable></div> '); 
            
            a.document.write('<div class="row col-12 py-2">'
            +'<label for="out_date" class="col-12  text-right ">زمان تحویل: {{ ($data->out_date!==null ) ? $data->out_date : ''}}</label>'
            +'</div> '); 

            a.document.write('<div class="row col-12 py-2" style="background-color:#808080">'
            +'<label for="out_date" class="col-12  text-right ">تجهیزات جانبی همراه: {{$data->charger == 1 ? "شاژر -" : ""}}'
            +'{{$data->bag == 1 ? "کیف -" : ""}}'
            +'{{$data->dvd == 1 ? " دی وی دی -" : ""}}'
            +'{{$data->monitor == 1 ? "مانیتور -" : ""}}'
            +'{{$data->printer == 1 ? "پرینتر -" : ""}}</label>'
            +'</div> '); 
            

            a.document.write('<div class="row col-12">'
            +'<label for="out_date" class="col-12  text-right ">شرح کار انجام شده: {{$data->situation_text}}</label>'
            +'</div> '); 
            a.document.write('<div class="row col-12 " style="margin-top:150px;">'
            +'<label for="out_date" class="col-12  text-right ">امضاء</label>'
            +'</div> '); 
            
            a.document.write('</body></html>'); 
            a.document.close(); 
            setTimeout(() => {
                a.print(); 

            }, 3000);


    } 
                </script> 
@endsection
