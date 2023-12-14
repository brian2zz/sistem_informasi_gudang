@foreach($customer->detail_customer as $Customer)
                <div class="modal fade" id="detail{{ $loop->iteration }}" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Table Detail</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="id_produk">Tanggal </label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="id_produk">{{ $Customer->tanggal }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="id_produk">ATTN </label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="id_produk">{{ $Customer->attn }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="id_produk">Type </label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="id_produk">{{ $Customer->type }}</label>
                                    </div>
                                </div>
                                <!-- <div class="table-responsive">
                                    <table id="produk" class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                   No 
                                                </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Sparepart
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i = 1)
                                            @foreach($Customer->pivot_detail as $sparepart)
                                            <tr>
                                                <td class="ps-4">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $i }}</p>
                                                </td>
                                                <td class="ps-4">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $sparepart->sparepart }}</p>
                                                </td>
                                            </tr>
                                            @php($i++)
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> -->
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="id_produk">Sparepart </label>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="id_produk">
                                        @foreach($Customer->pivot_detail as $sparepart)
                                            {{ $sparepart->sparepart }} <br>
                                        @endforeach
                                        </label>
                                    </div>
                                    <!-- <div class="col">
                                        @foreach($Customer->pivot_detail as $sparepart)
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">- {{ $sparepart->sparepart }}</label>
                                            </div>

                                        </div>
                                        @endforeach
                                    </div> -->
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="id_produk">Nota </label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="id_produk">{{ $Customer->nota }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="id_produk">Service </label>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <textarea class="form-control text-xs font-weight-bolder" readonly name="service"  rows="8" cols="40">{{ $Customer->service }}</textarea>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach