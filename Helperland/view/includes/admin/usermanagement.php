            <div class="container-fluid heading-class">
                <div class="container-fluid" id="heading-div">
                    <span class="heading-main-content">User Management</span>
                </div>
                <div>
                    <button type="button" class="btn">
                        <img class="add-button" src="assets/Img/admin/add.png" alt=""> Add New User
                    </button>
                </div>
            </div>

            <div class="second-div container-fluid">
                <form class="um-search-form">
                    <div class="sr-main-div-form">
                        <div class="sr-div pb-3">
                            <div>
                                <select class="form-control first-input username-um-search" name="username">
                                    <!-- <option>User name</option>
                                    <option>Abhishek</option>
                                    <option>Tatvasoft</option> -->
                                </select>
                            </div>
                            <div>
                                <select class="form-control second-input" name="usertype">
                                    <option value ="" selected>User Role</option>
                                    <option value="1">Customer</option>
                                    <option value="2">Service Provider</option>
                                </select>
                            </div>

                            <div>
                                <input type="tel" name="phone" class="form-control fourth-input" placeholder="Phone Number">
                            </div>

                            <div>
                                <input type="text" name="postal" class="form-control fourth-input" placeholder="Postal Code">
                            </div>

                            <div>
                                <input type="text" name="email" class="form-control fourth-input" placeholder="Email">
                            </div>

                            <div>
                                <input type="text" name="from-date" class="form-control fourth-input" placeholder="From Date" onfocus="(this.type='date')"> 
                                <!-- <input type="date" class="form-control fourth-input" placeholder="Zipcode"> -->
                            </div>

                            <div>
                                <input type="text" name="to-date" class="form-control fourth-input" placeholder="To Date" onfocus="(this.type='date')"> 
                                <!-- <input type="date" class="form-control fourth-input" placeholder="Zipcode"> -->
                            </div>
                        </div>
                        <div class="sr-btn-div">
                            <div>
                                <button type="button" class="btn submit-btn um-search-btn">Search</button>
                            </div>

                            <div class="col-reset">
                                <button type="Reset" class="btn clear-btn">Clear</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="container-fluid third-div">
                <table id="usermanage-admin-table" class="table-data" style="width:100%">
                    <thead>
                        <tr class="um-th">
                            <th>User Name<img src="assets/Img/admin/sort.png" alt="" class="sorting-img"></th>
                            <th>User Type <img src="assets/Img/admin/sort.png" alt="" class="sorting-img"></th>
                            <!-- <th>Role</th> -->
                            <th>Postal Code <img src="assets/Img/admin/sort.png" alt="" class="sorting-img"></th>
                            <th>City</th>
                            <th>Approval<img src="assets/Img/admin/sort.png" alt="" class="sorting-img"></th>
                            <th>User Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td class="username-data">
                                Lyum watson
                            </td>
                            <td class="usertype-data">
                                Call Center
                            </td>
                            <td class="role-data">
                                Inquiry Manager
                            </td>
                            <td class="postalcode-data">
                                123456
                            </td>
                            <td class="city-data">
                                Berlin
                            </td>
                            <td class="radius-data">
                                10km
                            </td>
                            <td class="userstatus-data">
                                <span class="status active">
                                    Active
                                </span>
                            </td>
                            <td class="action-data">
                                <div class="dropdown">
                                    <button class="btn action-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="assets/Img/admin/group-38.png" alt="">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Deactivate</a>
                                        <a class="dropdown-item" href="#">Service History</a>
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