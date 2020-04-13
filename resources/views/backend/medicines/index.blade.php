@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Medicines</h2>
            </div>
            <div class="pull-right">
{{--                Cách check quyền trong view--}}
                @can('medicine-create')
                    <a class="btn btn-success" href="{{ route('medicines.create') }}"> Create New Medicine</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($medicines as $medicine)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $medicine->name }}</td>
                <td>{{ $medicine->detail }}</td>
                <td>
                    <form action="{{ route('medicines.destroy',$medicine->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('medicines.show',$medicine->id) }}">Show</a>
                        @can('medicine-edit')
                            <a class="btn btn-primary" href="{{ route('medicines.edit',$medicine->id) }}">Edit</a>
                        @endcan


                        @csrf
                        @method('DELETE')
                        @can('medicine-delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    {!! $medicines->links() !!}

@endsection
