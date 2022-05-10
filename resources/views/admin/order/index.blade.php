@extends('admin')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                    <h4 class="card-title">All Orders</h4>
                        <table id="example23" class="table emm_datatable dataTable no-footer"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Invoice ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Payment Method</th>
                                    <th>Grand Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach ($order as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>#INV-{{$item->invoice_id}}</td>
                                    <td>{{$item->billing_adderss->firstname}} {{$item->billing_adderss->lastname}}
                                    </td>
                                    <td>{{$item->billing_adderss->email}}</td>
                                    <td>{{$item->billing_adderss->phone}}</td>
                                    <td>{{$item->payment_method}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>
                                        <form action="{{ route('orders.destroy',$item->id) }}" method="POST">
                                        <a class="btn btn-success p-1 mt-1" href="{{ route('orders.show',$item->id) }}"><span title="View order" class="mdi mdi-eye"></span></a>
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-danger p-1 mt-1"><span title="Delete order"  class="mdi mdi-delete"></span></button>
                                        </form>
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
