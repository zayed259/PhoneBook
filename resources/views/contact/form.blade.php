<div class="form-group pb-3">
    {!! Form::label('name', 'Name *', ['class' => 'form-label']); !!}
    {!! Form::text('name', null, [ 'class'=>'form-control', 'id'=>'name', 'placeholder'=>'Your Name']) !!}
</div>
<div class="form-group pb-3">
    {!! Form::label('phone', 'Phone *', ['class' => 'form-label']); !!}
    {!! Form::text('phone', null, ['class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Your Phone']) !!}
</div>
<div class="form-group row">
    <div class="col-md-6 pb-3">
        {!! Form::label('homephone', 'Phone (home)', ['class' => 'form-label']); !!}
        {!! Form::text('homephone', null, ['class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Phone (optional)']) !!}
    </div>
    <div class="col-md-6 pb-3">
        {!! Form::label('officephone', 'Phone (office)', ['class' => 'form-label']); !!}
        {!! Form::text('officephone', null, ['class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Phone (optional)']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 pb-3">
        {!! Form::label('email', 'Email', ['class' => 'form-label']); !!}
        {!! Form::text('email', null, ['class'=>'form-control', 'id'=>'email', 'placeholder'=>'Email']) !!}
    </div>
    <div class="col-md-6 pb-3">
        {!! Form::label('opemail', 'Email (if needed)', ['class' => 'form-label']); !!}
        {!! Form::text('opemail', null, ['class'=>'form-control', 'id'=>'email', 'placeholder'=>'Email (optional)']) !!}
    </div>
</div>
<div class="form-group pb-3">
    {!! Form::label('photo', 'Photo', ['class' => 'form-label']); !!}
    {!! Form::file('photo', ['class'=>'form-control', 'id'=>'Photo']) !!}
</div>
