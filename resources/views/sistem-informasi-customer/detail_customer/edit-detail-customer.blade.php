@php($modal = 1)
@foreach ($customer->detail_customer as $Customer) 
    <div class="modal fade" id="editCustomer{{ $Customer->id }}" tabindex="-1" aria-labelledby="editCustomerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/detail-customer/'.$customer->id.'/edit') }}" method="post">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <input type="text" class="form-control" id="#" name="id_detail" value="{{ $Customer->id }}" hidden>
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">ATTN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $Customer->attn }}" id="#" name="attn" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" value="{{ $Customer->tanggal }}" id="tanggal" name="tanggal" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">Type</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="#"  value="{{ $Customer->type }}" name="type" required>
                            </div>
                        </div>
                        <div id="editSparepart{{ $modal }}">
                            @php($i = 0)
                            {{-- <div class="form-group row"> --}}
                                <label for="#" class="col-form-label text-black font-w500">Sparepart</label>
                                @foreach($Customer->pivot_detail as $sparepart)
                                
                                <div class="form-group row" id="row_EditSparepart{{ $modal }}_{{ $i }}">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="#" name="sparepart[]" value = "{{ $sparepart->sparepart }}" @if($i==0) required @endif>
                                    </div>
                                    <div class="col">
                                        @if($i==0)
                                            <button class="btn btn-secondary btn_edit" name="add_item" id="{{ $modal }}">+</button>
                                        @else
                                            <button class="btn btn-secondary btn_remove" name="add_item" id="{{ $modal }}_{{ $i }}">-</button>
                                        @endif
                                    </div> 
                                </div>
                                    @php($i++) 
                                @endforeach
                            {{-- </div> --}}
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">Nota</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="#" value="{{ $Customer->nota }}" name="nota" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">Service</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="service"  rows="8" cols="40">{{ $Customer->service }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin mengedit data ini?')">edit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @php($modal++)
@endforeach
