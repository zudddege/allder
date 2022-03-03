<?php

namespace App\Models\FlashCategoryCode;

use Illuminate\Database\Eloquent\Model;

class FlashCategoryCode extends Model {
    public static function transport($code) {
        if ($code == '1') {
            return 'ธรรมดา';
        } elseif ($code == '2') {
            return 'บริการ Speed';
        } elseif ($code == '4') {
            return 'ราคาพิเศษสำหรับพัสดุขนาดใหญ่';
        } else {
            return $code;
        }
    }

    public static function policy($code) {
        if ($code == '1') {
            return 'คิดค่าขนส่งตามนํ้าหนัก';
        } elseif ($code == '2') {
            return 'คิดค่าขนส่งตามขนาด';
        } else {
            return $code;
        }
    }

    public static function problem($code) {
        if ($code == '14') {
            return 'ลูกค้าเปลี่ยนแปลงเวลา';
        } elseif ($code == '40') {
            return 'ลูกค้าไม่อยู่บ้าน/ไม่มีผู้รับสาย';
        } elseif ($code == '17') {
            return 'ผู้รับปฎิเสธรับสินค้า';
        } elseif ($code == '23') {
            return 'ผู้รับ/ที่อยู่ไม่ชัดเจนหรือไม่ถูกต้อง';
        } elseif ($code == '25') {
            return 'เบอร์โทรผู้รับไม่ถูกต้อง';
        } elseif ($code == '26') {
            return 'ยอด COD ไม่ถูกต้อง';
        } elseif ($code == '29') {
            return 'หมายเลขนี้ยังไม่เปิดให้บริการ';
        } else {
            return $code;
        }
    }

    public static function status($code) {
        if ($code == '1') {
            return 'รับพัสดุแล้ว';
        } elseif ($code == '2') {
            return 'ระหว่างการขนส่ง';
        } elseif ($code == '3') {
            return 'ระหว่างการจัดส่ง';
        } elseif ($code == '4') {
            return 'พัสดุคงคลัง';
        } elseif ($code == '5') {
            return 'เซ็นรับแล้ว';
        } elseif ($code == '6') {
            return 'ระหว่างจัดการพัสดุมีปัญหา';
        } elseif ($code == '7') {
            return 'พัสดุตีกลับแล้ว';
        } elseif ($code == '8') {
            return 'ปิดงานมีปัญหา';
        } elseif ($code == '9') {
            return 'เรียกคืนพัสดุแล้ว';
        } else {
            return $code;
        }
    }

    public static function category($code) {
        if ($code == '0') {
            return 'เอกสาร';
        } elseif ($code == '1') {
            return 'อาหารแห้ง';
        } elseif ($code == '2') {
            return 'ของใช้';
        } elseif ($code == '3') {
            return 'อุปกรณ์ไอที';
        } elseif ($code == '4') {
            return 'เสื้อผ้า';
        } elseif ($code == '5') {
            return 'สื่อบันเทิง';
        } elseif ($code == '6') {
            return 'อะไหล่รถยนต์';
        } elseif ($code == '7') {
            return 'รองเท้า/กระเป๋า';
        } elseif ($code == '8') {
            return 'อุปกรณ์กีฬา';
        } elseif ($code == '9') {
            return 'เครื่องสำอางค์';
        } elseif ($code == '10') {
            return 'เฟอร์นิเจอร์';
        } elseif ($code == '11') {
            return 'ผลไม้';
        } elseif ($code == '99') {
            return 'อื่นๆ';
        } else {
            return $code;
        }
    }

    public static function courier($code) {
        if ($code == '0') {
            return 'รอจัดสรร';
        } elseif ($code == '1') {
            return 'รอรับพัสดุ';
        } elseif ($code == '2') {
            return 'รับพัสดุแล้ว';
        } elseif ($code == '3') {
            return 'โอนงานรับ';
        } elseif ($code == '4') {
            return 'ยกเลิกแล้ว';
        } else {
            return $code;
        }
    }

    public static function cancel($code) {
        if ($code == '6') {
            return 'อื่นๆ';
        } elseif ($code == '80') {
            return 'ลูกค้ายกเลิกงานรับ';
        } elseif ($code == '82') {
            return 'รับงานสำเร็จแล้ว';
        } elseif ($code == '83') {
            return 'ไม่สามารถติดต่อผู้ส่ง';
        } elseif ($code == '85') {
            return 'เบอร์โทรศัพท์ยังไม่เปิดใช้บริการ';
        } elseif ($code == '86') {
            return 'พัสดุไม่ตรงตามเงื่อนไข(ขนาดเกิน)';
        } elseif ($code == '87') {
            return 'พัสดุไม่ตรงตามเงื่อนไข(ของต้องห้าม)';
        } elseif ($code == '88') {
            return 'ที่อยู่ผู้ส่งเป็นหมู่เกาะ';
        } else {
            return $code;
        }
    }
}
