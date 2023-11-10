@extends('provider.layouts.main')

@section('content')
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2 class="mb-0 fw-600 font-27px">Reports</h2>
        </div>
        <br>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3>Export Records</h3>
                        <p>Click on following buttons to export your data instantly</p>
                    </div>
                    <div class="d-flex gap-2">
                        <div>
                            <a class="btn btn-primary" style="border: 0px;" href="#.">Export Clients</a>
                        </div>
                        <div>
                            <a class="btn btn-success" style="border: 0px;" href="#.">Export Appointments</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cover-datatable">
            <table class="display align-middle" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Export Name</th>
                        <th>Export Date</th>
                        <th>Exported Records</th>
                        <th>File Size</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 1; $i <= 2; $i++) { ?>
                    <tr>
                        <td>Clients records</td>
                        <td>Tuesday, 25th April 2023, 13:51</td>
                        <td>144</td>
                        <td>10.2</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal  -->

    <div class="modal fade" id="createDiscountModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-600" id="modalTitleId">Create Discount</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" class=" mt-3">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Name</label>
                                    <input type="text" class=" form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Code</label>
                                    <input type="text" class=" form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Discount amount</label>
                                    <input type="number" class=" form-control">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Discount Type</label>
                                    <select class="select-box" data-minimum-results-for-search="Infinity">
                                        <option>Percentage</option>
                                        <option>Fixed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Starts</label>
                                    <input type="text" class=" form-control startDate">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Ends</label>
                                    <input type="text" class=" form-control endDate">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group m-0">
                                    <label for="">Type</label>
                                    <select class="select-box" data-minimum-results-for-search="Infinity" id="discountLimit"
                                        data-placeholder="Select Discount Limit">

                                        <option value="unlimited">Unlimited</option>
                                        <option value="limited">Limited</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12" id="showLimit">
                                <div class="form-group m-0">
                                    <label for="">Limit</label>
                                    <input type="text" class=" form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-center mt-3">
                                    <button type="submit"
                                        class="btn btn-primary text-white extra-btn-padding-30">Apply</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    @push('extra-js')
        <script>
            $('#discountLimit').on('change', function() {
                let value = $(this).val();
                if (value == "limited") {
                    $("#showLimit").show();
                } else {
                    $("#showLimit").hide();
                }
            })
        </script>
    @endpush
@endsection
