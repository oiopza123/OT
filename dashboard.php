<?php
$themeConfigFile = __DIR__ . '/theme-config.json';
$activeTheme = 'default';

if (file_exists($themeConfigFile)) {
    $config = json_decode(file_get_contents($themeConfigFile), true);
    $activeTheme = $config['active_theme'] ?? 'default';
}

$allowed = ['default', 'songkran'];
if (!in_array($activeTheme, $allowed, true)) {
    $activeTheme = 'default';
}
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Theme Demo</title>
    <link rel="stylesheet" href="themes/default.css">
    <link rel="stylesheet" href="themes/<?php echo htmlspecialchars($activeTheme); ?>.css" id="theme-stylesheet">
</head>
<body>
    <main class="container">
        <header>
            <h1>ตัวอย่างเว็บธีมเทศกาลสงกรานต์</h1>
            <p>ธีมปัจจุบันจากแอดมิน: <strong id="active-theme-label"><?php echo htmlspecialchars($activeTheme); ?></strong></p>
        </header>

        <section class="card">
            <h2>โปรโมชั่นเดือนเมษายน</h2>
            <p>สุขสันต์วันสงกรานต์! เติมความสดชื่นให้หน้าเว็บด้วยสีโทนน้ำ ฟ้า และลูกเล่นหยดน้ำ</p>
            <button id="water-splash-btn" type="button">กดเพื่อเล่นเอฟเฟกต์น้ำ</button>
        </section>

        <section class="card">
            <h3>ทดสอบสลับธีมฝั่งผู้ใช้ (ไม่กระทบค่าที่แอดมินตั้ง)</h3>
            <div class="inline-actions">
                <button data-theme="default" class="theme-btn" type="button">Default</button>
                <button data-theme="songkran" class="theme-btn" type="button">Songkran</button>
            </div>
            <small>ปุ่มนี้ใช้ JavaScript สลับ CSS ชั่วคราวเพื่อ preview</small>
        </section>
    </main>

    <script src="assets/theme-switcher.js"></script>
</body>
</html>
