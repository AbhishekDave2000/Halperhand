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
                <form>
                    <div class="sr-main-div-form">
                        <div class="sr-div">
                            <div class="">
                                <select class="form-control first-input" name="user name">
                                    <option>User name</option>
                                    <option>Abhishek</option>
                                    <option>Tatvasoft</option>
                                </select>
                            </div>
                            <div class="">
                                <select class="form-control second-input" name="user name">
                                    <option>User Role</option>
                                    <option>Inquiry Manager</option>
                                    <option>Content Manager</option>
                                    <option>Finance Manager</option>
                                </select>
                            </div>

                            <div class=" p-num">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+49</div>
                                </div>
                                <input type="tel" class="form-control" placeholder="Phone Number">
                            </div>

                            <div class="">
                                <input type="text" class="form-control fourth-input" placeholder="Zipcode">
                            </div>
                        </div>
                        <div class="sr-btn-div">
                            <div class="">
                                <button type="submit" class="btn submit-btn">Search</button>
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
                        <tr>
                            <th class="username">User Name<img src="assets/Img/admin/sort.png" alt="" class="sorting-img"></th>
                            <th class="usertype">User Type <img src="assets/Img/admin/sort.png" alt="" class="sorting-img">
                            </th>
                            <th class="role">Role</th>
                            <th class="postalcode">Postal Code <img src="assets/Img/admin/sort.png" alt="" class="sorting-img">
                            </th>
                            <th class="city">City</th>
                            <th class="radius">Radius <img src="assets/Img/admin/sort.png" alt="" class="sorting-img"></th>
                            <th class="userstatus">User Status</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
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
                        </tr>
                    </tbody>
                </table>

                <!-- <div class="pagination-div container-fluid">
                    <div class="entry-show">
                        <span class="span-show">
                            show
                        </span>
                        <select class="form-select" aria-label=".form-select-sm example">
                            <option selected>10</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                        <span class="span-entry">
                            Entries
                        </span>
                    </div>

                    <nav class="pagination-nav" aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <i class="fas fa-caret-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <i class="fas fa-caret-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div> -->
            </div>

            <div class="footer container-fluid">
                <span>
                    ©2018 Helperland. All rights reserved.
                </span>
            </div>