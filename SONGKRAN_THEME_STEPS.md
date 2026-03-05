# ขั้นตอนเพิ่มธีมสงกรานต์ (PHP + CSS + JS)

1. สร้างไฟล์ `themes/default.css` และ `themes/songkran.css` เพื่อแยกสไตล์แต่ละธีม
2. ทำหน้า `admin.php` สำหรับแอดมินเลือกธีม และบันทึกค่าลง `theme-config.json`
3. ในหน้าใช้งานจริง เช่น `dashboard.php` ให้อ่านค่า theme จากไฟล์ config แล้ว `<link>` CSS ตามธีมที่เลือก
4. เพิ่ม `assets/theme-switcher.js` เพื่อ preview ธีมแบบทันทีฝั่งผู้ใช้โดยไม่กระทบค่า global
5. ถ้าจะใช้งาน production แนะนำ:
   - เพิ่มระบบ login สำหรับแอดมิน
   - ตรวจสิทธิ์ก่อนแก้ `theme-config.json`
   - เก็บค่าธีมลงฐานข้อมูลแทนไฟล์
