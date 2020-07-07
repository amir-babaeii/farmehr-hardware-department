<div class="col-lg-3">
    <div class="card" >
        <div class="card-header ">({{auth()->user()->fullname}}) منو</div>

        <div class="card-body">
        <form action="{{route('search')}}" method="GET">
            <div class="form-group row" dir="rtl">
                <input  class="col-10 form-control" name="search"   style="border-bottom-left-radius: 0% !important;border-top-left-radius: 0% !important;" type="text" dir="rtl" placeholder="جستجو سریع" >
                <button class="col-2 btn btn-success " type="submit" style="border-bottom-right-radius: 0% !important;border-top-right-radius: 0% !important;"><i class="fa fa-search"></i></button>
            </div>
            <a class="btn btn-{{($route == 'dashboard' ) ? 'success' : 'primary'}} col-lg-12 mt-1" href="{{ route('dashboard')}}">گزارش گیری</a>
            <a class="btn btn-{{($route == 'add' ) ? 'success' : 'primary'}} col-lg-12 mt-1" href="{{ route('add')}}">دریافت دستگاه </a>
            <a class="btn btn-{{($route == 'manage' ) ? 'success' : 'primary'}} col-lg-12 mt-1" href="{{ route('manage')}}">مدیریت کالاها </a>
            <a class="btn btn-{{($route == 'archive' ) ? 'success' : 'primary'}} col-lg-12 mt-1" href="{{ route('archive')}}">آرشیو کالاها </a>
        </form>
        </div>
    </div>
</div>