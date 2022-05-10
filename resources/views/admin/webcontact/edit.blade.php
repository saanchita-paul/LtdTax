@extends('admin')

@section('content') 
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">View Message</h4>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" readonly class="form-control" value="{{$webcontact->name}}" name="name" id="name" placeholder="Please enter name">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" readonly class="form-control" value="{{$webcontact->email}}" name="email" id="email" placeholder="Please enter email">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" readonly class="form-control" value="{{$webcontact->subject}}" name="subject" id="subject" placeholder="Please enter subject">
                    </div>
                    <div class="form-group">
                        <label for="message"> Message</label> 
                        <textarea name="" class="form-control" readonly id="" cols="50" rows="12">{{$webcontact->message}}</textarea>
                    </div>
                    <a href="/admin/contact" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection