@extends('layouts.app')

@section('content')
    <h1>Create SPKO</h1>

    <form action="{{ route('spko.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee">Operator</label>
            <select name="employee" id="employee" class="form-control">
                <option value="">--Pilih Operator--</option>
                @foreach($employees as $emp)
                    <option value="{{ $emp->id_employee }}">{{ $emp->nama }} ({{ $emp->rank }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="trans_date">Tanggal Transaksi</label>
            <input type="date" name="trans_date" class="form-control">
        </div>

        <div class="form-group">
            <label for="process">Proses</label>
            <select name="process" class="form-control">
                @foreach($processes as $pr)
                    <option value="{{ $pr }}">{{ $pr }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="remarks">Remarks</label>
            <textarea name="remarks" class="form-control"></textarea>
        </div>

        <hr>
        <h3>Items</h3>
        <table class="table" id="itemTable">
            <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th><button type="button" class="btn btn-sm btn-success" id="addRow">+</button></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <select name="items[0][id_product]" class="form-control">
                        <option value="">--Pilih Product--</option>
                        @foreach($products as $prod)
                            <option value="{{ $prod->id_product }}">{{ $prod->description }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="number" name="items[0][qty]" class="form-control"></td>
                <td></td>
            </tr>
            </tbody>
        </table>

        <button class="btn btn-primary">Save</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(function(){
            let rowIndex = 1;
            $('#addRow').click(function(){
                let row = `<tr>
            <td>
                <select name="items[${rowIndex}][id_product]" class="form-control">
                    <option value="">--Pilih Product--</option>
                    @foreach($products as $prod)
                <option value="{{ $prod->id_product }}">{{ $prod->description }}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="number" name="items[${rowIndex}][qty]" class="form-control"></td>
            <td><button type="button" class="btn btn-sm btn-danger removeRow">-</button></td>
        </tr>`;
                $('#itemTable tbody').append(row);
                rowIndex++;
            });

            $(document).on('click','.removeRow', function(){
                $(this).closest('tr').remove();
            });
        });
    </script>
@endsection
