@extends('layouts.admin')

@section('content')
    <h2>Types</h2>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="my-4 input-add">
        <form action="{{ route('admin.types.store') }}" method="POST" class="d-flex">
            @csrf
            <input class="form-control me-2" type="search" placeholder="New types" name="name">
            <button class="btn btn-outline-success" type="submit">Send</button>
        </form>

    </div>

    <table class="table crud-table">
        <thead>
            <tr>
                <th scope="col">Type</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>

                    <form action="{{ route('admin.types.update', $type) }}" method="POST"
                        id="form-edit-{{ $type->id }}">
                        @csrf
                        @method('PUT')
                        <td>
                            <input type="text" value="{{ $type->name }}" name="name">
                        </td>

                    </form>
                    <td class="d-flex">
                        <button class="btn btn-warning btn-sm me-1" onclick="submitForm( {{ $type->id }} )"><i
                                class="fa-solid fa-pencil"></i></button>

                        <form action="{{ route('admin.types.destroy', $type) }}" method="POST"
                            onsubmit="return confirm('Sei sicuro di voler eliminare la type?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></i></button>
                        </form>

                    </td>

                </tr>
            @endforeach


        </tbody>
    </table>

    <script>
        function submitForm(id) {

            const form = document.getElementById(`form-edit-${id}`);
            form.submit();
        }
    </script>
@endsection
