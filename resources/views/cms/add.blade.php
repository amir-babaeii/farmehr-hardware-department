@extends('layouts.cms')

@section('body')
    
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

                                <select name="type" class="col-lg-6 form-control " id="type">
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
                                <label for="truble" class="col-lg-4 col-form-label text-md-right ">اطلاعات خرابی</label>

                                <div class="col-lg-8">
                                    <textarea id="truble" class="form-control @error('truble') is-invalid @enderror" name="truble" value="{{ old('truble') }}"  autocomplete="truble" autofocus></textarea>
                                </div>
                            </div>
                            <div class="form-group row col-lg-6 ">
                                <label for="accessories" class="col-lg-3 col-form-label text-md-right">تجهیزات جانبی</label>

                                <div class="col-lg-9">
                                    <div class="input-group mb-3">
                                        <input type="checkbox" name="charger" aria-label="Checkbox for following text input">
                                        <i class="mr-2">شارژر</i>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="checkbox" name="bag" aria-label="Checkbox for following text input">
                                        <i class="mr-2">کیف</i>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="checkbox" name="dvd" aria-label="Checkbox for following text input">
                                        <i class="mr-2">دی وی دی</i>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="checkbox" name="monitor" aria-label="Checkbox for following text input">
                                        <i class="mr-2">مانیتور</i>
                                    </div>
                                    <div class="input-group mb-3">
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

                                <div class="col-lg-9">
                                    <input id="get_date" type="time"  step="1" class="form-control @error('get_date') is-invalid @enderror" name="get_date" value="{{ old('get_date') }}"  autocomplete="get_date" autofocus disabled></textarea>
                                </div>
                            </div>
                            <div class="form-group row col-lg-6">
                                <label for="out_date" class="col-lg-3 col-form-label text-md-right ">زمان تحویل</label>

                                <div class="col-lg-9">
                                    <input id="out_date" type="time"  step="1" class="form-control @error('out_date') is-invalid @enderror" name="out_date" value="{{ old('out_date') }}"  autocomplete="out_date" autofocus disabled></textarea>
                                </div>
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
                <script> 
                function btn(){

                }
                    function printDiv() { 

                        var divContents1 = document.getElementById("id").outerHTML; 
                        var divContents2 = document.getElementById("name").value; 
                        var a = window.open('', '', 'height=750, width=500'); 
                        a.document.write('<html>'); 
                        a.document.write('<body dir="rtl"> <h1 class="text-center" style="margin-right:35%">فرمهر رایانه<br>'); 
                        a.document.write('<lable>شناسه دستگاه : ' + divContents1 + '</lable><br>'); 
                        a.document.write('<lable>نام مشتری : ' + divContents2 + '</lable>'); 
                        a.document.write('</body></html>'); 
                        a.document.close(); 
                        a.print(); 

                    } 
                </script> 
@endsection
