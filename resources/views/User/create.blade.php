@extends('layouts.app')

@section('content')
<div class="container p-4 mb-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="card border-secondary shadow">
                <div class = "card-header h2 d-flex justify-content-center mb-4 bg-tertiary">
                    Crear Usuario
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'users.store']) !!}
                    @include('User.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var researcher_id = $(this).find('input[name="researcher_id"]').val();
        if(researcher_id != null){
            $("#userType option[value='Administrador']").attr("disabled", "disabled");
            $("#userType option[value='Investigador']").attr("selected", "selected");
        }
    });
</script>
@endsection