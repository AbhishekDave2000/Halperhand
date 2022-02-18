<div class="container-fluid head-us">
    <span class="upcoming-heading">Service History</span>
</div>

<div class="container-fluid service-button pb-2 pt-3">
    <span class="service-history-head">
        <div class="row">
            <div class="col ps-head">Payment Status</div>
            <div class="col">
                <select class="form-select ph-col-select" aria-label="">
                    <option selected>All</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                </select>
            </div>
        </div>
    </span>
    <!-- <img src="images/sort.png" alt="" class="sorting-img"> -->
    <button class="export-button">
        Export
    </button>
</div>

<table id="example" class="table-data" style="width:100%">
    <thead>
        <tr>
            <th class="serviceid">Service ID <img src="assets/Img/spupcoming/sort.png" alt="" class="sorting-img"></th>
            <th class="servicedata">Service data</th>
            <th class="customerdetail">Customer details</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="serviceid">323431</td>
            <td class="servicedata"><img src="assets/Img/spupcoming/calendar2.png" alt="">
                <span>09/04/2018</span> <br>
                <img src="assets/Img/spupcoming/layer-14.png" alt=""> 12:00 - 18:00
            </td>
            <td class="customerdetail">David Bough <br>
                <img src="assets/Img/spupcoming/layer-15.png" alt=""> Musterstrabe 5,12345 Bonn
            </td>
        </tr>
    </tbody>
</table>

<div class="container-fluid pagination-div">
    <div class="container-fluid">
        <span class="span-show">
            show
        </span>
        <div class="btn-group">
            <!-- <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                10
                            </button> -->
            <select class="form-select" aria-label="form-select-sm example">
                <option selected>10</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
            </select>
        </div>
        <span class="span-entries">
            entries
        </span>
        <span class="span-TR">
            Total Records: 10
        </span>
    </div>

    <nav class="pagination-nav" aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <i class="fas fa-caret-left"></i>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <i class="fas fa-caret-right"></i>
                </a>
            </li>
        </ul>
    </nav>
</div>