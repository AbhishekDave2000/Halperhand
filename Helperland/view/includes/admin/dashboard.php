<div class="container-fluid service-button" style="padding-bottom: 5px;">
    <span class="Service-History-span">
        Current Service Request
        <!-- <img src="images/sort.png" alt="" class="sorting-img"> -->
    </span>
    <!-- <img src="images/sort.png" alt="" class="sorting-img"> -->
    <button class="add-service-button">
        Add new Service Request
    </button>
</div>

<table id="example" class="table-data" style="width:100%">
    <!-- <thead class="sort-btn-thead">
                        <th class="sort-btn"> <img src="images/sort.png" alt=""
                            class="sorting-img"></th>
                    </thead> -->
    <thead>
        <tr>
            <th class="">Service Id</th>
            <th class="">Service Date</th>
            <th class="">Service Provider</th>
            <th class="">Payment</th>
            <th class="sction-head-dash">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="dashserviceid">
                <span>12313</span>
            </td>
            <td class="dashservicedate" style="flex-direction:column;">
                <span><img src="assets/Img/customer services history/calendar2.png" alt=""> 31/03/2018</span><br>
                <span><img src="assets/Img/customer services history/layer-14.png" alt=""> 12:00 - 18:00</span>
            </td>
            <td class="serviceprovider">
                <div class="cap-div">
                    <img class="cap" src="assets/Img/customer services history/cap.png" alt="cap">
                </div>
                <span>Lyum Watson <br>
                    <i class="fas fa-star i-con"></i>
                    <i class="fas fa-star i-con"></i>
                    <i class="fas fa-star i-con"></i>
                    <i class="fas fa-star i-con"></i>
                    <i class="fas fa-star i-con-e"></i>
                    4
                </span>
            </td>
            <td class="payment-text">
                <i class="fas fa-euro-sign"></i> 63<br>
            </td>
            <td class="dash-action">
                <button type="button" data-bs-dismiss="modal" data-bs-toggle="modal" class="btn reshedule-btn" data-bs-target="#Reschedule-Request">Reshedule</button>
                <button type="button" data-bs-dismiss="modal" data-bs-toggle="modal" class="btn cancel-btn" data-bs-target="#cancel-request">Cancel</button>
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