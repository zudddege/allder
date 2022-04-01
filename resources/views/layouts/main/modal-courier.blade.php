<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="notify-courier-modal">
    <div class="modal-dialog modal-lg">
        <form action="{{url('/api/couriers/notify-courier')}}" method="POST">
            <div class="modal-content" style="padding-left: 25px; padding-right: 25px;">
                <div class="jumps-prevent" style="padding-top: 25px;"></div>
                <h6><b>เรียกพนักงานเข้ารับพัสดุ</b></h6>
                <div class="d-flex mx-2">
                    <p class="my-2"><b>ที่อยู่เข้ารับ</b></p>
                    <button type="button" class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#warehouse-notify-modal"><u>เลือกจากสมุดที่อยู่</u></button>
                </div>
                <div class="row mx-2">
                    <div class="col-6">
                        <div class="my-1">
                            <span>รหัสคลัง</span>
                            <div class="d-flex">
                                <input class="form-control" type="text" name="warehouse_no" id="notify_warehouse_no">
                                <b class='px-1' style='color:red;' id="star01" hidden>*</b>
                            </div>
                        </div>
                        <div class="my-1">
                            <span>ผู้ติดต่อ</span>
                            <div class="d-flex">
                                <input class="form-control" type="text" name="contact_name" id="notify_contact_name">
                                <b class='px-1' style='color:red;' id="star02" hidden>*</b>
                            </div>
                        </div>
                        <div class="my-1">
                            <span>พื้นที่บริการ</span>
                            <div class="d-flex">
                                <textarea style="resize: none; width: 100%;" rows="4" class="form-control" name="warehouse_detail" id="notify_warehouse_detail"></textarea>
                                <b class='px-1' style='color:red;' id="star03" hidden>*</b>
                            </div>
                        </div>
                        <div class="my-1">
                            <span>จังหวัด</span>
                            <div class="d-flex">
                                <input class="form-control" type="text" value="" name="warehouse_province" id="notify_warehouse_province">
                                <b class='px-1' style='color:red;' id="star04" hidden>*</b>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="my-1">
                            <span>ชื่อคลัง</span>
                            <div class="d-flex">
                                <input class="form-control" type="text" name="warehouse_name" id="notify_warehouse_name">
                                <b class='px-1' style='color:red;' id="star05" hidden>*</b>
                            </div>
                        </div>
                        <div class="my-1">
                            <span>เบอร์โทรศัพท์</span>
                            <div class="d-flex">
                                <input class="form-control" type="text" name="warehouse_tel" id="notify_warehouse_tel">
                                <b class='px-1' style='color:red;' id="star06" hidden>*</b>
                            </div>
                        </div>
                        <div class="my-1">
                            <span>ตำบล / แขวง</span>
                            <div class="d-flex">
                                <input class="form-control" type="text" value="" name="warehouse_district" id="notify_warehouse_district">
                                <b class='px-1' style='color:red;' id="star07" hidden>*</b>
                            </div>
                        </div>
                        <div class="my-1">
                            <span>อำเภอ / เขต</span>
                            <div class="d-flex">
                                <input class="form-control" type="text" value="" name="warehouse_city" id="notify_warehouse_city">
                                <b class='px-1' style='color:red;' id="star08" hidden>*</b>
                            </div>
                        </div>
                        <div class="my-1">
                            <span>รหัสไปรษณีย์</span>
                            <div class="d-flex">
                                <input class="form-control" type="text" value="" name="warehouse_postal_code" id="notify_warehouse_postal_code">
                                <b class='px-1' style='color:red;' id="star09" hidden>*</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jumps-prevent border-bottom" style="padding-top: 25px;"></div>
                <div class="jumps-prevent" style="padding-top: 25px;"></div>
                <h6><b>ฝากข้อความ</b></h6>
                <div class="mx-4">
                    <div class="row">
                        <div class="col-6">
                            <div class="my-1">
                                <span>จำนวนพัสดุ</span>
                                <div class="d-flex">
                                    <input class="form-control" type="text" name="estimate_parcel_quantity" id="estimate_parcel_quantity">
                                    <b class='px-1' style='color:red;' id="star010" hidden>*</b>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="my-1">
                                <span>ขนาดพัสดุ</span>
                                <input class="form-control" type="text" name="parcel size">
                            </div>
                        </div>
                    </div>
                    <div class="my-1">
                        <span>หมายเหตุ</span>
                        <textarea style="resize: none; width: 100%;" rows="4" class="form-control" name="note_detail" id="notify_note_detail"></textarea>
                    </div>
                    <div class="container-fluid my-2">
                        <div class="d-flex my-1">
                            <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-notify" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;" value="นำเทปกาวมาด้วย ">นำเทปกาวมาด้วย</button>
                            <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-notify" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;" value="สินค้าพัสดุแตกหักง่าย ">สินค้าพัสดุแตกหักง่าย</button>
                            <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-notify" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;" value="พัสดุจำนวนมาก / ขนาดใหญ่ต้องการรถบรรทุกของ VAN เข้ารับ ">พัสดุจำนวนมาก / ขนาดใหญ่ต้องการรถบรรทุกของ VAN เข้ารับ</button>
                        </div>
                        <div class="d-flex my-1">
                            <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-notify" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;" value="นำซองเอกสารมาด้วย ">นำซองเอกสารมาด้วย</button>
                            <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-notify" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;" value="นำบรรจุภัณฑ์มาด้วย ">นำบรรจุภัณฑ์มาด้วย</button>
                            <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-notify" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;" value="โปรดติดต่อก่อนเข้ารับ ">โปรดติดต่อก่อนเข้ารับ</button>
                            <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-notify" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;" value="สถานที่เป็นตึก / อาคาร ">สถานที่เป็นตึก / อาคาร</button>
                        </div>
                    </div>
                    <div class=" d-flex align-items-center my-2">
                        <input type="checkbox" id="checkbox-courier" checked>ฉันได้อ่านและยอมรับข้อกำหนดใน
                        <a href="#"><u>ข้อกำหนดเงื่อนไขการบริการ</u></a>
                    </div>
                    <div class="d-flex my-1" style="padding-top: 15px;">
                        <button type="button" class="btn btn-danger mx-2" data-dismiss="modal">ยกเลิก</button>
                        <button class="btn btn-primary mx-2" type="submit" id="submit-button-courier">ยืนยันรายการ</button>
                    </div>
                </div>
                <div class="jumps-prevent" style="padding-top: 25px;"></div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="assign-courier-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding-left: 25px; padding-right: 25px;">
            <div class="jumps-prevent" style="padding-top: 25px;"></div>
            <h6><b>ระบุพนักงานเข้ารับพัสดุ</b></h6>
            <div class="rounded-lg mx-2" style="background-color: #e48383bd">
                <p class="mt-2" style="color: rgb(201, 61, 61); font-size: 12px; text-align: center;">คำแนะนำ: ในกรณีที่ลูกค้ามีจำนวนพัสดุที่ต้องการส่งเยอะ ลูกค้าสามารถแจ้งทางสาขาว่าต้องการพนักงานหลายท่านเข้ารับพัสดุ
                <br>จากนั้นสอบถามรหัสพนักงานเมื่อพนักงานมาถึง แล้วกรอกรหัสพนักงานนั้นในฟังก์ชั่น"ระบุพนักงานเข้ารับพัสดุ" เพื่อสร้างงานรับให้พนักงานตั้งกล่าว</p>
            </div>
            <div class="jumps-prevent" style="padding-top: 25px;"></div>
            <div class="my-1 mx-2">
                <span>รหัสพนักงานรับพัสดุ</span>
                <div class="d-flex">
                    <input class="form-control" type="text" style="width: 50%" name="staff_id" id="staff_id">
                    <b class='px-1' style='color:red;' id="star011" hidden>*</b>
                </div>
            </div>
            <div class="jumps-prevent border-bottom" style="padding-top: 25px;"></div>
            <div class="jumps-prevent" style="padding-top: 25px;"></div>
            <div class="d-flex align-items-center">
                <span class="mx-2"><b>ที่อยู่เข้ารับพัสดุ</b></span>
                <button type="button" class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#warehouse-assign-modal"><u>เลือกจากสมุดที่อยู่</u></button>
            </div>
            <div class="row mx-1">
                <div class="col-6">
                    <div class="my-1">
                        <span>พื้นที่บริการ</span>
                        <div class="d-flex">
                            <textarea style="resize: none; width: 100%;" rows="4" class="form-control" name="warehouse_detail" id="assign_warehouse_detail"></textarea>
                            <b class='px-1' style='color:red;' id="star012" hidden>*</b>
                        </div>
                    </div>
                    <div class="jumps-prevent" style="padding-top: 3.5px;"></div>
                    <div class="my-1">
                        <span>จังหวัด</span>
                        <div class="d-flex">
                            <input class="form-control" type="text" name="warehouse_province" id="assign_warehouse_province">
                            <b class='px-1' style='color:red;' id="star013" hidden>*</b>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="my-1">
                        <span>ตำบล / แขวง</span>
                        <div class="d-flex">
                            <input class="form-control" type="text" name="warehouse_district" id="assign_warehouse_district">
                            <b class='px-1' style='color:red;' id="star014" hidden>*</b>
                        </div>
                    </div>
                    <div class="my-1">
                        <span>อำเภอ / เขต</span>
                        <div class="d-flex">
                            <input class="form-control" type="text" name="warehouse_city" id="assign_warehouse_city">
                            <b class='px-1' style='color:red;' id="star015" hidden>*</b>
                        </div>
                    </div>
                    <div class="my-1">
                        <span>รหัสไปรษณีย์</span>
                        <div class="d-flex">
                            <input class="form-control" type="text" name="warehouse_postal_code" id="assign_warehouse_postal_code">
                            <b class='px-1' style='color:red;' id="star016" hidden>*</b>
                        </div>
                    </div>
                </div>
            </div>
            <div class="jumps-prevent border-bottom" style="padding-top: 25px;"></div>
            <div class="jumps-prevent" style="padding-top: 25px;"></div>
            <p><b>ฝากข้อความ</b></p>
            <div class="my-1 mx-2">
                <span>จำนวนพัสดุ</span>
                <div class="d-flex">
                    <input class="form-control" type="text" style="width: 50%" id="assign_estimate_parcel_quantity">
                    <b class='px-1' style='color:red;' id="star017" hidden>*</b>
                </div>
            </div>
            <div class="my-1 mx-2">
                <span>หมายเหตุ</span>
                <textarea style="resize: none; width: 100%;" rows="4" class="form-control" name="note_detail" id="assign_note_detail"></textarea>
            </div>
            <div class="container-fluid my-2 mx-2">
                <div class="d-flex my-1">
                    <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-assign" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;" value="นำเทปกาวมาด้วย ">นำเทปกาวมาด้วย</button>
                    <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-assign" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;" value="สินค้าพัสดุแตกหักง่าย ">สินค้าพัสดุแตกหักง่าย</button>
                    <button type=" button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-assign" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;" value="พัสดุจำนวนมาก / ขนาดใหญ่ต้องการรถบรรทุกของ VAN เข้ารับ ">พัสดุจำนวนมาก / ขนาดใหญ่ต้องการรถบรรทุกของ VAN เข้ารับ</button>
                </div>
                <div class=" d-flex my-1">
                    <button type="button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-assign" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;" value="นำซองเอกสารมาด้วย ">นำซองเอกสารมาด้วย</button>
                    <button type=" button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-assign" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;" value="นำบรรจุภัณฑ์มาด้วย ">นำบรรจุภัณฑ์มาด้วย</button>
                    <button type=" button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-assign" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;" value="โปรดติดต่อก่อนเข้ารับ ">โปรดติดต่อก่อนเข้ารับ</button>
                    <button type=" button" class="btn btn-outline-secondary rounded-10 mx-1 my-1 hotkey-note-assign" style="padding: 0px 10px; height: 25px; font-size: 12px; text-align: center;" value="สถานที่เป็นตึก / อาคาร ">สถานที่เป็นตึก / อาคาร</button>
                </div>
            </div>
            <div class=" d-flex my-1 mx-2" style="padding-top: 15px;">
                <input class="btn btn-danger mx-2" type="reset" data-dismiss="modal" value="ยกเลิก">
                <input class="btn btn-primary mx-2" type="submit" value="ยืนยันรายการ" id="submit-button-courier2">
            </div>
            <div class="jumps-prevent" style="padding-top: 25px;"></div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="warehouse-notify-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="padding-left: 25px; padding-right: 25px;">
            <div class="jumps-prevent" style="padding-top: 25px;"></div>
            <h5><b>เลือกจากสมุดที่อยู่</b></h5>
            <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ, เบอร์โทรศัพท์</a></div>
            <div class=" ">
                <input class="form-control form-control-sm" type="text" id="search-ware" style="width : 25%;">
            </div>
            <div class="jumps-prevent" style="padding-top: 15px;"></div>
            <table class="table table-striped position-relative warehouse-table paginated-ware" style="width: 100%;">
                <thead>
                    <tr>
                        <th>รหัสคลังสินค้า</th>
                        <th>ชื่อคลังสินค้า</th>
                        <th>ที่อยู่</th>
                        <th>ผู้ติดต่อ</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($warehouses as $warehouse)
                    <tr>
                        <td>{{$warehouse->warehouse_no}}</td>
                        <td>{{$warehouse->warehouse_name}}</td>
                        <td>
                            {{$warehouse->warehouse_detail}}
                            {{$warehouse->warehouse_district}}
                            {{$warehouse->warehouse_city}}
                            {{$warehouse->warehouse_province}}
                            {{$warehouse->warehouse_postal_code}}
                        </td>
                        <td>{{$warehouse->contact_name}}</td>
                        <td>{{$warehouse->warehouse_tel}}</td>
                        <td><button type='button' class='btn btn-primary notify-wh-button' id="{{$warehouse->id}}" data-dismiss='modal'>ใช้ที่อยู่นี้</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="jumps-prevent" style="padding-top: 25px;"></div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="warehouse-assign-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="padding-left: 25px; padding-right: 25px;">
            <div class="jumps-prevent" style="padding-top: 25px;"></div>
            <h5><b>เลือกจากสมุดที่อยู่</b></h5>
            <div class="mb-1">ค้นหา<a class="text-muted px-2">เลขออเดอร์, เลขพัสดุ, เบอร์โทรศัพท์</a></div>
            <div class=" ">
                <input class="form-control form-control-sm" type="text" id="search-ware2" style="width : 25%;">
            </div>
            <div class="jumps-prevent" style="padding-top: 15px;"></div>
            <table class="table table-striped position-relative warehouse-table paginated-ware2" style="width: 100%;">
                <thead>
                    <tr>
                        <th>รหัสคลังสินค้า</th>
                        <th>ชื่อคลังสินค้า</th>
                        <th>ที่อยู่</th>
                        <th>ผู้ติดต่อ</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($warehouses as $warehouse)
                    <tr>
                        <td>{{$warehouse->warehouse_no}}</td>
                        <td>{{$warehouse->warehouse_name}}</td>
                        <td>
                            {{$warehouse->warehouse_detail}}
                            {{$warehouse->warehouse_district}}
                            {{$warehouse->warehouse_city}}
                            {{$warehouse->warehouse_province}}
                            {{$warehouse->warehouse_postal_code}}
                        </td>
                        <td>{{$warehouse->contact_name}}</td>
                        <td>{{$warehouse->warehouse_tel}}</td>
                        <td><button type='button' class='btn btn-primary assign-wh-button' id="{{$warehouse->id}}" data-dismiss='modal'>ใช้ที่อยู่นี้</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="jumps-prevent" style="padding-top: 25px;"></div>
        </div>
    </div>
</div>

<style>

    .modal {
        overflow: auto !important;
    }
    div.pager-ware {
        text-align: center;
        margin: 1em 0;
    }

    div.pager-ware span {
        display: inline-block;
        width: 1.8em;
        height: 1.8em;
        line-height: 1.8;
        text-align: center;
        cursor: pointer;
        background: #2196F3;
        color: #ffff;
        margin-right: 0.5em;
    }

    div.pager-ware span.active {
        background: #0036e7;
    }

    div.pager-ware2 {
        text-align: center;
        margin: 1em 0;
    }

    div.pager-ware2 span {
        display: inline-block;
        width: 1.8em;
        height: 1.8em;
        line-height: 1.8;
        text-align: center;
        cursor: pointer;
        background: #2196F3;
        color: #ffff;
        margin-right: 0.5em;
    }

    div.pager-ware2 span.active {
        background: #0036e7;
    }

    button:disabled,
        button[disabled] {
            background-color: #cccccc !important;
            color: #666666 !important;
    }

</style>
