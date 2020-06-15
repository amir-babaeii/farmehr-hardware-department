<div class="col-lg-3">
    <div class="card" >
        <div class="card-header ">منو</div>

        <div class="card-body">
            <a class="btn btn-{{($route == 'dashboard' ) ? 'success' : 'primary'}} col-lg-12 mt-1" href="{{ route('dashboard')}}">داشبورد </a>
            <a class="btn btn-{{($route == 'add' ) ? 'success' : 'primary'}} col-lg-12 mt-1" href="{{ route('add')}}">افزودن کالای خراب </a>
            <a class="btn btn-{{($route == 'manage' ) ? 'success' : 'primary'}} col-lg-12 mt-1" href="{{ route('manage')}}">مدیریت کالاها </a>
            <a class="btn btn-{{($route == 'archive' ) ? 'success' : 'primary'}} col-lg-12 mt-1" href="{{ route('archive')}}">آرشیو کالاها </a>

        </div>
    </div>
</div>