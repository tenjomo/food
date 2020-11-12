@extends('layouts.app')

@section('title','Item')

@push('css')

@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <a href="{{ route('item.create') }}" class="btn btn-info">New item</a>
                @include('layouts.partial.msg')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Tous les produits</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="example">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Image
                        </th>
                        <th>
                          Category name
                        </th>
                          <th>
                            Price
                          </th>
                        <th>
                          Created at
                        </th>
                        <th>
                          Updated at
                        </th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                          @foreach($items as $key=>$item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td><img src="{{ asset('uploads/item/' . $item->image) }}" width="100px;" height="80px;" alt=""></td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                        <a href="{{ route('item.edit',$item->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                        <form id="delete-form-{{ $item->id }}" action="{{ route('item.destroy',$item->id) }}" style="display: none;" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $item->id }}').submit();
                                        }else {
                                            event.preventDefault();
                                                }"><i class="material-icons">delete</i></button>
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
      </div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
@endpush
