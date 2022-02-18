<div class="container-fluid head-us">
    <span class="upcoming-heading">New Service Request</span>
</div>
<div class="container-fluid head-filter-nsr pt-3">
    <div class="row mb-2">
        <div class="col">
            Service area
        </div>
        <div class="col">
            <select class="form-select distance-filter-select" aria-label="Default select example">
                <option selected>Distance</option>
                <option value="1">1Km</option>
                <option value="1">2Km</option>
                <option value="1">5Km</option>
                <option value="1">10Km</option>
                <option value="2">12Km</option>
                <option value="2">15Km</option>
                <option value="2">18Km</option>
                <option value="2">20Km</option>
                <option value="2">23Km</option>
                <option value="3">25Km</option>
                <option value="3">30Km</option>
                <option value="3">50Km</option>
            </select>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" name="pet-at-home-filter" type="checkbox" value="1" id="pah-filter">
                <label class="form-check-label" id="pah-filter-label" for="pah-filter">
                    Include Pet at Home 
                </label>
            </div>
        </div>
    </div>
</div>
<table id="example" class="table-data" style="width:100%">
    <thead>
        <tr>
            <th class="serviceid">Service ID <img src="assets/Img/spupcoming/sort.png" alt="" class="sorting-img"></th>
            <th class="servicedata">Service date
            </th>
            <th class="customerdetail">Customer details</th>
            <th class="servicedistance">Payment
            </th>
            <th class="serviceaction">Time conflict</th>
            <th class="serviceaction">Actions</th>
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
            <td class="servicedistance">15km</td>
            <td class="timeconflict"></td>
            <td class="serviceactions-body"><button class="btn btn-rounded-17" value="Cancel">Accept</button></td>
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