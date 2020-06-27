@extends('layouts.cms')

@section('body')
<?php
function validateDateTime($dateStr, $format)
{
    date_default_timezone_set('UTC');
    $date = DateTime::createFromFormat($format, $dateStr);
    return $date && ($date->format($format) === $dateStr);
}
?>
<div  class="card-header bg-success">گزارش گیری محصولات</div>

<div class="card-body" dir="rtl">
<div class="main" style="height: 1000px">
    <form action="" method="GET">
    <div class="row py-3">
        <div class="form-group row col-lg-6 ">
            
        <label for="from" class="col-lg-3 col-form-label text-md-right " >از تاریخ</label>

            <div class="input-group">
               
                <input  type="text" id="inputDate1" class="form-control "  placeholder="Persian Calendar Text" 
                    aria-label="date1" aria-describedby="date1">
                <input type="hidden" name="from"   id="inputDate11">
                <div class="input-group-prepend">
                    <span class="input-group-text cursor-pointer" id="date1">انتخاب</span>
                </div>
            </div>
        </div>
        <div class="form-group row col-lg-6">
            <label for="to" class="col-lg-3 col-form-label text-md-right ">تا تاریخ</label>

            <div class="input-group">
               
                <input  type="text" id="inputDate2" class="form-control "  placeholder="Persian Calendar Text" 
                    aria-label="date2" aria-describedby="date2">
                <input type="hidden" name="to" id="inputDate22">


                <div class="input-group-prepend">
                    <span class="input-group-text cursor-pointer" id="date2">انتخاب</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row pb-4" dir="ltr">
        <button type="submit" class="btn btn-secondary " >گزارش بگیر</button>
        <button type="button" class="btn btn-info ml-3" onclick="printDiv()" >پرینت</button>

    </div>

    </form>
<table class="table" id="table" dir="rtl">
    <thead class="thead bg-secondary">
      <tr>
        <th scope="col">#id({{count($data)}})</th>
        <th scope="col">نام و نام خانودگی</th>
        <th scope="col">نوع دستگاه</th>
        <th scope="col">مدل دستگاه</th>
        <th scope="col">تحویل گیرنده</th>
        <th scope="col">تاریخ تحویل</th>
        <th scope="col">وضعیت </th>
        <th scope="col">{{($route === 'manage') ? "ویرایش/پرینت" : "پرینت"}}</th>
        @if($route === 'manage')
        <th scope="col">گزارش تعمیر</th>
        <th scope="col">تحویل</th>
        @endif
      </tr>
    </thead>
    <tbody>

          @foreach ($data as $item)
            <tr>
                <th scope="row">{{ $item->id}}</th>
                <td>{{ $item->name}}</td>
                <td>{{ $item->type}}</td>
                <td>{{ $item->model}}</td>
                <td>{{ $item->getter_name}}</td>
                <td>{{ $item->get_date}}</td>
                <td>{{ $item->situation_name}}</td>
            <td><a href="/edit/{{ $item->id}}"><i class="fa {{($route === "archive" || $item->giver_id != 0) ? "fa-print" : "fa-edit"}} text-primary" style="font-size: 30px;"></i></a></td> 
            @if($route === 'manage' )
                @if( $item->giver_id == 0)
                    <td><a href="#" ><i class="fa fa-wrench text-primary"  data-toggle="modal" data-target="#d-{{ $item->id}}" style="font-size: 30px;"></i></a></td> 
                   <td><a href="#"><i class="fa fa-check text-primary"  data-toggle="modal" data-target="#dd-{{ $item->id}}" style="font-size: 30px;"></i></a></td> 
                @else
                    <td><a href="#" ><i class="fa fa-exclamation-circle text-dark" onclick="alert('این دستگاه آرشیوی است و قابلیت تغییر وضعیت ندارد.')" style="font-size: 30px;" ></i></a></td> 
                    <td><a href="#"><i class="fa fa-exclamation-circle text-dark" onclick="alert('این دستگاه آرشیوی است و قابلیت تحویل ندارد.')" style="font-size: 30px;"></i></a></td> 
                @endif
            @endif
            </tr>
            @if($route === 'manage' && $item->giver_id == 0)
            <div class="modal fade" id="d-{{ $item->id}}" tabindex="-1" role="dialog" dir="rtl">
                <div class="modal-dialog" role="document">
                <form method="POST" action="{{ route('changeSituation')}}" >
                    @csrf
                    <input name="id" type="hidden" value="{{ $item->id}}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> تغییر وضعیت دستگاه {{ $item->name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                تعیین وضعیت دستگاه :
                            </p>
                            <div class="form-check">
                                <input type="radio" class="form-check-input " {{($item->situation==1 ? "checked" : "")}} id="materialUnchecked" name="situation" value="1">
                                <label class="form-check-label  mr-3" for="materialUnchecked">تعمیر انجام شد</label>
                                {{-- {{ ($item->situation == 1) ? 'active' : ''}} --}}
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" {{($item->situation==2 ? "checked" : "")}} id="materialUnchecked" name="situation"  value="2">
                                <label class="form-check-label mr-3" for="materialUnchecked">تعمیر انجام نشد</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" {{($item->situation==3 ? "checked" : "")}} id="materialUnchecked" name="situation"  value="3">
                                <label class="form-check-label mr-3" for="materialUnchecked">در حال تعمیر</label>
                            </div>
                            <div class="form-group mt-3 row">
                                <label class="col-4">شرح کار انجام شده:</label>
                            <textarea class="form-control col-8" name="situation_text">{{$item->situation_text}}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ذخیره</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        </div>
                    </div>
                </form>
                </div>
              </div>
              
              <div class="modal fade" id="dd-{{ $item->id}}" tabindex="-1" role="dialog" dir="rtl">
                <div class="modal-dialog" role="document">
                <form method="POST" action="{{ route('exit')}}" >
                    @csrf
                    <input name="id" type="hidden" value="{{ $item->id}}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> تحویل دستگاه {{ $item->name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                آیا از تحویل این دستگاه به صاحب آن مطمئنید؟
                            </p>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">بله</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">خیر</button>
                        </div>
                    </div>
                </form>
                </div>
              </div>
              @endif

          @endforeach

     
    </tbody>
  </table>
<script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })

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
            @if(isset($from) && validateDateTime($from, 'Y-m-d H:i:s'))selectedDate: new Date('{{$from}}'), @endif
            isGregorian: false,
            enableTimePicker: true,
            disabledDays: [ 6],
        });
        $('#date2').MdPersianDateTimePicker({
            targetTextSelector: '#inputDate2',
            targetDateSelector: '#inputDate22',
            dateFormat	: 'yyyy-MM-dd HH:mm:ss',
            @if(isset($to) && validateDateTime($to, 'Y-m-d H:i:s'))selectedDate: new Date('{{$to}}'), @endif
            isGregorian: false,
            enableTimePicker: true,
            disabledDays: [ 6]
        });


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
        function printDiv(params) {
             var node = document.getElementById('table');

       
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
</div>
</div>

@endsection