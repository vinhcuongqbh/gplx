@extends('layouts.master')

@section('title', 'Staff Dashboard')

@section('heading')
    {{ __('khoahoc') }}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-auto">
                                <a href="{{ route('store.create') }}"><button type="button"
                                        class="btn bg-olive text-white w-100">{{ __('newStore') }}</button></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('store.search') }}" method="post" id="store-search">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-2 my-2">
                                    <input type="text" class="form-control" id="storeID" name="storeID"
                                        placeholder="{{ __('storeID') }}">
                                </div>
                                <div class="col-12 col-sm-2 my-2">
                                    <input type="text" class="form-control" id="storeName" name="storeName"
                                        placeholder="{{ __('storeName') }}">
                                </div>
                                <div class="col-12 col-sm-2 my-2">
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="{{ __('address') }}">
                                </div>
                                <div class="col-12 col-sm-2 my-2">
                                    <input type="text" class="form-control" id="telephone" name="telephone"
                                        placeholder="{{ __('telephone') }}">
                                </div>
                                <div class="col-12 col-sm-2 my-2">
                                    <input type="text" class="form-control" id="centerName" name="centerName"
                                        placeholder="{{ __('centerName') }}">
                                </div>
                                <div class="col-12 col-sm-2 my-2">
                                    <button type="submit"
                                        class="btn bg-olive text-white w-100">{{ __('search') }}</button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                        <table id="store-table" class="table table-bordered table-striped">
                            <colgroup>
                                <col style="width:8%;">
                                <col style="width:20%;">
                                <col style="width:33%;">
                                <col style="width:10%;">
                                <col style="width:20%;">
                                <col style="width:8%;">
                                <col style="width:8%;">
                            </colgroup>
                            <thead style="text-align: center">
                                <tr>
                                    <th>{{ __('storeID') }}</th>
                                    <th>{{ __('storeName') }}</th>
                                    <th>{{ __('address') }}</th>
                                    <th>{{ __('telephone') }}</th>
                                    <th>{{ __('centerName') }}</th>
                                    <th>{{ __('edit') }}</th>
                                    <th>{{ __('enable') }}/{{ __('disable') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stores as $store)
                                    <tr>
                                        <td style="text-align: center"><a
                                                href="{{ route('store.show', $store->storeId) }}">{{ $store->storeId }}</a>
                                        </td>
                                        <td>{{ $store->storeName }}</td>
                                        <td>{{ $store->storeAddr }}</td>
                                        <td>{{ $store->storeTel }}</td>
                                        <td>{{ $store->centerName }}</td>
                                        <td style="text-align: center">
                                            <a href="{{ route('store.edit', $store->storeId) }}">
                                                <button type="button"
                                                    class="btn bg-warning text-white w-100 text-nowrap">{{ __('edit') }}</button>
                                            </a>
                                        </td>
                                        <td>
                                            @if ($store->isDeleted == 0)
                                                <a class="btn bg-olive text-white w-100 text-nowrap"
                                                    href="{{ route('store.delete', $store->storeId) }}"
                                                    onclick="return confirm('{{ __('deleteStore') }}')">{{ __('enable') }}
                                                </a>
                                            @else
                                                <a class="btn btn-danger text-white w-100 text-nowrap"
                                                    href="{{ route('store.restore', $store->storeId) }}"
                                                    onclick="return confirm('{{ __('restoreStore') }}')">{{ __('disable') }}
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@stop

@section('css')
@stop

@section('js')
@stop
