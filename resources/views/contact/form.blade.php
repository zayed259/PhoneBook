<div class="form-group row">
    <div class="col-md-6 pb-3">
        {!! Form::label('name', 'Name *', ['class' => 'form-label']); !!}
        {!! Form::text('name', null, [ 'class'=>'form-control', 'id'=>'name', 'placeholder'=>'Your Name']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('phone', 'Phone *', ['class' => 'form-label']); !!}
        {!! Form::text('phone', null, ['class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Your Phone']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 pb-3">
        {!! Form::label('homephone', 'Phone (home)', ['class' => 'form-label']); !!}
        {!! Form::text('homephone', null, ['class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Phone (optional)']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('officephone', 'Phone (office)', ['class' => 'form-label']); !!}
        {!! Form::text('officephone', null, ['class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Phone (optional)']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 pb-3">
        {!! Form::label('email', 'Email', ['class' => 'form-label']); !!}
        {!! Form::text('email', null, ['class'=>'form-control', 'id'=>'email', 'placeholder'=>'Email']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('opemail', 'Email (secondary)', ['class' => 'form-label']); !!}
        {!! Form::text('opemail', null, ['class'=>'form-control', 'id'=>'email', 'placeholder'=>'Email (optional)']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 pb-3">
        {!! Form::label('facebook', 'Facebook (username only)', ['class' => 'form-label']); !!}
        {!! Form::text('facebook', null, ['class'=>'form-control', 'id'=>'facebook', 'placeholder'=>'Ex: zayed59']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('instagram', 'Instagram (username only)', ['class' => 'form-label']); !!}
        {!! Form::text('instagram', null, ['class'=>'form-control', 'id'=>'instagram', 'placeholder'=>'Ex: zayed259']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 pb-3">
        {!! Form::label('twitter', 'Twitter (username only)', ['class' => 'form-label']); !!}
        {!! Form::text('twitter', null, ['class'=>'form-control', 'id'=>'twitter', 'placeholder'=>'Ex: zayed259']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('linkedin', 'Linkedin (username only)', ['class' => 'form-label']); !!}
        {!! Form::text('linkedin', null, ['class'=>'form-control', 'id'=>'linkedin', 'placeholder'=>'Ex: zayed259']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 pb-3">
        {!! Form::label('whatsapp', 'Whatsapp', ['class' => 'form-label']); !!}
        {!! Form::text('whatsapp', null, ['class'=>'form-control', 'id'=>'whatsapp', 'placeholder'=>'Enter your whatsapp number']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('website', 'Website', ['class' => 'form-label']); !!}
        {!! Form::text('website', null, ['class'=>'form-control', 'id'=>'website', 'placeholder'=>'Ex: https://zayed.isdbstudents.com/']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 pb-3">
        {!! Form::label('address', 'Address', ['class' => 'form-label']); !!}
        {!! Form::text('address', null, ['class'=>'form-control', 'id'=>'address', 'placeholder'=>'Your Address']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('photo', 'Photo', ['class' => 'form-label']); !!}
        {!! Form::file('photo', ['class'=>'form-control', 'id'=>'Photo']) !!}
    </div>
</div>
