<div class="container-fluid service-button">
    <span class="Service-History-span">
        Service History
        <!-- <img src="images/sort.png" alt="" class="sorting-img"> -->
    </span>
    <!-- <img src="images/sort.png" alt="" class="sorting-img"> -->
    <button class="export-button">
        Export
    </button>
</div>

<table id="example" class="table-data" style="width:100%">
    <!-- <thead class="sort-btn-thead">
                        <th class="sort-btn"> <img src="images/sort.png" alt=""
                            class="sorting-img"></th>
                    </thead> -->
    <thead>
        <tr>

            <th class="">Service Detail <img src="assets/Img/customer services history/sort.png" alt="" class="sorting-img"></th>
            <th class="">Service Provider <img src="assets/Img/customer services history/sort.png" alt="" class="sorting-img">
            </th>
            <th class="">Payment <img src="assets/Img/customer services history/sort.png" alt="" class="sorting-img"></th>
            <th class="">Status <img src="assets/Img/customer services history/sort.png" alt="" class="sorting-img">
            </th>
            <th class="">Rate SP</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="servicedetail">
                <img src="assets/Img/customer services history/calendar.png" alt="">
                <span>31/03/2018<br></span>12:00 - 18:00
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
            <td class="servicestatus">
                <span class="status completed">Completed</span>
            </td>
            <td class="ratesp-text">
                <button class="btn btn-rounded-17" value="Cancel" data-bs-toggle="modal" data-bs-target="#RateSP">Rate SP</button>
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