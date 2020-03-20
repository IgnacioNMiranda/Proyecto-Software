<div class="form-group">
  {{ Form::label('', "Grupo de investigación asociado") }}
  {{ Form::label('warning_invesigation_group','*', array('class' => 'text-danger'))}}
  {{ Form::select('investigation_group_name', $investigation_groups, null, 
                      ['class' => 'form-control','placeholder' => 'Seleccione grupo de investigación','id' => 'investigation_group_id']) }}
</div>
{{-- Las cosas que necesitan id son solo los que van a ser dinamicos, por eso se eleimina en el select anterior--}}
{{-- Se le pone el atributo name a los input que se van a mandar al controlador --}}
<div class="form-group">
  {{ Form::label('code', 'Código') }}
  {{ Form::label('code','*', array('class' => 'text-danger'))}}
  {{ Form::text('code', null, ['class' => 'form-control', 'id' => 'code']) }}
</div>

<div class="form-group">
  {{ Form::label('name', 'Nombre del Proyecto') }}
  {{ Form::label('name','*', array('class' => 'text-danger'))}}
  {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>

<div class="form-group">
  {{ Form::label('state','Estado') }}
  {{ Form::label('state','*', array('class' => 'text-danger'))}}
  {{ Form::select('state',config('options.states'),null,['class' => 'form-control', 'placeholder'=>'Seleccionar estado']) }}
</div>

<div class="form-group">
  {{ Form::label('researchers','Investigador(es) asociado(s) del grupo de investigación')}}
  {{ Form::label('researchers','*', array('class' => 'text-danger'))}}
  {{Form::select('researchers[]',$researchers,null, ['class'=>'form-control', 'multiple' => true, 'id' => 'researchers_id','name' => 'researchers_name'])}}
</div>

<div class="form-group">
  {{ Form::label('researchers','Investigador(es) asociado(s)')}}
  {{Form::select('researchers[]',$researchers,null, ['class'=>'form-control', 'multiple' => true,'id' => 'researchers_id2','name' => 'researchers_name2'])}}
</div>

<div class="form-group">
  {{ Form::label('startDate', 'Fecha de Creación') }}
  {{ Form::label('startDate','*', array('class' => 'text-danger'))}}
  <input type="date" name="startDate" id="startDate" max="<?php echo date("Y-m-d");?>"
    value="<?php echo date("Y-m-d");?>">
</div>

{{-- <div class ="form-group"> --}}
  {{-- {{ Form::date('deadline', new \DateTime(), ['class' => 'form-danger']) }} --}}
{{-- </div> --}}

<div class="form-group">
  {{ Form::label('endDate', 'Fecha de Término ') }}
  {{ Form::label('endDate','*', array('class' => 'text-danger'))}}
  <input type="date" name="endDate" id="endDate" min="<?php echo date("Y-m-d");?>" value="<?php echo date("Y-m-d");?>">
</div>

<div class="form-group mt-4 d-flex justify-content-center">
  {{ Form::submit('Guardar', ['class' => 'btn btn-secondary']) }}
</div>

{{-- <script> --}}
  {{-- // $('#datetimepicker').datetimepicker({ --}}
    {{-- // format: 'yyyy-mm-dd' --}}
{{-- // }); --}}
{{-- </script> --}}


{{-- Cuando se llama algo de JQuery se pone el simbolo # adelante (por id) --}}
{{-- Tambien se pueden llamar las clases para los estilos pero anteponiendo un . --}}
<script>
  $('#investigation_group_id').on('change', function() 
  {
    $.ajax(
      {             
      type:'POST', 
      url:'getResearchers',             
      data:
      {
        "_token": "{{ csrf_token() }}",
        id:this.value
      },             
      success:function(data)
      {             
       // alert(data.success);  
       console.log(data);           
      }          
    });
      // alert(this.value); 
  });
</script>
