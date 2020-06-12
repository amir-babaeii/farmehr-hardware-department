@extends('layouts.app')

@section('content')
<div class="px-4 ">
    <div class="row">
        <div class="col-lg-9">
            <div class="card" >
                <div class="card-header bg-success">فرم افزودن کالای خراب</div>

                <div class="card-body">
                    


                <form method="POST" dir="rtl" action="{{ route('login') }}">
                        @csrf
                        <div class="row py-3">
                            <div class="form-group row col-lg-6 ">
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
                                    <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" required autocomplete="model"  autofocus>
                                </div>
                            </div>
                            <div class="form-group row col-lg-4 ">
                                <label for="phone" class="col-lg-5 col-form-label text-md-right">شماره سریال</label>

                                <div class="col-lg-7">
                                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>
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
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address" autofocus>                                </div>
                            </div>
                        </div>  
                        <div class="row py-3">

                            <div class="form-group row col-lg-6 ">
                                <label for="truble" class="col-lg-4 col-form-label text-md-right ">اطلاعات خرابی</label>

                                <div class="col-lg-8">
                                    <textarea id="truble" type="text" class="form-control @error('truble') is-invalid @enderror" name="truble" value="{{ old('truble') }}"  autocomplete="truble" autofocus></textarea>
                                </div>
                            </div>
                            <div class="form-group row col-lg-6 ">
                                <label for="accessories" class="col-lg-3 col-form-label text-md-right">تجهیزات جانبی</label>

                                <div class="col-lg-9">
                                    <textarea id="accessories" class="form-control @error('accessories') is-invalid @enderror" name="accessories" value="{{ old('accessories') }}"  autocomplete="accessories" autofocus></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row py-3">

                            <div class="form-group row col-lg-12">
                                <label for="other_information" class="col-lg-2 col-form-label text-md-right ">اطلاعات تکمیلی</label>

                                <div class="col-lg-10">
                                    <textarea id="other_information" type="text" class="form-control @error('other_information') is-invalid @enderror" name="other_information" value="{{ old('other_information') }}"  autocomplete="other_information" autofocus></textarea>
                                </div>
                            </div>
                         </div>  
                         <div class="row py-3">
                            <div class="form-group row col-lg-6 ">
                                <label for="get_date" class="col-lg-3 col-form-label text-md-right ">زمان دریافت</label>

                                <div class="col-lg-9">
                                    <input id="get_date" type="time"  step="1" class="form-control @error('get_date') is-invalid @enderror" name="get_date" value="{{ old('get_date') }}"  autocomplete="get_date" autofocus></textarea>
                                </div>
                            </div>
                            <div class="form-group row col-lg-6">
                                <label for="get_date" class="col-lg-3 col-form-label text-md-right ">زمان تحویل</label>

                                <div class="col-lg-9">
                                    <input id="get_date" type="time"  step="1" class="form-control @error('get_date') is-invalid @enderror" name="get_date" value="{{ old('get_date') }}"  autocomplete="get_date" autofocus></textarea>
                                </div>
                            </div>
                         </div>

                    </form>

                    <div class="row py-3 ">
                        <button type="submit" name="submit" class="btn btn-success offset-1 col-lg-2">افزودن</button>
                     </div>


                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card" >
                <div class="card-header ">منو</div>

                <div class="card-body">
                    <a class="btn btn-primary col-lg-12 mt-1" href="#">داشبورد </a>
                    <a class="btn btn-success col-lg-12 mt-1" href="#">افزودن کالای خراب </a>
                    <a class="btn btn-primary col-lg-12 mt-1" href="#">مدیریت کالاها </a>
                    <a class="btn btn-primary col-lg-12 mt-1" href="#">آرشیو کالاها </a>

                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
