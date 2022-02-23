<nav>
    <div class="nav nav-tabs setting-nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active setting-btn-tab" id="nav-detail-tab" data-bs-toggle="tab" data-bs-target="#nav-detail" type="button" role="tab" aria-controls="nav-home" aria-selected="true">My Detail</button>
        <button class="nav-link setting-btn-tab" id="nav-address-tab" data-bs-toggle="tab" data-bs-target="#nav-address" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">My Address</button>
        <button class="nav-link setting-btn-tab" id="nav-password-tab" data-bs-toggle="tab" data-bs-target="#nav-password" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">My Password</button>
    </div>
</nav>
<div class="tab-content setting-tab-content" id="nav-tabContent">

    <div class="tab-pane fade show active" id="nav-detail" role="tabpanel" aria-labelledby="nav-home-tab">
        <form action="<?= Config::base_url . '?controller=customerDash&function=myDetailUpdate' ?>" method="post">
            <div class="container-fluid pt-2 pb-4" style="border-bottom: 1px solid #acacac;">
                <div class="row pt-3">
                    <input type="hidden" name="user-logged-in-id" id="user-logged-in-id" value="<?= $_SESSION['user']['UserId']; ?>">
                    <div class="col-md-4 pt-2 pl-0">
                        <label class="form-label">First name</label>
                        <input type="text" class="form-control my-setting-FN" name="FirstName" placeholder="First Name">
                    </div>
                    <div class="col-md-4 pl-0 pt-2">
                        <label class="form-label">Last name</label>
                        <input type="text" class="form-control my-setting-LN" name="LastName" placeholder="Last Name">
                    </div>
                    <div class="col-md-4 pl-0 pt-2">
                        <label class="form-label">E-mail address</label>
                        <input type="email" class="form-control my-setting-Email" name="EmailAddress" placeholder="Email">
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-4 pt-2 pl-0 phone-no-div">
                        <label class="form-label" for="autoSizingInputGroup">Mobile number</label>
                        <div class="input-group">
                            <div class="input-group-text">+49</div>
                            <input type="tel" class="form-control my-setting-Phone" name="Phone" id="autoSizingInputGroup" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="col-md-4 pl-0 pt-2">
                        <label class="form-label">Date Of Birth</label>
                        <div class="row dob-div-row">
                            <div class="col-md-3">
                                <select class="form-select my-setting-DOB-D" name="DOB_Date" aria-label="Default select example">
                                    <option value="01">1</option>
                                    <option value="02">2</option>
                                    <option value="03">3</option>
                                    <option value="04">4</option>
                                    <option value="05">5</option>
                                    <option value="06">6</option>
                                    <option value="07">7</option>
                                    <option value="08">8</option>
                                    <option value="09">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select class="form-select my-setting-DOB-M" name="DOB_Month" aria-label="Default select example">
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select my-setting-DOB-Y" name="DOB_Year" aria-label="Default select example">
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965">1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>
                                    <option value="1959">1959</option>
                                    <option value="1958">1958</option>
                                    <option value="1957">1957</option>
                                    <option value="1956">1956</option>
                                    <option value="1955">1955</option>
                                    <option value="1954">1954</option>
                                    <option value="1953">1953</option>
                                    <option value="1952">1952</option>
                                    <option value="1951">1951</option>
                                    <option value="1950">1950</option>
                                    <option value="1949">1949</option>
                                    <option value="1948">1948</option>
                                    <option value="1947">1947</option>
                                    <option value="1946">1946</option>
                                    <option value="1945">1945</option>
                                    <option value="1944">1944</option>
                                    <option value="1943">1943</option>
                                    <option value="1942">1942</option>
                                    <option value="1941">1941</option>
                                    <option value="1940">1940</option>
                                    <option value="1939">1939</option>
                                    <option value="1938">1938</option>
                                    <option value="1937">1937</option>
                                    <option value="1936">1936</option>
                                    <option value="1935">1935</option>
                                    <option value="1934">1934</option>
                                    <option value="1933">1933</option>
                                    <option value="1932">1932</option>
                                    <option value="1931">1931</option>
                                    <option value="1930">1930</option>
                                    <option value="1929">1929</option>
                                    <option value="1928">1928</option>
                                    <option value="1927">1927</option>
                                    <option value="1926">1926</option>
                                    <option value="1925">1925</option>
                                    <option value="1924">1924</option>
                                    <option value="1923">1923</option>
                                    <option value="1922">1922</option>
                                    <option value="1921">1921</option>
                                    <option value="1920">1920</option>
                                    <option value="1919">1919</option>
                                    <option value="1918">1918</option>
                                    <option value="1917">1917</option>
                                    <option value="1916">1916</option>
                                    <option value="1915">1915</option>
                                    <option value="1914">1914</option>
                                    <option value="1913">1913</option>
                                    <option value="1912">1912</option>
                                    <option value="1911">1911</option>
                                    <option value="1910">1910</option>
                                    <option value="1909">1909</option>
                                    <option value="1908">1908</option>
                                    <option value="1907">1907</option>
                                    <option value="1906">1906</option>
                                    <option value="1905">1905</option>
                                    <option value="1904">1904</option>
                                    <option value="1903">1903</option>
                                    <option value="1902">1902</option>
                                    <option value="1901">1901</option>
                                    <option value="1900">1900</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-3 pb-3">
                <div class="row pt-3 pl-0">
                    <div class="col-md-3 pl-0">
                        <label class="form-label" for="autoSizingInputGroup">My Preffered Language</label>
                        <select class="form-select my-setting-Language" name="Language" aria-label="Default select example">
                            <option value="Afrikaans">Afrikaans</option>
                            <option value="Albanian">Albanian</option>
                            <option value="Arabic">Arabic</option>
                            <option value="Armenian">Armenian</option>
                            <option value="Basque">Basque</option>
                            <option value="Bengali">Bengali</option>
                            <option value="Bulgarian">Bulgarian</option>
                            <option value="Catalan">Catalan</option>
                            <option value="Cambodian">Cambodian</option>
                            <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                            <option value="Croatian">Croatian</option>
                            <option value="Czech">Czech</option>
                            <option value="Danish">Danish</option>
                            <option value="Dutch">Dutch</option>
                            <option value="English" selected>English</option>
                            <option value="Estonian">Estonian</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finnish">Finnish</option>
                            <option value="French">French</option>
                            <option value="Georgian">Georgian</option>
                            <option value="German">German</option>
                            <option value="Greek">Greek</option>
                            <option value="Gujarati">Gujarati</option>
                            <option value="Hebrew">Hebrew</option>
                            <option value="Hindi">Hindi</option>
                            <option value="Hungarian">Hungarian</option>
                            <option value="Icelandic">Icelandic</option>
                            <option value="Indonesian">Indonesian</option>
                            <option value="Irish">Irish</option>
                            <option value="Italian">Italian</option>
                            <option value="Japanese">Japanese</option>
                            <option value="Javanese">Javanese</option>
                            <option value="Korean">Korean</option>
                            <option value="Latin">Latin</option>
                            <option value="Latvian">Latvian</option>
                            <option value="Lithuanian">Lithuanian</option>
                            <option value="Macedonian">Macedonian</option>
                            <option value="Malay">Malay</option>
                            <option value="Malayalam">Malayalam</option>
                            <option value="Maltese">Maltese</option>
                            <option value="Maori">Maori</option>
                            <option value="Marathi">Marathi</option>
                            <option value="Mongolian">Mongolian</option>
                            <option value="Nepali">Nepali</option>
                            <option value="Norwegian">Norwegian</option>
                            <option value="Persian">Persian</option>
                            <option value="Polish">Polish</option>
                            <option value="Portuguese">Portuguese</option>
                            <option value="Punjabi">Punjabi</option>
                            <option value="Quechua">Quechua</option>
                            <option value="Romanian">Romanian</option>
                            <option value="Russian">Russian</option>
                            <option value="Samoan">Samoan</option>
                            <option value="Serbian">Serbian</option>
                            <option value="Slovak">Slovak</option>
                            <option value="Slovenian">Slovenian</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Swahili">Swahili</option>
                            <option value="Swedish ">Swedish </option>
                            <option value="Tamil">Tamil</option>
                            <option value="Tatar">Tatar</option>
                            <option value="Telugu">Telugu</option>
                            <option value="Thai">Thai</option>
                            <option value="Tibetan">Tibetan</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Turkish">Turkish</option>
                            <option value="Ukrainian">Ukrainian</option>
                            <option value="Urdu">Urdu</option>
                            <option value="Uzbek">Uzbek</option>
                            <option value="Vietnamese">Vietnamese</option>
                            <option value="Welsh">Welsh</option>
                            <option value="Xhosa">Xhosa</option>
                        </select>
                    </div>
                </div>
                <div class="row pt-3 pl-0">
                    <button type="submit" class="btn detail-save-btn" value="save" name="Save_Detail">Save</button>
                </div>
            </div>
        </form>
    </div>

    <div class="tab-pane fade pt-4" id="nav-address" role="tabpanel" aria-labelledby="nav-profile-tab">
        <table class="table-data set-address-table" style="width:100%">
            <thead>
                <tr>
                    <th class="set-address-head">Address</th>
                    <th class="set-action-head">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="set-address-table-row">
                    <td class="set-address-body">
                        <span class="set-addres-span">
                            <b>Address : </b>
                            hjadgsa 12, Gujarat, India.
                        </span>
                        <span class="set-addres-span">
                            <b>Phone Number : </b>
                            6546546541
                        </span>
                    </td>
                    <td class="set-action-body">
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#add-address-modal"><i class="fas fa-edit"></i></button>
                        <button class="btn"><i class="far fa-trash-alt"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col pt-3">
                <button class="btn add-address-btn" data-bs-toggle="modal" data-bs-target="#add-address-modal">Add New Address</button>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-contact-tab">
        <form action="<?= Config::base_url . '?controller=customerDash&function=myPasswordUpdate' ?>" method="post" class="pt-1">
        <input type="hidden" name="user-logged-in-id" id="user-logged-id" value="<?= $_SESSION['user']['UserId']; ?>">
            <div class="row pt-3">
                <div class="col-md-4">
                    <label class="form-label">Old Password</label>
                    <input type="password" name="oldpass" class="form-control oldpass" placeholder="Old Password">
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-md-4">
                    <label class="form-label">New Password</label>
                    <input type="password" name="newpass" class="form-control newpass" placeholder="Password">
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-md-4">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="cpass" class="form-control cnewpass" placeholder="Confirm Password">
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-md-4">
                    <button type="submit" name="save-password" value="save" class="btn save-pass-btn">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>