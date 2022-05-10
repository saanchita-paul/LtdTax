@extends('admin')

@section('content')
<div class="content-wrapper">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close bg-danger rounded-right"
                data-dismiss="alert">&times;</button>
            <strong> {{ session()->get('success') }} </strong>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Book Reviews</h4>
                    <div class="table-responsive">
                        <table id="order-listing" class="table emm_datatable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Book Name</th>
                                    <th>User Name</th>
                                    <th>Rating</th>
                                    <th>Review</th>
                                    <th>Status</th>
                                    <th>Change Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $review as $reviews)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>
                                        @foreach($book as $books)
                                        @if($reviews->book_id==$books->id)
                                        {{$books->name}}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($user as $us)
                                        @if($us->id==$reviews->user_id)
                                        {{$us->name}} {{$us->lname}}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>{{$reviews->rating}}</td>
                                    <td>{{$reviews->review}}</td>
                                    <td>
                                        <?php 
                                            switch ($reviews->status) {
                                                case '0':
                                                echo "<button class='btn btn-primary'>Pending</button>";
                                                break;
                                                
                                                case '1':
                                                echo "<button class='btn btn-success'>Publish</button>";
                                                break;
                                                case '2':
                                                echo "<button class='btn btn-danger'>Cancel</button>";
                                                break;
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Change Status</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item text-warning" href="{{url('/admin/books/review/status/0/'.$reviews->id)}}">Pending</a>
                                            <a class="dropdown-item text-info" href="{{url('/admin/books/review/status/1/'.$reviews->id)}}">Publish</a>
                                            <a class="dropdown-item text-danger" href="{{url('/admin/books/review/status/2/'.$reviews->id)}}">Cancel</a>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('review.delete', $reviews->id)}}">
                                            <span title="Delete review"  class="mdi mdi-delete"></span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
