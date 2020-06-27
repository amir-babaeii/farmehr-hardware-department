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
                <div  class="card-header bg-success">فرم افزودن کالای خراب</div>

                <div class="card-body">
                    


                <form id="myForm" method="POST" dir="rtl" action="{{ route('add') }}">
                        @csrf
                        <div class="row py-3">
                            <div  class="form-group row col-lg-12 ">
                                <label for="p_id" class="col-lg-2 col-form-label text-md-right">شماره دستگاه:</label>

                                <div class="col-lg-10">
                                    <label id="id"> {{$id}} </label>
                                </div>
                            </div>
                            <div id="fullname" class="form-group row col-lg-6 ">
                                <label for="name" class="col-lg-3 col-form-label text-md-right">نام مشتری</label>

                                <div class="col-lg-9">
                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>
                            <div class="form-group row col-lg-6 ">
                                <label for="phone" class="col-lg-3 col-form-label text-md-right">شماره تماس</label>

                                <div class="col-lg-9">
                                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="form-group row col-lg-4 ">
                                <label for="type" class="col-lg-6 col-form-label text-md-right  ">نوع دستگاه</label>

                                <select name="type" class="col-lg-6 form-control "   onchange="addOption(value)" id="selectOpt">
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
                                    <input id="model"class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}"  autocomplete="model"  autofocus>
                                </div>
                            </div>
                            <div class="form-group row col-lg-4 ">
                                <label for="serie" class="col-lg-5 col-form-label text-md-right">شماره سریال</label>

                                <div class="col-lg-7">
                                    <input id="serie" type="number" class="form-control @error('serie') is-invalid @enderror" name="serie" value="{{ old('serie') }}"  autocomplete="serie" autofocus>
                                </div>
                            </div>
                        </div>  
                        <div class="row py-3">

                            <div class="form-group row col-lg-4 ">
                                <label for="amval" class="col-lg-4 col-form-label text-md-right ">شماره اموال</label>

                                <div class="col-lg-8">
                                    <input id="amval" type="number" class="form-control @error('amval') is-invalid @enderror" name="amval" value="{{ old('amval') }}"  autocomplete="amval" autofocus>
                                </div>
                            </div>
                            <div class="form-group row col-lg-8 ">
                                <label for="address" class="col-lg-2 col-form-label text-md-right">آدرس</label>

                                <div class="col-lg-10">
                                    <input id="address"  class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address" autofocus>                                </div>
                            </div>
                        </div>  
                        <div class="row py-3">

                            <div class="form-group row col-lg-6 ">
                                <label for="truble" class="col-lg-4 col-form-label text-md-right ">اشکال ذکر شده توسط صاحب دستگاه</label>

                                <div class="col-lg-8">
                                    <textarea id="truble" class="form-control @error('truble') is-invalid @enderror" name="truble" value="{{ old('truble') }}"  autocomplete="truble" autofocus></textarea>
                                </div>
                            </div>
                            <div class="form-group row col-lg-6 ">
                                <label for="accessories" class="col-lg-3 col-form-label text-md-right">تجهیزات جانبی</label>

                                <div class="col-lg-9 row">
                                    <div class="input-group mb-3 col-6">
                                        <input type="checkbox"  name="charger" aria-label="Checkbox for following text input">
                                        <i class="mr-2">شارژر</i>
                                    </div>
                                    <div class="input-group mb-3 col-6">
                                        <input type="checkbox" name="bag" aria-label="Checkbox for following text input">
                                        <i class="mr-2">کیف</i>
                                    </div>
                                    <div class="input-group mb-3 col-6">
                                        <input type="checkbox" name="dvd" aria-label="Checkbox for following text input">
                                        <i class="mr-2">دی وی دی</i>
                                    </div>
                                    <div class="input-group mb-3 col-6">
                                        <input type="checkbox" name="monitor" aria-label="Checkbox for following text input">
                                        <i class="mr-2">مانیتور</i>
                                    </div>
                                    <div class="input-group mb-3 col-6">
                                        <input type="checkbox" name="printer" aria-label="Checkbox for following text input">
                                        <i class="mr-2">پرینتر</i>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="row py-3">

                            <div class="form-group row col-lg-12">
                                <label for="other_information" class="col-lg-2 col-form-label text-md-right ">اطلاعات تکمیلی</label>

                                <div class="col-lg-10">
                                    <textarea id="other_information" class="form-control @error('other_information') is-invalid @enderror" name="other_information" value="{{ old('other_information') }}"  autocomplete="other_information" autofocus></textarea>
                                </div>
                            </div>
                         </div>  
                         <div class="row py-3">
                                <div class="form-group row col-lg-6 ">
                                    
                                    <label for="get_date" class="col-lg-3 col-form-label text-md-right ">زمان دریافت</label>
    
                                    <div class="input-group">
                                       
                                        <input  type="text" id="inputDate1" class="form-control " placeholder="Persian Calendar Text" 
                                            aria-label="date1" aria-describedby="date1">
                                        <input type="hidden" name="get_date"  id="inputDate11">
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
                                       
                                        <input  type="text" id="inputDate2" class="form-control " placeholder="Persian Calendar Text" 
                                            aria-label="date2" aria-describedby="date2">
                                        <input type="hidden" name="out_date"  id="inputDate22">
    
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
                                <label > {{$username}} </label>
                            </div>
                        </div>
                         <div class="row py-4 " dir="ltr" >
                            <button type="submit"  name="submit" class="btn btn-success  col-lg-2">افزودن</button>
                            <button type="button" onclick="printDiv()" name="submit" class="btn btn-dark offset-8 col-lg-2">چاپ</button>
                         </div>
                    </form>

                  

                </div>
                <style>


                    @media print and (width: 80mm) and (height: 150mm) {
                        @page {
                        margin: 3cm;
                        }
                    }
                    @page {
                        size: 150mm 80mm  ;
                        margin: 10%;
                       
                    }
                </style>
                <script> 
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
                    function printDiv() { 

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
                </script> 
@endsection
