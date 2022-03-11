            <div class="container-fluid heading-class">
                <div class="container-fluid" id="heading-div">
                    <span class="heading-main-content">Service Requests</span>
                </div>
            </div>

            <div class="second-div container-fluid">
                <form class="sr-search-form">
                    <div class="sr-main-div-form">
                        <div class="sr-div">
                            <div class="col-md-2">
                                <input type="text" name="SIS" class="form-control s-first-input" placeholder="Service ID">
                            </div>
                            <div class="col-md-2">
                                <!-- <input class="form-control" type="text" placeholder="Customer" name="CS"> -->
                                <select class="form-control s-second--input" name="CS">
                                
                                </select>
                            </div>

                            <div class="col-md-2">
                                <!-- <input class="form-control" type="text" placeholder="Provider" name="PS"> -->
                                <select class="form-control s-third--input" name="PS">

                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control s-fourth--input" name="status">
                                    <option value="" selected>Status</option>
                                    <option value="0">New</option>
                                    <option value="1">Assigned</option>
                                    <option value="2">Accepted</option>
                                    <option value="3">Canceled</option>
                                    <option value="4">Completed</option>
                                </select>
                            </div>

                            <div class="date-pick col-md-2">
                                <input type="date" name="DOS-FROM" class="form-control s-fifth-input" placeholder="From">
                            </div>

                            <div class="date-pick col-md-2">
                                <input type="date" name="DOS-TO" class="form-control s-sixth-input" placeholder="To">
                            </div>
                        </div>
                        <div class="sr-btn-div">
                            <div class="col">
                                <button type="button" id="search-btn" class="btn submit-btn">Search</button>
                            </div>

                            <div class="col col-reset">
                                <button type="Reset" class="btn clear-btn">Clear</button>
                            </div>
                        </div>


                    </div>
                </form>
            </div>

            <div class="container-fluid third-div">
                <table id="servicerequest-admin-table" class="table-data" style="width:100%">
                    <thead>
                        <tr>
                            <th class="serviceid">Service ID <img src="assets/Img/admin/sort.png" alt="" class="sorting-img"></th>
                            <th class="servicedate">Service date <img src="assets/Img/admin/sort.png" alt="" class="sorting-img"></th>
                            <th class="customerdetails">Customer details</th>
                            <th class="serviceprovider">Service provider <img src="assets/Img/admin/sort.png" alt="" class="sorting-img"></th>
                            <th>Status</th>
                            <th class="action">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td class="serviceid-data">
                                323434
                            </td>
                            <td class="servicedate-data">
                                <img src="assets/Img/admin/calendar2.png" alt=""> <span>09/04/2018</span> <br>
                                <img src="assets/Img/admin/layer-14.png" alt=""> 12:00 - 18:00
                            </td>
                            <td class="customerdetails-data">
                                David Bough <br>
                                <img src="assets/Img/admin/layer-15.png" alt=""> Musterstrabe 5,12345 Bonn
                            </td>
                            <td class="serviceprovider-data">
                                <div class="cap-div">
                                    <img class="cap" src="assets/Img/admin/cap.png" alt="cap">
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
                            <td class="status-data">
                                <span class="status new">
                                    new
                                </span>
                            </td>
                            <td class="action-data">
                                <div class="dropdown">
                                    <button class="btn action-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="assets/Img/admin/group-38.png" alt="">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="polygon">

                                        </div>
                                        <a class="dropdown-item" href="#">Edit & Reschedule</a>
                                        <a class="dropdown-item" href="#">Refund</a>
                                        <a class="dropdown-item" href="#">Cancel</a>
                                        <a class="dropdown-item" href="#">Change SP</a>
                                        <a class="dropdown-item" href="#">Escalate</a>
                                        <a class="dropdown-item" href="#">History Log</a>
                                        <a class="dropdown-item" href="#">Download Invoice</a>
                                    </div>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            <div class="footer container-fluid">
                <span>
                    ©2018 Helperland. All rights reserved.
                </span>
            </div>