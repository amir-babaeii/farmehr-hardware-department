@extends('layouts.cms')

@section('body')
<div class="main" style="height: 1000px">
<table class="table" dir="rtl">
    <thead class="thead" style="background-color: #38c172">
      <tr>
        <th scope="col">#id</th>
        <th scope="col">نام و نام خانودگی</th>
        <th scope="col">نوع دستگاه</th>
        <th scope="col">مدل دستگاه</th>
        <th scope="col">نام تحویل گیرنده</th>
        <th scope="col">تاریخ تحویل</th>
        <th scope="col">وضعیت تعمیر</th>
        <th scope="col">ویرایش</th>
        <th scope="col">گزارش تعمیر</th>
        <th scope="col">تحویل</th>
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
                <td><a href="/edit/{{ $item->id}}"><i class="fa fa-edit text-primary" style="font-size: 30px;"></i></a></td> 
                <td><a href="#"><i class="fa fa-wrench text-primary" data-toggle="modal" data-target="#d-{{ $item->id}}" style="font-size: 30px;"></i></a></td> 
                <td><a href="#"><i class="fa fa-check text-primary" data-toggle="modal" data-target="#dd-{{ $item->id}}" style="font-size: 30px;"></i></a></td> 
            </tr>
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
          @endforeach

     
    </tbody>
  </table>
<script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
</div>

@endsection