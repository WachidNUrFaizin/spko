@extends('layouts.app')

@section('content')
    <h1>Edit SPKO - {{ $spko->sw }}</h1>

    <form action="{{ route('spko.update', $spko->id_spko) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="employee">Operator</label>
            <select name="employee" id="employee" class="form-control">
                <option value="">--Pilih Operator--</option>
                @foreach($employees as $emp)
                    <option value="{{ $emp->id_employee }}" {{ $spko->employee == $emp->id_employee ? 'selected' : '' }}>{{ $emp->nama }} ({{ $emp->rank }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="trans_date">Tanggal Transaksi</label>
            <input type="date" name="trans_date" class="form-control" value="{{ $spko->trans_date }}">
        </div>

        <div class="form-group">
            <label for="process">Proses</label>
            <select name="process" class="form-control">
                @foreach($processes as $pr)
                    <option value="{{ $pr }}" {{ $spko->process == $pr ? 'selected' : '' }}>{{ $pr }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="remarks">Remarks</label>
            <textarea name="remarks" class="form-control">{{ $spko->remarks }}</textarea>
        </div>

        <hr>
        <h3>Items</h3>
        <table class="table" id="itemTable">
            <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>
                    <button type="button" class="btn btn-sm btn-success" id="addRow">+</button>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($spko->items as $i => $item)
                <tr>
                    <td>
                        <select name="items[{{ $i }}][id_product]" class="form-control">
                            <option value="">--Pilih Product--</option>
                            @foreach($products as $prod)
                                <option value="{{ $prod->id_product }}" {{ $item->id_product == $prod->id_product ? 'selected' : '' }}>{{ $prod->description }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="items[{{ $i }}][qty]" class="form-control" value="{{ $item->qty }}">
                    </td>
                    <td>
                        @if($i > 0)
                            <button type="button" class="btn btn-sm btn-danger removeRow">-</button>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('spko.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(function(){
            let rowIndex = {{ count($spko->items) }};

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
